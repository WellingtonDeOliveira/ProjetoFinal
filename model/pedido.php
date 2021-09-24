<?php
class Pedido{
    private $id_pedido;
    private $id_cliente;
    private $forma_pagamento;
    private $valor;
    private $status;
    private $observacao;

    // Getter and Setter
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status): self{
        $this->status = $status;
        return $this;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor): self{
        $this->valor = $valor;
        return $this;
    }

    public function getFormaPagamento(){
        return $this->forma_pagamento;
    }

    public function setFormaPagamento($forma_pagamento): self{
        $this->forma_pagamento = $forma_pagamento;
        return $this;
    }

    public function getIdCliente(){
        return $this->id_cliente;
    }

    public function setIdCliente($id_cliente): self{
        $this->id_cliente = $id_cliente;
        return $this;
    }

    public function getIdPedido(){
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido): self{
        $this->id_pedido = $id_pedido;
        return $this;
    }

    public function getObservacao(){
        return $this->observacao;
    }

    public function setObservacao($observacao): self{
        $this->observacao = $observacao;
        return $this;
    }
}
?>