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
    $perfil = $_POST["perfil"];
    $res = true;
    $login = new Login();
    $login->setCpf($cpf);
    $login->setNome($nome);
    $login->setEmail($email);
    $login->setSenha($senha);
    $login->setPerfil($perfil);
    $loginDAO->inserir($login);
    header('Location: ../index.html');
}else if($acao == "logar"){
    $email = $_POST["email"];
    $senha = $_POST["senha"];
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
        header('Location: ../index.php');
    }
}else if($acao == "listar"){
    $_SESSION["logins"] = $loginDAO->recuperarTodos();

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "excluir"){
    $cpf = $_GET["cpf"];
    $login = new Login();
    $login->setCpf($cpf);
    $loginDAO->excluir($login);
    header('Location: ../controller/controleLogin.php?acao=listar');
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
}
?>
