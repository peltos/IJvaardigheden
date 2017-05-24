<?php
  mysql_connect("ronpelt.synology.me","root","kGjMtEO06BPiu2u4");
  mysql_select_db("test");
 
  $checked=$_POST["checked"];
  $query=mysql_query("UPDATE comment
    SET message = $checked
    WHERE id = $checked;");
 
  if($query){
    echo "Your comment has been sent";
  }
  else{
    echo "Error in sending your comment";
  }
?>