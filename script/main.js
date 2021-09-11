jQuery(document).ready(function ($) {
    
    var x = document.documentElement.scrollHeight;
    window.onscroll = function () {
        if (window.pageYOffset > 130) {
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/detalhePedido.html"){
                $("#cima").addClass("activeDif");
                $("#detalhes").addClass("active");
            }
            $("#cima").addClass("active");
            $("#filtro").addClass("active");
            $("#cardapio").addClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', './assets/logoS.png');
            //alert(y);
        } else {
            $("#cima").removeClass("active");
            $("#cima").removeClass("activeDif");
            $("#detalhes").removeClass("active");
            $("#filtro").removeClass("active");
            $("#cardapio").removeClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', './assets/logoG.png');
        }
        if (window.pageYOffset > x-940) {
            $("#carrinho").addClass("active");
            $("#baixo").addClass("active");
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }

});