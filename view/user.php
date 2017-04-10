<?php
// Start the session
session_start();
if ($_SESSION['userData'] == '') {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<head>
    <title>Admin</title>
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
<!--                <a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>-->
                <a href="/pad/view/googleAPI/logout.php">Logout from Google</a>
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
                        <li><a href="admin.html" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="#" class=""><i class="lnr lnr-cog"></i> <span>Vakken</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Gebruikers</h3>
                    <?php
                    $listCount = 0;
                    echo '<div class="row">';
                    foreach ($readList as $value) {
                        if ($listCount == 6) {
                            echo '</div>';
                            echo '<div class="row">';
                            $listCount = 0;
                        }
                        echo '<div class="col-md-2">';
                            echo '<div class="panel">';
                                echo '<div class="panel-body">';
                                    echo '<a href="editUser.php?edit=' . $listCount . '">';
                                        echo '<p name="fName ' . $listCount . '">' . $value['first_name']. ' ';
                                        echo  $value['last_name'] . '</p>';
                                        echo '<img class="imageUser" src="' . $value['picture'] . '">';
                                    echo '</a>';
                                echo '</div>';
                            echo '</div>';    
                        echo '</div>';

                        $_SESSION["fName" . $listCount] = $value['first_name'];
                        $_SESSION["lName" . $listCount] = $value['last_name'];

                        $listCount++;
                        
                    }
                    ?>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="view/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="view/js/klorofil-common.js"></script>
</body>
</html>
