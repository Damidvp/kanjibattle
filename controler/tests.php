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
        $contientPDO = new ContientPDO();
        $motPDO = new MotPDO();

        if(isset($_GET['sub_search'])){
            $kanjisTrouve = $kanjiPDO->searchKanji($_GET['search']);
            
            echo "<div id='lstkanji'>";

            if(count($kanjisTrouve) > 0){
                
                echo "<h2 class='h_resultat'>Résultat trouvé : </h2>";
                echo "<br>";
                
                foreach($kanjisTrouve as $kanjiTrouve){

                    echo "<div class='lkanji'>";
                    echo "<div class='d_kanji'><span class='chjap'><span class='kanji'>".$kanjiTrouve->getKanji()."</span></span></div>";
                    echo "<div class='d_lect'>";
                    echo "<h3>Informations</h3>";
                    echo "<div class='niveau'> Niveau ".$kanjiTrouve->getNiveau()."</div><br>";
                    echo "<div class='traits'> Nombre de traits : ".$kanjiTrouve->getNbTraits()."</div>";
                    echo "<div class='d_lect_kun'>Lecture KUN : ";
                    $lecturesKun = $seLitKunPDO->getSeLitKunByKanji($kanjiTrouve->getKanji());
                    if (count($lecturesKun)==0){
                        echo "<i>Aucune</i>";
                    } else {
                        foreach($lecturesKun as $uneLectureKun){
                            echo "<span class='chjap'>".$uneLectureKun->getLaLectureKun()->getLecture()."　</span>";
                        }
                    }

                    echo "</div>";
                    echo "<div class='d_lect_on'>Lecture ON : ";
                    $lecturesOn = $seLitOnPDO->getSeLitOnByKanji($kanjiTrouve->getKanji());
                    if (count($lecturesOn)==0){
                        echo "<i>Aucune</i>";
                    } else {
                        foreach($lecturesOn as $uneLectureOn){
                            echo "<span class='chjap'>".$uneLectureOn->getLaLectureOn()->getLecture()."　</span>";
                        }
                    }
                    echo "</div>";
                    $motsDuKanji = $contientPDO->getContientByKanji($kanjiTrouve->getKanji());
                    echo "<br>";
                    echo "<div class='mots_kanji'>Mots relatifs<br>";
                    if(count($motsDuKanji)==0){
                        echo "<i>Aucun pour l'instant</i>";
                    } else {
                        foreach($motsDuKanji as $unMotDuKanji){
                            $kanjiContenusDansMot = $contientPDO->getContientByMot($unMotDuKanji->getLeMot()->getNumM());
                            $compositionMot = "";
                            foreach($kanjiContenusDansMot as $caractere){
                                $compositionMot .= $caractere->getLeKanji()->getKanji();
                                if(!empty($unMotDuKanji->getLeMot()->getOkurigana())){
                                    $compositionMot .= $unMotDuKanji->getLeMot()->getOkurigana();
                                }
                            }
                            echo "<span class='chjap'>".$compositionMot." (".$unMotDuKanji->getLeMot()->getLectureJap().")</span> : ".$motPDO->getMotByNum($unMotDuKanji->getLeMot()->getNumM())->getDesignationFr()."<br>";
                        }
                    }
                    echo "</div></div></div>";
                }
            } else {
                echo "<h2 class='h_resultat'>Aucun résultat</h2>";
            }
            echo "</div>";
        }
        
?>