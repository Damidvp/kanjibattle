<?php

//QcmBonKanji : QCM à 4 choix où il faut choisir le bon kanji pour bien répondre
class QcmBonKanji {

    private $numQBK;
    private $leBonKanji;
    private $texteQuestion;

    public function __construct($numQBK, $leBonKanji, $texteQuestion) {
        $this->numQBK = $numQBK;
        $this->leBonKanji = $leBonKanji;
        $this->texteQuestion = $texteQuestion;
    }

    public function getNumQBK(){
        return $this->numQBK;
    }

    public function getLeBonKanji(){
        return $this->leBonKanji;
    }

    public function getTexteQuestion(){
        return $this->texteQuestion;
    }

    public function setNumQBK($numQBK){
        $this->numQBK = $numQBK;
    }

    public function setLeBonKanji($leBonKanji){
        $this->leBonKanji = $leBonKanji;
    }

    public function setTexteQuestion($texteQuestion){
        $this->texteQuestion = $texteQuestion;
    }

}

?>