<?php
require_once ('../config/ConnectionDB.php');
require_once ('../model/Pedido.php');

class PedidoDAO {
   
   private $connectionDB;
   private $dbCon;
   const INSERT = "INSERT INTO pedido (registro, medioPago, cantidad) VALUES (?,?,?)";
   

   public function __construct() {
     $this->connectionDB = new connectionDB();
     $this->dbCon = $this->connectionDB->getConnection();
   }


 
 public function create(Pedido $pedido){
    $result=false;
    try {
       $statement = $this->dbCon->prepare(self::INSERT);
       $statement->execute([$pedido->registro, $pedido->medioPago, $pedido->cantidad]);
       $result=true;
    }catch(PDOException $ex){
       echo $ex->getMessage();
       die($ex->getMessage());
    }
    return $result;
 }
}
?>