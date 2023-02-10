<?php

require "../modele/kanji_PDO.php"; 
require "../modele/qcm_bonkanji_PDO.php";

//On démarre la session des qcm, et on détruit la précédente si elle existe
if(!isset($_SESSION['numQcm'])){
    session_start();
}

$kanjiPDO = new KanjiPDO();
$qcmBKPDO = new QcmBonKanjiPDO();

$listeQcm = $qcmBKPDO->getAllQcmBonKanjis(); //Liste de tous les QCM
$nombreDeQcmsActuel = $qcmBKPDO->getNombreTotalQcm(); //On récupère le nombre total de QCMs

//Initialisation des sessions
if(!isset($_SESSION['qcmDejaPasses'])){
    $_SESSION['qcmDejaPasses'] = array();
}
if(!isset($_SESSION['numQcm'])){
    $_SESSION['numQcm'] = 1;
}
if(!isset($_SESSION['br'])){
    $_SESSION['br'] = 0;
}

//Si la page est rafraîchie, on réaffiche le QCM sur lequel on était
if(!isset($_GET['action'])){
    if(isset($_SESSION['unQcmAuPif'])){
        afficherUnQcmEnSession();
    } else {
        afficherUnQcm();
    }
} else {
    //On affiche tous les QCMs un par un
    if(isset($_GET['action']) && $_GET['action'] == 'newQcm'){
        $_SESSION['br'] += $_GET['bonneRep'];
        if(count($_SESSION['qcmDejaPasses']) < $nombreDeQcmsActuel){
            unset($_SESSION['unQcmAuPif']);
            unset($_SESSION['kanjiPossibles']);
            $_SESSION['numQcm']++;
            afficherUnQcm();
        //Après le dernier QCM, on indique la fin et on affiche le résultat
        } else {
            $nbBonnesReponses = $_SESSION['br'];
            $nbMauvaisesReponses = $nombreDeQcmsActuel - $nbBonnesReponses;
            echo "<script type='text/javascript' src='../scripts/script_qcm_bonkanji_reponse.js'></script>";
            echo "<script> timer.style.display = 'none'; </script>";
            echo "<script> document.getElementById('d_btn_qsuivante').style.display = 'none'; 
            document.getElementById('bonne_reponse').style.display = 'none'; 
            document.getElementById('mauvaise_reponse').style.display = 'none'; 
            document.getElementById('temps_ecoule').style.display = 'none'; </script>";
            echo "<h3>Félicitations, vous avez terminé le quiz !</h3>";
            echo "<div id='resultat'>";
            echo "<p id='p_br'>Bonnes réponses : <span id='br'>".$nbBonnesReponses."</span></p>";
            echo "<p id='p_mr'>Mauvaises réponses / Temps écoulé : <span id='mr'>".$nbMauvaisesReponses."</span></p>";
            echo "</div>";
            echo "<script> delete sessionStorage['bonnesReponses']; </script>";
            unset($_SESSION['qcmDejaPasses']);
            unset($_SESSION['numQcm']);
            unset($_SESSION['unQcmAuPif']);
            unset($_SESSION['kanjiPossibles']);
            unset($_SESSION['br']);
        }
    }
}

