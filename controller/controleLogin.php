<?php

session_start();
require_once("../model/login.php");
require_once("../model/loginDAO.php");

$acao = $_GET["acao"];
$loginDAO = new LoginDAO();

if($acao == "cadastrar"){
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
    $perfil = "Cliente";
    $res = true;
    $login = new Login();
    $login->setCpf($cpf);
    $login->setNome($nome);
    $login->setEmail($email);
    $login->setSenha($senhaSegura);
    $login->setPerfil($perfil);
    $loginDAO->inserir($login);
    header('Location: ../controller/controleLogin.php?acao=logarCad&email='.$email.'&senha='.$senha);
}else if($acao == "logar"){
    $email = $_POST["login_email"];
    $senha = $_POST["login_senha"];
    
    $login = new Login();
    $login->setEmail($email);
    $login->setSenha($senha);
    $resposta = $loginDAO->verificar($login);
    if($resposta->getCpf() == null){
        echo '<script>
                window.location.replace("../view/login.php");
                alert("Usuario não cadastrado!!");
            </script>';
    }else{
        $_SESSION["logado"] = $loginDAO->verificar($login);
        $_SESSION["ID_login"]= $_SESSION["logado"]->getCpf();
        header('Location: ../cardapio.php');
    }
}else if($acao == "logarCad"){
    $email = $_GET["email"];
    $senha = $_GET["senha"];
    $login = new Login();
    $login->setEmail($email);
    $login->setSenha($senha);
    $resposta = $loginDAO->verificar($login);
    if($resposta->getCpf() == null){
        echo '<script>
                window.location.replace("../view/login.php");
                alert("Usuario não cadastrado!!");
            </script>';
    }else{
        $_SESSION["logado"] = $loginDAO->verificar($login);
        $_SESSION["ID_login"]= $_SESSION["logado"]->getCpf();
        header('Location: ../cardapio.php');
    }
}else if($acao == "listar"){
    $_SESSION["logins"] = $loginDAO->recuperarTodos();
    header('Location: ../view/controleUsuario.php');
}else if($acao == "listarOrca"){
    $_SESSION["loginsOrca"] = $loginDAO->recuperarTodos();
    header('Location: ./controlePedido.php?acao=listarOrca');
}else if($acao == "excluir"){
    $cpf = $_GET["cpf_cliente"];
    $login = new Login();
    $login->setCpf($cpf);
    $loginDAO->excluir($login);
    header('Location: ../view/gerenciamento.php');
}else if($acao == "recuperar"){
    $cpf = $_GET["cpf"];
    $login = $loginDAO->recuperarPorCpf($cpf);
    $_SESSION["login"] = $login;

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "atualizar"){
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $perfil = $_POST["perfil"];
    $login = new Login();
    $login->setCpf($cpf);
    $login->setNome($nome);
    $login->setEmail($email);
    $login->setSenha($senha);
    $login->setPerfil($perfil);
    $loginDAO->atualizar($login);
    header('Location: ../controller/controleLogin.php?acao=listar');
}else if($acao == "deslogar"){
    unset($_SESSION['logado']);
    unset($_SESSION['ID_login']);
    unset($_SESSION['carrinho']);
    unset($_SESSION['azul']);
    unset($_SESSION['preto']);
    header('Location: ../index.php');
}
?>
