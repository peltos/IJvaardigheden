<?php
/**
 * Created by PhpStorm.
 * User: Roberto
 * Date: 20-3-2017
 * Time: 12:29
 */
session_start();

include_once './config/config.php';
include_once './app/model/database_pdo.php';
require_once __DIR__.'/app/controller/controller_addBadge.php';

//kijk met welke request type je te maken hebt
$method = $_SERVER['REQUEST_METHOD'];

$controller = new addBadgeController();

//switch op de http methode
switch ($method) {
    case 'GET':
        $controller->getBadges();
        break;

    case 'PUT':

        break;

    case 'POST':

        if ($controller->writeForm($_POST)) {
            header('Location:addBadge.php'); 
        } else {
            require_once __DIR__.'/view/error.php';
        }
        break;

    case 'DELETE':

        break;
}