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

    public function writePost($otherInfo,$schoolgroup) {
        
        $idUser = $_GET['edit'];
        $this->database->query("UPDATE users SET otherInfo ='".$otherInfo."', schoolGroup_schoolGroup ='".$schoolgroup."' WHERE email = '".$_SESSION["email" . $idUser]."'");
        $this->database->bind(':otherInfo', $otherInfo);
        $this->database->bind(':schoolgroup', $schoolgroup);
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readBadgeList($email) {
        $this->database->query("SELECT s.users_email, b.*, done FROM badges b LEFT JOIN scoreList s ON b.idbadges = s.badges_idbadges AND  s.users_email = '".$email."' ORDER BY b.idbadges;");
        return $this->database->resultset();
    }
    public function readSchoolGroupList() {
        $this->database->query("SELECT * FROM schoolGroup");
        return $this->database->resultset();
    }
    public function readUsersList($email) {
        $this->database->query("SELECT * FROM users WHERE email = '".$email."';");
        return $this->database->resultset();
    }

}
