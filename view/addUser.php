<?php include 'headAdmin.php'; ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Toevoegen gebruiker</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="fname">*Email</label>
                            <input type="text" class="form-control" id="email" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="lname">*Voornaam</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" >
                        </div>
                        <div class="form-group">
                            <label for="address">Tussenvoegsel</label>
                            <input type="text" class="form-control" id="insertion" name="insertion" >
                        </div>      
                        <div class="form-group">
                            <label for="zipcode">*Achternaam</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" >
                        </div>
                        <div class="form-group">
                            <label for="city">*Wachwoord</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                        <div class="form-group">
                            <label for="city">*Wachtwoord herhalen</label>
                            <input type="password" class="form-control" id="password2" name="password2" >
                        </div> 
                        <div class="form-group">
                            <label for="city">*role</label><br>

                            <input type="radio" id="role0" name="role" value="0" checked> Leerling<br>
                            <input type="radio" id="role1" name="role" value="1"> Docent<br>
                            <input type="radio" id="role2" name="role" value="2"> Admin<br>
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
</div>

<?php include 'footer.php'; ?>