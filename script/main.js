jQuery(document).ready(function ($) {
    
    var x = document.documentElement.scrollHeight;
    window.onscroll = function () {
        if (window.pageYOffset > 130) {
            $("#cima").addClass("active");
            $("#filtro").addClass("active");
            $("#cardapio").addClass("active");
            var img = document.querySelector("#logo");
            if(window.location.pathname == "/projetofinal/esboco/index.php"){
                img.setAttribute('src', './assets/logoS.png');
            }else{
                img.setAttribute('src', '../assets/logoS.png');
            }
            if(window.location.pathname == "/projetofinal/esboco/view/detalhePedido.php"){
                $("#cima").addClass("activeDif");
                $("#detalhes").addClass("active");
                $("#voltar").addClass("activeDif");
                $("#baixo").addClass("activeDel");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/login.html"){
                $("#cima").addClass("activeLog");
                $("#baixo").addClass("activeLog");
                $("#login").addClass("active");
                $("#voltar").addClass("active");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/carrinho.html"){
                $("#cima").addClass("activeCar");
                $("#baixo").addClass("activeCar");
                $("#telaCarrinho").addClass("active");
                $("#voltar").addClass("activeCar");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/perfilCli.html"){
                $("#cima").addClass("activeEnd");
                $("#endereco").addClass("active");
                $("#voltar").addClass("activeEnd");
                $("#baixo").addClass("activeEnd");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/pagamento.html"){
                $("#cima").addClass("activePag");
                $("#pagamento").addClass("active");
                $("#voltar").addClass("activePag");
                $("#baixo").addClass("activePag");
            }
            //alert(window.location.pathname);
        } else {
            $("#cima").removeClass("active");
            $("#cima").removeClass("activeDif");
            $("#cima").removeClass("activeLog");
            $("#cima").removeClass("activeCar");
            $("#cima").removeClass("activeEnd");
            $("#cima").removeClass("activePag");
            $("#voltar").removeClass("active");
            $("#voltar").removeClass("activeDif");
            $("#voltar").removeClass("activeCar");
            $("#voltar").removeClass("activeEnd");
            $("#voltar").removeClass("activePag");
            $("#detalhes").removeClass("active");
            $("#telaCarrinho").removeClass("active");
            $("#filtro").removeClass("active");
            $("#cardapio").removeClass("active");
            $("#login").removeClass("active");
            $("#endereco").removeClass("active");
            $("#pagamento").removeClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoG.png');
            if(window.location.pathname == "/projetofinal/esboco/index.php"){
                img.setAttribute('src', './assets/logoG.png');
            }
        }
        if (window.pageYOffset > x-940) {
            if((window.location.pathname != "/projetofinal/esboco/view/login.html") &&
                (window.location.pathname != "/projetofinal/esboco/view/carrinho.html") &&
                (window.location.pathname != "/projetofinal/esboco/view/perfilCli.html") &&
                (window.location.pathname != "/projetofinal/esboco/view/pagamento.html")){
                $("#carrinho").addClass("active");
                $("#baixo").addClass("active");
            }
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }
});