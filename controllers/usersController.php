<?php
require_once "models/digimonModel.php";

class UsersController { 
    private $model;

    public function __construct(){
        $this->model = new DigimonModel();
    }

}