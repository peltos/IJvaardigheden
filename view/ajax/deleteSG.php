<?php
  $con=mysqli_connect("ijburg-apps.nl.mysql","ijburg_apps_nl_ijburg06","YliA2644+","ijburg_apps_nl_ijburg06");

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