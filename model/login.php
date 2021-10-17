<?php
class Login{
    private $cpf;
    private $nome;
    private $email;
    private $senha;
    private $perfil;


    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf): self{
        $this->cpf = $cpf;
        return $this;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome): self{
        $this->nome = $nome;
        return $this;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email): self{
        $this->email = $email;
        return $this;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha): self{
        $this->senha = $senha;
        return $this;
    }
    public function getPerfil(){
        return $this->perfil;
    }
    public function setPerfil($perfil): self{
        $this->perfil = $perfil;
        return $this;
    }
}
?>