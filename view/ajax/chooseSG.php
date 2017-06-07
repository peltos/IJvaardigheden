<?php
  $con=mysqli_connect("ijburg-apps.nl.mysql","ijburg_apps_nl_ijburg06","YliA2644+","ijburg_apps_nl_ijburg06");

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