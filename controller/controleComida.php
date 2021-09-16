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
    header('Location: ../index.html');
}else if($acao == "listar"){
    $_SESSION["comidas"] = $comidaDAO->recuperarTodos();

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "excluir"){
    $id = $_GET["id"];
    $comida = new Comida();
    $comida->setId($id);
    $comidaDAO->excluir($comida);
    header('Location: ../controller/controleComida.php?acao=listar');
}else if($acao == "recuperar"){
    $nome = $_GET["nome"];
    $comida = $comidaDAO->recuperarPorNome($nome);
    $_SESSION["comida"] = $comida;

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
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