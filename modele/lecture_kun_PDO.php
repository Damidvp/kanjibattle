<?php

require_once "pdo_connection.php";
require_once "../classes/lecture_kun.php";

class LectureKunPDO{

    //Retourne la liste complète de lectures kun
    public function getAllLecturesKun(){
        $cnxDB = connectionDB();
        $allLecturesKun = array();

        $requeteSql = "SELECT * FROM lecture_kun";
        $lectureKunStatement = $cnxDB->prepare($requeteSql);
        $lectureKunStatement->execute();
        $lecturesKun = $lectureKunStatement->fetchAll();

        foreach($lecturesKun as $lectureKun){
            $occLectureKun = new LectureKun($lectureKun['numLK'], $lectureKun['lecture']);
            array_push($allLecturesKun, $occLectureKun);
        }

        return $allLecturesKun;
    }

    //Retourne la lecture kun correspondant à un identifiant
    public function getLectureKunByNum($numLK){
        $cnxDB = connectionDB();

        $requeteSql = "SELECT * FROM lecture_kun WHERE numLK = ".$numLK.";";
        $lectureKunStatement = $cnxDB->prepare($requeteSql);
        $lectureKunStatement->execute();
        $resultat = $lectureKunStatement->fetch();

        $lectureKunTrouve = new LectureKun($resultat['numLK'], $resultat['lecture']);

        return $lectureKunTrouve;
    }

}

?>