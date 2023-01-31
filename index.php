<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles_global.css">
        <link rel="stylesheet" href="styles/styles_accueil.css">
        <link rel="shortcut icon" href="img/漢字_nobg.png">
        <title>Kanji Battle</title>
    </head>
    
    <body>
    <header>
        <a href="index.php"><img id="logo" src="img/漢字_nobg.png"></a>
        <div id="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="pages/liste_kanji.php">Listes</a></li>
                <li><a href="pages/liste_jeux.php">Jeux</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </header>
        <?php if(session_status() == PHP_SESSION_ACTIVE){ session_destroy(); } //Si l'utilisateur était en plein qcm ?>

        <div id="contenu">

        <section>
        <div id="principe">
        <h2>Affrontez des kanji seul ou avec des amis</h2>
        <img class ="img_section" src="img/saoule.jpg">
        <p>Vous apprenez le japonais, et vous aussi les kanji vous donnent du fil à retordre ?</p>
        <p>Je vous propose sur ce site un moyen unique pour vous aider dans votre apprentissage ! 
            Seul ou avec des amis, je vous invite à affronter la horde de kanji que je vous ai préparé...</p>
        <p id="construction">Le site étant encore en construction, le mode multijoueur n'est pour l'instant pas disponible.</p>
        </div>
        </section>

        <section>
        <div id="apropos">
        <h2>A propos de <span class="chjap">漢字</span>Battle</h2>
        <img class = "img_section" src="img/shodo.jpg">
        <p>J'ai réalisé ce site pour les personnes ayant déjà quelques bases en langue japonaise (connaissance des kana), et qui apprennent les kanji.
            Je suis moi-même passé par ce calvaire, et j'ai appris à mes dépends que les bouquins d'université n'aident pas vraiment...
            J'espère donc pouvoir proposer une solution plus efficace aux étudiants :)</p>
        <p>Allier mes deux passions, la culture japonaise et le développement web, a donné naissance à ce projet. Je pense qu'en s'amusant, on peut apprendre de manière plus efficace.
            Alors j'espère que vous vous y plairez !</p>
        </div>
        </section>

        <section>
        <div id="jouer">
        <h3>Commencez votre aventure ici</h3>
        <div id="boutons">
        <button id="b_liste_kanji" onclick="window.location.href = 'pages/liste_kanji.php'">Liste des kanji</button>
        <button id="b_jouer" onclick="window.location.href = 'pages/view_qcmbonkanji.php'">Jouer</button>
        </div>
        </div>
        </section>

        </div>

        <?php include "pages/view_footer.php"; ?>
        
    </body>
</html>