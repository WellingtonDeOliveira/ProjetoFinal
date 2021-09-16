<?php

require_once("conexao.php");
require_once("comida.php");

class ComidaDAO{
    public $connection;

    public function getConnection(){
        if(is_null($this->connection)){
            $this->connection = new Conexao();
        }
        return $this->connection;
    }

    public function inserir(Comida $comida){
        $conn = $this->getConnection()->connectToDatabase();
        $imagem = $comida->getImagem();
        $descricao = $comida->getDescricao();
        $valor = $comida->getValor();
        $categoria = $comida->getCategoria();
        $nome = $comida->getNome();

        $query = "INSERT INTO comida(imagem, descricao, valor, categoria, nome) 
        VALUES('$imagem', '$descricao', '$valor', '$categoria', '$nome')";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao inserir");
        }else{
            echo "Insert realizado com sucesso";
        }
        $this->connection->closeConnection();
    }

    public function atualizar(Comida $comida){
        $conn = $this->getConnection()->connectToDatabase();
        $id = $comida->getId();
        $imagem = $comida->getImagem();
        $descricao = $comida->getDescricao();
        $valor = $comida->getValor();
        $categoria = $comida->getCategoria();
        $nome = $comida->getNome();

        $query = "UPDATE comida SET imagem = '$imagem', descricao = '$descricao', valor = '$valor',
        categoria = '$categoria', nome = '$nome' WHERE id_comida = '$id'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao atualizar");
        }else{
            echo "Update realizado com sucesso";
        }

        $this->connection->closeConnection();
    }

    public function excluir(Comida $comida){
        $conn = $this->getConnection()->connectToDatabase();
        $id = $comida->getId();

        $query = "DELETE FROM comida WHERE id_comida = $id";
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
        
        $query = "SELECT * FROM comida";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao selecionar");
        }else{
            $Comidas = array();
            while($row = mysqli_fetch_array($r)){
                $comida = new Comida();
                $comida->setId($row["id"]);
                $comida->setImagem($row["imagem"]);
                $comida->setDescricao($row["descricao"]);
                $comida->setValor($row["valor"]);
                $comida->setCategoria($row["categoria"]);
                $comida->setNome($row["nome"]);
                array_push($Comidas, $comida);
            }
            return $Comidas;
        }
        $this->connection->closeConnection();
    }

    public function recuperarPorNome($nome){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM comida WHERE nome LIKE '%$nome%'";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            $Comidas = array();
            while ($row = mysqli_fetch_array($r)){
                $comida = new Comida();
                $comida->setId($row["id"]);
                $comida->setImagem($row["imagem"]);
                $comida->setDescricao($row["descricao"]);
                $comida->setValor($row["valor"]);
                $comida->setCategoria($row["categoria"]);
                $comida->setNome($row["nome"]);
                array_push($Comidas, $comida);
            }
            return $Comidas;
        }
        $this->getConnection()->closeConnection();
        return null;
    }
}
?>