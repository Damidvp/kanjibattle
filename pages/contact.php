<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/styles_global.css">
        <link rel="stylesheet" href="../styles/styles_contact.css">
        <link rel="shortcut icon" href="../img/漢字_nobg.png">
        <title>Kanji Battle - Contactez-nous</title>
    </head>
    
    <body>
        <?php include "../pages/view_header.php"; ?>

        <div id="contenu">

        <h2>Vous souhaitez prendre contact ?</h2>

        <div id="d_contacter">

        <div id="coordonnees">
            <h3>Coordonnées</h3>
            <p>Damien Mouchagues<br>
            34000 Montpellier<br>
            damienmouchagues33@gmail.com</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46221.28623542236!2d3.839150003101894!3d43.61007300183535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6af0725dd9db1%3A0xad8756742894e802!2sMontpellier!5e0!3m2!1sfr!2sfr!4v1675249167855!5m2!1sfr!2sfr" 
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div id="envoyer_message">
        <h3>Envoyer un message</h3>
        <form id="form_contact" action="contact.php">
            <div id="elements_form">
                <input id="t_nom" class="text_input" type="text" placeholder="Nom" required><br>
                <input id="t_prenom" class="text_input" type="text" placeholder="Prénom" required><br>
                <input id="t_mail" class="text_input" type="text" placeholder="@mail" required><br>
                <fieldset id="fs_choix">
                    <legend>Vous êtes :</legend>

                    <input type="radio" id="r_particulier" name="type_contact" value="particulier" required>
                    <label for="r_particulier">Un particulier</label>

                    <input type="radio" id="r_entreprise" name="type_contact" value="entreprise">
                    <label for="r_entreprise">Une entreprise</label>
                </fieldset>
                <textarea id="ta_message" form="form_contact" placeholder="Votre message..." rozs="10" cols="30" required></textarea><br>
                <input id="btn_submit" type="submit" value="Envoyer">
            </div>
        </form>
        </div>

        </div>

        </div>

        <?php include "../pages/view_footer.php"; ?>

    </body>
</html>