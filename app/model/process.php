<?php
  mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
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