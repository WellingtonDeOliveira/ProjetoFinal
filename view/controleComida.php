<?php
require_once '../model/comida.php';
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
    <title>controleComida</title>
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
        <a href="./gerenciamento.php">
            <img src="../assets/voltar.png" alt="voltar" class="voltar">
        </a>
    </div>
    <!-- /Navegação -->
    <!-- Controle Comida -->
    <div id="controleComida">
        <button onclick="window.location.replace('./adicionar.php')">Adicionar Comida</button>
        <div class="comidas">
      <?php foreach ($comidas as $comida) { ?>
          <div class="card">
              <div class="row">
                <div class="textos col-lg-4 col-6">
                  <h3 class="titulo"><?php echo $comida->getNome(); ?></h3>
                  <p class="descricao"><?php echo $comida->getDescricao(); ?></p>
                  <p class="valor">R$ <?php echo $comida->getValor(); ?></p>
                </div>
                <div class="imagem col-lg-4 col-0">
                  <img src="../assets/comidas/<?php echo $comida->getImagem(); ?>" alt="Prato" class="prato">
                </div>
                <a class="editar col-lg-2 col-3" href="../controller/controleComida.php?acao=recuperarEditar&id_comida=<?php echo $comida->getIdComida(); ?>"> Editar </a>
                <a class="excluir col-lg-2 col-3" href="../controller/controleComida.php?acao=excluir&id_comida=<?php echo $comida->getIdComida(); ?>"> Excluir </a>
            </div>
          </div>
      <?php }?>
        </div>
    </div>
    <!-- /Controle Comida -->
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