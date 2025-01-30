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

    public function insertDigimon(array $array):?int{
        $sql = "INSERT INTO digimon(nombre, ataque, defensa, tipo, nivel, imagen) VALUES (:nombre, :ataque, :defensa, :tipo, :nivel, :imagen)";
        $sentencia = $this->conexion->prepare($sql);
        $datos = [
            ":nombre"=>$array["nombre"],
            ":ataque"=>$array["ataque"],
            ":defensa"=>$array["defensa"],
            ":tipo"=>$array["tipo"],
            ":nivel"=>$array["nivel"],
            ":imagen"=>$array["imagen"],
        ];
        $res = $sentencia->execute($datos);
        return ($res==true)?$this->conexion->lastInsertId():null;
    }
}
