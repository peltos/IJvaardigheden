<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of writeForm
 *
 * @author IJB06
 */
class ModelUser {

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }
    public function readBadges() {
        // user specific sql
        $this->database->query("SELECT s.users_email, b.*, done FROM badges b LEFT JOIN scoreList s ON b.idbadges = s.badges_idbadges AND  s.users_email = 'thelegendxxx420@gmail.com' ORDER BY b.idbadges;");
        return $this->database->resultset();
    }

}
