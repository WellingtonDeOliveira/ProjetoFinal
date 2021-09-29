<?php
require_once '../model/pedido.php';
require_once '../model/arrayComida.php';
require_once '../model/comida.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>Meus Endereços</title>
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
        <a href="../index.php">
            <img src="../assets/voltar.png" alt="voltar" class="voltar">
        </a>
    </div>
    <!-- /Navegação -->
    <!-- HistoricoCliente -->
    <div id="historicoCli">
        <?php if (isset($_SESSION["idPedidos"]) && isset($_SESSION["arrayComidas"])) {
            $pedidos = $_SESSION["idPedidos"];
            $arrayComidas = $_SESSION["arrayComidas"];
            $comidas = $_SESSION["comidas"];
            foreach ($pedidos as $pedido) { ?>
                <div class="row">
                    <h4 class="col-6 first">Forma de pagamento: <?php echo $pedido->getFormaPagamento(); ?></h4>
                    <h4 class="col-6">Status: <?php echo $pedido->getStatus(); ?></h4>
                    <div class="itens">
                        <h5>Itens:</h5>
                        <?php foreach ($arrayComidas as $itens) {
                            if ($pedido->getIdPedido() == $itens->getIdPedido()) {?>
                                <?php foreach ($comidas as $comida) {
                                if ($comida->getIdComida() == $itens->getIdComida()) { ?>
                                         
                                        <h5><?php echo $comida->getNome(); ?> X 
                                        <?php echo $itens->getQuantidade(); ?> = 
                                        <?php echo $comida->getValor() * $itens->getQuantidade(); ?></h5>
                                        <?php }
                                }
                            }
                        } ?>
                    <h3>Total: <?php echo $pedido->getValor(); ?></h3>
                </div>
            </div>
            <?php }} ?>
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