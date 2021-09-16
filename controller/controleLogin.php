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
}else{
    echo 'Não deu certo';
}
    /*else if($acao == "listar"){
    $_SESSION["contatos"] = $contatoDAO->recuperarTodos();
    header('Location: ../view/listarTodos.php');
}else if($acao == "excluir"){
    $id = $_GET["id"];
    $contato = new Contato();
    $contato->setId($id);
    $contatoDAO->excluir($contato);
    header('Location: ../controller/controle.php?acao=listar');
}else if($acao == "recuperar"){
    $id = $_GET["id"];
    $contato = $contatoDAO->recuperarPorId($id);
    $_SESSION["contato"] = $contato;
    header('Location: ../view/formEdicaoContato.php');
}else if($acao == "c"){
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $contato = new Contato();
    $contato->setId($id);
    $contato->setNome($nome);
    $contato->setTelefone($telefone);
    $contatoDAO->atualizar($contato);
    header('Location: ../controller/controle.php?acao=listar');
}*/

?>