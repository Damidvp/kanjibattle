<?php

require_once "pdo_connection.php";
require_once "../classes/mot.php";

class MotPDO{

    //Retourne la liste complète de mots
    public function getAllMots(){
        $cnxDB = connectionDB();
        $allMots = array();

        $requeteSql = "SELECT * FROM mot";
        $motStatement = $cnxDB->prepare($requeteSql);
        $motStatement->execute();
        $mots = $motStatement->fetchAll();

        foreach($mots as $mot){
            $occMot = new Mot($mot['numM'], $mot['designationFr'], $mot['lectureJap'], $mot['okurigana']);
            array_push($allMots, $occMot);
        }

        return $allMots;
    }

    //Retourne le mot correspondant à un identifiant
    public function getMotByNum($numM){
        $cnxDB = connectionDB();

        $requeteSql = "SELECT * FROM mot WHERE numM = ".$numM.";";
        $motStatement = $cnxDB->prepare($requeteSql);
        $motStatement->execute();
        $resultat = $motStatement->fetch();

        $motTrouve = new Mot($resultat['numM'], $resultat['designationFr'], $resultat['lectureJap'], $resultat['okurigana']);

        return $motTrouve;
    }

}

?>