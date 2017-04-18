
<?php include 'headAdmin.php'; ?>

        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Badges</h3>
                    <?php
                    
                    // Alle gebruikers worden ingeladen
                    
                    $listCount = 0;
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
                                    echo '<center><img class="imageUser" src="view/img/' . $value['pathToImage'] . '.png">';
                                    echo '<p>' . $value['subject_subject']. '</p> ';
                                    echo '<p>' . $value['description']. '</p></center>  ';
                                    
                                echo '</div>';
                            echo '</div>';    
                        echo '</div>';

                        $listCount++;
                        
                    }
                    ?>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->

<?php include 'footer.php'; ?>