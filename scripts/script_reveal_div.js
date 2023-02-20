$(document).ready(function() {

    //Instanciation classe ScrollReveal
    window.sr = new ScrollReveal();

    //Effets "reveal" sur page d'accueil
    sr.reveal('.reveal', {duration: 1500, distance: '1.5em', origin: 'bottom'});

    //Effets "reveal" sur page recherche
    sr.reveal('.lkanji', {duration: 800, interval: 50, distance: '1em', origin: 'left', reset: true});
    sr.reveal('.h_resultat', {duration: 1000});

    //Effets "reveal" sur page contact
    sr.reveal('#envoyer_message', {delay:700, duration: 1500, distance: '3em', origin: 'right'});
    sr.reveal('#coordonnees', {delay:350, duration: 1500, distance: '3em', origin: 'left'});
    sr.reveal('#h_contact', {duration:1000});

    //Effets "reveal" sur page jeux
    sr.reveal('.jeux', {duration: 1500, interval:500, reset: true, distance: '2em', origin: 'left'});
    sr.reveal('#contact', {duration: 1500, distance: '1.5em', origin: 'bottom', reset: true});

    if(document.getElementById("search").value == ""){
        sr.reveal('#d_search', {duration: 1000});
    } else {
        document.getElementById("d_search").style.visibility = "visible";
    }

});