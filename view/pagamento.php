<!DOCTYPE html>
<html lang="pt br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>Pagamento</title>
</head>

<body>
    <!-- Navegação -->
    <div id="cima">
        <div class="navegacao">
            <a href="../index.php">
                <img src="../assets/logoG.png" alt="Logo" class="logo" id="logo">
            </a>
        </div>
    </div>
    <div class="voltar" id="voltar">
        <a href="./carrinho.php">
            <img src="../assets/voltar.png" alt="voltar" class="voltar">
        </a>
    </div>
    <!-- /Navegação -->
    <!-- Pagamento -->
    <div id="pagamento">
        <div class="pagamento">
            <h1>Forma de Pagamento</h1>
            <div class="row">
                <h3 class="col-4">Pagamento em Espécie?</h3>
                <label for="sim" class="col-2">Sim</label>
                <input type="radio" class="col-2" name="btnEsc" id="btnSim" value="Sim">
                <label for="nao" class="col-2">Não</label>
                <input type="radio" class="col-2" name="btnEsc" id="btnNao" value="Nao" checked>
            </div>
            <form action="../index.html" method="post" class="cartao" id="cartao">
                <h2>Adicionar Cartão</h2>
                <label for="nome">Nome</label>
                <input type="text">
                <label for="numeroCartao">Número Cartão</label>
                <input type="text">
                <label for="validade" class="mod">Validade</label>
                <input type="text" class="mod">
                <label for="cvv" class="mod2">CVV</label>
                <input type="text" class="mod2">
                <label for="valorT" class="mod8">Valor Total:</label>
                <label for="valor" class="mod9">R$ 129,99</label>
                <input type="submit" class="mod10" value="Confirmar Pagamento">
            </form>
            <form action="../index.html" method="post" class="dinheiro" id="dinheiro">
                <h2>Pagamento em Espécie</h2>
                <label for="nome" class="mod1">Troco?</label>
                <label for="sim" class="mod2">Sim</label>
                <input type="radio" class="mod3" name="btnTroco" id="btnTrSim">
                <label for="nao" class="mod4">Não</label>
                <input type="radio" class="mod5" name="btnTroco" id="btnTrNao">
                <label for="quanto" class="mod6">Quanto?</label>
                <input type="text" class="mod7">
                <label for="valorT" class="mod8">Valor Total:</label>
                <label for="valor" class="mod9">R$ 129,99</label>
                <input type="submit" class="mod10" value="Confirmar Pagamento">
            </form>
        </div>
    </div>
    <!-- /Pagamento -->
    <!-- baixo -->
    <div id="baixo">
        <div class="fimpag">
            <h2 class="titulo">Le chef</h2>
            <h2 class="titulo">Rua fulano de tal, 100, Aldeota</h2>
            <div class="contato">
                <a href="#">
                    <img src="../assets/zap.png" alt="Whatsapp" class="zap">
                </a>
                <a href="#">
                    <img src="../assets/insta.png" alt="Instagram" class="insta">
                </a>
            </div>
        </div>
    </div>
    <!-- /baixo -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../script/eventos.js"></script>
    <script src="../script/main.js"></script>
</body>

</html>