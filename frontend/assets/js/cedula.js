$(document).ready(function() {
    piso = $('input:radio[name="CedulaPobreza[piso_firme]"]:checked').val();
    techo = $('input:radio[name="CedulaPobreza[techo_firme]"]:checked').val();
    muros = $('input:radio[name="CedulaPobreza[muros_firme]"]:checked').val();
    aguap = $('input:radio[name="CedulaPobreza[agua_publica]"]:checked').val();

    gas = $('input:checkbox[name="CedulaPobreza[cocina_gas]"]:checked').val();
    electricidad = $('input:checkbox[name="CedulaPobreza[cocina_electricidad]"]:checked').val();
    lena = $('input:checkbox[name="CedulaPobreza[cocina_lena]"]:checked').val();
    carbon = $('input:checkbox[name="CedulaPobreza[cocina_carbon]"]:checked').val();
    otro = $('input:checkbox[name="CedulaPobreza[cocina_otro]"]:checked').val();

    trunca_3_15 = $('input:radio[name="CedulaPobreza[educ_trunca_3_15]"]:checked').val();
    no_asiste_3_15 = $('input:radio[name="CedulaPobreza[no_asiste_esc_3_15]"]:checked').val();
    analfabetas_may_15 = $('input:radio[name="CedulaPobreza[analfabetas_may_15]"]:checked').val();
    prim_icomp_15_mas = $('input:radio[name="CedulaPobreza[prim_icomp_15_mas]"]:checked').val();
    no_asiste_esc_6_14 = $('input:radio[name="CedulaPobreza[no_asiste_esc_6_14]"]:checked').val();


    if (piso == 1 || piso == undefined){
        $('.piso').hide();
    }

    if (techo == 1 || techo == undefined){
        $('.techo').hide();
    }

    if (muros == 1 || muros == undefined){
        $('.muros').hide();
    }

    if (aguap == 0 || aguap == undefined){
        $('.aguap').hide();
    }

    if (lena == 0 || lena == undefined){
        if (carbon == 0 || carbon == undefined) {
            $('.chimenea').hide();
        }
    }

    if (carbon == 0 || carbon == undefined){
        if (lena == 0 || lena == undefined) {
            $('.chimenea').hide();
        }
    }

    if(gas == 1 || electricidad == 1 || otro == 1){
        $('.chimenea').hide();
    }

    if (otro == 1 || otro == undefined) {
        $('.otro').hide();
    }

    //otros

    if (trunca_3_15 == 0 || trunca_3_15 == undefined){
        $('.trunca_3_15').hide();
    }

    if (no_asiste_3_15 == 0 || no_asiste_3_15 == undefined){
        $('.no_asiste_3_15').hide();
    }

    if (analfabetas_may_15 == 0 || analfabetas_may_15 == undefined){
        $('.analfabetas_may_15').hide();
    }

    if (prim_icomp_15_mas == 0 || prim_icomp_15_mas == undefined){
        $('.prim_icomp_15_mas').hide();
    }

    if (no_asiste_esc_6_14 == 0 || no_asiste_esc_6_14 == undefined){
        $('.no_asiste_esc_6_14').hide();
    }

});

