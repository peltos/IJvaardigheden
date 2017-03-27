<?php
require_once './app/model/model_SG.php';

class SGPostsController {

    private $ModelAddSG;


    public function __construct(){
        $this -> ModelAddSG = new Model_SG();
    }

    public function writeForm($post) {
        // print_r($post); // debug

        //TODO check POST
        return $this->ModelAddSG->writePost($post['groupName']);

    }

    public function SGAdmin() {
        require_once './view/addSchoolGroup.php';
    }

}