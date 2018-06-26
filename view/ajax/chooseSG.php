<?php
include_once '../../config/config.php';
include_once '../../app/model/database_pdo.php';

session_start();

  $con=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  $checkedName=$_POST["checkedName"];
  $email=$_POST["email"];

  $query=mysqli_query($con,"UPDATE users SET schoolGroup_schoolGroup = '$checkedName' WHERE email = '$email';");
 
  if($query){
    echo "&#10003;";
  }
  else{
    echo "checkedName: ".$checkedName. "email: ".$email;
  }
?>