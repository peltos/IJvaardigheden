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

    public function writePost($firstName, $insertion, $lastName, $role, $schoolGroup, $session) {
        
        $this->database->query("UPDATE `PAD-app`.`user` SET `firstName`=:firstName, `insertion`=:insertion, `lastName`=:lastName, `role`=:role WHERE `email`=:where;");
//        $this->database->bind(':email', $email);
        $this->database->bind(':firstName', $firstName);
        $this->database->bind(':insertion', $insertion);
        $this->database->bind(':lastName', $lastName);
//        $this->database->bind(':password', $password);
        $this->database->bind(':role', $role);
        $this->database->bind(':where', $session);
        
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readSchoolGroupList() {
        $this->database->query('SELECT * FROM schoolGroup');
        return $this->database->resultset();
    }

}
