
    <?php
    try {
    // trying to connect with database
    $pdoConnect = new PDO("mysql:host=oege.ie.hva.nl;dbname=zreinded003","reinded003","qS9Fu8G8Oo2BBA");
    } catch (PDOException $exc) {
    // catch the onnection problem
    echo $exc->getMessage();
    exit();
      }
    // result of the mysql select query
    $pdoResult = $pdoConnect->query("SELECT * FROM users WHERE first_name = 'emre'");

     //displaying data from database mysql using foreach loop
     foreach ($pdoResult as $row)
     {
     echo "$row[0] - $row[1] - $row[2] - $row[3]<br>";
    }


?>
<?php include 'headAdmin.php'; ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Profiel pagina</h3>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="profilePic">
                                <img src="https://lh4.googleusercontent.com/-Mo9_ggPGBFU/AAAAAAAAAAI/AAAAAAAAAaY/KF3BtR7jr_4/photo.jpg"/>
                            </div>
                            <div class="profileContainer">
                                <p>Naam: Linda</p>
                                <p>Achternaam: de Mol</p>
                                <p>Rol: Student</p>
                                <p>Email: LindaDeMol@ijburg.com</p>
                            </div>
                            <div class="profileContainer">
                                <p>Badge hoeveelheid: 22</p>
                                <textarea>is een beetje dom</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        echo '<div class="panel-body">';
                            echo '<center class="badgeCenter">';
                                echo '<div class="imageBadgeContainer">';
                                    echo '<img class="imageBadge" src="view/img/' . $value['pathToImage'] . '.png">';
                                echo '</div>';
                                echo '<p>' . $value['subject_subject']. '</p> ';
                                echo '<p>' . $value['description']. '</p>';
                            echo '</center>  ';
                            echo '<hr>';
                            echo '<div class="starRating">';
                                echo '<fieldset class="rating closeRow '.$starCount.'">';
                                    echo '<input type="radio" id="cross-'.$starCount.'" name="rating'.$starCount.'" value="3" /><label for="cross-'.$starCount.'" title="niet"><span>&#9747</span></label>';
                                echo '</fieldset>';
                                echo '<fieldset class="rating starRow '.$starCount.'">';
                                    echo '<input type="radio" id="star3-'.$starCount.'" name="rating'.$starCount.'" value="3" /><label for="star3-'.$starCount.'" title="3"><span>&#9733</span></label>';
                                    echo '<input type="radio" id="star2-'.$starCount.'" name="rating'.$starCount.'" value="2" /><label for="star2-'.$starCount.'" title="2"><span>&#9733</span></label>';
                                    echo '<input type="radio" id="star1-'.$starCount.'" name="rating'.$starCount.'" value="1" /><label for="star1-'.$starCount.'" title="1"><span>&#9733</span></label>';
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
