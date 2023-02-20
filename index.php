<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/styles_global.css">
        <link rel="stylesheet" href="styles/styles_accueil.css">
        <link rel="shortcut icon" href="img/漢字_nobg.png">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
        <script src="scripts/script_reveal_div.js"></script>
        <title>Kanji Battle</title>
    </head>
    
    <body>
    <header>
        <a href="index.php"><img id="logo" src="img/漢字_nobg.png"></a>
        <div id="menu">
            <ul>
                <li><a class="a_menu" href="index.php" active>Accueil</a></li>
                <li><a class="a_menu" href="pages/liste_kanji.php">Recherche</a></li>
                <li><a class="a_menu" href="pages/liste_jeux.php">Jeux</a></li>
                <li><a class="a_menu" href="pages/contact.php">Contact</a></li>
            </ul>
        </div>
    </header>
        <?php if(session_status() == PHP_SESSION_ACTIVE){ session_destroy(); } //Si l'utilisateur était en plein qcm ?>

        <div id="contenu">

            <section>
                <div class="reveal" id="principe">
                    <h2>Affrontez des kanji seul ou avec des amis</h2>
                    <div class="img_section"><img src="img/saoule.jpg"></div>
                    <p>Vous apprenez le japonais, et vous aussi les kanji vous donnent du fil à retordre ?</p>
                    <p>Je vous propose sur ce site un moyen unique pour vous aider dans votre apprentissage ! 
                        Seul ou avec des amis, je vous invite à affronter la horde de kanji que je vous ai préparé...</p>
                    <p id="construction">Le site étant encore en construction, le mode multijoueur n'est pour l'instant pas disponible.</p>
                </div>
            </section>

            <section>
                <div class="reveal" id="apropos">
                    <h2>A propos de <span class="chjap">漢字</span>Battle</h2>
                    <div class="img_section"><img src="img/shodo.jpg"></div>
                    <p>J'ai réalisé ce site pour les personnes ayant déjà quelques bases en langue japonaise (connaissance des kana), et qui apprennent les kanji.
                        Je suis moi-même passé par ce calvaire, et j'ai appris à mes dépends que les bouquins d'université n'aident pas vraiment...
                        J'espère donc pouvoir proposer une solution plus efficace aux étudiants !</p>
                    <p>Allier mes deux passions, la culture japonaise et le développement web, a donné naissance à ce projet. Je pense qu'en s'amusant, on peut apprendre de manière plus efficace.
                        Alors j'espère que vous vous y plairez !</p>
                </div>
            </section>

            <section>
                <div class="reveal" id="jouer">
                    <h3>Commencez votre aventure ici</h3>
                    <div id="boutons">
                        <button id="b_jouer" onclick="window.location.href = 'pages/liste_jeux.php'">Jouer</button>
                    </div>
                </div>
            </section>

        </div>

        <footer>
    <p>© 2023 - 
    <span id="github">
            <a href="https://github.com/Damidvp/kanjibattle">
            <img src="img/github.png" width="15">
            GitHub
            </a>
    </span>
    Site web réalisé par Damien Mouchagues - Tous droits réservés 
    </p>
</footer>
        
    </body>
</html>