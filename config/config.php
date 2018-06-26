<?php
session_start();
/**
 * 
 * @author IJB06
 * 
 */
//Constants to connect with the database
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'aoIr7f4olbOosmUf'); // verander dit
define('DB_HOST', 'ronpelt.synology.me');
define('DB_NAME', 'pad');

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

$_SESSION["username"] = "admin";
$_SESSION["email"] = "admin@ijburg.com";
$_SESSION['userPicture'] = "http://www.jmkxyy.com/admin-icon-png/admin-icon-png-18.jpg";
$_SESSION['userEmail'] = "leerling@ijburg.com";
$_SESSION["roleUser"] = 1;

//echo "<pre>".var_dump($_SESSION)."</pre>";