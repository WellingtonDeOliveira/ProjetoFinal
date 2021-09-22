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

        $query = "INSERT INTO pedido(id_cliente, forma_pagamento, valor, status) 
        VALUES('$id_cliente', '$forma_pagamento', '$valor', '$status')";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao inserir");
        }else{
            echo "Insert realizado com sucesso";
        }
        $this->connection->closeConnection();
    }

    public function atualizar(Pedido $pedido){
        $conn = $this->getConnection()->connectToDatabase();
        $id_pedido = $pedido->getIdPedido();
        $id_cliente = $pedido->getIdCliente();
        $forma_pagamento = $pedido->getFormaPagamento();
        $valor = $pedido->getValor();
        $status = $pedido->getStatus();
        
        $query = "UPDATE pedido SET id_cliente = '$id_cliente', forma_pagamento = '$forma_pagamento',
        valor = '$valor', status = '$status' WHERE id_pedido = '$id_pedido'";
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
                array_push($Pedidos, $pedido);
            }
            return $Pedidos;
        }
        $this->connection->closeConnection();
    }

    
     public function recuperarPorIdCliente($id_cliente){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM pedido WHERE id_cliente = $id_cliente";
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
                array_push($Pedidos, $pedido);
            }
            return $Pedidos;
        }
        $this->getConnection()->closeConnection();
        return null;
    }
}
?>