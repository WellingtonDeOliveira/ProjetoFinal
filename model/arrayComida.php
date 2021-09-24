<?php
class ArrayComida{
    private $id_array;
    private $id_comida;
    private $quantidade;
    private $id_pedido;

    // Getters and Setters
    public function getIdPedido(){
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido): self{
        $this->id_pedido = $id_pedido;
        return $this;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade): self{
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getIdComida(){
        return $this->id_comida;
    }

    public function setIdComida($id_comida): self{
        $this->id_comida = $id_comida;
        return $this;
    }

    public function getIdArray(){
        return $this->id_array;
    }

    public function setIdArray($id_array): self{
        $this->id_array = $id_array;
        return $this;
    }
}
?>