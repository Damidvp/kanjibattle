<!-- Test SQL et PDO -->
<?php 
        require "../modele/kanji_PDO.php"; 
        require "../modele/mot_PDO.php";
        require "../modele/contient_PDO.php";
        require "../modele/lecture_kun_PDO.php";
        require "../modele/lecture_on_PDO.php";
        require "../modele/selit_kun_PDO.php";
        require "../modele/selit_on_PDO.php";

        $kanjiPDO = new KanjiPDO();
        $seLitKunPDO = new SeLitKunPDO();
        $seLitOnPDO = new SeLitOnPDO();
        $lectureKunPDO = new LectureKunPDO();
        $lectureOnPDO = new LectureOnPDO();

        $tousLesKanjis = $kanjiPDO->getAllKanji();

        echo "<div id='lstkanji'>";
        echo "<h2>Liste des kanji actuels</h2>";
        

        foreach($tousLesKanjis as $kanji){
            echo "<div class='lkanji'>";
            echo "<div id='d_kanji'><span class='chjap'><span class='kanji'>".$kanji->getKanji()."</span></span></div>";
            echo "<div id='d_lect'>";
            echo "Lectures KUN: ";
            $lecturesKun = $seLitKunPDO->getSeLitKunByKanji($kanji->getKanji());
            if (count($lecturesKun)==0){
                echo "<i>Aucune</i>";
            } else {
                foreach($lecturesKun as $uneLectureKun){
                    echo "<span class='chjap'>".$uneLectureKun->getLaLectureKun()->getLecture()."  </span>";
                }
            }
            echo "<br>";
            echo "Lectures ON : ";
            $lecturesOn = $seLitOnPDO->getSeLitOnByKanji($kanji->getKanji());
            if (count($lecturesOn)==0){
                echo "<i>Aucune</i>";
            } else {
                foreach($lecturesOn as $uneLectureOn){
                    echo "<span class='chjap'>".$uneLectureOn->getLaLectureOn()->getLecture()."  </span>";
                }
            }
            echo "</div></div>";
            echo "<br><br>";
        }
        echo "</div> <div id='lmots'>";
        echo "<h2>Liste des mots de vocabulaire</h2>";
        $motPDO = new MotPDO();
        $contientPDO = new ContientPDO();
        $tousLesMots = $motPDO->getAllMots();

        foreach($tousLesMots as $unMot){
            $leMotContientKanjis = $contientPDO->getContientByMot($unMot->getNumM());
            foreach($leMotContientKanjis as $kanjiContenu){
                echo "<span class='chjap'>".$kanjiContenu->getLeKanji()->getKanji()."</span>";
                if(!empty($unMot->getOkurigana())){
                    echo $unMot->getOkurigana();
                }
            }
            echo " (<span class='chjap'>".$unMot->getLectureJap()."</span>) désigne en français : ".$unMot->getDesignationFr();
            echo "<br>";
        }
        echo "</div>";

        
        ?>