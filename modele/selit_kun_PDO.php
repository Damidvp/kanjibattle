<?php

require_once "pdo_connection.php";

require_once "../classes/selit_kun.php";
require_once "../classes/lecture_kun.php";
require_once "../classes/kanji.php";

require_once "lecture_kun_PDO.php";
require_once "kanji_PDO.php";

class SeLitKunPDO{

    //Retourne la liste complète de combinaisons
    public function getAllSeLitKuns(){
        $cnxDB = connectionDB();
        $allSeLitKuns = array();

        $lectureKunPDO = new LectureKunPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM selit_kun ORDER BY numLK;";
        $seLitKunStatement = $cnxDB->prepare($requeteSql);
        $seLitKunStatement->execute();
        $seLitKuns = $seLitKunStatement->fetchAll();

        foreach($seLitKuns as $seLitKun){
            $laLK = $lectureKunPDO->getLectureKunByNum($seLitKun['numLK']);
            $leKanji = $kanjiPDO->getKanjiByKanji($seLitKun['idKanji']);
            $occSeLitKun = new SeLitKun($leKanji, $laLK);
            array_push($allSeLitKuns, $occSeLitKun);
        }

        return $allSeLitKuns;
    }

    //Retourne la position d'un kanji dans un mot
    public function getSeLitKunByKanji($kanji){
        $cnxDB = connectionDB();
        $seLitKunsKanji = array();

        $lectureKunPDO = new LectureKunPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM selit_kun WHERE idKanji = '".$kanji."';";
        $seLitKunStatement = $cnxDB->prepare($requeteSql);
        $seLitKunStatement->execute();
        $seLitKuns = $seLitKunStatement->fetchAll();

        foreach($seLitKuns as $seLitKun){
            $laLK = $lectureKunPDO->getLectureKunByNum($seLitKun['numLK']);
            $leKanji = $kanjiPDO->getKanjiByKanji($seLitKun['idKanji']);
            $occSeLitKun = new SeLitKun($leKanji, $laLK);
            array_push($seLitKunsKanji, $occSeLitKun);
        }

        return $seLitKunsKanji;
    }

}

?>