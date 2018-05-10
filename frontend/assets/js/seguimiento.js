$(document).ready(function() {
    piso = Number($('input:text[name="Seguimiento[acciones_piso]"]').val());
    techo = Number($('input:text[name="Seguimiento[acciones_techo]"]').val());
    if(piso != 1){
        $('.piso').hide();
    }

    if(techo != 1){
        $('.techo').hide();
    }

});


function fncPiso() {
    pisof = Number($('input:text[name="Seguimiento[acciones_piso]"]').val());

    if(pisof == 1){
        $('.piso').show();
    }else{
        $('.piso').hide();
        $('input[name = "Seguimiento[inversion_piso]"]').val('');
        $('input[name = "Seguimiento[fecha_inicio_techo]"]').val('');
        $('input[name = "Seguimiento[fecha_entrega_techo]"]').val('');

    }

}

function fncTecho() {
    techof = Number($('input:text[name="Seguimiento[acciones_techo]"]').val());

    if(techof == 1){
        $('.techo').show();
    }else{
        $('.techo').hide();
    }
}