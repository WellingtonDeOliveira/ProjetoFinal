<?php
session_start();
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
  <title>Document</title>
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
  <!-- Endereço -->]
  <div id="endereco">
    <div class="endereco">
      <h1>Cadastrar Endereço</h1>
      <form action="../controller/controleEndereco.php?acao=cadastrar" method="post">
        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep">
        <label for="rua">Rua</label>
        <input type="text" id="rua" name="rua">
        <label for="numero">Número</label>
        <input type="text" id="numero" name="numero">
        <label for="bairro">Bairro</label>
        <input type="text" id="bairro" name="bairro">
        <button type="submit">Confirmar Endereço</button>
      </form>
    </div>
  </div>
  <!-- /Endereço -->
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