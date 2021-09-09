jQuery(document).ready(function ($) {
    
    var x = document.documentElement.scrollHeight;
    window.onscroll = function () {
        if (window.pageYOffset > 140) {
            $("#cima").addClass("active");
            $("#filtro").addClass("active");
            $("#cardapio").addClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', './assets/logoS.png');
            //alert(x);
        } else {
            $("#cima").removeClass("active");
            $("#filtro").removeClass("active");
            $("#cardapio").removeClass("active");
            var img = document.querySelector("#logo");
            img.setAttribute('src', './assets/logoG.png');
        }
        if (window.pageYOffset > x-830) {
            $("#carrinho").addClass("active");
            $("#baixo").addClass("active");
        } else {
            $("#carrinho").removeClass("active");
            $("#baixo").removeClass("active");
        }
    }

});