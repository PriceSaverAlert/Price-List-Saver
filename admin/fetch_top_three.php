<?php include_once('connectionDb.php');
if(isset($_POST['cat_id'])){
	$cat_id=$_POST['cat_id'];
	$top_three_sql="SELECT products.*, category.label FROM products JOIN category ON products.cat_id=category.c_id WHERE top_three=1 AND cat_id='$cat_id' ORDER BY pid DESC";
	$top_three_result=mysqli_query($con,$top_three_sql);
	if(mysqli_num_rows($top_three_result)>0){
		while($records=mysqli_fetch_assoc($top_three_result)){
			$results['p_title'][]=$records['p_title'];
			$results['p_desc'][]=$records['p_desc'];
			$results['property'][]=$records['property'];
			$results['p_price'][]=$records['p_price'];
			$results['graph_values'][]=$records['graph_values'];
			$results['label'][]=$records['label'];
		}
	}
	else{
		$results['error']='No Data Found';
	}
	echo json_encode($results);
}
