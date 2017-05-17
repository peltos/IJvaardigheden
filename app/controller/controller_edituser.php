<?php
require_once './app/model/model_editUser.php';

class controllerEditUser {

    private $ModelEditUser;


    public function __construct(){
        $this -> ModelEditUser = new ModelEditUser();
    }

    public function index() {
        $readList = $this->ModelEditUser->readSchoolGroupList();
//        print_r($readList);
        require_once './view/editUser.php';
    }

}
