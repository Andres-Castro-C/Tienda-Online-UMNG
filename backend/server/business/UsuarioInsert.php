<?php
    require_once ('../daos/UsuarioDAO.php');
    
    $cuerpo = file_get_contents('php://input');
    $usuarioDTO = json_decode($cuerpo);

    $usuarioDAO = new UsuarioDAO();
    $usuario = new Usuario(0, $usuarioDTO->nombre, $usuarioDTO->documento, $usuarioDTO->correo, $usuarioDTO->fechaNacimiento, $usuarioDTO->clave);

    $results = $usuarioDAO->create($usuario);
    echo $results;
?>