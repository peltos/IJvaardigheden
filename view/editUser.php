<?php include 'headAdmin.php'; ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Aanpassen gebruiker</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="lname">*Voornaam</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $_SESSION["fName" . $idUser] ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Tussenvoegsel</label>
                            <input type="text" class="form-control" id="insertion" name="insertion" value="<?php echo $_SESSION["insertion" . $idUser] ?>">
                        </div>      
                        <div class="form-group">
                            <label for="zipcode">*Achternaam</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $_SESSION["lName" . $idUser] ?>">
                        </div>
                        <div class="form-group">
                            <label for="city">*role</label><br>
                            
                            <!-- de sessions van de Admin.php worden hier ingeladen -->

                            <input type="radio" id="role0" name="role" value="0" <?php
                            if ($_SESSION["role" . $idUser] == 0) {
                                echo 'checked';
                            }
                            ?>> Leerling<br>

                            <input type="radio" id="role1" name="role" value="1" <?php
                            if ($_SESSION["role" . $idUser] == 1) {
                                echo 'checked';
                            }
                            ?>> Docent<br>
                            <input type="radio" id="role2" name="role" value="2" <?php
                                   if ($_SESSION["role" . $idUser] == 2) {
                                       echo 'checked';
                                   }
                            ?>> Admin<br>
                        </div>        
                        <br>
                        <div class="form-group">
                            <label for="city">group</label>
                            <select class="form-control" id="schoolGroup" name="schoolGroup">
                                <?php
                                // de groepen inladen in de tabel
                                foreach ($readList as $value) {
                                    echo '<option value="' . $value['schoolGroup'] . '">' . $value['schoolGroup'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>      

                        <button type="submit" class="btn btn-default" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
