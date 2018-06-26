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
class ModelLogin {

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }

    public function writePost($email, $firstName, $insertion, $lastName, $password, $role, $schoolGroup_schoolGroup) {
        $this->database->query('INSERT INTO user (email, firstName, insertion, lastName, password, role, schoolGroup_schoolGroup) VALUES (:email, :firstName, :insertion, :lastName, :password, :role, :school_group)');
        $this->database->bind(':email', $email);
        $this->database->bind(':firstName', $firstName);
        $this->database->bind(':insertion', $insertion);
        $this->database->bind(':lastName', $lastName);
        $this->database->bind(':password', $password);
        $this->database->bind(':role', $role);
        $this->database->bind(':schoolGroup_schoolGroup', $schoolGroup_schoolGroup);
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readSchoolGroupList() {
        $this->database->query('SELECT * FROM schoolGroup ');
        return $this->database->resultset();
    }

}