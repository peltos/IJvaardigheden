<?php
/**
 * Created by PhpStorm.
 * User: Roberto
 * Date: 20-3-2017
 * Time: 12:30
 */

class model_addBadge{

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }
    public function writePost($pathToImage,$subject_subject, $description) {
        
        
        $this->database->query("INSERT INTO badges(subject_subject, description, pathToImage) VALUES (:subject_subject, :description, :pathToImage)");
        
        $this->database->bind(':pathToImage', $pathToImage);
        $this->database->bind(':subject_subject', $subject_subject);
        $this->database->bind(':description', $description);
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSchoolGroupQuery($groupToDelete) {
        $this->database->query('DELETE FROM schoolGroup WHERE schoolGroup_schoolGroup = $counter ');
        $this->database->bind(':groupToDelete', $groupToDelete);

    }

    public function readBadges() {
        $this->database->query('SELECT * FROM badges');
        return $this->database->resultset();
    }
    public function readVakken() {
        $this->database->query('SELECT * FROM subject');
        return $this->database->resultset();
    }



}