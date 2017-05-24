<?php
/**
 * Created by PhpStorm.
 * User: Roberto
 * Date: 20-3-2017
 * Time: 12:30
 */

class model_SG{

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }

    public function writePost($groupName) {
        $this->database->query('INSERT INTO schoolGroup(schoolGroup) VALUES (:groupName)');
        $this->database->bind(':groupName', $groupName);
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSchoolGroupQuery($groupToDelete) {
        $this->database->query('DELETE FROM schoolGroup WHERE schoolGroup = $counter ');
        $this->database->bind(':groupToDelete', $groupToDelete);

    }

    public function readSchoolGroupList() {
        $this->database->query('SELECT * FROM schoolGroup');
        return $this->database->resultset();
    }




}