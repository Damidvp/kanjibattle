<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_liste_jeux.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <title>Kanji Battle - Jeux</title>
    </head>
    
    <body>
        <?php include "../pages/view_header.php"; ?>

        <div id="contenu">

        <h2>Jeux actuels</h2>

        <div class="jeux">
        <h3 class="btn_jeux">QCM de kanji</h3>
        <div class="explications">
            <p>Une bonne réponse parmi 4 propositions. Lancez-vous dans une série de 20 questions et répondez juste à un maximum de questions.</p>
            <a class="a_jeux" href="view_qcmbonkanji.php">Jouer solo</a>
            <a class="a_jeux" href="#">Jouer en multijoueur</a>
        </div>
        </div>
        

        <h2 id="h2_avenir">Jeux à venir</h2>

        <div class="jeux">
        <h3 class="btn_jeux_avenir">Devine le kanji</h3> <!-- Un joueur/robot dessine un kanji, le ou les (autres) joueurs doivent le deviner -->
        <div class="explications">
            <p>Exprimez vos talents en calligraphie en faisant deviner à vos amis le kanji que vous écrivez. Si vous êtes seul, l'ordinateur dessinera le kanji et ce sera à vous de le deviner.</p>
            <p><span class="p_avenir">Ce jeu est en cours de développement</span></p>
        </div>
        </div>

        <div class="jeux">
        <h3 class="btn_jeux_avenir">Petit Ba'kanji</h3> <!-- Petit bac mais avec des kanji -->
        <div class="explications">
            <p>Un kanji vous est donné en début de partie. A vous de trouver des mots de vocabulaire qui contiennent ce kanji selon des catégories, et ce le plus rapidement possible.</p>
            <p><span class="p_avenir">Ce jeu est en cours de développement</span></p>
        </div>
        </div>

        <div id="contact">
            <h2>Des suggestions ?</h2>
            <button id="btn_contact">Contactez-nous</h2>
        </div>

        </div>

        <?php include "../pages/view_footer.php"; ?>

    </body>
</html>