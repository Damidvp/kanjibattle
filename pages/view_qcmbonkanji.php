<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <title>Kanji Battle - QCM Kanji</title>
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_qcm_bonkanji.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="../scripts/script_afficher_qcm.js"></script>
    </head>
    
    <body>

        <div id="contenu">

            <h2><span class='chjap'>漢字Quiz!</span></h2>

            <div id="cont_quiz">
                
                <progress id="progress_bar" value="10" max="100"></progress>

                <div id="ajax"><?php include "../controler/ctrl_qcm_bonkanji.php"; ?></div>
                <br>
            </div>

            <div id="cont_reponse">
                <div id="bonne_reponse">
                    <p>Bonne réponse, bravo !</p>
                </div>
                <div id="mauvaise_reponse">
                    <p>Ce n'est pas la bonne réponse, essayez encore !</p>
                </div>
                <div id="d_btn_qsuivante">
                    <button id="btn_qsuivante">Question suivante ></button>
                </div>
            </div>

        </div>
        <br>
        <a id="retour" href="../controler/ctrl_leave_qcm.php">Retour à l'accueil</a>

        <?php include "../pages/view_footer.php"; ?>

    </body>
</html>