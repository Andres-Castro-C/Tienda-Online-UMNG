<?php
require_once ('../config/ConnectionDB.php');
require_once ('../model/Producto.php');

class ProductoDAO {
    
   private $connectionDB;
   private $dbCon;

   const CONSULTA = "SELECT p.idProducto, p.descripcion, p.categoria, p.precio FROM  producto p";
   const INSERT = "INSERT INTO producto (descripcion, categoria, precio) VALUES (?,?)";
   const UPDATE = "UPDATE producto SET descripcion = ?, costo=?, categoria = ?, precio = ? WHERE idProducto = ?";
   const DELETE ="DELETE FROM producto WHERE idProducto = ?";

   
   public function __construct() {
    $this->connectionDB = new connectionDB();
    $this->dbCon = $this->connectionDB->getConnection();
  }

  public function readAll() {
     try {
        $statement = $this->dbCon->prepare(self::CONSULTA);
        $statement->execute();
        $producto = $statement->fetchAll(PDO::FETCH_ASSOC);
           
     }catch(PDOException $ex){
        echo $ex->getMessage();
        die($ex->getMessage());
     }
     return $producto;
     $this->connectionDB.close();
  }

  public function create(Producto $producto){
     $result=false;
     try {
        $statement = $this->dbCon->prepare(self::INSERT);
        $statement->execute([$producto->descripcion, $producto->categoria, $producto->precio]);
        $result=true;
     }catch(PDOException $ex){
        echo $ex->getMessage();
        die($ex->getMessage());
     }
     return $result;
  }

  public function update(Producto $producto){
     $result=false;
     try {
        $statement = $this->dbCon->prepare(self::UPDATE);
        $statement->execute([[$producto->descripcion, $producto->categoria, $producto->precio, $producto->idProducto]);
        $result=true;
     }catch(PDOException $ex){
        echo $ex->getMessage();
        die($ex->getMessage());
     }
     return $result;
  }

  public function delete(Producto $producto){
     $result=false;
     try {
        $statement = $this->dbCon->prepare(self::DELETE);
        $statement->execute([$producto->idProducto]);
        $result=true;
     }catch(PDOException $ex){
        echo $ex->getMessage();
        die($ex->getMessage());
     }
     return $result;
  }
}

?>
