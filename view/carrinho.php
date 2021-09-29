<?php
require_once '../model/comida.php';
require_once '../model/login.php';
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
  <title>Carrinho</title>
</head>

<body>
  <!-- Navegação -->
  <div id="cima">
      <div class="navegacao">
        <a href="./perfilCli.php" id="perfil">
        <img src="../assets/perfil.png" alt="perfil" class="perfil">
      </a>
        <a href="./login.php" id="login">
        <img src="../assets/login.png" alt="Login/Cadastro" class="login">
      </a>
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
  <!-- Carrinho -->
  <div id="telaCarrinho">
    <form  id="myForm"  action="../controller/controlePedido.php?acao=cadastrar" method="post">
    <?php $valorTotal = 0;?>
    <?php if(isset($_SESSION['carrinho'] )){ foreach($_SESSION['carrinho'] as $key => $value){?>
      <table class="tabela">
        <div class="row">
          <tr>
            <th class="col-3">
              <p><?php echo $value['nome'];?></p>
            </th>
            <th class="col-4">
              <div class="row">
                <p class="descri"></p>
                <a href="?decrementar=<?php echo $value['id']; ?>" class="col-3 btnAd">
                  <img src="../assets/btnMe.png" class="btnMe" alt="Menos">
                </a>
                <p class="col-4 meio"><?php echo $value['quantidade'];?></p>
                <a href="?adicionar=<?php echo $value['id']; ?>" class="col-4 btnAd">
                  <img src="../assets/btnMa.png" class="btnMa" alt="Mais">
                </a>
              </div>
            </th>
            <th class="col-4">
              <?php $valorTotal += ($value['quantidade']*$value['valor']); ?>
              <p>R$ <?php echo ($value['quantidade']*$value['valor']);?></p>
            </th>
          </tr>
        </div>
      </table>
      <?php }}?>
      <!-- Limite -->
      <div class="observacao">
        <label for="observacao">Observações:</label>
        <textarea name="observacao" id="observacao"></textarea>
      </div>
      <div class="valorTotal">
        <div class="row">
          <p class="col-3 space"></p>
          <p class="col-4 txt">Total: </p>
          <p class="col-5 valor"> <label for="valor"> R$ <?php echo $valorTotal ?></label></p>
        </div>
      </div>
      <div class="button">
        <button type="button" onclick="verificaLogin()" >Comfirmar Pedido</button>
      </div>
      <input type="text" id="valor" name="valor" value="<?php echo $valorTotal?>" hidden>
    </form>
  </div>
  <!-- /Carrinho -->
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
  <!-- PHP -->
  <?php 
    if(isset($_GET['adicionar'])){
      $idComida = (int) $_GET['adicionar'];
        if(isset($_SESSION['carrinho'][$idComida])){
          $_SESSION['carrinho'][$idComida]['quantidade']++;
          header('location: ./carrinho.php');
        }
      }

    if(isset($_GET['decrementar'])){
      $idComida = (int) $_GET['decrementar'];
        if(isset($_SESSION['carrinho'][$idComida])){
          if($_SESSION['carrinho'][$idComida]['quantidade'] == 1){
              unset($_SESSION['carrinho'][$idComida]);
              header('location: ../index.php');
          }else{
            $_SESSION['carrinho'][$idComida]['quantidade']--;
            header('location: ./carrinho.php');
          }
        }
      }
       //Verifica Login 
       if(isset($_SESSION['logado'])){
        echo '<script>
        document.getElementById("login").style.display = "none";
        </script>';
      }else{
        echo '<script>
        document.getElementById("perfil").style.display = "none";
        </script>'; 
      }
      $log = isset($_SESSION['logado']) ? 'S' : 'N';
    ?>
  <!-- /PHP -->
  <script>
    function verificaLogin(){
      var logado = "<?php echo $log; ?>";
      if(logado == 'N'){
        window.location.replace("./login.php");
        alert("Efetue o login antes de prosseguir!!");
      }else{
        document.getElementById("myForm").submit();
      }
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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