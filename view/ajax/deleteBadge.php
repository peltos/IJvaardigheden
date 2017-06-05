<?php
  $con=mysqli_connect("ijburg-apps.nl.mysql","ijburg_apps_nl_ijburg06","YliA2644+","ijburg_apps_nl_ijburg06");

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