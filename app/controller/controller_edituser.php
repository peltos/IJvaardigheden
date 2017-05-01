<?php
require_once './app/model/model_editUser.php';

class controllerEditUser {
     
    private $ModelEditUser;
    
    
    public function __construct(){          
        $this -> ModelEditUser = new ModelEditUser();
    }

    public function writeForm($post) {
        print_r($post); // debug 
        
        //TODO check POST
        return $this->ModelEditUser->writePost($post['firstName'], $post['insertion'], $post['lastName'], $post['role'], $post['schoolGroup']);
    }

    public function index() {
        $readList = $this->ModelEditUser->readSchoolGroupList();
//        print_r($readList);
        require_once './view/editUser.php'; 
    }

}
