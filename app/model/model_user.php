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

    public function writePost($firstName, $lastName, $image) {
        $this->database->query('INSERT INTO users (first_name, last_name) VALUES (:firstName, :lastName, :image');
        //$this->database->bind(':email', $email);
        $this->database->bind(':firstName', $firstName);
        //$this->database->bind(':insertion', $insertion);
        $this->database->bind(':lastName', $lastName);
        $this->database->bind(':image', $image);
        //$this->database->bind(':password', $password);
       // $this->database->bind(':role', $role);
        //$this->database->bind(':schoolGroup', $schoolGroup);
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readUsers() {
        $this->database->query('SELECT * FROM users');
        return $this->database->resultset();
    }

}
