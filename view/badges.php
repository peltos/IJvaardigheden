<?php if (!$_SESSION["roleUser"] == 0){ 
    header('Location: admin.php'); 
}
?>
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
                        if ($listCount == 4) {
                            echo '</div>';
                            echo '<div class="row">';
                            $listCount = 0;
                        }
                        echo '<div class="col-md-3">';
                            echo '<div class="panel ';
                            if ($value['done'] == 3) {echo 'rankGold';} 
                            else if($value['done'] == 2){echo 'rankSilver';}
                            else if($value['done'] == 1){echo 'rankBrown';}
                            else {echo 'rankNone';}
                            
                            echo '">';
                                echo '<div class="panel-body relativePanel">';
                                    echo '<center class="badgeCenter">';
                                        echo '<div class="imageBadgeContainer">';
                                            echo '<img class="imageBadge" src="view/img/' . $value['pathToImage'] . '.png">';
                                        echo '</div>';
                                        echo '<p>' . $value['subject_subject']. '</p> ';
                                        echo '<p>' . $value['description']. '</p>';
                                    echo '</center>  ';
                                    echo '<hr>';
                                    echo '<form class="starRating StudentPage" id="'.$value['idbadges'].'">';
                                        echo '<fieldset class="rating closeRow" name="'.$value['idbadges'].'">';
                                            
                                            echo '<label value="'.$value['idbadges'].'" for="cross-'.$value['idbadges'].'" title="niet"><span class="';
                                            if ($value['done'] == 0) {echo 'noneColor';} 
                                            echo '">&#216;</span></label>';
                                            
                                        echo '</fieldset>';
                                        echo '<fieldset class="rating starRow" name="'.$value['idbadges'].'">';
                                            
                                            echo '<label value="'.$value['idbadges'].'" for="star3-'.$value['idbadges'].'" title="3"><span class="';
                                            if ($value['done'] == 3) {echo 'starColor';} 
                                            echo '">&#9733</span></label>';
                                            
                                            echo '<label value="'.$value['idbadges'].'" for="star2-'.$value['idbadges'].'" title="2"><span class="';
                                            if ($value['done'] == 2 || $value['done'] == 3) {echo 'starColor';} 
                                            echo '">&#9733</span></label>';
                                            
                                            echo '<label value="'.$value['idbadges'].'" for="star1-'.$value['idbadges'].'" title="1"><span class="';
                                            if ($value['done'] == 3 || $value['done'] == 2 || $value['done'] == 1) {echo 'starColor';} 
                                            
                                            echo '">&#9733</span></label>';
                                            
                                        echo '</fieldset>';
                                        echo '<div class="infoBadge" > </div>';
                                        $starCount++;
                                        
                                    echo '</form>';
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