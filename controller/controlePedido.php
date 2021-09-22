<?php

session_start();
require_once("../model/pedido.php");
require_once("../model/pedidoDAO.php");

$acao = $_GET["acao"];
$pedidoDAO = new PedidoDAO();

if($acao == "cadastrar"){
    $id_cliente = $_POST["id_cliente"];
    $forma_pagamento = $_POST["forma_pagamento"];
    $valor = $_POST["valor"];
    $status = $_POST["status"];
    $res = true;
    $pedido = new Pedido();
    $pedido->setIdCliente($id_cliente);
    $pedido->setFormaPagamento($forma_pagamento);
    $pedido->setValor($valor);
    $pedido->setStatus($status);
    $pedidoDAO->inserir($pedido);
    header('Location: ../index.html');
}else if($acao == "listar"){
    $_SESSION["pedidos"] = $pedidoDAO->recuperarTodos();

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "excluir"){
    $id_pedido = $_GET["id_pedido"];
    $pedido = new Pedido();
    $pedido->setIdPedido($id_pedido);
    $pedidoDAO->excluir($pedido);
    header('Location: ../controller/controlePedido.php?acao=listar');
}else if($acao == "recuperar"){
    $id_cliente = $_GET["id_cliente"];
    $pedido = $pedidoDAO->recuperarPorIdCliente($id_cliente);
    $_SESSION["pedido"] = $pedido;

    /* FUTURA PAGINA */
    header('Location: ../view/.php');
}else if($acao == "atualizar"){
    $id_pedido = $_GET["id_pedido"];
    $id_cliente = $_POST["id_cliente"];
    $forma_pagamento = $_POST["forma_pagamento"];
    $valor = $_POST["valor"];
    $status = $_POST["status"];
    $pedido = new Pedido();
    $pedido->setIdPedido($id_pedido);
    $pedido->setIdCliente($id_cliente);
    $pedido->setFormaPagamento($forma_pagamento);
    $pedido->setValor($valor);
    $pedido->setStatus($status);
    $pedidoDAO->inserir($pedido);
    $pedidoDAO->atualizar($pedido);
    header('Location: ../controller/controleLogin.php?acao=listar');
}
?>