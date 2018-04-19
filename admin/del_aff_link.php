<?php
include_once('connectionDb.php');
$id=$_GET['id'];
$del_aff_link_sql="DELETE FROM affiliate_links WHERE id='$id'";
$del_status=mysqli_query($con,$del_aff_link_sql);
if($del_status){
	header('Location: affiliate_link.php?del_aff_status=success');
}
else{
	header('Location: affiliate_link.php?del_aff_status=fail');
}