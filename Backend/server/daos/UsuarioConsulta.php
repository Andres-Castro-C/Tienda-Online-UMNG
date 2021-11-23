<?php
    require_once ('../daos/UsuarioDAO.php');
    $usarioDAO = new UsuarioDAO();
    $results= json_encode($usuarioDAO->readAll());
    echo $results;
?>