<?php
 //Start the session
require_once './app/model/model_badges.php';

class PostsController {
     
    private $modelUser;
    
    
    public function __construct(){          
        $this -> modelUser = new ModelUser();
    }

    public function admin() {
        $UserEmail = $_SESSION['userEmail'];
        $readList = $this->modelUser->readBadges($UserEmail);
//        print_r($readList);
        require_once './view/badges.php'; 
    }

}
