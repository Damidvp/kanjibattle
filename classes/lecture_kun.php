<?php

class LectureKun{

    private $numLK;
    private $lecture;

    public function __construct($numLK, $lecture){
        $this->numLK = $numLK;
        $this->lecture = $lecture;
    }

    public function getNumLK(){
        return $this->numLK;
    }

    public function getLecture(){
        return $this->lecture;
    }

    public function setNumLK($numLK){
        $this->numLK = $numLK;
    }

    public function setLecture($lecture){
        $this->lecture = $lecture;
    }

}

?>