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
        return $this->model->writePost($post['fname'], $post['lname'], $post['address'], $post['zipcode'], $post['city']);
    }

    public function index() {
        require_once './view/formulier.php'; 
    }

}
