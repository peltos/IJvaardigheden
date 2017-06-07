<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=ijburg-apps.nl.mysql;dbname=ijburg_apps_nl_ijburg06", "ijburg_apps_nl_ijburg06", "YliA2644+");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
session_start();
// Attempt search query execution
try{
    if(isset($_REQUEST['term'])){
        // create prepared statement
        $sql = "SELECT * FROM users WHERE first_name LIKE :term OR last_name LIKE :term OR schoolGroup_schoolGroup LIKE :term" ;
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST['term'] . '%';
        // bind parameters to statement
        $stmt->bindParam(':term', $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $userCount = 0;
            while($row = $stmt->fetch()){
                echo '<a href="editUser.php?edit=' . $row['oauth_uid'] . '">';
                    echo '<img src="'.$row['picture'].'">';
                    echo '<p>' . $row['first_name'] . ' ' . $row['last_name'];
                    if ($row['role'] == 0){
                        echo '<br> Klas: '. $row['schoolGroup_schoolGroup'];
                    }else if($row['role'] == 1){
                        echo '<br> Leraar';
                    }else{
                        echo '<br> admin';
                    }
                    echo '</p>';
                echo '</a>';
                
                $_SESSION["fName" . $row['oauth_uid']] = $row['first_name'];
                $_SESSION["lName" . $row['oauth_uid']] = $row['last_name'];
                $_SESSION["picture" . $row['oauth_uid']] = $row['picture'];
                $_SESSION["email" . $row['oauth_uid']] = $row['email'];
                $_SESSION["role" . $row['oauth_uid']] = $row['role'];
                $_SESSION["otherInfo" . $row['oauth_uid']] = $row['otherInfo'];
                
                $userCount++;
            }
        } else{
            echo "<p>No matches found";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>