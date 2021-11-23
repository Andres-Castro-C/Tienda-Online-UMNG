<?php

class Producto {

    var $idProducto;
    var $descripcion;
    var $categoria;
    var $precio;

    function __construct($idProducto, $descripcion, $categoria, $precio)
    {
        $this->idProducto = $idProducto;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->precio = $precio;
    }

}
?>