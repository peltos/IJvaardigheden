<!DOCTYPE html>
<html>
    <head>
        <title>Een formulier</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap -->
        <link href="view/css/bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body>
       
        <div class="fluid-container">
            <header class="col-xs-12 col-sm-4 col-md-3" style="height: 100vh; background: lightgrey; ">
                <button>button</button><br>
                <button>button</button><br>
                <button>button</button><br>
                <button>button</button>
            </header>
            
            
                <?php 
                foreach($readList as $value) {
                    
                    echo '<a href="#" class="col-xs-12 col-sm-4 col-md-3">';
                    echo '<p>'.$value['email'].'</p>';
                    echo '<p>'.$value['firstName'].'</p>';
                    echo '<p>';
                    if ($value['insertion'] != null) {
                        echo $value['insertion'];
                    }
                    else{
                        echo ' - ';
                    }
                    echo '</p>';
                    echo '<p>'.$value['password'].'</p>';
                    echo '<p>';
                    if ($value['role'] == 0) {
                        echo 'Leerling';
                    }
                    else if ($value['role'] == 1){
                        echo 'Docent';
                    }
                    else if ($value['role'] == 2){
                        echo 'Admin';
                    }
                    else {
                        echo 'Unkown error';
                    }
                    echo '</p>';
                    echo '<p>'.$value['schoolGroup'].'</p>';
                    echo '</a>';
                }
            ?>
        </div>

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="view/js/bootstrap.min.js"></script>

    </body>
</html>
