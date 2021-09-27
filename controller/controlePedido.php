<?php

session_start();
require_once("../model/pedido.php");
require_once("../model/pedidoDAO.php");
require_once ("../model/login.php");

$acao = $_GET["acao"];
$pedidoDAO = new PedidoDAO();

if($acao == "cadastrar"){
    $cpf = $_POST["cliente_cpf"];
    $forma_pagamento = "Não Decidido";
    $valor = $_POST["valor"];
    $status = "pendente";
    $observacao = $_POST["observacao"];
    $res = true;
    $pedido = new Pedido();
    $pedido->setIdCliente($cpf);
    $pedido->setFormaPagamento($forma_pagamento);
    $pedido->setValor($valor);
    $pedido->setStatus($status);
    $pedido->setObservacao($observacao);
    $pedidoDAO->inserir($pedido);
    header('Location: ./controlePedido.php?acao=recuperarId&cpf='.$cpf);
}else if($acao == "recuperarId"){
    $cpf = $_GET['cpf'];
    $pedidos = $pedidoDAO->recuperarParaArray($cpf);
    foreach($pedidos as $pedido){
        $iDpedido = $pedido->getIdPedido();
    }
    $_SESSION["idPedido"] = $iDpedido;
    header('Location: ./controleArrayComida.php?acao=cadastrar');
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
    $observacao = $_POST["observacao"];
    $pedido = new Pedido();
    $pedido->setIdPedido($id_pedido);
    $pedido->setIdCliente($id_cliente);
    $pedido->setFormaPagamento($forma_pagamento);
    $pedido->setValor($valor);
    $pedido->setStatus($status);
    $pedido->setObservacao($observacao);
    $pedidoDAO->atualizar($pedido);
    header('Location: ../controller/controleLogin.php?acao=listar');
}
?>