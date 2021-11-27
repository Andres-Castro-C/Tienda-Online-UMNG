<?php

class Pedido {

    var $idPedido;
    var $registro;
    var $medioPago;
    var $cantidad;

    function __construct($idPedido, $registro, $medioPago, $cantidad)
    {
        $this->idPedido = $idPedido;
        $this->registro = $registro;
        $this->medioPago = $medioPago;
        $this->cantidad = $cantidad;
    }

}
?>