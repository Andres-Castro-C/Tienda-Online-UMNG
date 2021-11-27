<?php
require_once ('../config/ConnectionDB.php');
require_once ('../model/Producto.php');

class ProductoDAO {
   
   private $connectionDB;
   private $dbCon;
   const INSERT = "INSERT INTO producto (descripcion, categoria, precio) VALUES (?,?,?)";
   

   public function __construct() {
     $this->connectionDB = new connectionDB();
     $this->dbCon = $this->connectionDB->getConnection();
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
}
?>