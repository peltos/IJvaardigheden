<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '996529751909-ua9bnrd3j3bmvpei3kjj6ie89fm4ghku.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'qUeA8OGGABFKkSl4jJXp-RKU'; //Google client secret
$redirectURL = 'https://oege.ie.hva.nl/~reinded003/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('PAD login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>