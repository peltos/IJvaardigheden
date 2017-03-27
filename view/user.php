<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Een formulier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        <link href="view/css/bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body>
       
        <div class="fluid-container">
            <header class="col-xs-12 col-sm-4 col-md-3" style="height: 100vh; background: lightgrey; ">
                <a href="addUser.php"> addUser </a>
                <p>Logout from <a href="/pad/view/googleAPI/logout.php">Google</a></p>
            </header>
                <?php
                    $listCount = 0;
                    foreach($readList as $value) {
                        echo '<a href="editUser.php?edit='.$listCount.'" class="col-xs-12 col-sm-4 col-md-3">';
                        echo '<p name="fName '.$listCount.'">'.$value['firstName'].'</p>';
                        echo '<p name="insertion'.$listCount.'">';
                        if ($value['insertion'] != null) {
                            echo $value['insertion'];
                        }
                        else{
                            echo ' - ';
                        }
                        echo '<p name="lName'.$listCount.'">'.$value['lastName'].'</p>';
                        
                        echo '</p>';
                        echo '<p>';
                        if ($value['role'] == 0) {
                            echo 'Leerling';
                        }
                        else if ($value['role'] == 1){
                            echo 'Docent';
                        }
                        else if ($value['role'] == 2){
                            echo 'Admin';
                        }
                        else {
                            echo 'Unkown error';
                        }
                        echo '</p>';
                        echo '<p>';
                        if ($value['schoolGroup'] != null) {
                            echo $value['schoolGroup'];
                        }
                        else{
                            echo ' - ';
                        }
                        echo '</p>';
                        echo '</a>';
                        
                        $_SESSION["email" . $listCount] = $value['email'];
                        $_SESSION["fName" . $listCount] = $value['firstName'];
                        $_SESSION["insertion" . $listCount] = $value['insertion'];
                        $_SESSION["lName" . $listCount] = $value['lastName'];
                        $_SESSION["role" . $listCount] = $value['role'];
                        $_SESSION["schoolGroup" . $listCount] = $value['schoolGroup'];
                        
                        $listCount++;
                    }
                ?>
        </div>

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="view/js/bootstrap.min.js"></script>

    </body>
</html>
