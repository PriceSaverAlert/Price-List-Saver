<?php
include_once('connectionDb.php');
$c_id=$_GET['c_id'];
$del_user_sql="DELETE FROM category WHERE c_id='$c_id'";
$del_status=mysqli_query($con,$del_user_sql);
if($del_status){
	header('Location: category.php?del_cat_status=success');
}
else{
	header('Location: dashboard.php?del_cat_status=fail');
}