<?php
require_once './app/model/model_login.php';

class controllerLogin {
     
    private $ModelAddUser;
    
    
    public function __construct(){          
    }

    public function index() {
        require_once './view/login.php'; 
    }

}
