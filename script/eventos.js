// Evento do botão de tipo de pagamento
jQuery(document).ready(function ($) {
    $('input[name="btnEsc"]').change(function () {
        if ($('input[name="btnEsc"]:checked').val() === "Sim") {
            $('.dinheiro').show();
        } else {
            $('.dinheiro').hide();
        }
        if ($('input[name="btnEsc"]:checked').val() === "Nao") {
            $('.cartao').show();
        } else {
            $('.cartao').hide();
        }
    });
    if($("#login").is(":visible")){
        $("#logo").addClass("active");
    }
});