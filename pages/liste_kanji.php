<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_liste_kanji.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <title>Kanji Battle - Listes</title>
    </head>
    
    <body>
        <?php include "../pages/view_header.php"; ?>

        <div id="contenu">

        <div id="d_search">
            <form id="form_search" method="get" action="liste_kanji.php">
                <input id="search" name="search" type="text" placeholder="Rechercher un kanji..." value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" required>
                <input id="sub_search" name="sub_search" type="submit" value="Recherche">
            </form>
        </div>

        <div id="d_liste_kanji">
        <?php require "../controler/tests.php"; ?>
        </div>

        </div>

        <?php include "../pages/view_footer.php"; ?>

    </body>
</html>