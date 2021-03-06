<?php
require_once './model/comida.php';
session_start();
$comidas = $_SESSION["comidas"];
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
  <link type="text/css" rel="stylesheet" href="./style/main.css">
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
      document.documentElement.style.setProperty('--segunda', '#000000');
      document.documentElement.style.setProperty('--terceira', '#363636');
      document.documentElement.style.setProperty('--quarta', '#A9A9A9');
      document.documentElement.style.setProperty('--quinta', '#808080');
      document.documentElement.style.setProperty('--sexta', '#E0E5E6');
      document.documentElement.style.setProperty('--setima', '#BEC9CA');
    }
  </script>
  <title>Cardápio</title>
</head>

<body>
  <!-- Navegação -->
  <div id="cima">
    <div class="navegacao">
      <a href="./view/perfilCli.php" id="perfil">
        <img src="./assets/perfil.png" alt="perfil" class="perfil">
      </a>
      <a href="./view/login.php" id="login">
        <img src="./assets/login.png" alt="Login/Cadastro" class="login">
      </a>
      <a href="cardapio.php">
        <img src="./assets/logoG.png" alt="Logo" class="logo" id="logo">
      </a>
    </div>
  </div>
  <!-- /Navegação -->
  <!-- Pesquisa -->
  <div id="filtro">
    <div class="row">
      <form action="#" class="col-lg-8 col-10">
        <label class="titulo">Filtrar Cardápio: </label>
        <select id="filtroComidas" name="comidas">
          <option value="0"></option>
          <option value="carnes">Carnes</option>
          <option value="massas">Massas</option>
          <option value="sobremesa">Sobremesas</option>
          <option value="bebidas">Bebidas</option>
        </select>
      </form>
      <input type="text" name="pesquisar" id="pesquisar" class="col-lg-3 col-0">
      <a class="col-lg-1 col-2">
        <img src="./assets/lupa.png" alt="Pesquisar" class="lupa">
      </a>
    </div>
  </div>
  <script>
    var y = document.documentElement.scrollWidth;
    if(!(y > 500)){
      document.getElementById("pesquisar").style.display = "none";  
    }
  </script>
  <!-- /Pesquisa -->
  <!-- Cardápio -->
  <div id="cardapio">
    <div class="fil" id="carnes">
      <h2 tag="carnes">
        Carnes
      </h2>
      <?php foreach ($comidas as $comida) { ?>
        <?php if ($comida->getCategoria() == "carne") { ?>
          <div class="card">
            <a href="./controller/controleComida.php?acao=recuperarPorId&id_comida=<?php echo $comida->getIdComida(); ?>">
              <div class="row">
                <div class="textos col-8">
                  <h3 class="titulo"><?php echo $comida->getNome(); ?></h3>
                  <p class="descricao"><?php echo $comida->getDescricao(); ?></p>
                  <p class="valor">R$ <?php echo $comida->getValor(); ?></p>
                </div>
                <div class="imagem col-4">
                  <img src="./assets/comidas/<?php echo $comida->getImagem(); ?>" alt="Prato" class="prato">
                </div>
              </div>
            </a>
          </div>
      <?php }
      } ?>
    </div>
    <div class="fil" id="massas">
      <h2 tag="massas">
        Massas
      </h2>
      <?php foreach ($comidas as $comida) { ?>
        <?php if ($comida->getCategoria() == "massa") { ?>
          <div class="card">
            <a href="./controller/controleComida.php?acao=recuperarPorId&id_comida=<?php echo $comida->getIdComida(); ?>">
              <div class="row">
                <div class="textos col-8">
                  <h3 class="titulo"><?php echo $comida->getNome(); ?></h3>
                  <p class="descricao"><?php echo $comida->getDescricao(); ?></p>
                  <p class="valor">R$ <?php echo $comida->getValor(); ?></p>
                </div>
                <div class="imagem col-4">
                  <img src="./assets/comidas/<?php echo $comida->getImagem(); ?>" alt="Prato" class="prato">
                </div>
              </div>
            </a>
          </div>
      <?php }
      } ?>
    </div>
    <div class="fil" id="sobremesas">
      <h2 tag="sobremesas">
        Sobremesas
      </h2>
      <?php foreach ($comidas as $comida) { ?>
        <?php if ($comida->getCategoria() == "sobremesa") { ?>
          <div class="card">
            <a href="./controller/controleComida.php?acao=recuperarPorId&id_comida=<?php echo $comida->getIdComida(); ?>">
              <div class="row">
                <div class="textos col-8">
                  <h3 class="titulo"><?php echo $comida->getNome(); ?></h3>
                  <p class="descricao"><?php echo $comida->getDescricao(); ?></p>
                  <p class="valor">R$ <?php echo $comida->getValor(); ?></p>
                </div>
                <div class="imagem col-4">
                  <img src="./assets/comidas/<?php echo $comida->getImagem(); ?>" alt="Prato" class="prato">
                </div>
              </div>
            </a>
          </div>
      <?php }
      } ?>
    </div>
    <div class="fil" id="bebidas">
      <h2 tag="bebidas">
        Bebidas
      </h2>
      <?php foreach ($comidas as $comida) { ?>
        <?php if ($comida->getCategoria() == "bebida") { ?>
          <div class="card">
            <a href="./controller/controleComida.php?acao=recuperarPorId&id_comida=<?php echo $comida->getIdComida(); ?>">
              <div class="row">
                <div class="textos col-8">
                  <h3 class="titulo"><?php echo $comida->getNome(); ?></h3>
                  <p class="descricao"><?php echo $comida->getDescricao(); ?></p>
                  <p class="valor">R$ <?php echo $comida->getValor(); ?></p>
                </div>
                <div class="imagem col-4">
                  <img src="./assets/comidas/<?php echo $comida->getImagem(); ?>" alt="Prato" class="prato">
                </div>
              </div>
            </a>
          </div>
      <?php }
      } ?>
    </div>
  </div>
  <!-- /cardápio -->
  <!-- carrinho -->
  <div id="carrinho">
    <a href="./view/carrinho.php">
      <div class="row">
        <h2 class="titulo col-7">Meu carrinho</h2>
        <h2 class="preco col-5">R$
          <?php $valorTotal = 0;
          if (isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $key => $value) {
              $valorTotal += ($value['quantidade'] * $value['valor']);
            }
            echo $valorTotal;
          } else {
            echo $valorTotal;
          }
          ?>
        </h2>
      </div>
    </a>
  </div>
  <!-- /carrinho -->
  <!-- baixo -->
  <footer class="footer navbar-fixed-bottom">
    <div id="baixo">
      <div class="fimpag">
        <h2 class="titulo">Le chef</h2>
        <h2 class="titulo">Rua fulano de tal, 100, Aldeota</h2>
        <div class="contato">
          <a href="#">
            <img src="./assets/zap.png" alt="Whatsapp" class="zap">
          </a>
          <a href="#">
            <img src="./assets/insta.png" alt="Instagram" class="insta">
          </a>
        </div>
      </div>
    </div>
  </footer>
  <!-- /baixo -->
  <?php
  //Verifica Login 
  if (isset($_SESSION['logado'])) {
    echo '<script>
      document.getElementById("login").style.display = "none";
      </script>';
  } else {
    echo '<script>
      document.getElementById("perfil").style.display = "none";
      </script>';
  }
  ?>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="./script/eventos.js"></script>
  <script type="text/javascript" src="./script/filtro.js"></script>
  <script type="text/javascript" src="script/main.js"></script>
</body>

</html>