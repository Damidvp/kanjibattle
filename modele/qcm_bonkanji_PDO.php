<?php

require_once "pdo_connection.php";

require_once "../classes/qcm_bonkanji.php";
require_once "../classes/kanji.php";

require_once "kanji_PDO.php";

class QcmBonKanjiPDO{

    //Retourne la liste complète des QCM "bon kanji"
    public function getAllQcmBonKanjis(){
        $cnxDB = connectionDB();
        $allQcmBKs = array();

        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM qcm_bonkanji";
        $qcmBKStatement = $cnxDB->prepare($requeteSql);
        $qcmBKStatement->execute();
        $qcmBKs = $qcmBKStatement->fetchAll();

        foreach($qcmBKs as $qcmBK){
            $leKanji = $kanjiPDO->getKanjiByKanji($qcmBK['idKanji']);
            $occQcmBK = new QcmBonKanji($qcmBK['numQBK'], $leKanji, $qcmBK['texteQuestion']);
            array_push($allQcmBKs, $occQcmBK);
        }

        return $allQcmBKs;
    }

    //Retourne un QCM selon son numéro dans la base
    public function getQcmBKByNum($numQBK){
        $cnxDB = connectionDB();

        $kanjiPDO = new KanjiPDO();

        $requeteSql = "SELECT * FROM qcm_bonkanji WHERE numQBK = ".$numQBK.";";
        $qcmBKStatement = $cnxDB->prepare($requeteSql);
        $qcmBKStatement->execute();
        $resultat = $qcmBKStatement->fetch();

        $leKanji = $kanjiPDO->getKanjiByKanji($resultat['idKanji']);

        $qcmBKTrouve = new QcmBonKanji($resultat['numQBK'], $leKanji, $resultat['texteQuestion']);

        return $qcmBKTrouve;
    }

    //Retourne le nombre total de QCM contenus dans la base (car il faudra sélectionner les QCM de manière random)
    public function getNombreTotalQcm(){
        $cnxDB = connectionDB();

        $requeteSql = "SELECT COUNT(*) AS NombreQcms FROM qcm_bonkanji;";
        $qcmBKStatement = $cnxDB->prepare($requeteSql);
        $qcmBKStatement->execute();
        $resultat = $qcmBKStatement->fetch();

        return $resultat['NombreQcms'];
    
    }

    //Retourne une liste de QCM a l'exception du ou des QCM du tableau en paramètre (permettra de récupérer les QCM non encore passés dans une session)
    public function getQcmBKSauf($tabQcm){
        $cnxDB = connectionDB();
        $qcmBKs = array();
        $restrictionsRequete = "";

        $kanjiPDO = new KanjiPDO();

        if(count($tabQcm)>0){
            foreach($tabQcm as $unQcm){
                $restrictionsRequete = $restrictionsRequete." numQBK != ".$unQcm->getNumQBK();
                if(array_key_exists(array_search($unQcm, $tabQcm)+1, $tabQcm)){
                    $restrictionsRequete = $restrictionsRequete." AND"; //Si il y a encore un ou des éléments dans le tableau, on rajoute AND à la requête
                } else {
                    $restrictionsRequete = $restrictionsRequete.";";//Sinon, on termine notre requête (;)
                }
            }
        } else {
            $restrictionsRequete =" 1;";
        }

        $requeteSql = "SELECT * FROM qcm_bonkanji WHERE".$restrictionsRequete;
        $qcmBKStatement = $cnxDB->prepare($requeteSql);
        $qcmBKStatement->execute();
        $resultQcmBKs = $qcmBKStatement->fetchAll();

        foreach($resultQcmBKs as $qcmBK){
            $leKanji = $kanjiPDO->getKanjiByKanji($qcmBK['idKanji']);
            $occQcmBK = new QcmBonKanji($qcmBK['numQBK'], $leKanji, $qcmBK['texteQuestion']);
            array_push($qcmBKs, $occQcmBK);
        }

        return $qcmBKs;
    }
    
}

?>