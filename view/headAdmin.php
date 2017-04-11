<?php
// Start the session
session_start();
if ($_SESSION['userData'] == '') {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<head>
    <title>IJ-vaardigheden - Admin</title>
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
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="admin.php"><img src="view/img/logo.jpg" alt="Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                
                                <img src="
                                    <?php echo $_SESSION['userPicture'] ?>
                                " class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['userFName'] . ' ' . $_SESSION['userLName'] ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="/pad/view/googleAPI/logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="admin.php" class="<?php if(basename($_SERVER['PHP_SELF']) == 'admin.php') {echo 'active';} ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="addUser.php" class="<?php if(basename($_SERVER['PHP_SELF']) == 'addUser.php') {echo 'active';} ?>"><i class="lnr lnr-cog"></i> <span>Toevoegen gebruiker</span></a></li>
                        <li><a href="SGAdmin.php" class="<?php if(basename($_SERVER['PHP_SELF']) == 'SGAdmin.php') {echo 'active';} ?>"><i class="lnr lnr-cog"></i> <span>Vakken</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <!-- END LEFT SIDEBAR -->