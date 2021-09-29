<?php

require_once("conexao.php");
require_once("endereco.php");

class EnderecoDAO{
    public $connection;

    public function getConnection(){
        if(is_null($this->connection)){
            $this->connection = new Conexao();
        }
        return $this->connection;
    }

    public function inserir(Endereco $endereco){
        $conn = $this->getConnection()->connectToDatabase();
        $cep = $endereco->getCep();
        $rua = $endereco->getRua();
        $numero = $endereco->getNumero();
        $bairro = $endereco->getBairro();
        $id_login = $endereco->getIdLogin();

        $query = "INSERT INTO endereco(cep, rua, numero, bairro, id_login) 
        VALUES('$cep', '$rua', '$numero', '$bairro', '$id_login')";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao inserir");
        }else{
            echo "Insert realizado com sucesso";
        }
        $this->connection->closeConnection();
    }

    public function atualizar(Endereco $endereco){
        $conn = $this->getConnection()->connectToDatabase();
        $id = $endereco->getId();
        $cep = $endereco->getCep();
        $rua = $endereco->getRua();
        $numero = $endereco->getNumero();
        $bairro = $endereco->getBairro();
        $id_login = $endereco->getIdLogin();

        $query = "UPDATE endereco SET cep = '$cep', rua = '$rua', numero = '$numero',
        bairro = '$bairro', id_login = '$id_login' WHERE id_endereco = '$id'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao atualizar");
        }else{
            echo "Update realizado com sucesso";
        }

        $this->connection->closeConnection();
    }

    public function excluir(Endereco $endereco){
        $conn = $this->getConnection()->connectToDatabase();
        $id = $endereco->getId();

        $query = "DELETE FROM endereco WHERE id_endereco = $id";
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
        
        $query = "SELECT * FROM endereco";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao selecionar");
        }else{
            $Enderecos = array();
            while($row = mysqli_fetch_array($r)){
                $endereco = new Endereco();
                $endereco->setId($row["id_endereco"]);
                $endereco->setCep($row["cep"]);
                $endereco->setRua($row["rua"]);
                $endereco->setNumero($row["numero"]);
                $endereco->setBairro($row["bairro"]);
                $endereco->setIdLogin($row["id_login"]);
                array_push($Enderecos, $endereco);
            }
            return $Enderecos;
        }
        $this->connection->closeConnection();
    }
    public function recuperarTodosCliente($id_login){
        $conn = $this->getConnection()->connectToDatabase();
        
        $query = "SELECT * FROM endereco WHERE id_login = '$id_login'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao selecionar");
        }else{
            $Endrecos = array();
            while($row = mysqli_fetch_array($r)){
                $endereco = new Endereco();
                $endereco->setId($row["id_endereco"]);
                $endereco->setCep($row["cep"]);
                $endereco->setRua($row["rua"]);
                $endereco->setNumero($row["numero"]);
                $endereco->setBairro($row["bairro"]);
                $endereco->setIdLogin($row["id_login"]);
                array_push($Endrecos, $endereco);
            }
            return $Endrecos;
        }
        $this->connection->closeConnection();
    }
}
?>