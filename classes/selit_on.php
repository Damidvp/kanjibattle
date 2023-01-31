<?php

class SeLitOn{

    private $leKanji;
    private $laLectureOn;

    public function __construct($leKanji, $laLectureOn){
        $this->leKanji = $leKanji;
        $this->laLectureOn = $laLectureOn;
    }

    public function getLeKanji(){
        return $this->leKanji;
    }

    public function getLaLectureOn(){
        return $this->laLectureOn;
    }

    public function setLeKanji($leKanji){
        $this->leKanji = $leKanji;
    }

    public function setLaLectureOn($laLectureOn){
        $this->laLectureOn = $laLectureOn;
    }

}

?>