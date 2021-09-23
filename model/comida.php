<?php
class Comida{
    private $id_comida;
    private $imagem;
    private $descricao;
    private $valor;
    private $categoria;
    private $nome;


    public function getIdComida(){
        return $this->id_comida;
    }
    public function setIdComida($id_comida): self{
        $this->id_comida = $id_comida;
        return $this;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem): self{
        $this->imagem = $imagem;
        return $this;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao): self{
        $this->descricao = $descricao;
        return $this;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor): self{
        $this->valor = $valor;
        return $this;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria): self{
        $this->categoria = $categoria;
        return $this;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome): self{
        $this->nome = $nome;
        return $this;
    }
}
?>