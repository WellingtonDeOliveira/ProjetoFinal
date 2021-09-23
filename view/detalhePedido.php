<?php
require_once '../model/comida.php';
session_start();
$comida = $_SESSION["comidad"];
?>
<!DOCTYPE html>
<html lang="pt br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/main.css">
  <title>Detalhes</title>
</head>

<body>
  <!-- Navegação -->
  <div id="cima">
    <div class="navegacao">
      <a href="login.html">
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
  <!-- Detalhes Pedido -->
  <div id="detalhes">
    <div class="detalhes container">
      <div class="imagem">
        <img src=".<?php echo $comida->getImagem(); ?>" alt="Prato" class="pratoPedido">
      </div>
      <div class="textos">
        <h1 class="titulo"><?php echo $comida->getNome(); ?></h1>
        <h2 class="subtitulo"><?php echo $comida->getDescricao(); ?></h2>
        <h2 class="valor">R$ <?php echo $comida->getValor(); ?></h2>
      </div>
      <a href="?adicionar=<?php echo $comida->getIdComida(); ?>">Adicionar ao carrinho</a>
    </div>
  </div>
  <!-- /Detalhes Pedido -->
  <!-- carrinho -->
  <div id="carrinho">
    <a href="./carrinho.php">
      <div class="row">
        <h2 class="titulo col-7">Meu carrinho</h2>
        <h2 class="preco col-5">R$ 
        <?php $valorTotal = 0;if(isset($_SESSION['carrinho'])){foreach($_SESSION['carrinho'] as $key => $value){
          $valorTotal += ($value['quantidade']*$value['valor']); } echo $valorTotal;}else{echo $valorTotal;}
        ?>
        </h2>
      </div>
    </a>
  </div>
  <!-- /carrinho -->
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
  <!-- Logica Carrinho -->
  <?php 
    if(isset($_GET['adicionar'])){
      // Adicionando ao carrinho
      $idComida = (int) $_GET['adicionar'];
      if($idComida == $comida->getIdComida()){
        if(isset($_SESSION['carrinho'][$idComida])){
          $_SESSION['carrinho'][$idComida]['quantidade']++;
          header('location: http://localhost/projetofinal/esboco/controller/controleComida.php?acao=listar');
        }else{
          $_SESSION['carrinho'][$idComida] = array('quantidade'=>1,'nome'=>$comida->getNome(),
           'valor'=>$comida->getValor(), 'id'=>$comida->getIdComida());
           header('location: http://localhost/projetofinal/esboco/controller/controleComida.php?acao=listar');
        }
      }else{
        die('Você não pode adicionar uma comida que não existe dentro desta página');
      }
    }
  ?>
  <!-- /Logica Carrinho -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../script/main.js"></script>
</body>

</html>