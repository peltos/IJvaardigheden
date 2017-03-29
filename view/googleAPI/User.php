<?php

class User {

    private $dbHost = "ronpelt.synology.me";
    private $dbUsername = "root";
    private $dbPassword = "kGjMtEO06BPiu2u4";
    private $dbName = "PAD-app";
    private $userTbl = 'users';

    function __construct() {
        if (!isset($this->db)) {
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Failed to connect with MySQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }

    function checkUser($userData = array()) {
        if (!empty($userData)) {
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM " . $this->userTbl . " WHERE oauth_uid = '" . $userData['oauth_uid'] . "'";
            $prevResult = $this->db->query($prevQuery);

//            if (preg_match("/[a-z]*+[0-9]/", $userData['email']) & $length === 24 & strpos($userData['email'], '@ijburgcollege.nl') !== false) {
//                echo "leerling";
//                if ($prevResult->num_rows > 0) {
//                    //Update user data if already exists
//                    $query = "UPDATE " . $this->userTbl . " SET first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', email = '" . $userData['email'] . "', gender = '" . $userData['gender'] . "', picture = '" . $userData['picture'] . "', modified = '" . date("Y-m-d H:i:s") . "' WHERE oauth_uid = '" . $userData['oauth_uid'] . "'";
//                    $update = $this->db->query($query);
//                } else {
//                    //Insert user data
//                    $query = "INSERT INTO " . $this->userTbl . " SET oauth_uid = '" . $userData['oauth_uid'] . "', first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', email = '" . $userData['email'] . "', gender = '" . $userData['gender'] . "', picture = '" . $userData['picture'] . "', role = '0', created = '" . date("Y-m-d H:i:s") . "', modified = '" . date("Y-m-d H:i:s") . "'";
//                    $insert = $this->db->query($query);
//                }
//                echo "Database updated";
//            } else if (!preg_match("/[0-9]/", $userData['email']) & strpos($userData['email'], '@ijburgcollege.nl')) {
//                echo "docent";
//                if ($prevResult->num_rows > 0) {
//                    //Update user data if already exists
//                    $query = "UPDATE " . $this->userTbl . " SET first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', email = '" . $userData['email'] . "', gender = '" . $userData['gender'] . "', picture = '" . $userData['picture'] . "', modified = '" . date("Y-m-d H:i:s") . "' WHERE oauth_uid = '" . $userData['oauth_uid'] . "'";
//                    $update = $this->db->query($query);
//                } else {
//                    //Insert user data
//                    $query = "INSERT INTO " . $this->userTbl . " SET oauth_uid = '" . $userData['oauth_uid'] . "', first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', email = '" . $userData['email'] . "', gender = '" . $userData['gender'] . "', picture = '" . $userData['picture'] . "', role = '1', created = '" . date("Y-m-d H:i:s") . "', modified = '" . date("Y-m-d H:i:s") . "'";
//                    $insert = $this->db->query($query);
//                }
//                echo "Databse updated";
//            } else if (strpos($userData['email'], '@ijburgcollege.nl')) {
//                echo "Wel Ijburgcollege.nl, geen leerling/docent";
//            } else {
//                echo "Geen ijburgcollege.nl";
//            }

            if ($prevResult->num_rows > 0) {
                //Update user data if already exists
                $query = "UPDATE " . $this->userTbl . " SET email = '" . $userData['email'] . "', first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "',  gender = '" . $userData['gender'] . "', picture = '" . $userData['picture'] . "', modified = '" . date("Y-m-d H:i:s") . "' WHERE oauth_uid = '" . $userData['oauth_uid'] . "'";
                $update = $this->db->query($query);
            } else {
                //Insert user data
                $query = "INSERT INTO " . $this->userTbl . " SET email = '" . $userData['email'] . "', oauth_uid = '" . $userData['oauth_uid'] . "', first_name = '" . $userData['first_name'] . "', last_name = '" . $userData['last_name'] . "', gender = '" . $userData['gender'] . "', picture = '" . $userData['picture'] . "', created = '" . date("Y-m-d H:i:s") . "', modified = '" . date("Y-m-d H:i:s") . "', role = '1' ";
                $insert = $this->db->query($query);
            }

            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }

        //Return user data
        return $userData;
    }

}

?>