<?php

require_once "models/digimonModel.php";
class DigimonController{
    private $model;

    public function __construct(){
        $this->model = new DigimonModel();
    }

    public function seeAllDigimon():array{
        return $this->model->listAllDigimons();
    }

    public function seeDigimon($id): ?stdClass{
        return $this->model->listDigimon($id);
    }

    public function killDigimon($id):bool{
        return $this->model->deleteDigimon($id);
    }

    public function createDigimon(array $array):void{
        $id = $this->model->insertDigimon($array);
        if($id==null)?header("location:index.php?tabla=digimon&accion=crear&error=true&id={$id}"):header("location:index.php?tabla=digimon&accion=ver&id={$id}");
    }
}