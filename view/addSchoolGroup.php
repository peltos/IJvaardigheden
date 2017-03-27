<!DOCTYPE html>
<html>
<head>
    <title>Klas toevoegen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<a href="admin.php"> admin </a>
<br>
<a href="addUser.php"> Gebruiker toevoegen </a>
<div class="container">
    <h2>Voer de naam van de klas in</h2>
    <form method="post">
        <div class="form-group">
            <label for="cname">Klas</label>
            <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Geef de klas">
        </div>
        <button type="submit" class="btn btn-default" >Submit</button>
    </form>
</div>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="view/js/bootstrap.min.js"></script>

</body>
</html>