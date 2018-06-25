<?php
$servername = "ronpelt.synology.me";
$username = "root";
$password = "aoIr7f4olbOosmUf";
$dbname = "pad";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = ("SELECT role, schoolGroup FROM users WHERE email = '" . $_SESSION['userEmail'] . "' ");
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION["roleUser"] = $row["role"];
        }
    }
$conn->close();

if ($_SESSION["roleUser"] == 0) {
    header('Location: student.php');
}

include 'headAdmin.php';
?>

<!-- MAIN -->
<div class="main">
    <!-- MAIN readVakkenCONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Gebruikers</h3>
            <?php
            // Alle gebruikers worden ingeladen

            $listCount = 0;
            $userCount = 0;
            echo '<div class="row">';
            foreach ($readList as $value) {

                // voor elke 6 gebruikers wordt er een nieuwe Row aangemaakt
                if ($listCount == 6) {
                    echo '</div>';
                    echo '<div class="row">';
                    $listCount = 0;
                }
                echo '<div class="col-md-2">';
                echo '<div class="panel ">';
                echo '<div class="panel-body ">';
                echo '<center><a href="editUser.php?edit=' . $value['oauth_uid'] . '">';
                echo '<img class="imageUser" src="' . $value['picture'] . '">';
                echo '<p><strong>' . $value['first_name'] . ' ';
                echo $value['last_name'].'</strong>';
                if ($value['role'] == 0) {
                    echo '<br> Klas: ' . $value['schoolGroup_schoolGroup'];
                } else if ($row['role'] == 1) {
                    echo '<br> Leraar';
                } else {
                    echo '<br> admin';
                }
                echo '</p>';
                echo '</a></center>';
                echo '</div>';
                echo '</div>';
                echo '</div>';


                // de sessions die worden verzonden naar de editUser.php
                $_SESSION["fName" . $value['oauth_uid']] = $value['first_name'];
                $_SESSION["lName" . $value['oauth_uid']] = $value['last_name'];
                $_SESSION["picture" . $value['oauth_uid']] = $value['picture'];
                $_SESSION["email" . $value['oauth_uid']] = $value['email'];
                $_SESSION["role" . $value['oauth_uid']] = $value['role'];
                $_SESSION["otherInfo" . $value['oauth_uid']] = $value['otherInfo'];



                $listCount++;
                $userCount++;
            }
            ?>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<?php include 'footer.php'; ?>