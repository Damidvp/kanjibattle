var nbQcmsReussis = 0;
var nbQcmsEchoues = 0;
var nbMauvaisesReponses = 0;

document.cookie = "qcmReussis = " + nbQcmsReussis + "; ";
document.cookie = document.cookie + "qcmEchoues = " + nbQcmsEchoues + "; ";
document.cookie = document.cookie + "mauvaisesReponses = " + nbMauvaisesReponses + "; ";

$(document).ready(function() {

    //Récupération des éléments par leur id
    let bonneReponse = document.getElementById("bonne_reponse");
    let mauvaiseReponse = document.getElementById("mauvaise_reponse");
    let tempsEcoule = document.getElementById("temps_ecoule");
    let qSuivante = document.getElementById("d_btn_qsuivante");

    let btnBon = document.getElementById("btnV");
    let btnMauvais1 = document.getElementById("btnX1");
    let btnMauvais2 = document.getElementById("btnX2");
    let btnMauvais3 = document.getElementById("btnX3");

    let btnQSuivante = document.getElementById("btn_qsuivante");

    let progression = document.getElementById("progress_bar");

    let timer = document.getElementById("timer");
    let temps = 11;

    let intervalTemps = setInterval(timerDown, 1000);

    //Quand on clique sur une mauvaise réponse -> message de mauvaise réponse
    //Quand on clique sur la bonne réponse -> message de bonne réponse
    document.body.addEventListener("click", function(event){
        if(event.target.id == 'btnV'){
            affTexteBonneReponse();
            event.target.style.backgroundColor = "#14FF14";
            event.target.style.color = "#FEFEFE";
        } else if((event.target.id == 'btnX1') || (event.target.id == 'btnX2') || (event.target.id == 'btnX3')){
            affTexteMauvaiseReponse();
            event.target.style.backgroundColor = "#FF1414";
            event.target.style.color = "#FFC1C1";
        }
    });

    btnQSuivante.addEventListener("click", function(){
        if(bonneReponse.style.display == "block"){
            nbQcmsReussis = nbQcmsReussis + 1;
        } else {
            nbQcmsEchoues = nbQcmsEchoues + 1;
        }
        reload();
    });

    bonneReponse.style.display = "none";
    mauvaiseReponse.style.display = "none";
    tempsEcoule.style.display = "none";
    qSuivante.style.display = "none";

    //Si l'utilisateur rafraîchit ou quitte la page, la session est réinitialisée
    window.onbeforeunload = function () {
        return "";
    }

    function reload(){
        qSuivante.style.display = "none";
        bonneReponse.style.display = "none";

        document.body.addEventListener("click", function(event){
            if(event.target.id == 'btnV'){
                affTexteBonneReponse();
                event.target.style.backgroundColor = "#14FF14";
                event.target.style.color = "#C1FFC1";
            } else if((event.target.id == 'btnX1') || (event.target.id == 'btnX2') || (event.target.id == 'btnX3')){
                affTexteMauvaiseReponse();
                event.target.style.backgroundColor = "#FF1414";
                event.target.style.color = "#FFC1C1";
            }
        });
    }

    function affTexteBonneReponse(){
        //Si le message de mauvaise réponse est déjà affiché, on le retire
        if(mauvaiseReponse.style.display != "none"){
            mauvaiseReponse.style.display = "none";
        }

        clearInterval(intervalTemps);

        //On désactive tous les boutons
        btnBon.disabled = true;
        btnMauvais1.disabled = true;
        btnMauvais2.disabled = true;
        btnMauvais3.disabled = true;

        //On affiche le message de bonne réponse et le bouton de la question suivante
        bonneReponse.style.display = "block";
        qSuivante.style.display = "block";

        progression.setAttribute('value', progression.value+1);
    }

    function affTexteMauvaiseReponse(){
        mauvaiseReponse.style.display = "block";
    }

    function affTexteTempsEcoule(){
        if(mauvaiseReponse.style.display != "none"){
            mauvaiseReponse.style.display = "none";
        }

        btnBon.disabled = true;
        btnMauvais1.disabled = true;
        btnMauvais2.disabled = true;
        btnMauvais3.disabled = true;

        btnBon.style.backgroundColor = "#14FF14";
        btnBon.style.color = "#C1FFC1";

        tempsEcoule.style.display = "block";
        qSuivante.style.display = "block";

        progression.setAttribute('value', progression.value+1);
    }

    function hideTimer(){
        timer.style.display = "none";
    }

    function timerDown(){
        timer.innerText = temps-1;
        temps = temps <= 0 ? 0 : temps-1; //On diminue le temps de 1 tant qu'il est supérieur à 0
        if(temps==0){
            clearInterval(intervalTemps);
            affTexteTempsEcoule();
        }
    }
});
