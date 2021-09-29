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
            if(window.location.pathname == "/projetofinal/esboco/view/login.php"){
                $("#cima").addClass("activeLog");
                $("#baixo").addClass("activeLog");
                $("#login").addClass("active");
                $("#voltar").addClass("active");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/carrinho.php"){
                $("#cima").addClass("activeCar");
                $("#baixo").addClass("activeCar");
                $("#telaCarrinho").addClass("active");
                $("#voltar").addClass("activeCar");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/newEndereco.php"){
                $("#cima").addClass("activeEnd");
                $("#endereco").addClass("active");
                $("#voltar").addClass("activeEnd");
                $("#baixo").addClass("activeEnd");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/pagamento.php"){
                $("#cima").addClass("activePag");
                $("#pagamento").addClass("active");
                $("#voltar").addClass("activePag");
                $("#baixo").addClass("activePag");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/local.php"){
                $("#cima").addClass("activeLc");
                $("#retirada").addClass("activeLc");
                $("#voltar").addClass("activeLc");
                $("#baixo").addClass("activeLc");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/myAddress.php"){
                $("#cima").addClass("activeAdd");
                $("#address").addClass("activeAdd");
                $("#voltar").addClass("activeAdd");
                $("#baixo").addClass("activeAdd");
            }
            //alert(window.location.pathname);
        } else {
            $("#cima").removeClass("active");
            $("#cima").removeClass("activeDif");
            $("#cima").removeClass("activeLog");
            $("#cima").removeClass("activeCar");
            $("#cima").removeClass("activeEnd");
            $("#cima").removeClass("activePag");
            $("#cima").removeClass("activeLc");
            $("#cima").removeClass("activeAdd");
            $("#voltar").removeClass("active");
            $("#voltar").removeClass("activeDif");
            $("#voltar").removeClass("activeCar");
            $("#voltar").removeClass("activeEnd");
            $("#voltar").removeClass("activeAdd");
            $("#voltar").removeClass("activePag");
            $("#voltar").removeClass("activeLc");
            $("#detalhes").removeClass("active");
            $("#telaCarrinho").removeClass("active");
            $("#filtro").removeClass("active");
            $("#address").removeClass("activeAdd");
            $("#cardapio").removeClass("active");
            $("#login").removeClass("active");
            $("#endereco").removeClass("active");
            $("#pagamento").removeClass("active");
            $("#retirada").removeClass("activeLc");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoG.png');
            if(window.location.pathname == "/projetofinal/esboco/index.php"){
                img.setAttribute('src', './assets/logoG.png');
            }
        }
        if (window.pageYOffset > x-940) {
            if((window.location.pathname != "/projetofinal/esboco/view/login.php") &&
                (window.location.pathname != "/projetofinal/esboco/view/carrinho.php") &&
                (window.location.pathname != "/projetofinal/esboco/view/newEndereco.php") &&
                (window.location.pathname != "/projetofinal/esboco/view/pagamento.php") &&
                (window.location.pathname != "/projetofinal/esboco/view/local.php") &&
                (window.location.pathname != "/projetofinal/esboco/view/myAddress.php") &&
                (window.location.pathname != "/projetofinal/esboco/view/perfilCli.html")) {
                $("#carrinho").addClass("active");
                $("#baixo").addClass("active");
            }
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }
});