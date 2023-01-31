<?php

class LectureOn{

    private $numLO;
    private $lecture;

    public function __construct($numLO, $lecture){
        $this->numLO = $numLO;
        $this->lecture = $lecture;
    }

    public function getNumLO(){
        return $this->numLO;
    }

    public function getLecture(){
        return $this->lecture;
    }

    public function setNumLO($numLO){
        $this->numLO = $numLO;
    }

    public function setLecture($lecture){
        $this->lecture = $lecture;
    }

}

?>