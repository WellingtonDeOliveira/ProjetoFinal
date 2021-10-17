jQuery(document).ready(function ($) {
    $('#filtroComidas').on('change', function () {
        let filtro = $(this).val();
        if (filtro == "carnes") {
            $('#carnes').show();
            $('#massas').hide();
            $('#sobremesas').hide();
            $('#bebidas').hide();
        } else if (filtro == "massas") {
            $('#carnes').hide();
            $('#massas').show();
            $('#sobremesas').hide();
            $('#bebidas').hide();
        } else if (filtro == "sobremesa") {
            $('#carnes').hide();
            $('#massas').hide();
            $('#sobremesas').show();
            $('#bebidas').hide();
        } else if (filtro == "bebidas") {
            $('#carnes').hide();
            $('#massas').hide();
            $('#sobremesas').hide();
            $('#bebidas').show();
        }
    });
});