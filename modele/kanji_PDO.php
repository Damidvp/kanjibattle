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

    //Retourne un résultat de recherche selon les kanji contenus dans $recherche (saisi par l'utilisateur)
    public function searchKanji($recherche){
        $cnxDB = connectionDB();
        $retour = array();

        $options = "";
        for($i=0; $i<mb_strlen($recherche); $i++){ //mb_strlen permet de gérer les string en multibytes (caractères japonais)
            $options .= "'".mb_substr($recherche, $i, 1)."'";
            if($i<(mb_strlen($recherche)-1)){
                $options .= ", ";
            }
        }

        $requeteSql = "SELECT * FROM kanji WHERE idKanji IN (".$options.");";
        $kanjiStatement = $cnxDB->prepare($requeteSql);
        $kanjiStatement->execute();
        $resultat = $kanjiStatement->fetchAll();

        foreach($resultat as $kanji){
            $occKanji = new Kanji($kanji['idKanji'], $kanji['nbTraits']);
            array_push($retour, $occKanji);
        }

        return $retour;
    }

}

?>