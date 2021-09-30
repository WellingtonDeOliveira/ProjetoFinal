<?php
session_start();
if (isset($_SESSION['azul'])) {
  $cor = $_SESSION['azul'];
} else if (isset($_SESSION['preto'])) {
  $cor = $_SESSION['preto'];
}
$valorTotal = $_SESSION['valorTotal'];
?>
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
            <form action="../controller/controlePedido.php?acao=atualizar&tipo=cartao" method="post" class="cartao" id="cartao"  onsubmit = "return validaCampoCartao()">
            <h2>Adicionar Cartão</h2>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome">
            <label for="numeroCartao">Número Cartão</label>
            <input type="text" id="numCartao" name="numCartao">
            <label for="validade" class="mod">Validade</label>
            <input type="text" class="mod" id="validade" name="validade">
            <label for="cvv" class="mod2">CVV</label>
            <input type="text" class="mod2" id="cvv" name="cvv">
            <label for="valorT" class="mod8">Valor Total:</label>
            <label for="valor" class="mod9"><?php echo $valorTotal?></label>
            <input type="text" id="troco" name="troco" hidden>
            <input type="submit" class="mod10" value="Confirmar Pagamento">
            <input type="text" id="id_endereco" name="id_endereco" value="<?php echo $_GET["id_endereco"]; ?>" hidden>
        </form>
        <form action="../controller/controlePedido.php?acao=atualizar&tipo=dinheiro" method="post" class="dinheiro" id="dinheiro">
        <h2>Pagamento em Espécie</h2>
        <label for="nome" class="mod1">Troco?</label>
                <label for="sim" class="mod2">Sim</label>
                <input type="radio" class="mod3" name="btnTroco" id="btnTrSim">
                <label for="nao" class="mod4">Não</label>
                <input type="radio" class="mod5" name="btnTroco" id="btnTrNao">
                <label for="quanto" class="mod6">Quanto?</label>
                <input type="text" id="troco" name="troco" class="mod7">
                <label for="valorT" class="mod8">Valor Total:</label>
                <label for="valor" class="mod9"><?php echo $valorTotal?></label>
                <input type="submit" class="mod10" value="Confirmar Pagamento">
                <input type="text" id="id_endereco" name="id_endereco" value="<?php echo $_GET["id_endereco"]; ?>" hidden>
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
    <script src="../script/validacao.js"></script>
    <script src="../script/eventos.js"></script>
    <script src="../script/main.js"></script>
</body>
<script>
  var cor = "<?php echo $cor ?>";
  if(cor == "azul"){
    document.documentElement.style.setProperty('--primeira', '#483D8B');
    document.documentElement.style.setProperty('--segunda', '#000080');
    document.documentElement.style.setProperty('--terceira', '#4169E1');
    document.documentElement.style.setProperty('--quarta', '#87CEFA');
    document.documentElement.style.setProperty('--quinta', '#00BFFF');
    document.documentElement.style.setProperty('--sexta', '#E0E5E6');
    document.documentElement.style.setProperty('--setima', '#BEC9CA');
  }else if(cor == "preto"){
    document.documentElement.style.setProperty('--primeira', '#1C1C1C');
    document.documentElement.style.setProperty('--segunda', '#000000');
    document.documentElement.style.setProperty('--terceira', '#363636');
    document.documentElement.style.setProperty('--quarta', '#A9A9A9');
    document.documentElement.style.setProperty('--quinta', '#808080');
    document.documentElement.style.setProperty('--sexta', '#E0E5E6');
    document.documentElement.style.setProperty('--setima', '#BEC9CA');
  }
</script>
</html>