<?php if (!$_SESSION["roleUser"] >= 1){ header('Location: ../student.php'); }
    
include 'headAdmin.php';
?>

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Gebruikers</h3>
                    <?php
                    
                    // Alle gebruikers worden ingeladen
                    
                    $listCount = 0;
                    $userCount = 0;
                    echo '<div class="row">';
                    foreach ($readList as $value) {
                        
                        // voor elke 6 gebruikers wordt er een nieuwe Row aangemaakt
                        if ($listCount == 6) {
                            echo '</div>';
                            echo '<div class="row">';
                            $listCount = 0;
                        }
                        echo '<div class="col-md-2">';
                            echo '<div class="panel">';
                                echo '<div class="panel-body">';
                                    echo '<center><a href="editUser.php?edit=' . $userCount . '">';
                                        echo '<p name="fName ' . $userCount . '">' . $value['first_name']. ' ';
                                        echo  $value['last_name'] . '</p>';
                                        echo '<img class="imageUser" src="' . $value['picture'] . '">';
                                    echo '</a></center>';
                                echo '</div>';
                            echo '</div>';    
                        echo '</div>';
                        
                        
                        // de sessions die worden verzonden naar de editUser.php
                        $_SESSION["fName" . $userCount] = $value['first_name'];
                        $_SESSION["lName" . $userCount] = $value['last_name'];
                        $_SESSION["picture" . $userCount] = $value['picture'];
                        $_SESSION["email" . $userCount] = $value['email'];
                        $_SESSION["role" . $userCount] = $value['role'];
                        $_SESSION["otherInfo" . $userCount] = $value['otherInfo'];
                        
                        

                        $listCount++;
                        $userCount++;
                        
                    }
                    ?>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->

<?php include 'footer.php'; ?>