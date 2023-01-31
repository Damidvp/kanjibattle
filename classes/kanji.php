<?php

class Kanji{

    private $kanji;
    private $nbTraits;

    public function __construct($kanji, $nbTraits){
        $this->kanji = $kanji;
        $this->nbTraits = $nbTraits;
    }

    public function getKanji(){
        return $this->kanji;
    }

    public function getNbTraits(){
        return $this->nbTraits;
    }

    public function setKanji($kanji){
        $this->kanji = $kanji;
    }

    public function setNbTraits($nbTraits){
        $this->nbTraits = $nbTraits;
    }
}

?>