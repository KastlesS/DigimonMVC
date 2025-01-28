<?php
require_once('config/db.php');

class DigimonModel{
    private $conexion;

    public function __construct(){
        $this->conexion = db::conexion();
    }

}
