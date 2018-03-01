$(document).ready(function() {
    rol = $('input:radio[name="User[role]"]:checked').val();

    if (rol == 30){
        $('.region').hide();
    }
});

$(function() {

    $('input:radio[name="User[role]"]').change(function() {
        if ($(this).val() == 30) {
            $('.region').hide();
        } else {
            $('.region').show();
        }
    });
});