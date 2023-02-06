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
    var aBienRepondu = 0;

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
            btnBon.style.backgroundColor = "#14FF14";
            btnBon.style.color = "#C1FFC1";
        }
    });

    btnQSuivante.addEventListener("click", function(){
        reload();
    });

    bonneReponse.style.display = "none";
    mauvaiseReponse.style.display = "none";
    tempsEcoule.style.display = "none";
    qSuivante.style.display = "none";

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
                btnBon.style.backgroundColor = "#14FF14";
                btnBon.style.color = "#C1FFC1";
            }
        });
    }

    function affTexteBonneReponse(){

        clearInterval(intervalTemps);

        //On désactive tous les boutons
        btnBon.disabled = true;
        btnMauvais1.disabled = true;
        btnMauvais2.disabled = true;
        btnMauvais3.disabled = true;

        //On affiche le message de bonne réponse et le bouton de la question suivante
        bonneReponse.style.display = "block";
        bonneReponse.style.color = "#37fb4e";
        bonneReponse.style.backgroundColor = "rgba(55, 250, 60, 0.2)"

        qSuivante.style.display = "block";

        aBienRepondu = aBienRepondu + 1;

        progression.setAttribute('value', progression.value+1);
    }

    function affTexteMauvaiseReponse(){

        clearInterval(intervalTemps);

        //On désactive tous les boutons
        btnBon.disabled = true;
        btnMauvais1.disabled = true;
        btnMauvais2.disabled = true;
        btnMauvais3.disabled = true;

        mauvaiseReponse.style.display = "block";
        mauvaiseReponse.style.color = "#EE3333";
        mauvaiseReponse.style.backgroundColor = "rgba(240, 40, 40, 0.2)"

        qSuivante.style.display = "block";

        progression.setAttribute('value', progression.value+1);
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
        tempsEcoule.style.color = "#fe881b";
        tempsEcoule.style.backgroundColor = "rgba(254, 152, 60, 0.2)"

        qSuivante.style.display = "block";

        progression.setAttribute('value', progression.value+1);
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
