<?php
include('../_ConnectionDB.php')
$response=new stdClass();

$datos=[]:
$i=0;
$sql="select * from producto where estado=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){ //recorre todos los resultados de la consulta en row y va iterando 1 a 1
 $obj=new stdClass();
 $obj->idProducto = $row['idProducto'];
 $obj->descripcion = $row['descripcion'];
 $obj->categoria = $row['categoria'];
 $obj->precio = $row['precio'];
 $datos[$i]=$obj;
 $i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: aplication/json')
echo json_encode($response);
?>