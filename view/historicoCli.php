<?php
require_once '../model/pedido.php';
require_once '../model/arrayComida.php';
require_once '../model/comida.php';
session_start();
if (isset($_SESSION['azul'])) {
    $cor = $_SESSION['azul'];
} else if (isset($_SESSION['preto'])) {
    $cor = $_SESSION['preto'];
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <script>
        var cor = "<?php echo $cor ?>";
        if (cor == "azul") {
            document.documentElement.style.setProperty('--primeira', '#483D8B');
            document.documentElement.style.setProperty('--segunda', '#000080');
            document.documentElement.style.setProperty('--terceira', '#4169E1');
            document.documentElement.style.setProperty('--quarta', '#87CEFA');
            document.documentElement.style.setProperty('--quinta', '#00BFFF');
            document.documentElement.style.setProperty('--sexta', '#E0E5E6');
            document.documentElement.style.setProperty('--setima', '#BEC9CA');
        } else if (cor == "preto") {
            document.documentElement.style.setProperty('--primeira', '#1C1C1C');
            document.documentElement.style.setProperty('--segunda', '##000000');
            document.documentElement.style.setProperty('--terceira', '#363636');
            document.documentElement.style.setProperty('--quarta', '#A9A9A9');
            document.documentElement.style.setProperty('--quinta', '#808080');
            document.documentElement.style.setProperty('--sexta', '#E0E5E6');
            document.documentElement.style.setProperty('--setima', '#BEC9CA');
        }
    </script>
    <title>Historico Cliente</title>
</head>

<body>
    <!-- Navegação -->
    <div id="cima">
        <div class="navegacao">
            <a href="../cardapio.php">
                <img src="../assets/logoG.png" alt="Logo" class="logo" id="logo">
            </a>
        </div>
    </div>
    <div class="voltar" id="voltar">
        <a href="./perfilCli.php">
            <img src="../assets/voltar.png" alt="voltar" class="voltar">
        </a>
    </div>
    <!-- /Navegação -->
    <!-- HistoricoCliente -->
    <div id="historicoCli">
        <?php if (isset($_SESSION["idPedidos"]) && isset($_SESSION["arrayComidas"])) {
            $pedidos = $_SESSION["idPedidos"];
            $arrayComidas = $_SESSION["arrayComidas"];
            $comidas = $_SESSION["comidas"]; ?>
            <div class="separaCard row">
                <?php foreach ($pedidos as $pedido) { ?>
                    <?php if($pedido->getStatus() == "Pago"){
                                    $status = "pago";
                                }else{
                                    $status = "pendente";
                                }?>
                    <div class="card col-lg-3 col-5 <?php echo $status;?>">
                        <h4 class="first">Forma de pagamento:</h4>
                        <h4 class="first"><?php echo $pedido->getFormaPagamento(); ?></h4>
                        <div class="itens">
                            <h5 class="itens">Itens:</h5>
                            <?php foreach ($arrayComidas as $itens) {
                                if ($pedido->getIdPedido() == $itens->getIdPedido()) { ?>
                                    <?php foreach ($comidas as $comida) {
                                        if ($comida->getIdComida() == $itens->getIdComida()) { ?>
                                            <h5><?php echo $comida->getNome(); ?> X
                                                <?php echo $itens->getQuantidade(); ?> =
                                                <?php echo $comida->getValor() * $itens->getQuantidade(); ?></h5>
                            <?php }
                                    }
                                }
                            } ?>
                            <h3 class="valor">Total: <?php echo $pedido->getValor(); ?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <!-- /HistoricoCliente -->
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
    <script src="../script/main.js"></script>
</body>

</html>