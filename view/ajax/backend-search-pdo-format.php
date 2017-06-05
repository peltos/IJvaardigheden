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
        $sql = "SELECT * FROM users WHERE first_name LIKE :term OR last_name LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST['term'] . '%';
        // bind parameters to statement
        $stmt->bindParam(':term', $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $userCount = 0;
            while($row = $stmt->fetch()){
                echo '<a href="editUser.php?edit=' . $userCount . '">';
                    echo '<img src="'.$row['picture'].'">';
                    echo '<p>' . $row['first_name'] . ' ' . $row['last_name'] .'</p>';
                echo '</a>';
                
                $_SESSION["fName" . $userCount] = $row['first_name'];
                $_SESSION["lName" . $userCount] = $row['last_name'];
                $_SESSION["picture" . $userCount] = $row['picture'];
                $_SESSION["email" . $userCount] = $row['email'];
                $_SESSION["role" . $userCount] = $row['role'];
                $_SESSION["otherInfo" . $userCount] = $row['otherInfo'];
                
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