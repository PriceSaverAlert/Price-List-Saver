<?php
include_once('connectionDb.php');
$p_id=$_GET['p_id'];
$select_img_sql="SELECT p_img FROM products WHERE pid='$p_id'";
$select_img_result=mysqli_query($con,$select_img_sql);
$img=mysqli_fetch_assoc($select_img_result);
$del_pro_sql="DELETE FROM products WHERE pid='$p_id'";
$del_status=mysqli_query($con,$del_pro_sql);
if($del_status){
	unlink('../assets/images/products/'.$img['p_img']);
	header('Location: products.php?del_pro_status=success');
}
else{
	header('Location: products.php?del_pro_status=fail');
}