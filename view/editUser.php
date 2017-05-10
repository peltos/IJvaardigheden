<?php include 'headAdmin.php'; ?>
    <?php
    //connection with database
      $con = mysql_connect("oege.ie.hva.nl/phpmyadmin/", "reinded003", "qS9Fu8G8Oo2BBA") or
      die("Could not connect: " . mysql_error());
      //Select database
      mysql_select_db("zreinded003");
      //query
      $result = mysql_query("select * from users where email = emreerim.97@gmail.com");
      
      echo "<table border='1' style='border-collapse: collapse'>";
      while ($row = mysql_fetch_array($result))
      {
        echo 
          "<tr>"
          . "<td>".$row['email']."</td>"
          . "<td>".$row['first_name']."</td>"
          . "<td>".$row['last_name']."</td>"
          . "<td>".$row['gender']."</td>"
          . "<td>".$row['picture']."</td>"
          . "<td>".$row['created']."</td>"
          . "<td>".$row['modified']."</td>"
          . "<td>".$row['schoolGroup_schoolGroup']."</td>"
          . "</tr>";
        
      }
      echo "</table>";
      $mysql_close($con);
    ?>
<?php include 'footer.php'; ?>


