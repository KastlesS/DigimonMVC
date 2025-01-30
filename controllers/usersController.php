<?php
require_once "models/digimonModel.php";

class UsersController { 
    private $model;

    public function __construct(){
        $this->model = new DigimonModel();
    }

    public function createUser(array $user):void{
        try {
            $id = $this->model->insert($user);
            ($id==null)?header("location:index.php?tabla=user&accion=crear&error=true&id={$id}"):header("location:index.php?tabla=user&accion=ver&id={$id}");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function seeAllUsers():array{
        return $this->model->listAllUsers();
    }

    public function seeUser($id): ?stdClass{
        return $this->model->listUser($id);  
    }

    public function killUser($id):bool{
        return $this->model->deleteUser($id);
    }

}