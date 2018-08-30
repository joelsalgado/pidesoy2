$(document).ready(function() {
    otro1 = Number($('input:text[name="FichaTecnica[otros]"]').val());
    otro2 = Number($('input:text[name="FichaTecnica[otra]"]').val());

    if(otro1 > 0){
        $('.cual1').show();
    }else{
        $('.cual1').hide();
    }

    if(otro2 > 0){
        $('.cual2').show();
    }else{
        $('.cual2').hide();
    }

});


function fncOtro1() {
    otro1f = Number($('input:text[name="FichaTecnica[otros]"]').val());

    if(otro1f > 0){
        $('.cual1').show();
    }else{
        $('.cual1').hide();

    }
}

function fncOtro2() {
    otro2f = Number($('input:text[name="FichaTecnica[otra]"]').val());

    if(otro2f > 0){
        $('.cual2').show();
    }else{
        $('.cual2').hide();

    }
}