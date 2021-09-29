<?php

require_once("conexao.php");
require_once("pedido.php");

class PedidoDAO{
    public $connection;

    public function getConnection(){
        if(is_null($this->connection)){
            $this->connection = new Conexao();
        }
        return $this->connection;
    }

    public function inserir(Pedido $pedido){
        $conn = $this->getConnection()->connectToDatabase();
        $id_cliente = $pedido->getIdCliente();
        $forma_pagamento = $pedido->getFormaPagamento();
        $valor = $pedido->getValor();
        $status = $pedido->getStatus();
        $observacao = $pedido->getObservacao();
        $troco = $pedido->getTroco();
        $id_endereco = $pedido->getIdEndereco();

        $query = "INSERT INTO pedido(id_cliente, forma_pagamento, valor, status, observacao, troco, id_endereco) 
        VALUES('$id_cliente', '$forma_pagamento', '$valor', '$status', '$observacao', '$troco', '$id_endereco')";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao inserir");
        }else{
            echo "Insert realizado com sucesso";
        }
        $this->connection->closeConnection();
    }
    public function recuperarParaArray($id_cliente){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM pedido WHERE id_cliente = '$id_cliente'";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            $Pedidos = array();
            while ($row = mysqli_fetch_array($r)){
                $pedido = new Pedido();
                $pedido->setIdPedido($row["id_pedido"]);
                array_push($Pedidos, $pedido);
            }
            return $Pedidos;
        }
        $this->getConnection()->closeConnection();
    }

    public function atualizar(Pedido $pedido){
        $conn = $this->getConnection()->connectToDatabase();
        $id_pedido = $pedido->getIdPedido();
        $forma_pagamento = $pedido->getFormaPagamento();
        $status = $pedido->getStatus();
        $troco = $pedido->getTroco();
        $id_endereco = $pedido->getIdEndereco();
        
        $query = "UPDATE pedido SET forma_pagamento = '$forma_pagamento', 
        status = '$status', troco = '$troco', id_endereco = '$id_endereco' WHERE id_pedido = '$id_pedido'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao atualizar");
        }else{
            echo "Update realizado com sucesso";
        }
        
        $this->connection->closeConnection();
    }
    
    public function excluir(Pedido $pedido){
        $conn = $this->getConnection()->connectToDatabase();
        $id_pedido = $pedido->getIdPedido();
        
        $query = "DELETE FROM pedido WHERE id_pedido = '$id_pedido'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao excluir");
        }else{
            echo "Delete realizado com sucesso";
        }

        $this->connection->closeConnection();
    }

    public function recuperarTodos(){
        $conn = $this->getConnection()->connectToDatabase();
        
        $query = "SELECT * FROM pedido";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao selecionar");
        }else{
            $Pedidos = array();
            while($row = mysqli_fetch_array($r)){
                $pedido = new Pedido();
                $pedido->setIdPedido($row["id_pedido"]);
                $pedido->setIdCliente($row["id_cliente"]);
                $pedido->setFormaPagamento($row["forma_pagamento"]);
                $pedido->setValor($row["valor"]);
                $pedido->setStatus($row["status"]);
                $pedido->setObservacao($row["observacao"]);
                array_push($Pedidos, $pedido);
            }
            return $Pedidos;
        }
        $this->connection->closeConnection();
    }
    
     public function recuperarPorIdCliente($id_cliente){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM pedido WHERE id_cliente = '$id_cliente'";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            $Pedidos = array();
            while ($row = mysqli_fetch_array($r)){
                $pedido = new Pedido();
                $pedido->setIdPedido($row["id_pedido"]);
                $pedido->setIdCliente($row["id_cliente"]);
                $pedido->setFormaPagamento($row["forma_pagamento"]);
                $pedido->setValor($row["valor"]);
                $pedido->setStatus($row["status"]);
                $pedido->setObservacao($row["observacao"]);
                array_push($Pedidos, $pedido);
            }
            return $Pedidos;
        }
        $this->getConnection()->closeConnection();
    }
}
?>