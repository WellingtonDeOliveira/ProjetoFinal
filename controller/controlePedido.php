<?php

session_start();
require_once("../model/pedido.php");
require_once("../model/pedidoDAO.php");
require_once ("../model/login.php");

$acao = $_GET["acao"];
$pedidoDAO = new PedidoDAO();

if($acao == "cadastrar"){
    $cpf = $_SESSION['ID_login'];
    $forma_pagamento = "Não Decidido";
    $valor = $_POST["valor"];
    $status = "pendente";
    $observacao = $_POST["observacao"];
    $troco = "0,00";
    $id_endereco = "0";
    $res = true;
    $pedido = new Pedido();
    $pedido->setIdCliente($cpf);
    $pedido->setFormaPagamento($forma_pagamento);
    $pedido->setValor($valor);
    $pedido->setStatus($status);
    $pedido->setObservacao($observacao);
    $pedido->setTroco($troco);
    $pedido->setIdEndereco($id_endereco);
    $pedidoDAO->inserir($pedido);
    header('Location: ./controlePedido.php?acao=recuperarId');
}else if($acao == "recuperarId"){
    $cpf = $_SESSION['ID_login'];
    $pedidos = $pedidoDAO->recuperarParaArray($cpf);
    foreach($pedidos as $pedido){
        $iDpedido = $pedido->getIdPedido();
    }
    $_SESSION["idPedido"] = $iDpedido;
    header('Location: ./controleArrayComida.php?acao=cadastrar');
}else if($acao == "recuperarIdHistorico"){
    $cpf = $_SESSION['ID_login'];
    $pedidos = $pedidoDAO->recuperarParaArray($cpf);
    $_SESSION["idPedidos"] = $pedidos;
    header('Location: ../view/historicoCli.php');
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
    $id_pedido = $_SESSION["idPedido"];
    $forma_pagamento = $_GET["tipo"];
    $status = "Pago";
    $troco = $_POST["troco"];
    $id_endereco = $_POST["id_endereco"];
    $pedido = new Pedido();
    $pedido->setIdPedido($id_pedido);
    $pedido->setFormaPagamento($forma_pagamento);
    $pedido->setStatus($status);
    $pedido->setTroco($troco);
    $pedido->setIdEndereco($id_endereco);
    $pedidoDAO->atualizar($pedido);
    header('Location: ../redirecionar.php');
}
?>