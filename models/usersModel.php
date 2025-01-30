<?php
require_once('config/db.php');

class userModel{
    private $conexion;

    public function __construct(){
        $this->conexion = db::conexion();
    }

    public function insertUser(array $user):?int{
        $sql = "INSERT INTO users(nick, password) VALUES (:nick, :password)";
        $sentencia = $this->conexion->prepare($sql);
        $user = [":nick"=>$user["nick"], ":password"=>$user["password"]];
        $res = $sentencia->execute($user); 
        return ($res==true)?$this->conexion->lastInsertId():null;
    }

    
    public function login(string $usuario,string $password): ?stdClass{
        $sentencia = $this->conexion->prepare("SELECT * FROM users WHERE usuario=:usuario and password=:contra");
        $arrayDatos = [
            ":usuario" => $usuario,
            ":contra"=>$password
        ];
        $resultado = $sentencia->execute($arrayDatos);
        if (!$resultado) return null;
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        //fetch duevelve el objeto stardar o false si no hay persona
        return ($user == false) ? null : $user;
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

    public function deleteUser($id): bool{
        $sql = "DELETE FROM users WHERE id = :id";
        try {
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