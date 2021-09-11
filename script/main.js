jQuery(document).ready(function ($) {
    
    var x = document.documentElement.scrollHeight;
    window.onscroll = function () {
        if (window.pageYOffset > 130) {
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/view/detalhePedido.html"){
                $("#cima").addClass("activeDif");
                $("#detalhes").addClass("active");
                $("#voltar").addClass("activeDif");
            }
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/view/login.html"){
                $("#cima").addClass("activeLog");
                $("#baixo").addClass("activeLog");
                $("#login").addClass("active");
                $("#voltar").addClass("active");
            }
            $("#cima").addClass("active");
            $("#filtro").addClass("active");
            $("#cardapio").addClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoS.png');
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/index.html"){
                img.setAttribute('src', './assets/logoS.png');
            }
            //alert(x);
        } else {
            $("#cima").removeClass("active");
            $("#cima").removeClass("activeDif");
            $("#cima").removeClass("activeLog");
            $("#detalhes").removeClass("active");
            $("#filtro").removeClass("active");
            $("#cardapio").removeClass("active");
            $("#login").removeClass("active");
            $("#voltar").removeClass("active");
            $("#voltar").removeClass("activeDif");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoG.png');
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/index.html"){
                img.setAttribute('src', './assets/logoG.png');
            }
        }
        if (window.pageYOffset > x-940) {
            if(window.location.pathname != "/C:/xampp/htdocs/projetofinal/esboco/view/login.html"){
                $("#baixo").addClass("active");
                $("#carrinho").addClass("active");
            }
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }

});