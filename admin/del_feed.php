<?php
include_once('connectionDb.php');
$fid=$_GET['fid'];
$del_user_sql="DELETE FROM feedback WHERE fid='$fid'";
$del_status=mysqli_query($con,$del_user_sql);
if($del_status){
	header('Location: feedback.php?del_feed_status=success');
}
else{
	header('Location: feedback.php?del_feed_status=fail');
}