<?php
require_once('config/db.php');

class userModel{
    private $conexion;

    public function __construct(){
        $this->conexion = db::conexion();
    }

    public function listAllUsers():array{
        $sql = "SELECT * FROM users ";
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    public function listUser($id): ?stdClass{
        $sql = "SELECT * FROM users WHERE id = :id";
        $sentencia = $this->conexion->prepare($sql);
        $datos = [":id"=>$id];
        $sentencia->execute($datos);
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}