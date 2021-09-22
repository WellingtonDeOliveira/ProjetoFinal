<?php

session_start();
require_once("../model/endereco.php");
require_once("../model/enderecoDAO.php");

$acao = $_GET["acao"];
$enderecoDAO = new EnderecoDAO();

if($acao == "cadastrar"){
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $id_login = $_POST["id_login"];
    $res = true;
    $endereco = new Endereco();
    $endereco->setCep($cep);
    $endereco->setRua($rua);
    $endereco->setNumero($numero);
    $endereco->setBairro($bairro);
    $endereco->setIdLogin($id_login);
    $enderecoDAO->inserir($endereco);
    header('Location: ../index.html');
}else if($acao == "listar"){
    $_SESSION["enderecos"] = $enderecoDAO->recuperarTodos();

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "excluir"){
    $id = $_GET["id"];
    $endereco = new Endereco();
    $endereco->setId($id);
    $enderecoDAO->excluir($endereco);
    header('Location: ../controller/controleEndereco.php?acao=listar');
}else if($acao == "atualizar"){
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $id_login = $_POST["id_login"];
    $endereco = new Endereco();
    $endereco->setCep($cep);
    $endereco->setRua($rua);
    $endereco->setNumero($numero);
    $endereco->setBairro($bairro);
    $endereco->setIdLogin($id_login);
    $enderecoDAO->atualizar($endereco);
    header('Location: ../controller/controleComida.php?acao=listar');
}
?>