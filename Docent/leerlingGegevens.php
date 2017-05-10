<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Badges leerlingen</title>
  </head>
  <body>
    <?php
    //connection with database
      $con = mysql_connect("https://oege.ie.hva.nl/registratie/", "erime001", "qm56tt.FRzfu1p") or
      die("Could not connect: " . mysql_error());
      //Select database
      mysql_select_db("zerime001");
      //query
      $result = mysql_query("select * from users where email = emreerim.97@gmail.com");
      echo "<table border='1' style='border-collapse: collapse'>";
      echo "<th>Name of theTutorial</th><th>Pages</th><th>Examples</th><th>Author</th>";
      while ($row = mysql_fetch_array($result))
      {
        echo"<tr><td>".$row['email']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>"
        .$row['gender']."</td></tr>".$row['picture']."</td></tr>".$row['created']."</td></tr>".$row['modified']."</td></tr>"
        .$row['schoolGroup_schoolGroup']."</td></tr>";<br>}<br>echo "</table>";<br>mysql_close($con);  
    ?>
