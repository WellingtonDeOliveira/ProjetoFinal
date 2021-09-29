<?php

require_once("conexao.php");
require_once("arrayComida.php");

class ArrayComidaDAO{
    public $connection;

    public function getConnection(){
        if(is_null($this->connection)){
            $this->connection = new Conexao();
        }
        return $this->connection;
    }

    public function inserir(ArrayComida $arrayComida){
        $conn = $this->getConnection()->connectToDatabase();
        $id_comida = $arrayComida->getIdComida();
        $quantidade = $arrayComida->getQuantidade();
        $id_pedido = $arrayComida->getIdPedido();

        $query = "INSERT INTO array_comida(id_comida, quantidade, id_pedido) 
        VALUES('$id_comida', '$quantidade', '$id_pedido')";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao inserir");
        }else{
            echo "Insert realizado com sucesso";
        }
        $this->connection->closeConnection();
    }

    public function atualizar(ArrayComida $arrayComida){
        $conn = $this->getConnection()->connectToDatabase();
        $id_array = $arrayComida->getIdArray();
        $id_comida = $arrayComida->getIdComida();
        $quantidade = $arrayComida->getQuantidade();
        $id_pedido = $arrayComida->getIdPedido();
        
        $query = "UPDATE array_comida SET id_comida = '$id_comida', quantidade = '$quantidade', 
        id_pedido = '$id_pedido' WHERE id_array = '$id_array'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao atualizar");
        }else{
            echo "Update realizado com sucesso";
        }
        
        $this->connection->closeConnection();
    }
    
    public function excluir(ArrayComida $arrayComida){
        $conn = $this->getConnection()->connectToDatabase();
        $id_array = $arrayComida->getIdArray();
        
        $query = "DELETE FROM array_comida WHERE id_array = '$id_array'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao excluir");
        }else{
            echo "Delete realizado com sucesso";
        }

        $this->connection->closeConnection();
    }
    
     public function recuperar(){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM array_comida";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            $arrayComidas = array();
            while ($row = mysqli_fetch_array($r)){
                $arrayComida = new ArrayComida();
                $arrayComida->setIdArray($row["id_array"]);
                $arrayComida->setIdComida($row["id_comida"]);
                $arrayComida->setQuantidade($row["quantidade"]);
                $arrayComida->setIdPedido($row["id_pedido"]);
                array_push($arrayComidas, $arrayComida);
            }
            return $arrayComidas;
        }
        $this->getConnection()->closeConnection();
        return null;
    }
}
?>