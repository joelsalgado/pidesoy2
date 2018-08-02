$(document).ready(function() {
    piso = Number($('input:text[name="Seguimiento[acciones_piso]"]').val());
    techo = Number($('input:text[name="Seguimiento[acciones_techo]"]').val());
    muro = Number($('input:text[name="Seguimiento[acciones_muro]"]').val());
    cuarto = Number($('input:text[name="Seguimiento[acciones_cuarto]"]').val());
    agua_potable = Number($('input:text[name="Seguimiento[acciones_agua_potable]"]').val());
    agua_interior = Number($('input:text[name="Seguimiento[acciones_agua_interior]"]').val());
    drenaje = Number($('input:text[name="Seguimiento[acciones_drenaje]"]').val());
    luz = Number($('input:text[name="Seguimiento[acciones_luz]"]').val());
    estufa = Number($('input:text[name="Seguimiento[acciones_estufa]"]').val());
    seguro_popular = Number($('input:text[name="Seguimiento[acciones_seguro_popular]"]').val());
    esc_3_15 = Number($('input:text[name="Seguimiento[acciones_3_15_escuela]"]').val());
    antes1982 = Number($('input:text[name="Seguimiento[acciones_antes_1982_primaria]"]').val());
    despues1982 = Number($('input:text[name="Seguimiento[acciones_despues_1982_secundaria]"]').val());
    despensas = Number($('input:text[name="Seguimiento[acciones_despensas]"]').val());
    ss = Number($('input:text[name="Seguimiento[acciones_ss]"]').val());
    trabajadores_ss = Number($('input:text[name="Seguimiento[acciones_trabajadores_ss]"]').val());
    adultos_ss = Number($('input:text[name="Seguimiento[acciones_adultos_ss]"]').val());

    if(piso != 1){
        $('.piso').hide();
    }

    if(techo != 1){
        $('.techo').hide();
    }

    if(muro != 1){
        $('.muro').hide();
    }

    if(cuarto != 1){
        $('.cuarto').hide();
    }

    if(agua_potable != 1){
        $('.agua_potable').hide();
    }

    if(agua_interior != 1){
        $('.agua_interior').hide();
    }

    if(drenaje != 1){
        $('.drenaje').hide();
    }

    if(luz != 1){
        $('.luz').hide();
    }

    if(estufa != 1){
        $('.estufa').hide();
    }

    if(seguro_popular != 1){
        $('.seguro_popular').hide();
    }

    if(esc_3_15 != 1){
        $('.esc_3_15').hide();
    }

    if(antes1982 != 1){
        $('.antes_1982_primaria').hide();
    }

    if(despues1982 != 1){
        $('.despues_1982_secundaria').hide();
    }

    if(despensas != 1){
        $('.despensas').hide();
    }

    if(ss != 1){
        $('.ss').hide();
    }

    if(trabajadores_ss != 1){
        $('.trabajadores_ss').hide();
    }

    if(adultos_ss != 1){
        $('.adultos_ss').hide();
    }

});


function fncPiso() {
    pisof = Number($('input:text[name="Seguimiento[acciones_piso]"]').val());

    if(pisof == 1){
        $('.piso').show();
    }else{
        $('.piso').hide();

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

function fncMuro() {
    murof = Number($('input:text[name="Seguimiento[acciones_muro]"]').val());

    if(murof == 1){
        $('.muro').show();
    }else{
        $('.muro').hide();
    }
}

function fncCuarto() {
    cuartof = Number($('input:text[name="Seguimiento[acciones_cuarto]"]').val());

    if(cuartof == 1){
        $('.cuarto').show();
    }else{
        $('.cuarto').hide();
    }
}

function fncAguaPotable() {
    agua_potablef = Number($('input:text[name="Seguimiento[acciones_agua_potable]"]').val());

    if(agua_potablef == 1){
        $('.agua_potable').show();
    }else{
        $('.agua_potable').hide();
    }
}

function fncAguaInterior() {
    agua_interiorf = Number($('input:text[name="Seguimiento[acciones_agua_interior]"]').val());

    if(agua_interiorf == 1){
        $('.agua_interior').show();
    }else{
        $('.agua_interior').hide();
    }
}

function fncDrenaje() {
    drenajef = Number($('input:text[name="Seguimiento[acciones_drenaje]"]').val());

    if(drenajef == 1){
        $('.drenaje').show();
    }else{
        $('.drenaje').hide();
    }
}

function fncLuz() {
    luzf = Number($('input:text[name="Seguimiento[acciones_luz]"]').val());

    if(luzf == 1){
        $('.luz').show();
    }else{
        $('.luz').hide();
    }
}

function fncEstufa() {
    estufaf = Number($('input:text[name="Seguimiento[acciones_estufa]"]').val());

    if(estufaf == 1){
        $('.estufa').show();
    }else{
        $('.estufa').hide();
    }
}

function fncSeguro() {
    seguro_popularf = Number($('input:text[name="Seguimiento[acciones_seguro_popular]"]').val());

    if(seguro_popularf == 1){
        $('.seguro_popular').show();
    }else{
        $('.seguro_popular').hide();
    }
}

function fncEsc3a15() {
    esc_3_15f = Number($('input:text[name="Seguimiento[acciones_3_15_escuela]"]').val());

    if(esc_3_15f == 1){
        $('.esc_3_15').show();
    }else{
        $('.esc_3_15').hide();
    }
}

function fncPrim1982() {
    antes_1982f = Number($('input:text[name="Seguimiento[acciones_antes_1982_primaria]"]').val());

    if(antes_1982f == 1){
        $('.antes_1982_primaria').show();
    }else{
        $('.antes_1982_primaria').hide();
    }
}

function fncSec1982() {
    despues_1982f = Number($('input:text[name="Seguimiento[acciones_despues_1982_secundaria]"]').val());

    if(despues_1982f == 1){
        $('.despues_1982_secundaria').show();
    }else{
        $('.despues_1982_secundaria').hide();
    }
}

function fncDespensas() {
    despensasf = Number($('input:text[name="Seguimiento[acciones_despensas]"]').val());

    if(despensasf == 1){
        $('.despensas').show();
    }else{
        $('.despensas').hide();
    }
}

function fncSs() {
    ssf = Number($('input:text[name="Seguimiento[acciones_ss]"]').val());

    if(ssf == 1){
        $('.ss').show();
    }else{
        $('.ss').hide();
    }
}

function fncTrabajadorSs() {
    trabajadores_ssf = Number($('input:text[name="Seguimiento[acciones_trabajadores_ss]"]').val());

    if(trabajadores_ssf == 1){
        $('.trabajadores_ss').show();
    }else{
        $('.trabajadores_ss').hide();
    }
}

function fncAdultosSs() {
    adultos_ssf = Number($('input:text[name="Seguimiento[acciones_adultos_ss]"]').val());

    if(adultos_ssf == 1){
        $('.adultos_ss').show();
    }else{
        $('.adultos_ss').hide();
    }
}