<?php
require_once './app/model/model_editUser.php';

class controllerEditUser {

    private $ModelEditUser;


    public function __construct(){
        $this -> ModelEditUser = new ModelEditUser();
    }
    public function writeForm($post) {
        // print_r($post); // debug

        //TODO check POST
        return $this->ModelEditUser->writePost($post['otherInfo']);

    }
    public function index() {
        $idUser = $_GET['edit'];
        $UserEmail = $_SESSION["email" . $idUser];
        $readList = $this->ModelEditUser->readSchoolGroupList($UserEmail);
//        print_r($readList);
        require_once './view/editUser.php';
    }

}
