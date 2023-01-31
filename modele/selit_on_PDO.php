<?php

require_once "pdo_connection.php";

require_once "../classes/selit_on.php";
require_once "../classes/lecture_on.php";
require_once "../classes/kanji.php";

require_once "lecture_on_PDO.php";
require_once "kanji_PDO.php";

class SeLitOnPDO{

    //Retourne la liste complète de combinaisons
    public function getAllSeLitOns(){
        $cnxDB = connectionDB();
        $allSeLitOns = array();

        $lectureOnPDO = new LectureOnPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM selit_on";
        $seLitOnStatement = $cnxDB->prepare($requeteSql);
        $seLitOnStatement->execute();
        $seLitOns = $seLitOnStatement->fetchAll();

        foreach($seLitOns as $seLitOn){
            $laLO = $lectureOnPDO->getLectureOnByNum($seLitOn['numLO']);
            $leKanji = $kanjiPDO->getKanjiByKanji($seLitKun['idKanji']);
            $occSeLitOn = new SeLitOn($leKanji, $laLO);
            array_push($allSeLitOns, $occSeLitOn);
        }

        return $allSeLitOns;
    }

    //Retourne la position d'un kanji dans un mot
    public function getSeLitOnByKanji($kanji){
        $cnxDB = connectionDB();
        $seLitOnsKanji = array();

        $lectureOnPDO = new LectureOnPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM selit_on WHERE idKanji = '".$kanji."';";
        $seLitOnStatement = $cnxDB->prepare($requeteSql);
        $seLitOnStatement->execute();
        $seLitOns = $seLitOnStatement->fetchAll();

        foreach($seLitOns as $seLitOn){
            $laLO = $lectureOnPDO->getLectureOnByNum($seLitOn['numLO']);
            $leKanji = $kanjiPDO->getKanjiByKanji($seLitOn['idKanji']);
            $occSeLitOn = new SeLitOn($leKanji, $laLO);
            array_push($seLitOnsKanji, $occSeLitOn);
        }

        return $seLitOnsKanji;
    }

}

?>