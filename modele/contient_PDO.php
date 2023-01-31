<?php

require_once "pdo_connection.php";

require_once "../classes/contient.php";
require_once "../classes/mot.php";
require_once "../classes/kanji.php";

require_once "mot_PDO.php";
require_once "kanji_PDO.php";

class ContientPDO{

    //Retourne la liste complète de combinaisons
    public function getAllContients(){
        $cnxDB = connectionDB();
        $allContients = array();

        $motPDO = new MotPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM contient";
        $contientStatement = $cnxDB->prepare($requeteSql);
        $contientStatement->execute();
        $contients = $contientStatement->fetchAll();

        foreach($contients as $contient){
            $leMot = $motPDO->getMotByNum($contient['numM']);
            $leKanji = $kanjiPDO->getKanjiByKanji($contient['idKanji']);
            $occContient = new Contient($leMot, $leKanji, $contient['position'], $contient['lectureKunOn']);
            array_push($allContients, $occContient);
        }

        return $allContients;
    }

    //Retourne la position d'un kanji dans un mot
    public function getContientByNum($numM, $kanji){
        $cnxDB = connectionDB();

        $motPDO = new MotPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM contient WHERE numM = ".$numM." AND idKanji = ".$kanji.";";
        $contientStatement = $cnxDB->prepare($requeteSql);
        $contientStatement->execute();
        $resultat = $contientStatement->fetch();

        $leMot = $motPDO->getMotByNum($resultat['numM']);
        $leKanji = $kanjiPDO->getKanjiByNum($resultat['idKanji']);

        $contientTrouve = new Contient($leMot, $leKanji, $resultat['position'], $resultat['lectureKunOn']);

        return $contientTrouve;
    }

    //Retourne les kanji contenu dans un mot, dans l'ordre de leur position dans ce mot
    public function getContientByMot($numM){
        $cnxDB = connectionDB();
        $contenuDansMot = array();

        $motPDO = new MotPDO();
        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM contient WHERE numM = ".$numM." ORDER BY position;";
        $contientStatement = $cnxDB->prepare($requeteSql);
        $contientStatement->execute();
        $contients = $contientStatement->fetchAll();

        foreach($contients as $contient){
            $leMot = $motPDO->getMotByNum($contient['numM']);
            $leKanji = $kanjiPDO->getKanjiByKanji($contient['idKanji']);
            $occContient = new Contient($leMot, $leKanji, $contient['position'], $contient['lectureKunOn']);
            array_push($contenuDansMot, $occContient);
        }

        return $contenuDansMot;
    }
    

}

?>