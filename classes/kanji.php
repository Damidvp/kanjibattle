<?php

class Kanji{

    private $kanji;
    private $nbTraits;
    private $niveau;

    public function __construct($kanji, $nbTraits, $niveau){
        $this->kanji = $kanji;
        $this->nbTraits = $nbTraits;
        $this->niveau = $niveau;
    }

    public function getKanji(){
        return $this->kanji;
    }

    public function getNbTraits(){
        return $this->nbTraits;
    }

    public function getNiveau(){
        return $this->niveau;
    }

    public function setKanji($kanji){
        $this->kanji = $kanji;
    }

    public function setNbTraits($nbTraits){
        $this->nbTraits = $nbTraits;
    }

    public function setNiveau($niveau){
        $this->niveau = $niveau;
    }
}

?>