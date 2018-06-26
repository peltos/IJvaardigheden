<?php
include_once '../../config/config.php';
include_once '../../app/model/database_pdo.php';

session_start();
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);


$checkedVal = $_POST["checkedVal"];
$checkedId = $_POST["checkedId"];
$checkedEmail = $_POST["checkedEmail"];

$query = mysqli_query($con, "INSERT INTO scoreList (users_email, badges_idbadges, done) VALUES ('$checkedEmail', $checkedId, $checkedVal)ON DUPLICATE KEY UPDATE done=$checkedVal;");

if ($query) {
    echo "&#10003;";
} else {
    echo "&#10060;";
}
?>