<?php

class Mot{

    private $numM;
    private $designationFr;
    private $lectureJap;
    private $okurigana;

    public function __construct($numM, $designationFr, $lectureJap, $okurigana){
        $this->numM = $numM;
        $this->designationFr = $designationFr;
        $this->lectureJap = $lectureJap;
        $this->okurigana = $okurigana;
    }

    public function getNumM(){
        return $this->numM;
    }

    public function getDesignationFr(){
        return $this->designationFr;
    }

    public function getLectureJap(){
        return $this->lectureJap;
    }

    public function getOkurigana(){
        return $this->okurigana;
    }

    public function setNumM($numM){
        $this->numM = $numM;
    }

    public function setDesignationFr($designationFr){
        $this->designationFr = $designationFr;
    }

    public function setLectureJap($lectureJap){
        $this->lectureJap = $lectureJap;
    }

    public function setOkurigana($okurigana){
        $this->okurigana = $okurigana;
    }

}

?>