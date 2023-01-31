<?php

class SeLitKun{

    private $leKanji;
    private $laLectureKun;

    public function __construct($leKanji, $laLectureKun){
        $this->leKanji = $leKanji;
        $this->laLectureKun = $laLectureKun;
    }

    public function getLeKanji(){
        return $this->leKanji;
    }

    public function getLaLectureKun(){
        return $this->laLectureKun;
    }

    public function setLeKanji($leKanji){
        $this->leKanji = $leKanji;
    }

    public function setLaLectureKun($laLectureKun){
        $this->laLectureKun = $laLectureKun;
    }

}

?>