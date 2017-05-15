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
        $this->database->query("SELECT CASE WHEN s.users_email = 'thelegendxxx420@gmail.com' THEN s.users_email END AS users_email, b.*, CASE WHEN s.users_email = 'thelegendxxx420@gmail.com' THEN s.done END AS done FROM badges b LEFT JOIN scoreList s ON b.idbadges = s.badges_idbadges");
        return $this->database->resultset();
    }

}
