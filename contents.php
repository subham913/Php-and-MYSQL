 <?php
 require("includes/connection.php")
?>

<?php require_once("includes/functions.php")?>
<?php include("includes/header.php")?>
<?php
 if(isset($_GET['subj'])){
    $sel_subj = $_GET['subj'];
    $sel_page = "";
}
elseif (isset($_GET['page'])){
    $sel_subj = "";
	$sel_page = $_GET['page'];
}
else {
          $sel_subj = "";
    $sel_page = "";
}
$sel_subject = get_subject_by_id($sel_subj);
$sel_page = get_page_by_id($sel_page)
 ?>
<table id= "structure">
     <tr>
       <td id="navigation">
<ul class="subject ">
        <?php
		$subject_set = get_all_subjects()   ;
while($subject = mysqli_fetch_array($subject_set))
   { 
     echo "<li";
if($subject["id"] == $sel_subj){ 
	echo "class=\"selected\"";
}
echo "><a href=\"contents.php?subj=" . 
urlencode($subject["id"]) . "\">{$subject["menu_name"]}</a></li>";
$page_set = get_pages_for_subject($subject["id"]);
echo "<ul class=\"pages\">";
while($page = mysqli_fetch_array($page_set))
   { 
     echo "<li";
if($page["id"] == $sel_page){ 
	echo "class=\"selected\"";
}
echo "><a href=\"contents.php?page=" . 
urlencode($page["id"]) . "\">{$page["menu_name"]}</a></li>"."</br>";
    }
echo "</ul>";
}
?>

       </td>
       <td id="page">
	  <h2><?php 
 			if(isset($sel_subject)){
				echo $sel_subject['menu_name'];
			}
			if(isset($sel_page)){
				echo $sel_page['menu_name'];
			}

 ?></h2>

       </td>
     </tr>
   </table>
 <?php include("includes/footer.php")?>   
