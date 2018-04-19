<?php
include_once('connectionDb.php');
$id=$_GET['id'];
$del_user_price_sql="DELETE FROM user_price WHERE id='$id'";
$del_status=mysqli_query($con,$del_user_price_sql);
if($del_status){
	header('Location: user_price.php?del_status=success');
}
else{
	header('Location: user_price.php?del_status=fail');
}