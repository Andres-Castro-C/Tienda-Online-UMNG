<?php
require_once ('../config/ConnectionDB.php');
require_once ('../model/Usuario.php');

class UsuarioDAO {
   
   private $connectionDB;
   private $dbCon;
   const CONSULTA = "SELECT * FROM  usuario WHERE correo= ? AND clave= ?";
   const INSERT = "INSERT INTO usuario (nombre, documento, correo, fechaNacimiento, clave) VALUES (?,?,?,?,?)";
   

   public function __construct() {
     $this->connectionDB = new connectionDB();
     $this->dbCon = $this->connectionDB->getConnection();
   }
   
   public function readAll() {
    try {
       $statement = $this->dbCon->prepare(self::CONSULTA);
       $statement->execute();
       $usuario = $statement->fetchAll(PDO::FETCH_ASSOC);
          
    }catch(PDOException $ex){
       echo $ex->getMessage();
       die($ex->getMessage());
    }
    return $usuario;
    $this->ConnectionDB->closeConnection();
 }

 
 public function create(Usuario $usuario){
    $result=false;
    try {
       $statement = $this->dbCon->prepare(self::INSERT);
       $statement->execute([$usuario->nombre, $usuario->documento, $usuario->correo, $usuario->fechaNacimiento, $usuario->clave]);
       $result=true;
    }catch(PDOException $ex){
       echo $ex->getMessage();
       die($ex->getMessage());
    }
    return $result;
 }
}
?>