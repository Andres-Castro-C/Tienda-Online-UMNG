<?php
    require_once ('../daos/PedidoDAO.php');
    
    $cuerpo = file_get_contents('php://input');
    $pedidoDTO = json_decode($cuerpo);

    $pedidoDAO = new PedidoDAO();
    $pedido = new Pedido(0, $pedidoDTO->registro, $pedidoDTO->medioPago, $pedidoDTO->cantidad);

    $results = $pedidoDAO->create($pedido);
    echo $results;
?>