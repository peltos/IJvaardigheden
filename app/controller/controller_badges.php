<?php
require_once './app/model/model_badges.php';

class PostsController {
     
    private $modelUser;
    
    
    public function __construct(){          
        $this -> modelUser = new ModelUser();
    }

    public function admin() {
        $readList = $this->modelUser->readBadges();
//        print_r($readList);
        require_once './view/badges.php'; 
    }

}
