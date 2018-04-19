<?php
include_once('connectionDb.php');
$uid=$_GET['uid'];
$del_user_sql="DELETE FROM users WHERE uid='$uid'";
$del_status=mysqli_query($con,$del_user_sql);
if($del_status){
	header('Location: dashboard.php?del_status=success');
}
else{
	header('Location: dashboard.php?del_status=fail');
}