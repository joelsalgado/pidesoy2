$(document).ready(function() {
    piso = Number($('input:text[name="Seguimiento[acciones_piso]"]').val());
    if(piso != 1){
        $('.piso').hide();
    }
});


function fncSumar() {
    pisof = Number($('input:text[name="Seguimiento[acciones_piso]"]').val());

    if(pisof == 1){
        $('.piso').show();
    }else{
        $('.piso').hide();
    }

}