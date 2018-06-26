<?php
include_once '../../config/config.php';
include_once '../../app/model/database_pdo.php';

session_start();

  $con=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  $checkedName=$_POST["checkedName"];

  $query=mysqli_query($con,"UPDATE users SET schoolGroup_schoolGroup = null WHERE schoolGroup_schoolGroup = '$checkedName';");
  $query2=mysqli_query($con,"DELETE FROM schoolGroup WHERE schoolGroup = '$checkedName';");
 
  if($query){
    echo "&#10003;";
  }
  else{
    echo "&#10060;";
  }
?>