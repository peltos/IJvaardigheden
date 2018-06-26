<?php
/**
 * PHP example for PAD students.
 * 
 * @author Pieter Leek <p.d.leek@hva.nl>
 * 
 */
include_once './config/config.php';
include_once './app/model/database_pdo.php';
require_once './app/controller/controller_edituser.php';

//kijk met welk request type je te maken hebt
$method = $_SERVER['REQUEST_METHOD']; 

$controller = new controllerEditUser();

//switch op de http methode 
switch ($method) {
    case 'GET':
        $controller->index();
        break;

    case 'PUT':

        break;

    case 'POST':

        if ($controller->writeForm($_POST)) {
            header('Location:admin.php'); 
        } else {
            require_once URL.'/view/error.php';
        }
        break;


    case 'DELETE':

        break;
}