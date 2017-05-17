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
class ModelEditUser {

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }

    public function readSchoolGroupList() {
        $this->database->query('SELECT * FROM badges');
        return $this->database->resultset();
    }

}
