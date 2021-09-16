<?php

require_once("conexao.php");
require_once("login.php");

class LoginDAO{
    public $connection;

    public function getConnection(){
        if(is_null($this->connection)){
            $this->connection = new Conexao();
        }
        return $this->connection;
    }

    public function inserir(Login $login){
        $conn = $this->getConnection()->connectToDatabase();
        $cpf = $login->getCpf();
        $nome = $login->getNome();
        $email = $login->getEmail();
        $senha = $login->getSenha();
        $perfil = $login->getPerfil();

        $query = "INSERT INTO login(cpf, nome, email, senha, perfil) VALUES('$cpf', '$nome', '$email', '$senha', '$perfil')";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao inserir");
        }else{
            echo "Insert realizado com sucesso";
        }

        $this->connection->closeConnection();
    }

    /*public function atualizar(Login $login){
        $conn = $this->getConnection()->connectToDatabase();
        $id = $login->getId();
        $nome = $login->getNome();
        $telefone = $login->getTelefone();

        $query = "UPDATE login SET nome = '$nome', telefone = '$telefone' WHERE id = '$id'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao atualizar");
        }else{
            echo "Update realizado com sucesso";
        }

        $this->connection->closeConnection();
    }

    public function excluir(Login $login){
        $conn = $this->getConnection()->connectToDatabase();
        $id = $login->getId();

        $query = "DELETE FROM login WHERE id = $id";
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
        
        $query = "SELECT * FROM login";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Erro ao selecionar");
        }else{
            $Logins = array();
            while($row = mysqli_fetch_array($r)){
                $login = new Login();
                $login->setId($row["id"]);
                $login->setNome($row["nome"]);
                $login->setTelefone($row["telefone"]);
                array_push($Logins, $login);
            }
            return $Logins;
        }

        $this->connection->closeConnection();
    }

    public function recuperarPorNome($nome){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM login WHERE nome LIKE '%$nome%'";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            $Logins = array();
            while ($row = mysqli_fetch_array($r)){
                $login = new Login();
                $login->setId($row["id"]);
                $login->setNome($row["nome"]);
                $login->setTelefone($row["telefone"]);
                array_push($Logins, $login);
            }
            return $Logins;
        }
        $this->getConnection()->closeConnection();
        return null;
    }
    
     public function recuperarPorId($id){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM login WHERE id = $id";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            while ($row = mysqli_fetch_array($r)){
                $login = new Login();
                $login->setId($row["id"]);
                $login->setNome($row["nome"]);
                $login->setTelefone($row["telefone"]);
                return $login;
            }
        }
        $this->getConnection()->closeConnection();
        return null;
    }*/
}
?>