<?php
require_once '../model/pedido.php';
require_once '../model/login.php';
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
    <title>Orçamentos</title>
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
    <!-- Orcamentos -->
    <div id="orcamentos">
        <div class="detalhes">
            <div class="row">
                <?php if (isset($_SESSION["loginsOrca"]) && isset($_SESSION["pedidosOrca"]) && isset($_SESSION["arrayComidasOrca"])) {
                    $logins = $_SESSION["loginsOrca"];
                    $pedidos = $_SESSION["pedidosOrca"];
                    $arrayComidas = $_SESSION["arrayComidasOrca"];
                    $comidas = $_SESSION["comidas"];
                    $resposta = "";
                    $total = 0;
                    $liberado = 0; ?>
                    <?php foreach ($logins as $login) {
                        foreach ($pedidos as $pedido) {
                            if ($login->getCpf() == $pedido->getIdCliente()) {
                                if ($pedido->getStatus() == "Pago") {
                                    $liberado = $liberado + $pedido->getValor();
                                }
                                $total = $total + $pedido->getValor();
                            }
                        }
                    } ?>
                    <h3 class="col-4">Liberado: </h3>
                    <h3 class="col-7 valor">R$ <?php echo $liberado; ?></h3>
                    <h5 class="col-4">Total: </h5>
                    <h5 class="col-7 valor">R$ <?php echo $total; ?></h5>
            </div>
        </div>

        <?php foreach ($logins as $login) { 
            $resposta = 0;?>
            <div class="cliente">
                <h3><?php echo $login->getNome(); ?></h3>
            </div>
            <div class="separa row">
                <?php foreach ($pedidos as $pedido) { ?>
                    <?php if ($login->getCpf() == $pedido->getIdCliente()) {
                                $resposta = 1; 
                                if($pedido->getStatus() == "Pago"){
                                    $status = "pago";
                                }else{
                                    $status = "pendente";
                                }?>
                        <div class="card col-lg-3 col-5 <?php echo $status;?>">
                            <h4 class="first">Forma: <?php echo $pedido->getFormaPagamento(); ?></h4>
                            <h3 class="terceiro">Total: <?php echo $pedido->getValor(); ?></h3>
                        </div>
                <?php }
                        }
                        if (!$resposta) {
                            $resposta = "cliente ainda não efetuou nenhum pedido!";
                        } else {
                            $resposta = "";
                        } ?>
                <h3 class="resposta"><?php echo $resposta; ?></h3>
            </div>
    <?php   }
                } ?>
    </div>
    <!-- /Orcamentos -->
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

</html>