$(function() {

    $('input:radio[name="CedulaPobreza[piso_firme]"]').change(function() {
        if ($(this).val() == 1) {
            $('.piso').hide();
            $('input[name = "CedulaPobreza[piso_material]"]').val('');
        } else {
            $('.piso').show();
        }
    });

    $('input:radio[name="CedulaPobreza[techo_firme]"]').change(function() {
        if ($(this).val() == 1) {
            $('.techo').hide();
            $('input[name = "CedulaPobreza[techo_material]"]').val('');
        } else {
            $('.techo').show();
        }
    });

    $('input:radio[name="CedulaPobreza[muros_firme]"]').change(function() {
        if ($(this).val() == 1) {
            $('.muros').hide();
            $('input[name = "CedulaPobreza[muros_material]"]').val('');
        } else {
            $('.muros').show();
        }
    });

    $('input:radio[name="CedulaPobreza[agua_publica]"]').change(function() {
        if ($(this).val() == 1) {
            $('.aguap').hide();
            $('input[name = "CedulaPobreza[agua_obtenida]"]').val('');
        } else {
            $('.aguap').show();
        }
    });

    $('input[name="CedulaPobreza[cocina_gas]').change(function() {
        if ($(this).is(':checked')) {
            $('.chimenea').hide();
        }
        else{
            gas = $('input:checkbox[name="CedulaPobreza[cocina_gas]"]:checked').val();
            electricidad = $('input:checkbox[name="CedulaPobreza[cocina_electricidad]"]:checked').val();
            lena = $('input:checkbox[name="CedulaPobreza[cocina_lena]"]:checked').val();
            carbon = $('input:checkbox[name="CedulaPobreza[cocina_carbon]"]:checked').val();
            otro = $('input:checkbox[name="CedulaPobreza[cocina_otro]"]:checked').val();

            if (electricidad == 1 || otro == 1){
                $('.chimenea').hide();
            }
            else{
                if (lena == 1 || carbon == 1){
                    $('.chimenea').show();
                }
            }
        }

    });

    $('input[name="CedulaPobreza[cocina_electricidad]').change(function() {
        if ($(this).is(':checked')) {
            $('.chimenea').hide();
        }
        else{
            gas = $('input:checkbox[name="CedulaPobreza[cocina_gas]"]:checked').val();
            electricidad = $('input:checkbox[name="CedulaPobreza[cocina_electricidad]"]:checked').val();
            lena = $('input:checkbox[name="CedulaPobreza[cocina_lena]"]:checked').val();
            carbon = $('input:checkbox[name="CedulaPobreza[cocina_carbon]"]:checked').val();
            otro = $('input:checkbox[name="CedulaPobreza[cocina_otro]"]:checked').val();

            if (gas == 1 || otro == 1){
                $('.chimenea').hide();
            }
            else{
                if (lena == 1 || carbon == 1){
                    $('.chimenea').show();
                }
            }
        }

    });

    $('input[name="CedulaPobreza[cocina_lena]').change(function() {
        gas = $('input:checkbox[name="CedulaPobreza[cocina_gas]"]:checked').val();
        electricidad = $('input:checkbox[name="CedulaPobreza[cocina_electricidad]"]:checked').val();
        lena = $('input:checkbox[name="CedulaPobreza[cocina_lena]"]:checked').val();
        carbon = $('input:checkbox[name="CedulaPobreza[cocina_carbon]"]:checked').val();
        otro = $('input:checkbox[name="CedulaPobreza[cocina_otro]"]:checked').val();
        if ($(this).is(':checked')) {
            if (gas == 1 || otro == 1 || electricidad ==1){
                $('.chimenea').hide();
            }
            else{
                $('.chimenea').show();
            }
        }
        else{
            if (gas == 1 || otro == 1 || electricidad ==1){
                $('.chimenea').hide();
            }
            else{
                if (carbon == 1){
                    $('.chimenea').show();
                }else{
                    $('.chimenea').hide();
                }
            }
        }

    });

    $('input[name="CedulaPobreza[cocina_carbon]').change(function() {
        gas = $('input:checkbox[name="CedulaPobreza[cocina_gas]"]:checked').val();
        electricidad = $('input:checkbox[name="CedulaPobreza[cocina_electricidad]"]:checked').val();
        lena = $('input:checkbox[name="CedulaPobreza[cocina_lena]"]:checked').val();
        carbon = $('input:checkbox[name="CedulaPobreza[cocina_carbon]"]:checked').val();
        otro = $('input:checkbox[name="CedulaPobreza[cocina_otro]"]:checked').val();
        if ($(this).is(':checked')) {
            if (gas == 1 || otro == 1 || electricidad ==1){
                $('.chimenea').hide();
            }
            else{
                $('.chimenea').show();
            }
        }
        else{
            if (gas == 1 || otro == 1 || electricidad ==1){
                $('.chimenea').hide();
            }
            else{
                if (lena == 1){
                    $('.chimenea').show();
                }else{
                    $('.chimenea').hide();
                }
            }
        }

    });

    $('input[name="CedulaPobreza[cocina_otro]').change(function() {
        if ($(this).is(':checked')) {
            $('.otro').show();
                $('.chimenea').hide();
        } else {
            gas = $('input:checkbox[name="CedulaPobreza[cocina_gas]"]:checked').val();
            electricidad = $('input:checkbox[name="CedulaPobreza[cocina_electricidad]"]:checked').val();
            lena = $('input:checkbox[name="CedulaPobreza[cocina_lena]"]:checked').val();
            carbon = $('input:checkbox[name="CedulaPobreza[cocina_carbon]"]:checked').val();
            otro = $('input:checkbox[name="CedulaPobreza[cocina_otro]"]:checked').val();

            if (gas == 1 || electricidad == 1){
                $('.chimenea').hide();
            }
            else{
                if (lena == 1 || carbon == 1){
                    $('.chimenea').show();
                }
            }
            $('.otro').hide();
            $('input[name = "CedulaPobreza[cocina_otro_esp]"]').val('');
        }
    });
    //otros


    $('input:radio[name="CedulaPobreza[educ_trunca_3_15]"]').change(function() {
        if ($(this).val() == 0) {
            $('.trunca_3_15').hide();
            $('input[name = "CedulaPobreza[causa_trunca_3_15]"]').val('');
        } else {
            $('.trunca_3_15').show();
        }
    });

    $('input:radio[name="CedulaPobreza[no_asiste_esc_3_15]"]').change(function() {
        if ($(this).val() == 0) {
            $('.no_asiste_3_15').hide();
            $('input[name = "CedulaPobreza[causa_no_asiste_3_15]"]').val('');
        } else {
            $('.no_asiste_3_15').show();
        }
    });

    $('input:radio[name="CedulaPobreza[analfabetas_may_15]"]').change(function() {
        if ($(this).val() == 0) {
            $('.analfabetas_may_15').hide();
            $('input[name = "CedulaPobreza[analfabentas_num]"]').val('');
        } else {
            $('.analfabetas_may_15').show();
        }
    });

    $('input:radio[name="CedulaPobreza[prim_icomp_15_mas]"]').change(function() {
        if ($(this).val() == 0) {
            $('.prim_icomp_15_mas').hide();
            $('input[name = "CedulaPobreza[num_15_mas]"]').val('');
        } else {
            $('.prim_icomp_15_mas').show();
        }
    });

    $('input:radio[name="CedulaPobreza[no_asiste_esc_6_14]"]').change(function() {
        if ($(this).val() == 0) {
            $('.no_asiste_esc_6_14').hide();
            $('input[name = "CedulaPobreza[num_6_14]"]').val('');
            $('input[name = "CedulaPobreza[causa_6_14]"]').val('');
        } else {
            $('.no_asiste_esc_6_14').show();
        }
    });





});