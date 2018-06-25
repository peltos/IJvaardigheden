<?php

/**
 * PHP example for PAD students.
 * 
 * @author Pieter Leek <p.d.leek@hva.nl>
 * 
 */

include_once './config/config.php';
include_once './app/model/database_pdo.php';
require_once __DIR__.'/app/controller/controller_login.php';

//kijk met welk request type je te maken hebt
$method = $_SERVER['REQUEST_METHOD'];

 $controller = new controllerLogin();

//switch op de http methode 
switch ($method) {
    case 'GET':
        $controller->index();
        break;

    case 'PUT':

        break;

    case 'POST':   
        break;

    case 'DELETE':

        break;
}