jQuery(document).ready(function ($) {
    
    var x = document.documentElement.scrollHeight;
    window.onscroll = function () {
        if (window.pageYOffset > 130) {
            $("#cima").addClass("active");
            $("#filtro").addClass("active");
            $("#cardapio").addClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoS.png');
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/index.html"){
                img.setAttribute('src', './assets/logoS.png');
            }
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
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/view/carrinho.html"){
                $("#cima").addClass("activeCar");
                $("#telaCarrinho").addClass("active");
                $("#voltar").addClass("activeCar");
                $("#baixo").addClass("activeCar");
            }
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/view/perfilCli.html"){
                $("#cima").addClass("activeEnd");
                $("#endereco").addClass("active");
                $("#voltar").addClass("activeEnd");
                $("#baixo").addClass("activeEnd");
            }
            //alert(x);
        } else {
            $("#cima").removeClass("active");
            $("#cima").removeClass("activeDif");
            $("#cima").removeClass("activeLog");
            $("#cima").removeClass("activeCar");
            $("#cima").removeClass("activeEnd");
            $("#voltar").removeClass("active");
            $("#voltar").removeClass("activeDif");
            $("#voltar").removeClass("activeCar");
            $("#voltar").removeClass("activeEnd");
            $("#detalhes").removeClass("active");
            $("#telaCarrinho").removeClass("active");
            $("#filtro").removeClass("active");
            $("#cardapio").removeClass("active");
            $("#login").removeClass("active");
            $("#endereco").removeClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoG.png');
            if(window.location.pathname == "/C:/xampp/htdocs/projetofinal/esboco/index.html"){
                img.setAttribute('src', './assets/logoG.png');
            }
        }
        if (window.pageYOffset > x-940) {
            if((window.location.pathname != "/C:/xampp/htdocs/projetofinal/esboco/view/login.html") &&
                (window.location.pathname != "/C:/xampp/htdocs/projetofinal/esboco/view/carrinho.html")&&
                (window.location.pathname != "/C:/xampp/htdocs/projetofinal/esboco/view/perfilCli.html")){
                $("#carrinho").addClass("active");
                $("#baixo").addClass("active");
            }
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }

});