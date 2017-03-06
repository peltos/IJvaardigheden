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
                    <label for="fname">Mijn voornaam</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Geef je voornaam">
                </div>
                <div class="form-group">
                    <label for="lname">Mijn achternaam</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Geef je achternaam">
                </div>
                <div class="form-group">
                    <label for="address">Straat</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Geef je adres">
                </div>      
                <div class="form-group">
                    <label for="zipcode">Postcode</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Geef je postcode">
                </div>          

                <div class="form-group">
                    <label for="city">Woonplaats</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Geef je woonplaats">
                </div>        

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>






        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="view/js/bootstrap.min.js"></script>






    </body>
</html>
