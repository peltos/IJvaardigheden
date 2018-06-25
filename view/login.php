<?php
session_start();
//Include GP config file && User class
include_once 'view/googleAPI/gpConfig.php';
include_once 'view/googleAPI/User.php';


if (isset($_GET['code'])) {
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
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
    $_SESSION['userFName'] = $gpUserProfile['given_name'];
    $_SESSION['userLName'] = $gpUserProfile['family_name'];
    $_SESSION['userPicture'] = $gpUserProfile['picture'];
    $_SESSION['userEmail'] = $gpUserProfile['email'];
    

    //Render facebook profile data
    if (!empty($userData)) {
        
        header("Location:admin.php");
        exit;
    } else {
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="' . filter_var($authUrl, FILTER_SANITIZE_URL) . '"><img class="loginGoogleImage" src="view/googleAPI/images/glogin.png" alt=""/></a>';
}
?>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="view/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="view/css/main.css">
    <link rel="stylesheet" href="view/css/custom.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div><?php echo $output; ?></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading"><b>IJBURG COLLEGE IJ-VAARDIGHEDEN</b></h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--    <script src="view/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
<!--    <script src="view/js/klorofil-common.js"></script>-->
</body>
</html>