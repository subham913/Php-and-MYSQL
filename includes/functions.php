<?php
function confirm_query($result_set)
{
  if(!$result_set)
   {
     Die("Database query failed: " . mysql_error());
    }
}

function get_all_subjects(){
global $connection;
$subject_set = mysql_query("SELECT * FROM subject ORDER BY position ASC", $connection);
confirm_query($subject_set);
return $subject_set;
}

function get_pages_for_subject($subject_id){
global $connection;
$page_set = mysql_query("SELECT * FROM pages WHERE subject_id = {$subject_id} ORDER BY position ASC", $connection);
confirm_query($page_set);
return $page_set;
}

function get_subject_by_id($subject_id){
global $connection;
$query = "SELECT * ";
$query .= " FROM subject ";
$query .= " WHERE id=" . $subject_id;
$result_set = mysqli_query($connection,$query);
confirm_query($result_set);
if($subject = mysqli_fetch_array($result_set))
{return $subject;}
else{return NULL;}
}

function get_page_by_id($page_id){
global $connection;
$query = "SELECT * ";
$query .= " FROM pages ";
$query .= " WHERE id=" . $page_id;
$result_set = mysqli_query($connection,$query);
confirm_query($result_set);
if($page = mysqli_fetch_array($result_set))
{return $page;}
else{return NULL;}
}
 
?>