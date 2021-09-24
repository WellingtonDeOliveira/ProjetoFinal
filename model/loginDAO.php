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

    public function verificar(Login $login){
        $conn = $this->getConnection()->connectToDatabase();
        $email = $login->getEmail();
        $senha = $login->getSenha();

        $query = "SELECT * FROM login WHERE email='$email' AND senha='$senha'";
        $r = mysqli_query($conn, $query);
        if(!$r){
            die("Usuario Não Cadastrado");
        }else{
            while($row = mysqli_fetch_array($r)){
                $login = new Login();
                $login->setCpf($row["cpf"]);
                $login->setNome($row["nome"]);
                $login->setEmail($row["email"]);
                $login->setSenha($row["senha"]);
                $login->setPerfil($row["perfil"]);
            }
            return $login;
        }
        $this->connection->closeConnection();
    }

    public function atualizar(Login $login){
        $conn = $this->getConnection()->connectToDatabase();
        $cpf = $login->getCpf();
        $nome = $login->getNome();
        $email = $login->getEmail();
        $senha = $login->getSenha();
        $perfil = $login->getPerfil();

        $query = "UPDATE login SET nome = '$nome', email = '$email', senha = '$senha', perfil = '$perfil' WHERE cpf = '$cpf'";
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
        $cpf = $login->getCpf();

        $query = "DELETE FROM login WHERE cpf = '$cpf'";
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
                $login->setCpf($row["cpf"]);
                $login->setNome($row["nome"]);
                $login->setEmail($row["email"]);
                $login->setSenha($row["senha"]);
                $login->setPerfil($row["perfil"]);
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
                $login->setCpf($row["cpf"]);
                $login->setNome($row["nome"]);
                $login->setEmail($row["email"]);
                $login->setSenha($row["senha"]);
                $login->setPerfil($row["perfil"]);
                array_push($Logins, $login);
            }
            return $Logins;
        }
        $this->getConnection()->closeConnection();
        return null;
    }
    
     public function recuperarPorCpf($cpf){
        $conn = $this->getConnection()->connectToDatabase();
        $query = "SELECT * FROM login WHERE cpf = '$cpf'";
        $r = mysqli_query($conn, $query);
        if (!$r){
            die("Erro ao efetuar select");
        }else{
            while ($row = mysqli_fetch_array($r)){
                $login = new Login();
                $login->setCpf($row["cpf"]);
                $login->setNome($row["nome"]);
                $login->setEmail($row["email"]);
                $login->setSenha($row["senha"]);
                $login->setPerfil($row["perfil"]);
                return $login;
            }
        }
        $this->getConnection()->closeConnection();
        return null;
    }
}
?>