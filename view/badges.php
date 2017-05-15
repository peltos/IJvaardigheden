
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
                    $starCount = 0;
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
                                    echo '<hr>';
                                    echo '<div class="starRating">';
                                        echo '<fieldset class="rating closeRow '.$starCount.'">';
                                            echo '<input type="radio" id="cross-'.$starCount.'" name="rating'.$starCount.'" value="3" ';
                                            if ($value['done'] == 0 || $value['done'] == null) {echo 'checked';} 
                                            echo '/><label for="cross-'.$starCount.'" title="niet"><span>&#216;</span></label>';
                                        echo '</fieldset>';
                                        echo '<fieldset class="rating starRow '.$starCount.'">';
                                            echo '<input type="radio" id="star3-'.$starCount.'" name="rating'.$starCount.'" value="3" ';
                                            if ($value['done'] == 3) {echo 'checked';}         
                                            echo '/><label for="star3-'.$starCount.'" title="3"><span>&#9733</span></label>';
                                            
                                            echo '<input type="radio" id="star2-'.$starCount.'" name="rating'.$starCount.'" value="2" ';
                                            if ($value['done'] == 2) {echo 'checked';}         
                                            echo '/><label for="star2-'.$starCount.'" title="2"><span>&#9733</span></label>';
                                            
                                            echo '<input type="radio" id="star1-'.$starCount.'" name="rating'.$starCount.'" value="1" ';
                                            if ($value['done'] == 1) {echo 'checked';}         
                                            echo '/><label for="star1-'.$starCount.'" title="1"><span>&#9733</span></label>';
                                        echo '</fieldset>';
                                        $starCount++;
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';    
                        echo '</div>';

                        $listCount++;
                        
                    }
                echo '</div>';
                    ?>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->

<?php include 'footer.php'; ?>