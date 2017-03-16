<?php
require_once './app/model/model_user.php';

class PostsController {
     
    private $modelUser;
    
    
    public function __construct(){          
        $this -> modelUser = new ModelUser();
    }

    public function admin() {
        $readList = $this->modelUser->readUsers();
//        print_r($readList);
        require_once './view/user.php'; 
    }

}
