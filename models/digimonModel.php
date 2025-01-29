<?php
require_once('config/db.php');

class DigimonModel{
    private $conexion;

    public function __construct(){
        $this->conexion = db::conexion();
    }

    public function listAllDigimons():array{
        $sql = "SELECT * FROM digimon";
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        $digimones = $sentencia->fetch(PDO::FETCH_OBJ);
        return $digimones;
    }

    public function listDigimon($id): ?stdClass{
        $sql = "SELECT * FROM digimon WHERE id = :id";
        $sentencia = $this->conexion->prepare($sql);
        $datos = [":id"=>$id];
        $sentencia->execute($datos);
        $digimon = $sentencia->fetch(PDO::FETCH_OBJ);
        return $digimon;
    }

    public function deleteDigimon($id): bool{
        try {
            $sql = "DELETE FROM digimon WHERE id=:id";
            $sentencia = $this->conexion->prepare($sql);
            $datos = [":id"=>$id];
            $sentencia->execute($datos);
            return ($sentencia->rowCount()<=0)?false:true;
        } catch (Exception $e) {
            echo "Excepcion: ", $e->getMessage(), "<br>";
            return false;
        }
    }

}
