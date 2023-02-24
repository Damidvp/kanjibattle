<?php

    require "../modele/lecture_kun_PDO.php";
    require "../modele/lecture_on_PDO.php";
    require "../modele/selit_kun_PDO.php";
    require "../modele/selit_on_PDO.php";

    $seLitKunPDO = new SeLitKunPDO();
    $seLitOnPDO = new SeLitOnPDO();
    $lectureKunPDO = new LectureKunPDO();
    $lectureOnPDO = new LectureOnPDO();

    if(isset($_GET['display']) && $_GET['display'] == 'dispDetails'){
        $kanjiSl = $_GET['kanjiSelect'];
        echo $kanjiSl;
        afficherDetailsBonneReponse($kanjiSl);
    } else {
        echo "no display";
    }

    function afficherDetailsBonneReponse($kanji){
        global $seLitKunPDO, $seLitOnPDO, $kanjiPDO;

        $bonKanjiDuQcm = $kanjiPDO->getKanjiByKanji($kanji);

        echo "<p>Réponse : <span id='chjap'>".$bonKanjiDuQcm->getKanji()."</span> ";
        echo "(".$bonKanjiDuQcm->getNbTraits()." traits)<br>";
        echo "KUN : ";

        $lecturesKun = $seLitKunPDO->getSeLitKunByKanji($bonKanjiDuQcm->getKanji());
        if (count($lecturesKun)==0){
            echo "<i>Aucune</i>";
        } else {
            foreach($lecturesKun as $uneLectureKun){
                echo "<span class='chjap'>".$uneLectureKun->getLaLectureKun()->getLecture()."　</span>";
            }
        }

        echo "<br>";
        echo "ON : ";

        $lecturesOn = $seLitOnPDO->getSeLitOnByKanji($bonKanjiDuQcm->getKanji());
        if (count($lecturesOn)==0){
            echo "<i>Aucune</i>";
        } else {
            foreach($lecturesOn as $uneLectureOn){
                echo "<span class='chjap'>".$uneLectureOn->getLaLectureOn()->getLecture()."　</span>";
            }
        }

        echo "</p>";
    }

    function afficherDetailsMauvaiseReponse(){

        //Afficher les détails de la réponse sélectionnée
        //...

        afficherDetailsBonneReponse();

    }
?>