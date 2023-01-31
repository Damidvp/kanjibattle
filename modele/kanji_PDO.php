<?php

require_once "pdo_connection.php";
require_once "../classes/kanji.php";

class KanjiPDO{

    //Retourne la liste complète de kanji
    public function getAllKanji(){
        $cnxDB = connectionDB();
        $allKanjis = array(); //Tableau d'objets Kanji

        $requeteSql = "SELECT * FROM kanji";
        $kanjiStatement = $cnxDB->prepare($requeteSql);
        $kanjiStatement->execute();
        $kanjis = $kanjiStatement->fetchAll();

        foreach($kanjis as $kanji){
            $occKanji = new Kanji($kanji['idKanji'], $kanji['nbTraits']);
            array_push($allKanjis, $occKanji);
        }

        return $allKanjis;
    }

    //Retourne tous les kanji, sauf celui en paramètre
    public function getAllKanjiSauf($kanji){
        $cnxDB = connectionDB();
        $allKanjis = array(); //Tableau d'objets Kanji

        $requeteSql = "SELECT * FROM kanji WHERE idKanji != '".$kanji."';";
        $kanjiStatement = $cnxDB->prepare($requeteSql);
        $kanjiStatement->execute();
        $kanjis = $kanjiStatement->fetchAll();

        foreach($kanjis as $kanji){
            $occKanji = new Kanji($kanji['idKanji'], $kanji['nbTraits']);
            array_push($allKanjis, $occKanji);
        }

        return $allKanjis;
    }

    //Retourne le kanji correspondant à un idéogramme
    public function getKanjiByKanji($kanji){
        $cnxDB = connectionDB();

        $requeteSql = "SELECT * FROM kanji WHERE idKanji = '".$kanji."';";
        $kanjiStatement = $cnxDB->prepare($requeteSql);
        $kanjiStatement->execute();
        $resultat = $kanjiStatement->fetch();

        $kanjiTrouve = new Kanji($resultat['idKanji'], $resultat['nbTraits']);

        return $kanjiTrouve;
    }

}

?>