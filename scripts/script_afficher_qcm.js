$(document).ready(function(){

    function reloadQcm(){
        
        $.ajax({
            method: "GET",
            url: "../controler/ctrl_qcm_bonkanji.php",
            data: {
                action: 'newQcm', 
                bonneRep: localStorage.getItem('br')
            },
            success: function(retour){
                $('#ajax').empty();
                $('#ajax').html(retour); 
            }
        })

    };

    function recupBouton(){
        $.ajax({
            method: "GET",
            url: "../controler/ctrl_details_kanji.php",
            data: {
                display: 'dispDetails',
                kanjiSelect: localStorage.getItem('kanjiSelect')
            },
            success: function(retour){
                //$('.details').html(retour); 
            }
        })
    };

    $("#btn_qsuivante").on('click', function(e){
        e.preventDefault();
        reloadQcm();
    });

    $("#btnV").on('click', function(e){
        e.preventDefault();
        localStorage.setItem('kanjiSelect', $("#btnV").text());
        recupBouton();
    });

});