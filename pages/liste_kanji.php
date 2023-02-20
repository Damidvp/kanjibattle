<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_liste_kanji.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
        <script src="../scripts/script_reveal_div.js"></script>
        <title>Kanji Battle - Rechercher</title>
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