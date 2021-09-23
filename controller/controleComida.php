<?php

session_start();
require_once("../model/comida.php");
require_once("../model/comidaDAO.php");

$acao = $_GET["acao"];
$comidaDAO = new ComidaDAO();

if($acao == "cadastrar"){
    $imagem = $_POST["imagem"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
    $nome = $_POST["nome"];
    $res = true;
    $comida = new Comida();
    $comida->setImagem($imagem);
    $comida->setDescricao($descricao);
    $comida->setValor($valor);
    $comida->setCategoria($categoria);
    $comida->setNome($nome);
    $comidaDAO->inserir($comida);
    header('Location: ../index.php');
}else if($acao == "listar"){
    $_SESSION["comidas"] = $comidaDAO->recuperarTodos();
    header('Location: ../index.php');
}else if($acao == "excluir"){
    $id_comida = $_GET["id_comida"];
    $comida = new Comida();
    $comida->setIdComida($id_comida);
    $comidaDAO->excluir($comida);
    header('Location: ../controller/controleComida.php?acao=listar');
}else if($acao == "recuperar"){
    $nome = $_GET["nome"];
    $comida = $comidaDAO->recuperarPorNome($nome);
    $_SESSION["comida"] = $comida;

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "recuperarPorId"){
    $id_comida = $_GET["id_comida"];
    $comida = $comidaDAO->recuperarPorId($id_comida);
    $_SESSION["comidad"] = $comida;
    header('Location: ../view/detalhePedido.php');
}else if($acao == "atualizar"){
    $imagem = $_POST["imagem"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
    $nome = $_POST["nome"];
    $comida = new Comida();
    $comida->setImagem($imagem);
    $comida->setDescricao($descricao);
    $comida->setValor($valor);
    $comida->setCategoria($categoria);
    $comida->setNome($nome);
    $comidaDAO->atualizar($comida);
    header('Location: ../controller/controleComida.php?acao=listar');
}
?>