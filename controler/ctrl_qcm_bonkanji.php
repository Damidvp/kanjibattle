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

if(!isset($_SESSION['qcmDejaPasses'])){
    $_SESSION['qcmDejaPasses'] = array();
}
if(!isset($_SESSION['numQcm'])){
    $_SESSION['numQcm'] = 1;
}

if(!isset($_GET['action'])){
    if(isset($_SESSION['unQcmAuPif'])){
        afficherUnQcmEnSession();
    } else {
        afficherUnQcm();
    }
} else {
    if(isset($_GET['action']) && $_GET['action'] == 'newQcm'){
        if(count($_SESSION['qcmDejaPasses']) < $nombreDeQcmsActuel){
            unset($_SESSION['unQcmAuPif']);
            unset($_SESSION['kanjiPossibles']);
            $_SESSION['numQcm']++;
            afficherUnQcm();
        } else {
            echo "<script type='text/javascript' src='../scripts/script_qcm_bonkanji_reponse.js'></script>";
            echo "<script type='text/javascript'> hideTimer(); </script>";
            echo "<h3>Félicitations, vous avez terminé le quiz !</h3>";
            //echo "<p>Vous avez réussi ".$nbReussis." question(s).</p>";
            //echo "<p>Vous avez échoué à ".$nbEchoues." question(s).</p>";
            //echo "<p>En tout, vous avez donné ".$mauvaisesRep." mauvaise(s) réponse(s).</p>";
            //Bouton revenir à l'accueil et recommencer
            unset($_SESSION['qcmDejaPasses']);
            unset($_SESSION['numQcm']);
            unset($_SESSION['unQcmAuPif']);
            unset($_SESSION['kanjiPossibles']);
        }
    }
}

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

function afficherUnQcmEnSession(){
    global $qcmBKPDO, $kanjiPDO, $nombreDeQcmsActuel;
    $qcmRestants = $qcmBKPDO->getQcmBKSauf($_SESSION['qcmDejaPasses']);
    $nombreDeQcmRestants = count($qcmRestants);
    $unQcmSession = $_SESSION['unQcmAuPif'];

    $kanjiPossibles = $_SESSION['kanjiPossibles'];
    
    echo "<div id='qcm'>";
    echo "<script type='text/javascript' src='../scripts/script_qcm_bonkanji_reponse.js'></script>";
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

?>