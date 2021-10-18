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
            if(window.location.pathname == "/projetofinal/esboco/view/perfilCli.php"){
                $("#cima").addClass("activePf");
                $("#cliente").addClass("activePf");
                $("#voltar").addClass("activePf");
                $("#baixo").addClass("activePf");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/historicoCli.php"){
                $("#cima").addClass("activeHi");
                $("#historicoCli ").addClass("activeHi");
                $("#voltar").addClass("activeHi");
                $("#baixo").addClass("activeHi");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/gerenciamento.php"){
                $("#cima").addClass("activeGer");
                $("#gerencia").addClass("activeGer");
                $("#voltar").addClass("activeGer");
                $("#baixo").addClass("activeGer");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/controleComida.php"){
                $("#cima").addClass("activeCC");
                $("#controleComida").addClass("activeCC");
                $("#voltar").addClass("activeCC");
                $("#baixo").addClass("activeCC");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/adicionar.php"){
                $("#cima").addClass("activeADC");
                $("#adicionar").addClass("activeADC");
                $("#voltar").addClass("activeADC");
                $("#baixo").addClass("activeADC");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/editarComida.php"){
                $("#cima").addClass("activeEC");
                $("#editarComida").addClass("activeEC");
                $("#voltar").addClass("activeEC");
                $("#baixo").addClass("activeEC");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/controleUsuario.php"){
                $("#cima").addClass("activeCU");
                $("#controleUsuario").addClass("activeCU");
                $("#voltar").addClass("activeCU");
                $("#baixo").addClass("activeCU");
            }
            if(window.location.pathname == "/projetofinal/esboco/view/orcamento.php"){
                $("#cima").addClass("activeOrc");
                $("#orcamentos").addClass("activeOrc");
                $("#voltar").addClass("activeOrc");
                $("#baixo").addClass("activeOrc");
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
            $("#cima").removeClass("activePf");
            $("#cima").removeClass("activeGer");
            $("#cima").removeClass("activeCC");
            $("#cima").removeClass("activeHi");
            $("#cima").removeClass("activeADC");
            $("#cima").removeClass("activeEC");
            $("#cima").removeClass("activeCU");
            $("#cima").removeClass("activeOrc");
            $("#voltar").removeClass("active");
            $("#voltar").removeClass("activeDif");
            $("#voltar").removeClass("activeCar");
            $("#voltar").removeClass("activeEnd");
            $("#voltar").removeClass("activeAdd");
            $("#voltar").removeClass("activePag");
            $("#voltar").removeClass("activeLc");
            $("#voltar").removeClass("activePf");
            $("#voltar").removeClass("activeGer");
            $("#voltar").removeClass("activeHi");
            $("#voltar").removeClass("activeCC");
            $("#voltar").removeClass("activeADC");
            $("#voltar").removeClass("activeEC");
            $("#voltar").removeClass("activeCU");
            $("#voltar").removeClass("activeOrc");
            $("#detalhes").removeClass("active");
            $("#telaCarrinho").removeClass("active");
            $("#controleUsuario").removeClass("activeCU");
            $("#filtro").removeClass("active");
            $("#address").removeClass("activeAdd");
            $("#historicoCli ").removeClass("activeHi");
            $("#cardapio").removeClass("active");
            $("#login").removeClass("active");
            $("#endereco").removeClass("active");
            $("#pagamento").removeClass("active");
            $("#cliente").removeClass("activePf");
            $("#retirada").removeClass("activeLc");
            $("#gerencia").removeClass("activeGer");
            $("#controleComida").removeClass("activeCC");
            $("#adicionar").removeClass("activeADC");
            $("#editarComida").removeClass("activeEC");
            $("#orcamentos").removeClass("activeOrc");
            var img = document.querySelector("#logo");
            img.setAttribute('src', '../assets/logoG.png');
            if(window.location.pathname == "/projetofinal/esboco/index.php"){
                img.setAttribute('src', './assets/logoG.png');
            }
        }
        if (window.pageYOffset > x-1000) {
            if((window.location.pathname == "/projetofinal/esboco/index.php")) {
                $("#carrinho").addClass("active");
                $("#baixo").addClass("active");
            }
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }
});