//Fonction qui choisit un QCM de façon aléatoire et l'affiche
function afficherUnQcm(){
    global $qcmBKPDO, $kanjiPDO, $nombreDeQcmsActuel;
    $qcmRestants = $qcmBKPDO->getQcmBKSauf($_SESSION['qcmDejaPasses']);
    $nombreDeQcmRestants = count($qcmRestants);
    $unQcmAuPif = $qcmRestants[array_rand($qcmRestants)]; //On choisit un QCM au hasard parmi les restants
    $_SESSION['unQcmAuPif'] = $unQcmAuPif;
    $tousLesKanjis = $kanjiPDO->getAllKanjiSauf($unQcmAuPif->getLeBonKanji()->getKanji()); //On récupère tous les kanji, sauf celui de la réponse
    array_push($_SESSION['qcmDejaPasses'], $unQcmAuPif);

    //Pour les réponses, on crée un tableau avec 3 kanji au hasard (sauf le bon)
    $keysRandom = array_rand($tousLesKanjis, 3); //array_rand : retourne une ou plusieurs clés de tableau sélectionnées au hasard
    $kanjiPossibles = array();
    foreach($keysRandom as $keyRandom){
        array_push($kanjiPossibles, $tousLesKanjis[$keyRandom]);
    }
    $kanjiPossibles = insererRandomDans($kanjiPossibles, $unQcmAuPif->getLeBonKanji()); //A ce tableau, on rajoute le bon kanji du QCM à un endroit aléatoire
    $_SESSION['kanjiPossibles'] = $kanjiPossibles;
    
    echo "<div id='qcm'>";
    echo "<progress id='progress_bar' value='".($nombreDeQcmsActuel-count($qcmRestants))."' max='".$nombreDeQcmsActuel."'></progress>";
    echo "<script type='text/javascript' src='../scripts/script_qcm_bonkanji_reponse.js'></script>";
    echo "<h3>Question ".$_SESSION['numQcm']." : ".$unQcmAuPif->getTexteQuestion()."</h3><br>";

    $numIdBtn = 1; //Compteur pour différencier les ID de boutons
    echo "<div id='d_btn_rep'>";
    foreach($kanjiPossibles as $uneReponse){
        $idBtn = "btnX".$numIdBtn;
        if((strcmp($uneReponse->getKanji(), $unQcmAuPif->getLeBonKanji()->getKanji()))==0){ //strcmp retourne 0 si les deux valeurs sont égales
            $idBtn = "btnV";
        } else {
            $numIdBtn++;
        }
        echo "<button class='btn_rep' id='".$idBtn."'><span class='chjap'>".$uneReponse->getKanji()."</span></button>";
    }
    echo "</div><br>";
    echo "</div>";
}

//Fonction qui affiche le QCM stocké dans la session (en cas de refresh)
function afficherUnQcmEnSession(){
    global $qcmBKPDO, $kanjiPDO, $nombreDeQcmsActuel;
    $qcmRestants = $qcmBKPDO->getQcmBKSauf($_SESSION['qcmDejaPasses']);
    $nombreDeQcmRestants = count($qcmRestants);
    $unQcmSession = $_SESSION['unQcmAuPif'];

    $kanjiPossibles = $_SESSION['kanjiPossibles'];
    
    echo "<div id='qcm'>";
    echo "<progress id='progress_bar' value='".(($nombreDeQcmsActuel-count($qcmRestants))-1)."' max='".$nombreDeQcmsActuel."'></progress>";
    echo "<h3>Question ".$_SESSION['numQcm']." : ".$unQcmSession->getTexteQuestion()."</h3><br>";

    $numIdBtn = 1; //Compteur pour différencier les ID de boutons
    echo "<div id='d_btn_rep'>";
    foreach($kanjiPossibles as $uneReponse){
        $idBtn = "btnX".$numIdBtn;
        if((strcmp($uneReponse->getKanji(), $unQcmSession->getLeBonKanji()->getKanji()))==0){ //strcmp retourne 0 si les deux valeurs sont égales
            $idBtn = "btnV";
        } else {
            $numIdBtn++;
        }
        echo "<button class='btn_rep' id='".$idBtn."'><span class='chjap'>".$uneReponse->getKanji()."</span></button>";
    }
    echo "</div><br>";
    echo "</div>";
}

//Cette fonction permet d'insérer un élément dans un tableau à une position aléatoire et de retourner le nouveau tableau
function insererRandomDans($tableau, $element){
    $nouveauTableau = array();

    $maxElement = count($tableau)-1;
    $indiceRandom = rand(0, $maxElement);
    if($maxElement != $indiceRandom){
        $part1 = array_slice($tableau, 0, $indiceRandom);
        $part2 = array_slice($tableau, $indiceRandom);
        array_push($part1, $element);
        $nouveauTableau = array_merge($part1, $part2);
    } else {
        $nouveauTableau = $tableau;
        array_push($nouveauTableau, $element);
    }

    return $nouveauTableau;
}

//Fonction permettant de convertir une chaîne en un entier (servira pour calculer le nombre de bonnes réponses)
function convertStringToInt($string){
    $intReturned = 0;
    for($i=0; $i<strlen($string); $i++){
        $intReturned += intval($string[$i]);
    }
    return $intReturned;
}

?>