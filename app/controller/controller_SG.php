<?php
require_once './app/model/model_SG.php';

class SchoolGroupFunctionController {

    private $ModelAddSG;


    public function __construct(){
        $this -> ModelAddSG = new Model_SG();
    }

    public function writeForm($post) {
         print_r($post); // debug
        echo $post;

        //TODO check POST
        return $this->ModelAddSG->writePost($post['groupName']);

    }


    public function deleteSchoolGroup($delete) {
//        print_r($delete); debug

        //return $this->ModelAddSG->deleteSchoolGroupQuery($delete['groupName']);

    }

    public function getSchoolGroups() {
        $readList = $this->ModelAddSG->readSchoolGroupList();
        print_r($readList);
        require_once './view/addSchoolGroup.php';
    }

}