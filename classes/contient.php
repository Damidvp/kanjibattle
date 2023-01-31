<?php

class Contient{

    private $leMot;
    private $leKanji;
    private $position;
    private $lectureKunOn;

    public function __construct($leMot, $leKanji, $position, $lectureKunOn){
        $this->leMot = $leMot;
        $this->leKanji = $leKanji;
        $this->position = $position;
        $this->lectureKunOn = $lectureKunOn;
    }

    public function getLeMot(){
        return $this->leMot;
    }

    public function getLeKanji(){
        return $this->leKanji;
    }

    public function getPosition(){
        return $this->position;
    }

    public function getLectureKunOn(){
        return $this->lectureKunOn;
    }

    public function setLeMot($leMot){
        $this->leMot = $leMot;
    }

    public function setLeKanji($leKanji){
        $this->leKanji = $leKanji;
    }

    public function setPosition($position){
        $this->position = $position;
    }

    public function setLectureKunOn($lectureKunOn){
        $this->lectureKunOn = $lectureKunOn;
    }

}

?>