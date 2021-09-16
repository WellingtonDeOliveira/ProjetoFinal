<?php
class Conexao{
    var $host="localhost", $username="root", $password="";
    var $database="projetofinal";
    var $myconn;

    function connectToDataBase(){

        $conn = mysqli_connect($this->host, $this->username, $this->password);
        if(!$conn){
            die("Não foi possivel conectar");
        }else{
            $this->myconn = $conn;
            echo "Conexão estabelizada <br>";
        }
        mysqli_select_db($this->myconn, $this->database);
        if(mysqli_connect_error()){
            echo "Não foi possivel encontrar o Banco de Dados<br>";
        }else{
            echo "Banco conectado <br>";
        }
        return $this->myconn;
    }
    function closeConnection(){
        mysqli_close($this->myconn);
        echo "Conexão encerrada";
    }
}
?>