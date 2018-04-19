<?php
include_once('connectionDb.php');
if(isset($_POST['search_term'])){
	$p_title=trim($_POST['search_term']);
	$search_sql="SELECT * FROM products WHERE p_title LIKE '%$p_title%'";
	$search_result=mysqli_query($con,$search_sql);
	if(mysqli_num_rows($search_result)>0){
		$html='<table class="table table-hover"><thead><tr><th>Sl. No.</th><th>Product Name</th><th>Product Image</th><th>Description</th><th>Price</th><th>[Actions]</th></tr></thead><tbody>';
		$count=1;
		while($titles=mysqli_fetch_assoc($search_result)){
			$html.='<tr><td>'.$count.'</td><td><a href="product_details.php?pid='.$titles['pid'].'">'.$titles['p_title'].'</a></td><td><img src="../assets/images/products/'.$titles['p_img'].'"';
			if(isset($titles['img_width']) and $titles['img_width']!=0){
				$html.='width='.$titles['img_width'];
			}
			else{
				$html.='width="60"';
			}
			if(isset($titles['img_height']) and $titles['img_height']!=0){
				$html.='height='.$titles['img_height'];
			}
			else{
				$html.='height="90"';
			}
			$html.='></td><td width="300">'.$titles['p_desc'].'</td><td>$'. $titles['p_price'].'</td><td class="action-con"><a href="product_details.php?pid='.$titles['pid'].'" title="View Details" class=""><span class="fa fa-eye"></span></a><a href="edit_pro.php?p_id='.$titles['pid'].'" title="Edit Price" class=""><span class="fa fa-pencil"></span></a><a href="del_pro.php?p_id='.$titles['pid'].'" title="Delete Product"><span onclick="return del_confirm();" class="fa fa-trash"></span></a></td></tr>';
			$count++;
		}
		$html.='</tbody></table>';
	}
	else{
		$html='<ul><li>No Data Found</li></ul>';
	}
	echo $html;
}
?>