$(document).ready(function() {
    otro1 = Number($('input:text[name="Censo[otro1]"]').val());
    otro2 = $('input:checkbox[name="Censo[otro2]"]:checked').val();
    grupo = $('input:radio[name="Censo[grupo_comunitario]"]:checked').val();

    if(otro1 == 0){
        $('.otro1').hide();
    }

    if(otro2 == 0 || otro2 == undefined){
        $('.otro2').hide();
    }

    if(grupo == 0){
        $('.otro3').hide();
    }


});


$(function() {

    $('input:radio[name="Censo[grupo_comunitario]"]').change(function() {
        if ($(this).val() == 1) {
            $('.otro3').show();
        } else {
            $('.otro3').hide();
            $('input[name = "Censo[cual3]"]').val('');
        }
    });

    $('input[name="Censo[otro2]').change(function() {
        if ($(this).is(':checked')) {
            $('.otro2').show();
        } else {
            $('.otro2').hide();
            $('input[name = "Censo[cual2]"]').val('');
        }
    });


});

function fncOtro1() {
    otro1f = Number($('input:text[name="Censo[otro1]"]').val());

    if(otro1f > 0 && otro1f < 6){
        $('.otro1').show();
    }else{
        $('.otro1').hide();
        $('input[name = "Censo[cual1]"]').val('');

    }

}