<?php
require_once './app/model/model_addBadge.php';

class addBadgeController {

    private $ModelAddBadge;


    public function __construct(){
        $this -> ModelAddBadge = new model_addBadge();
    }

    public function writeForm($post) {

        //TODO check POST
        return $this->ModelAddBadge->writePost($post['badge'],$post['Vak'],$post['Discriptie']);

    }

    public function getBadges() {
        $readList = $this->ModelAddBadge->readBadges();
        $readVakken = $this->ModelAddBadge->readVakken();
//        print_r($readList);
        require_once './view/badgeView.php';
    }

}