<?php

session_start();
require_once("../model/arrayComida.php");
require_once("../model/arrayComidaDAO.php");

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
    header('Location: ../view/pagamento.php');
}else if($acao == "excluir"){
    $id_array = $_GET["id_array"];
    $arrayComida = new ArrayComida();
    $arrayComida->setIdArray($id_array);
    $arrayComidaDAO->excluir($arrayComida);
    header('Location: ../controller/controleArrayComida.php?acao=recuperar');
}else if($acao == "recuperar"){
    $id_pedido = $_GET["id_pedido"];
    $arrayComida = $arrayComidaDAO->recuperarPorIdPedido($id_pedido);
    $_SESSION["arrayComida"] = $arrayComida;

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
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