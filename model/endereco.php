<?php
class Endereco{
    private $id;
    private $cep;
    private $rua;
    private $numero;
    private $bairro;
    private $id_login;


    public function getId(){
        return $this->id;
    }
    public function setId($id): self{
        $this->id = $id;
        return $this;
    }
    public function getCep(){
        return $this->cep;
    }
    public function setCep($cep): self{
        $this->cep = $cep;
        return $this;
    }
    public function getRua(){
        return $this->rua;
    }
    public function setRua($rua): self{
        $this->rua = $rua;
        return $this;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero): self{
        $this->numero = $numero;
        return $this;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro): self{
        $this->bairro = $bairro;
        return $this;
    }
    public function getIdLogin(){
        return $this->id_login;
    }
    public function setIdLogin($id_login): self{
        $this->id_login = $id_login;
        return $this;
    }
}
?>