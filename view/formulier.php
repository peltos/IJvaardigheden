<!DOCTYPE html>
<html>
    <head>
        <title>Een formulier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="view/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
       
        <div class="container">
            <h2>Vul dit formulier in</h2>
            <form method="post">
                <div class="form-group">
                    <label for="fname">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Geef je voornaam">
                </div>
                <div class="form-group">
                    <label for="lname">Voornaam</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Geef je achternaam">
                </div>
                <div class="form-group">
                    <label for="address">Tussenvoegsel</label>
                    <input type="text" class="form-control" id="insertion" name="insertion" placeholder="Geef je adres">
                </div>      
                <div class="form-group">
                    <label for="zipcode">Achternaam</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Geef je postcode">
                </div>
                <div class="form-group">
                    <label for="city">Wachwoord</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Geef je woonplaats">
                </div>
                <div class="form-group">
                    <label for="city">Wachtwoord herhalen</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Geef je woonplaats">
                </div> 
                <div class="form-group">
                    <label for="city">role</label>
                    
                    <input type="radio" class="form-control" id="role0" name="role" value="0" checked> Leerling<br>
                    <input type="radio" class="form-control" id="role1" name="role" value="1"> Docent<br>
                    <input type="radio" class="form-control" id="role2" name="role" value="2"> Admin<br>
                </div>        
                <br>
                <div class="form-group">
                    <label for="city">group</label>
                    <select class="form-control" id="schoolGroup" name="schoolGroup">
                    <?php 
                        $connection = new PDO('mysql:host=ronpelt.synology.me;dbname=PAD-app;charset=utf8', 'root', 'kGjMtEO06BPiu2u4');
                        $statement = $connection->query('SELECT * FROM schoolGroup');

                        while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="'.$row['groupName'].'">'.$row['groupName'].'</option>';
                        }
                    ?>
                    </select>
                </div>      

                <button type="submit" class="btn btn-default" >Submit</button>
            </form>
        </div>

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="view/js/bootstrap.min.js"></script>

    </body>
</html>
