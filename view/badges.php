
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
                            echo '<div class="panel">';
                                echo '<div class="panel-body relativePanel">';
                                    echo '<center class="badgeCenter">';
                                        echo '<div class="imageBadgeContainer">';
                                            echo '<img class="imageBadge" src="view/img/' . $value['pathToImage'] . '.png">';
                                        echo '</div>';
                                        echo '<p>' . $value['subject_subject']. '</p> ';
                                        echo '<p>' . $value['description']. '</p>';
                                    echo '</center>  ';
                                    echo '<hr>';
                                    echo '<form class="starRating" id="'.$value['idbadges'].'">';
                                        echo '<fieldset class="rating closeRow" name="'.$value['idbadges'].'">';
                                            echo '<input type="radio" class="starcheck" id="cross-'.$value['idbadges'].'" name="rating'.$value['idbadges'].'" value="0" ';
                                            if ($value['done'] == 0 || $value['done'] == null) {echo 'checked';} 
                                            echo '/>';
                                            echo '<label value="'.$value['idbadges'].'" for="cross-'.$value['idbadges'].'" title="niet"><span>&#216;</span></label>';
                                        echo '</fieldset>';
                                        echo '<fieldset class="rating starRow" name="'.$value['idbadges'].'">';
                                            echo '<input type="radio" class="starcheck" id="star3-'.$value['idbadges'].'" name="rating'.$value['idbadges'].'" value="3" ';
                                            if ($value['done'] == 3) {echo 'checked';}         
                                            echo '/>';
                                            echo '<label value="'.$value['idbadges'].'" for="star3-'.$value['idbadges'].'" title="3"><span>&#9733</span></label>';
                                            
                                            echo '<input type="radio" class="starcheck" id="star2-'.$value['idbadges'].'" name="rating'.$value['idbadges'].'" value="2" ';
                                            if ($value['done'] == 2) {echo 'checked';}         
                                            echo '/>';
                                            echo '<label value="'.$value['idbadges'].'" for="star2-'.$value['idbadges'].'" title="2"><span>&#9733</span></label>';
                                            
                                            echo '<input type="radio" class="starcheck" id="star1-'.$value['idbadges'].'" name="rating'.$value['idbadges'].'" value="1" ';
                                            if ($value['done'] == 1) {echo 'checked';}         
                                            echo '/>';
                                            echo '<label value="'.$value['idbadges'].'" for="star1-'.$value['idbadges'].'" title="1"><span>&#9733</span></label>';
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
        <script src="view/vendor/jquery/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                        $(document).on('click', '.starcheck', function () {
                          var checkedId = $(this).parent().attr("name");
                          var checkedVal=$(this).val();
                          var pathInfo=$(this).parents("fieldset").siblings(".infoBadge");
 
                          $.ajax({
                              type:"post",
                              url:"https://oege.ie.hva.nl/~reinded003/view/process.php",
                              data:"checkedVal="+checkedVal+"&checkedId="+checkedId,
                              success:function(data){
                                 pathInfo.html(data);
                                 pathInfo.addClass("notificationStyle");
                              }
 
                          });
                          
 
                    });
               });
            
        </script>
<?php include 'footer.php'; ?>