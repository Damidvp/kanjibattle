<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kanji Battle - QCM Kanji</title>
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_qcm_bonkanji.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="../scripts/script_qcm_bonkanji_reponse.js"></script>
        <script type="text/javascript" src="../scripts/script_afficher_qcm.js"></script>
    </head>
    
    <body>

        <div id="contenu">

            <div id="cont_quiz">
                <div id="timer">10</div>
                <div id="ajax"><?php include "../controler/ctrl_qcm_bonkanji.php"; ?></div>
                <br>
            </div>

            <div id="cont_reponse">
                <div id="bonne_reponse">
                    <p>Bonne réponse, bravo !</p>
                    <div class="details">
                        <?php //include "../controler/ctrl_details_kanji.php"; ?>
                    </div>
                </div>
                <div id="mauvaise_reponse">
                    <p>Mauvaise réponse, dommage...</p>
                </div>
                <div id="temps_ecoule">
                    <p>Temps écoulé, voici la bonne réponse !</p>
                </div>
                <div id="d_btn_qsuivante">
                    <button id="btn_qsuivante">Question suivante ></button>
                </div>
            </div>
            <div id="retour"><a id="a_retour" href="../controler/ctrl_leave_qcm.php">Retour à l'accueil</a></div>
        </div>
        <br>

    </body>
</html>