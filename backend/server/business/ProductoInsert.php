<?php
    require_once ('../daos/ProductoDAO.php');
    
    $cuerpo = file_get_contents('php://input');
    $productoDTO = json_decode($cuerpo);

    $productoDAO = new ProductoDAO();
    $producto = new Producto(0, $productoDTO->descripcion, $productoDTO->categoria, $productoDTO->precio);

    $results = $productoDAO->create($producto);
    echo $results;
?>