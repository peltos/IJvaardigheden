
<?php
//Include GP config file && User class
include_once 'googleAPI/gpConfig.php';
include_once 'googleAPI/User.php';

if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();

    //Initialize User class
    $user = new User();

    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_uid' => $gpUserProfile['id'],
        'first_name' => $gpUserProfile['given_name'],
        'last_name' => $gpUserProfile['family_name'],
        'email' => $gpUserProfile['email'],
        'gender' => $gpUserProfile['gender'],
        'picture' => $gpUserProfile['picture']
    );
    $userData = $user->checkUser($gpUserData);

    //Storing user data into session
    $_SESSION['userData'] = $userData;

    //Render facebook profile data
        if (!empty($userData)) {
            header("Location:admin.php");
        } else {
            $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
        }

    
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img src="view/googleAPI/images/glogin.png" alt=""/></a>';
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Een formulier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="view/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
            h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
        </style>
    </head>
    <body>
        <?php
        print_r($userData['email'])
        
        ?>
        <div><?php echo $output; ?></div>
    </body>
</html>