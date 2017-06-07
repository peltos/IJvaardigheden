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
        return $this->ModelEditUser->writePost($post['otherInfo'],$post['schoolgroup']);

    }
    public function index() {
        $idUser = $_GET['edit'];
        $UserEmail = $_SESSION["email" . $idUser];
        $readBadgeList = $this->ModelEditUser->readBadgeList($UserEmail);
        $readSGList = $this->ModelEditUser->readSchoolGroupList();
        $readUsersList = $this->ModelEditUser->readUsersList($UserEmail);
        //print_r($readSGList);
        require_once './view/editUser.php';
    }

}
