$(document).ready(function() {
    relevante = Number($('input:text[name="AccionesAdicionales[acciones]"]').val());

    if(relevante < 1){
        $('.relevantes').hide();
    }
});

function fncRelevantes() {
    relevantef = Number($('input:text[name="AccionesAdicionales[acciones]"]').val());

    if(relevantef >= 1){
        $('.relevantes').show();
    }else{
        $('.relevantes').hide();

    }

}