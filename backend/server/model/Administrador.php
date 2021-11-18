<?php

class Usuario{

    var $idadmin;
    var $nombre;
    var $documento;
    var $correo;
    var $fechaNacimiento;
    var $clave;

clave

    function __construct($idadmin, $nombre, $documento, $correo, $fechaNacimiento, $clave)
    {
        $this->idadmin = $idadmin;
        $this->nombre = $nombre;
        $this->documento =  $documento;
        $this->correo =  $correo;
        $this->fechaNacimiento =  $fechaNacimiento;
        $this->clave =  $clave;
    }
    
}
?>