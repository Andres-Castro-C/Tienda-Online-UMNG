<?php

class Usuario{

    var $idusuario;
    var $nombre;
    var $documento;
    var $correo;
    var $fechaNacimiento;
    var $clave;

clave

    function __construct($idusuario, $nombre, $documento, $correo, $fechaNacimiento, $clave)
    {
        $this->idusuario = $idusuario;
        $this->nombre = $nombre;
        $this->documento =  $documento;
        $this->correo =  $correo;
        $this->fechaNacimiento =  $fechaNacimiento;
        $this->clave =  $clave;
    }
    
}
?>