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
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Geef je voornaam">
                </div>
                <div class="form-group">
                    <label for="firstName">firstName</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Geef je achternaam">
                </div>
                <div class="form-group">
                    <label for="insertion">insertion</label>
                    <input type="text" class="form-control" id="insertion" name="insertion" placeholder="Geef je adres">
                </div>      
                <div class="form-group">
                    <label for="lastName">lastName</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Geef je postcode">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Geef je woonplaats">
                </div>        
                <div class="form-group">
                    <label for="role">role</label>
                    <input type="text" class="form-control" id="role" name="role" placeholder="Geef je woonplaats">
                </div>        
                <div class="form-group">
                    <label for="schoolGroup">group</label>
                    <input type="text" class="form-control" id="schoolGroup" name="schoolGroup" placeholder="Geef je woonplaats">
                </div>      

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>






        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="view/js/bootstrap.min.js"></script>






    </body>
</html>
