<?php

function connectionDB(){
    try {
        $sqlConnection = new PDO('mysql:host=localhost;dbname=learn_kanji;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $sqlConnection;
}

//Préparer une requête SQL
/*
$requeteSql = "SELECT * FROM kanji";
$kanjiStatement = $sqlConnection->prepare($requeteSql);
$kanjiStatement->execute();
$kanjis = $kanjiStatement->fetchAll();
*/

//Afficher le résultat d'une requête
/*
foreach($kanjis as $kanji){
    echo $kanji['kanji']." - Nombre de traits : ".$kanji['nbTraits']."<br>";
}
*/

?>