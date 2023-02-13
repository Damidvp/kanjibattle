<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_liste_jeux.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="../scripts/script_select_on_change.js"></script>
        <title>Kanji Battle - Jeux</title>
    </head>
    
    <body>
        <?php include "../pages/view_header.php"; ?>

        <div id="contenu">

        <h2>Liste des jeux actuels</h2>

        <div class="jeux">
        <h3 class="btn_jeux">QCM de kanji</h3>
        <div class="explications">
            <p>Une bonne réponse parmi 4 propositions. Lancez-vous dans une série de 20 questions et donnez un maximum de bonnes réponses.</p>
            <form id="form_niveau" action="view_qcmbonkanji.php" method="GET">
                <label for="niveau">Sélectionner un niveau : </label>
                <select id="sl_niveau" name="niveau" class="niveau">
                    <option id="all" value="all">Tous niveaux</option>
                    <option id="N5" value="N5">Niveau N5 (débutant)</option>
                    <option id="N4" value="N4">Niveau N4 (débutant+)</option>
                    <option id="N3" value="N3">Niveau N3 (confirmé)</option>
                    <option id="N2" value="N2">Niveau N2 (avancé)</option>
                    <option id="N1" value="N1">Niveau N1 (expert)</option>
                </select>
                <br>
                <a class="a_jeux" href="view_qcmbonkanji.php" onclick="this.closest('form').submit(); return false;">Jouer solo</a>
                <a class="a_jeux" href="#">Jouer en multijoueur</a>
            </form>
        </div>
        </div>

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
            <button id="btn_contact" onclick="window.location.href = 'contact.php'">Contactez-nous</h2>
        </div>

        </div>

        <?php include "../pages/view_footer.php"; ?>

    </body>
</html>