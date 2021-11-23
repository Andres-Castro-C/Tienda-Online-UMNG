<?php
    require_once ('../daos/UsuarioDAO.php');
    
    $cuerpo = file_get_contents('php://input');
    $usuarioDTO = json_decode($cuerpo);

    $usuarioDAO = new UsuarioDAO();
    $usuario = new Usuario($usuarioDTO->nombre, $usuarioDTO->documento, $usuarioDTO->correo, $usuarioDTO->fechaNacimiento, $usuarioDTO->clave, $usuarioDTO->idusuario);

    $results = $usuarioDAO->create($usuario);
    echo $results;
?>