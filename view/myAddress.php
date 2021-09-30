<?php
require_once '../model/endereco.php';
session_start();
$enderecos = $_SESSION["enderecosCliente"];
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
    <!-- Address -->
    <div id="address">
        <?php if (isset($_SESSION["enderecosCliente"])) {
            foreach ($enderecos as $endereco) { ?>
                <div class="row">
                    <h4 class="col-3 first">Rua: <?php echo $endereco->getRua(); ?></h4>
                    <h4 class="col-3">N°: <?php echo $endereco->getNumero(); ?></h4>
                    <h4 class="col-3">Bairro: <?php echo $endereco->getBairro(); ?></h4>
                    <h4 class="col-3 back">CEP: <?php echo $endereco->getCep(); ?></h4>
                </div>
        <?php }
        } ?>
    </div>
    <!-- /Address -->
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
    document.documentElement.style.setProperty('--segunda', '##000000');
    document.documentElement.style.setProperty('--terceira', '#363636');
    document.documentElement.style.setProperty('--quarta', '#A9A9A9');
    document.documentElement.style.setProperty('--quinta', '#808080');
    document.documentElement.style.setProperty('--sexta', '#E0E5E6');
    document.documentElement.style.setProperty('--setima', '#BEC9CA');
  }
</script>
</html>