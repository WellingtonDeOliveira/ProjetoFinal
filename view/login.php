<!DOCTYPE html>
<html lang="pt br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/main.css">
  <title>Login</title>
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
  <!-- Login/Registro -->
  <div id="login">
    <div class="container">
      <h1>ENTRAR</h1>
      <form action="../controller/controleLogin.php?acao=logar" method="post">
        <label for="email">Login </label>
        <input type="text" id="email" name="email">
        <label for="senha">Senha </label>
        <input type="password" id="senha" name="senha">
        <label></label>
        <button type="submit">Entrar</button>
      </form>
      <h1 class="registro">REGISTRE-SE</h1>
      <form action="../controller/controleLogin.php?acao=cadastrar"  method="post" onsubmit = "return validaCampoCadastro()">
        <label for="nome">Nome </label>
        <input type="text" id="nome" name="nome">
        <label for="email">Email </label>
        <input type="text" id="email" name="email">
        <label for="cpf">CPF </label>
        <input type="text" id="cpf" name="cpf">
        <label for="senha">Senha </label>
        <input type="password" id="senha" name="senha">
        <label for="conSenha">Confirmar </label>
        <input type="password">
        <label></label>
        <button type="submit">Registrar-se</button>
      </form>
    </div>
  </div>
  <!-- /Login/Registro -->
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
  <script src="../script/validacao.js"></script>
  <script src="../script/main.js"></script>
</body>

</html>