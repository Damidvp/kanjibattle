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
                console.log("Bonnes rep : " + localStorage.getItem('br'));
                $('#ajax').empty();
                $('#ajax').html(retour); 
            }
        })

    };
    $("#btn_qsuivante").on('click', function(e){
        e.preventDefault();
        reloadQcm();
    });
});