<?php
require_once '../model/login.php';
session_start();
$login = $_SESSION['logado'];
if (isset($_SESSION['azul'])) {
  $cor = $_SESSION['azul'];
} else if (isset($_SESSION['preto'])) {
  $cor = $_SESSION['preto'];
}
?>
<!DOCTYPE html>
<html lang="pt br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/main.css">
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
  <title>Perfil</title>
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
    <a href="../cardapio.php">
      <img src="../assets/voltar.png" alt="voltar" class="voltar">
    </a>
  </div>
  <!-- /Navegação -->
  <!-- PerfilCliente -->
  <div id="cliente">
    <?php if($login->getPerfil() == "ADM"){?>
      <button onclick="window.location.replace('./gerenciamento.php')">ADM</button>
    <?php }?>
    <button onclick="window.location.replace('./newEndereco.php')">Cadastrar novo Endereço</button>
    <button onclick="window.location.replace('../controller/controleEndereco.php?acao=listarClientePerfil')">Meus Endereços</button>
    <button onclick="window.location.replace('../controller/controleArrayComida.php?acao=recuperar')">Historico de Pedidos</button>
    <div class="cores">
      <div class="row">
        <button class="azul col-4" onclick="window.location.replace('../script/tema.php?acao=azul');"></button>
        <button class="vermelha col-4" onclick="window.location.replace('../script/tema.php?acao=padrao');"></button>
        <button class="preto col-4" onclick="window.location.replace('../script/tema.php?acao=preto');"></button>
      </div>
    </div>
    <button onclick="window.location.replace('../controller/controleLogin.php?acao=deslogar')">Deslogar</button>
  </div>
  <!-- /PerfilCliente -->
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