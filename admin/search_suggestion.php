<?php
include_once('connectionDb.php');
if(isset($_POST['search_term'])){
	$p_title=trim($_POST['search_term']);
	$search_sql="SELECT p_title FROM products WHERE p_title LIKE '%$p_title%' LIMIT 6";
	$search_result=mysqli_query($con,$search_sql);
	if(mysqli_num_rows($search_result)>0){
		$html='<ul>';
		while($titles=mysqli_fetch_assoc($search_result)){
			$html.='<li>'.$titles['p_title'].'</li>';
		}
		$html.='</ul>';
	}
	else{
		$html='<ul><li>No Data Found</li></ul>';
	}
	echo $html;
}
?>