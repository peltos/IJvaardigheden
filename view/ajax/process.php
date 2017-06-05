<?php
  $con=mysqli_connect("ijburg-apps.nl.mysql","ijburg_apps_nl_ijburg06","YliA2644+","ijburg_apps_nl_ijburg06");
  
 
  $checkedVal=$_POST["checkedVal"];
  $checkedId=$_POST["checkedId"];
  $checkedEmail=$_POST["checkedEmail"];

  $query=mysqli_query($con,"INSERT INTO scoreList (users_email, badges_idbadges, done) VALUES ('$checkedEmail', $checkedId, $checkedVal)ON DUPLICATE KEY UPDATE done=$checkedVal;");
 
  if($query){
    echo "&#10003;";
  }
  else{
    echo "&#10060;";
  }
?>