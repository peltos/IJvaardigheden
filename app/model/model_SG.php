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

    public function readSchoolGroupList() {
        $this->database->query('SELECT * FROM schoolGroup');
        return $this->database->resultset();
    }




}