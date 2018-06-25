<?php


$servername = "ronpelt.synology.me";
$username = "root";
$password = "aoIr7f4olbOosmUf";
$dbname = "pad";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = ("SELECT role, schoolGroup_schoolGroup FROM users WHERE email = '" . $_SESSION['userEmail'] . "' ");
$result = $conn->query($sql);
?><!DOCTYPE html>
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
<body class="<?php
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $_SESSION["roleUser"] = $row["role"];
        if (!$row["role"] >= 1) {
            echo 'layout-fullwidth';
        }
    }
}
$conn->close();
?>">

    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = ("SELECT role, schoolGroup_schoolGroup FROM users WHERE email = '" . $_SESSION['userEmail'] . "' ");
    $result = $conn->query($sql);
    $sql2 = ("SELECT schoolGroup FROM schoolGroup");
    $result2 = $conn->query($sql2);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row["role"] == 0) {
                if ($row["schoolGroup_schoolGroup"] == null) {
                    echo '<div class="selectClassOverlay">';
                    echo '<div class="container-fluid">';
                    echo '<div class="panel">';
                    echo '<div class="panel-heading">';
                    echo '<h3 class="panel-title">Klas Selecteren</h3>';
                    echo '</div>';
                    echo '<div class="panel-body">';
                    echo '<select class="form-control schoolgroupStarter" name="schoolgroupStarter">';
                    while ($row2 = $result2->fetch_assoc()) {
                        echo '<option value="' . $row2['schoolGroup'] . '">' . $row2['schoolGroup'] . "</option>";
                    }
                    echo '</select>';
                    echo '<button class="btn btn-primary btn-block" type="submit">Submit</button>';
                    echo '<div class="infoBadge"> </div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
    }
    $conn->close();
    ?>

    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <img src="view/img/logo.jpg" alt="Logo" class="img-responsive logo">
            </div>
            <div class="container-fluid">
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = ("SELECT role, schoolGroup_schoolGroup FROM users WHERE email = '" . $_SESSION['userEmail'] . "' ");
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $_SESSION["roleUser"] = $row["role"];
        if ($row["role"] >= 1) {
            ?>
                            <div class="navbar-btn">
                                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                            </div>
                            <form class="navbar-form navbar-left">
                                <div class="search-box">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Zoeken..." />
                                    <div class="result panel"></div>
                                </div>
                            </form>
            <?php
        }
    }
}
$conn->close();
?>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $_SESSION['userPicture'] ?>" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['userFName'] . ' ' . $_SESSION['userLName'] ?></span> </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
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
                        <li><a href="admin.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
    echo 'active';
} ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="addBadge.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'addBadge.php') {
    echo 'active';
} ?>"><i class="lnr lnr-inbox"></i> <span>Badges Aanpassen</span></a></li>
                        <li><a href="SGAdmin.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'SGAdmin.php') {
    echo 'active';
} ?>"><i class="lnr lnr-cog"></i> <span>Klassen Aanpassen</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>


