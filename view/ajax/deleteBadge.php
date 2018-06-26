<?php
include_once '../../config/config.php';
include_once '../../app/model/database_pdo.php';

session_start();

  $con=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $checkedSubject=$_POST["checkedSubject"];
  $checkedDesc=$_POST["checkedDesc"];
  $checkedID=$_POST["checkedID"];

  $query=mysqli_query($con,"DELETE FROM scoreList WHERE badges_idbadges = '$checkedID';");
  $query2=mysqli_query($con,"DELETE FROM badges WHERE subject_subject = '$checkedSubject' AND description = '$checkedDesc';");
 
  if($query || $query2){
    echo "&#10003;";
  }
  else{
    echo "&#10060; <br>".$checkedSubject."<br>".$checkedDesc."<br>".$checkedID;;
  }
?>