<?php
require_once './app/model/model_formulier.php';

class PostsController {
     
    private $model;
    
    
    public function __construct(){          
        $this -> model = new ModelFormulier();
    }

    public function writeForm($post) {
        // print_r($post); // debug 
        
        //TODO check POST
        return $this->model->writePost($post['email'], $post['firstName'], $post['insertion'], $post['lastName'], $post['password'], $post['role'], $post['schoolGroup']);

    }

    public function index() {
        $readList = $this->model->readVariable();
//        print_r($readList);
        require_once './view/formulier.php'; 
    }

}
