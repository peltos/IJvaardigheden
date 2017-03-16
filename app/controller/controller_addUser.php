<?php
require_once './app/model/model_addUser.php';

class PostsController {
     
    private $ModelAddUser;
    
    
    public function __construct(){          
        $this -> ModelAddUser = new ModelAddUser();
    }

    public function writeForm($post) {
        // print_r($post); // debug 
        
        //TODO check POST
        return $this->ModelAddUser->writePost($post['email'], $post['firstName'], $post['insertion'], $post['lastName'], $post['password'], $post['role'], $post['schoolGroup']);

    }

    public function index() {
        $readList = $this->ModelAddUser->readSchoolGroupList();
//        print_r($readList);
        require_once './view/addUser.php'; 
    }

}
