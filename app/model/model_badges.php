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
        $this->database->query('SELECT * FROM `PAD-app`.badges');
        return $this->database->resultset();
    }

}
