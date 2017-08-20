<?php
 require("constants.php");
 $connection =mysqli_connect(db_server,db_user,db_pass);
if(!$connection)
   {
     Die("Database connection failed: " . mysqli_error());
    }

$db_select = mysqli_select_db($connection,db_name);
if(!$db_select)
   {
     Die("Database connection failed: " . mysqli_error());
    } 

?>
