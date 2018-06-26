<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

include_once '../../config/config.php';
include_once '../../app/model/database_pdo.php';

try{
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
session_start();
// Attempt search query execution
try {
    if(isset($_REQUEST['term'])){
        // create prepared statement
        $sql = "SELECT * FROM users WHERE firstName LIKE :term OR lastName LIKE :term OR schoolGroup_schoolGroup LIKE :term" ;
        $stmt = $pdo->prepare($sql);
        $term = $_REQUEST['term'] . '%';
        // bind parameters to statement
        $stmt->bindParam(':term', $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $userCount = 0;
            while($row = $stmt->fetch()){ ?>
                <a href="editUser.php?edit=imageUser<?php echo $row['oauth_uid'] ?>">
                <div>
                    <img src="<?php echo $row['picture'] ?>">
                </div>
                <p>
                    <?php echo $row['firstName'] . $row['lastName'];
                    if ($row['role'] == 0) {
                        echo '<br> Klas: ' . $row['schoolGroup_schoolGroup'];
                    } else if ($row['role'] == 1) {
                        echo '<br> Leraar';
                    } else {
                        echo '<br> admin';
                    } ?>
                </p>
            </a>

            <?php
            $_SESSION["fName" . $row['oauth_uid']] = $row['firstName'];
            $_SESSION["lName" . $row['oauth_uid']] = $row['lastName'];
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
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>