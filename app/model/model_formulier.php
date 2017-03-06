<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of writeForm
 *
 * @author pieterleek
 */
class ModelFormulier {

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }

    public function writePost($firstName, $lastName, $address, $zipcode, $city) {
        $this->database->query('INSERT INTO guestForm (firstname, lastname, address, zipcode, city) VALUES (:fname, :lname, :address, :zip, :city)');
        $this->database->bind(':fname', $firstName);
        $this->database->bind(':lname', $lastName);
        $this->database->bind(':address', $address);
        $this->database->bind(':zip', $zipcode);
        $this->database->bind(':city', $city);
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
