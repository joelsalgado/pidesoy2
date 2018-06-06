$(document).ready(function() {
    otro = $('input:checkbox[name="DirectorioResponsables[otro]"]:checked').val();

    if (otro == 0 || otro == undefined) {
        $('.otro').hide();
    }
});


$(function() {
    $('input[name="DirectorioResponsables[otro]').change(function() {
        if ($(this).is(':checked')) {
            $('.otro').show();
        } else {
            $('.otro').hide();
            $('input[name = "DirectorioResponsables[especifique]"]').val('');
        }
    });

});