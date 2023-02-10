localStorage.setItem('br', 0);

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

    let progression = document.getElementById("progress_bar");
    let etatProgressionIs0 = (progression.value==0) ? true : false;

    let timer = document.getElementById("timer");
    var temps = 10;

    let intervalTemps = setInterval(timerDown, 1000);

    document.getElementById("timer").style.color = "#daebff";
    document.getElementById("timer").style.backgroundColor = "#6fb2ff"; 
    timer.innerText = temps;

    //Quand on clique sur une mauvaise réponse -> message de mauvaise réponse
    //Quand on clique sur la bonne réponse -> message de bonne réponse
    document.body.addEventListener("click", function(event){
        if(event.target.id == 'btnV'){
            affTexteBonneReponse();
            event.target.style.backgroundColor = "#14FF14";
            event.target.style.color = "#FEFEFE";
            localStorage.clear();
            localStorage.setItem('br', 1);
            let progress = 1;
            progression.setAttribute('value', progression.value+progress);
            if(etatProgressionIs0){
                progression.setAttribute('value', 1);
            }

        } else if((event.target.id == 'btnX1') || (event.target.id == 'btnX2') || (event.target.id == 'btnX3')){
            affTexteMauvaiseReponse();
            event.target.style.backgroundColor = "#FF1414";
            event.target.style.color = "#FFC1C1";
            btnBon.style.backgroundColor = "#14FF14";
            btnBon.style.color = "#C1FFC1";
            let progress = 1;
            progression.setAttribute('value', progression.value+progress);
            if(etatProgressionIs0){
                progression.setAttribute('value', 1);
            }
        }
    });

    bonneReponse.style.display = "none";
    mauvaiseReponse.style.display = "none";
    tempsEcoule.style.display = "none";
    qSuivante.style.display = "none";

    //Gère les événements en cas de bonne réponse
    function affTexteBonneReponse(){

        clearInterval(intervalTemps);

        //On désactive tous les boutons
        btnBon.disabled = true;
        btnMauvais1.disabled = true;
        btnMauvais2.disabled = true;
        btnMauvais3.disabled = true;

        //On affiche le message de bonne réponse et le bouton de la question suivante
        bonneReponse.style.display = "block";
        bonneReponse.style.color = "#00b300";
        bonneReponse.style.backgroundColor = "rgba(55, 250, 60, 0.2)";

        qSuivante.style.display = "block";
    }

    //Gère les événements en cas de mauvaise réponse
    function affTexteMauvaiseReponse(){

        clearInterval(intervalTemps);

        //On désactive tous les boutons
        btnBon.disabled = true;
        btnMauvais1.disabled = true;
        btnMauvais2.disabled = true;
        btnMauvais3.disabled = true;

        mauvaiseReponse.style.display = "block";
        mauvaiseReponse.style.color = "#EE3333";
        mauvaiseReponse.style.backgroundColor = "rgba(240, 40, 40, 0.2)";

        qSuivante.style.display = "block";
    }

    //Gère les évenemnts en cas de temps écoulé
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
        tempsEcoule.style.backgroundColor = "rgba(254, 152, 60, 0.2)";

        qSuivante.style.display = "block";

    }

    //Fonction qui effectue le décompte du timer (s'arrête à 0)
    function timerDown(){
        timer.innerText = temps-1;
        temps = temps <= 0 ? 0 : temps-1; //On diminue le temps de 1 tant qu'il est supérieur à 0
        if(temps==9){
            document.getElementById("timer").style.color = "#daebff";
            document.getElementById("timer").style.backgroundColor = "#6fb2ff"; 
        }
        if(temps==4){
            document.getElementById("timer").style.color = "#cc5c00";
            document.getElementById("timer").style.backgroundColor = "#ffd5b3"; 
        }
        if(temps==0){
            clearInterval(intervalTemps);
            document.getElementById("timer").style.color = "#EE5555";
            document.getElementById("timer").style.backgroundColor = "#EEAAAA";
            affTexteTempsEcoule();
            let progress = 1;
            progression.setAttribute('value', progression.value+progress);
            if(etatProgressionIs0){
                progression.setAttribute('value', 1);
            }
        }
    }

    function finQcm(){
        
    }
});
