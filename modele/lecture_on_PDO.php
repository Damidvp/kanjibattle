<?php

require_once "pdo_connection.php";
require_once "../classes/lecture_on.php";

class LectureOnPDO{

    //Retourne la liste complète de lectures on
    public function getAllLecturesOn(){
        $cnxDB = connectionDB();
        $allLecturesOn = array();

        $requeteSql = "SELECT * FROM lecture_on";
        $lectureOnStatement = $cnxDB->prepare($requeteSql);
        $lectureOnStatement->execute();
        $lecturesOn = $lectureOnStatement->fetchAll();

        foreach($lecturesOn as $lectureOn){
            $occLectureOn = new LectureOn($lectureOn['numLK'], $lectureOn['lecture']);
            array_push($allLecturesOn, $occLectureOn);
        }

        return $allLecturesOn;
    }

    //Retourne la lecture on correspondant à un identifiant
    public function getLectureOnByNum($numLO){
        $cnxDB = connectionDB();

        $requeteSql = "SELECT * FROM lecture_on WHERE numLO = ".$numLO.";";
        $lectureOnStatement = $cnxDB->prepare($requeteSql);
        $lectureOnStatement->execute();
        $resultat = $lectureOnStatement->fetch();

        $lectureOnTrouve = new LectureOn($resultat['numLO'], $resultat['lecture']);

        return $lectureOnTrouve;
    }

}

?>