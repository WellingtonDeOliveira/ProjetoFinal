<?php

require_once("../model/arrayComida.php");
require_once("../model/arrayComidaDAO.php");
session_start();

$acao = $_GET["acao"];
$arrayComidaDAO = new ArrayComidaDAO();

if($acao == "cadastrar"){
    foreach($_SESSION['carrinho'] as $key => $value){
        $id_comida = $value['id'];
        $quantidade = $value['quantidade'];
        $id_pedido = $_SESSION["idPedido"];
        $res = true;
        $arrayComida = new ArrayComida();
        $arrayComida->setIdComida($id_comida);
        $arrayComida->setQuantidade($quantidade);
        $arrayComida->setIdPedido($id_pedido);
        $arrayComidaDAO->inserir($arrayComida);
    }
    header('Location: ../controller/controleEndereco.php?acao=listarCliente');
}else if($acao == "excluir"){
    $id_array = $_GET["id_array"];
    $arrayComida = new ArrayComida();
    $arrayComida->setIdArray($id_array);
    $arrayComidaDAO->excluir($arrayComida);
    header('Location: ../controller/controleArrayComida.php?acao=recuperar');
}else if($acao == "recuperar"){
    $arrayComidas = $arrayComidaDAO->recuperar();
    $_SESSION["arrayComidas"] = $arrayComidas;
    header('Location: ../controller/controlePedido.php?acao=recuperarIdHistorico');
}else if($acao == "listarOrca"){
    $arrayComidas = $arrayComidaDAO->recuperar();
    $_SESSION["arrayComidasOrca"] = $arrayComidas;
    header('Location: ../view/orcamento.php');
}else if($acao == "atualizar"){
    $id_array = $_GET["id_array"];
    $id_comida = $_POST["id_comida"];
    $quantidade = $_POST["quantidade"];
    $id_pedido = $_POST["id_pedido"];
    $arrayComida = new ArrayComida();
    $arrayComida->setIdArray($id_array);
    $arrayComida->setIdComida($id_comida);
    $arrayComida->setQuantidade($quantidade);
    $arrayComida->setIdPedido($id_pedido);
    $arrayComidaDAO->atualizar($arrayComida);
    header('Location: ../controller/controleLogin.php?acao=listar');
}
?>