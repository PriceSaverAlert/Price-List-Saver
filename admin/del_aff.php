<?php
include_once('connectionDb.php');
$id=$_GET['id'];
$del_aff_sql="DELETE FROM affiliate WHERE id='$id'";
$del_status=mysqli_query($con,$del_aff_sql);
if($del_status){
	header('Location: affiliate.php?del_aff_status=success');
}
else{
	header('Location: affiliate.php?del_aff_status=fail');
}