$(document).ready(function() {

    let selectNiveau = document.getElementById("sl_niveau");
    selectNiveau.addEventListener('change', () => {
        switch(selectNiveau.selectedIndex){
            case 1:
                selectNiveau.style.color = "#4dff4d";
                break;
            case 2:
                selectNiveau.style.color = "#c9ff33";
                break;
            case 3:
                selectNiveau.style.color = "#fff71a";
                break;
            case 4:
                selectNiveau.style.color = "#ffb61a";
                break;
            case 5:
                selectNiveau.style.color = "#ff471a";
                break;
            case 0:
                selectNiveau.style.color = "#80ccff";
        }
    });

});