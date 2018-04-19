<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
$cat_sql="SELECT * FROM category";
$cat_result=mysqli_query($con,$cat_sql);
$pid=$_GET['p_id'];
$fetch_pro_details_sql="SELECT * FROM products WHERE pid='$pid'";
$products_result=mysqli_query($con,$fetch_pro_details_sql);
$product=mysqli_fetch_assoc($products_result);
if(isset($_POST['editpro'])){
	$p_id=trim($_POST['pid']);
	$cat_id=trim($_POST['cat_id']);
	$p_title=trim($_POST['p_title']);
	$p_desc=addslashes(trim($_POST['p_desc']));
	$p_img=$_FILES['p_img'];
	$p_price=trim($_POST['p_price']);
	if(isset($_POST['top_three'])){
		$top_three=trim($_POST['top_three']);
	}
	else{
		$top_three=0;
	}
	if(isset($_POST['show_on_home'])){
		$show_on_home=$_POST['show_on_home'];
	}
	else{
		$show_on_home=0;
	}
	if($top_three){
		$graph_values=array_map('strtoupper',$_POST['graph_values']);
		if(empty($graph_values)){
			$pro_error['graph_values']='Please Enter Graph Values';
		}
		else{
			$graph_value='';
			foreach($graph_values as $graph){
				$graph_value.=$graph.'@|@';
			}
		}
		$years=$_POST['graph_year'];
		if(empty($years)){
			$pro_error['p_year']='Please Enter Year Price';
		}
		else{
			$year='';
			foreach($years as $y){
				$year.=$y.'@|@';
			}
		}
	}
	else{
		$graph_values='';
	}
	$prop='';
	if(isset($_POST['property']) and $_POST['property']!=''){
		$properties=$_POST['property'];
		foreach($properties as $property){
			if($property!=''){
				$prop.=$property.'@|@';
			}
		}
	}
	$img_width=trim($_POST['img_width']);
	$img_height=trim($_POST['img_height']);
	if(empty($p_price)){
		$pro_error['p_price']='Please Enter Product Price';
	}
	if(empty($cat_id)){
		$pro_error['cat_id']='Please Select A Product Category';
	}
	if(empty($p_title)){
		$pro_error['p_title']='Please Enter Title';
	}
	if(empty($p_desc)){
		$pro_error['p_desc']='Please Enter Description';
	}
	if(empty($pro_error)){
		if(isset($p_img['name']) and $p_img['name']!=''){
			$tem_name=$p_img['tmp_name'];
			$name=str_replace(' ','_' ,date('Y-m-d h-i-s').'_'.$p_img['name']);
			$path='../assets/images/products/'.$name;
			if(move_uploaded_file($tem_name,$path)){
				$price_update_sql="UPDATE products SET cat_id='$cat_id',p_title='$p_title',p_desc='$p_desc',property='$prop',img_width='$img_width',img_height='$img_height',p_price='$p_price',p_img='$name',show_on_home='$show_on_home',top_three='$top_three',year='$year',graph_values='$graph_value' WHERE pid='$p_id'";
			}
		}
		else{
			$p_img=$product['p_img'];
			$price_update_sql="UPDATE products SET cat_id='$cat_id',p_title='$p_title',p_desc='$p_desc',img_width='$img_width',img_height='$img_height',p_price='$p_price',p_img='$p_img',property='$prop',show_on_home='$show_on_home',top_three='$top_three',graph_values='$graph_value' WHERE pid='$p_id'";
		}
		if(mysqli_query($con,$price_update_sql)){
			$user_price_sql="SELECT DISTINCT u_id,p_id,price FROM user_price WHERE p_id='$p_id' ORDER BY id DESC";
			$user_price_result=mysqli_query($con,$user_price_sql);
			while($price_details=mysqli_fetch_assoc($user_price_result)){
				$uids[]=$price_details['u_id'];
				$pid=$price_details['p_id'];
				$user_price=$price_details['price'];
			}
			if($user_price>=$p_price){
				foreach($uids as $uid){
					$user_sql="SELECT fname,lname,email FROM users WHERE uid='$uid'";
					$product_sql="SELECT p_title FROM products WHERE pid='$pid'";
					$user_ruselts=mysqli_query($con,$user_sql);
					while($user=mysqli_fetch_assoc($user_ruselts)){
						$name=$user['fname'].' '.$user['lname'];
						$email=$user['email'];


						$product_ruselts=mysqli_query($con,$product_sql);
						$product=mysqli_fetch_assoc($product_ruselts);
						$pro_title=$product['p_title'];


						$to = $email;
						$subject = "At Your Price";
						$txt = "Hello ".$name.". The Product ".$pro_title." is now available at $ ".$p_price;
						$headers = "From: webmaster@example.com" . "\r\n" .
						"CC: somebodyelse@example.com";

						if(mail($to,$subject,$txt,$headers)){
							$pro_error['mail_success']="Notification sent by email";
						}
						else{
							$pro_error['mail_fail']="Failed to sent notification";
						}
					}
				}
			}
			$pro_error['update_success']='The Product Has Been Updated';
		}
		else{
			$pro_error['update_fail']='Sorry Try Again';
		}
	}
	
}
?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 well">
					<?php
						if(isset($pro_error['mail_success']) and $pro_error['mail_success']!=''){
							echo '<div class="alert alert-success">'.$pro_error['mail_success'].'</div>';
						}
						if(isset($pro_error['mail_fail']) and $pro_error['mail_fail']!=''){
							echo '<div class="alert alert-danger">'.$pro_error['mail_fail'].'</div>';
						}
					?>
					<?php
						if(isset($pro_error['update_success']) and $pro_error['update_success']!=''){
							echo '<div class="alert alert-success">'.$pro_error['update_success'].'</div>';
						}
						if(isset($pro_error['update_fail']) and $pro_error['update_fail']!=''){
							echo '<div class="alert alert-danger">'.$pro_error['update_fail'].'</div>';
						}
					?>
					<h4>Edit Ptoduct</h4>
					<form action="" method="post" enctype="multipart/form-data">
						<label for="cat_id" class="control-label">Category (*)</label>
						<select class="form-control" name="cat_id" id="cat">
							<?php while($cat=mysqli_fetch_assoc($cat_result)){ ?>
								<option value="<?php if(isset($cat['c_id'])){ echo $cat['c_id']; } ?>" <?php if(isset($cat['c_id']) and isset($product['cat_id']) and $cat['c_id']==$product['cat_id']){ ?>selected <?php } ?>><?php if(isset($cat['cat_name'])){ echo $cat['cat_name']; } ?></option>
							<?php } ?>
						</select>
						<?php
						if(isset($pro_error['cat_id']) and $pro_error['cat_id']!=''){
							echo '<div class="text-danger">'.$pro_error['cat_id'].'</div>';
						}
						?>
						<label for="p_title" class="control-label">Title (*)</label>
						<input type="text" class="form-control" name="p_title" id="p_title" value="<?php if(isset($product['p_title'])){echo $product['p_title']; } ?>">
						<?php
						if(isset($pro_error['p_title']) and $pro_error['p_title']!=''){
							echo '<div class="text-danger">'.$pro_error['p_title'].'</div>';
						}
						?>
						<label for="p_desc" class="control-label">Description (*)</label>
						<textarea name="p_desc" id="p_desc" class="form-control"><?php if(isset($product['p_desc'])){echo $product['p_desc']; } ?></textarea>
						<?php
						if(isset($pro_error['p_desc']) and $pro_error['p_desc']!=''){
							echo '<div class="text-danger">'.$pro_error['p_desc'].'</div>';
						}
						?>
						<label for="p_price" class="control-label">Price (*)</label>
						<input type="text" class="form-control" name="p_price" id="p_price" value="<?php if(isset($product['p_price'])){echo $product['p_price']; } ?>">
						<?php
						if(isset($pro_error['p_price']) and $pro_error['p_price']!=''){
							echo '<div class="text-danger">'.$pro_error['p_price'].'</div>';
						}
						?>
						<br>
						<label for="p_img" class="control-label">Image (*)</label>
						<?php if(isset($product['p_img'])){ ?>
						<img src="../assets/images/products/<?php echo $product['p_img']; ?>" <?php if(isset($product['img_width']) and $product['img_width']!=0){echo 'width='.$product['img_width']; }else{echo 'width="70"'; } ?> <?php if(isset($product['img_height']) and $product['img_height']!=0){echo 'height='.$product['img_height']; }else{echo 'height="120"'; } ?>>
						<?php } ?>
						<br><br>
						<input type="file" class="" name="p_img" id="p_img">
						<?php
						$top_fields_sql="SELECT label FROM category WHERE c_id='".$product['cat_id']."'";
						$top_fields_result=mysqli_query($con,$top_fields_sql);
						if(mysqli_num_rows($top_fields_result)==1){
							$all_labels=mysqli_fetch_assoc($top_fields_result);
							$labels=array_filter(explode('@|@',$all_labels['label']));
						}						
						?>
						<div class="add-labels">
						<?php
						$property=explode('@|@',$product['property']);
							for($i=0;$i<count($labels);$i++){
								echo '<label class="control-label">Label</label>';
								echo '<input type="text" class="form-control" value="'.$labels[$i].'" name="label[]">';
								echo '<label class="control-label">Value</label>';
								if(!empty($property[$i])){
									echo '<input type="text" class="form-control" value="'.$property[$i].'" name="property[]">';
								}
								else{
									echo '<input type="text" class="form-control" name="property[]">';
								}
							}
						?>
						</div>
						<br><button type="button" class="btn btn-info pull-right hide" id="add_pro">Add Property</button><br>
						<input type="hidden" name="pid" id='p_id' value="<?php echo $product['pid']; ?>">
						<label for="img_width" class="control-label">Image Width</label>
						<input type="text" name="img_width" class="form-control" id="img_width" value="<?php if(isset($product['img_width'])){echo $product['img_width']; } ?>">
						<label for="img_width" class="control-label">Image Height</label>
						<input type="text" name="img_height" class="form-control" id="img_height" value="<?php if(isset($product['img_width'])){echo $product['img_height']; } ?>">
						<br><label for="show_on_home" class="control-label ckeck"><input type="checkbox" name="show_on_home" value="1" <?php if(isset($product['show_on_home']) and $product['show_on_home']==1){echo 'checked=checked'; } ?> id="show_on_home"> <span></span> Show At Home</label><br><br>
						<label for="top-three" class="control-label ckeckbox"><input type="checkbox" name="top_three" value="1" <?php if(isset($product['top_three']) and $product['top_three']==1){echo 'checked=checked'; } ?> id="top-three"> <span></span> Add To Top Three</label><br><br>
						<div class="graph-val" <?php if(isset($product['top_three']) and $product['top_three']==1){ echo 'id="active"'; }?>>
							<?php
							$years=explode('@|@',$product['year']);
							$graph_values=explode('@|@',$product['graph_values']);
							for($i=0;$i<count($years);$i++){
									?>
									<label for="graph_value">Enter Year</label>
									<input type="text" class="form-control" value="<?php echo $years[$i]; ?>" name="graph_year[]" placeholder="2017">
									<?php
									if(isset($pro_error['year']) and $pro_error['year']!=''){
										echo '<div class="text-danger">'.$pro_error['year'].'</div>';
									}
									?>
									<label for="graph_value">According To Month</label>
									<input type="text" class="form-control" value="<?php echo $graph_values[$i]; ?>" name="graph_values[]" id="graph_value" placeholder=" 120 | 200 | 250 | 220">
									<?php
									if(isset($pro_error['graph_values']) and $pro_error['graph_values']!=''){
										echo '<div class="text-danger">'.$pro_error['graph_values'].'</div>';
									}
								}
								?>
							<div id="graph_val_error"></div>
						</div>
						<br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="editpro" class="btn btn-success">Edit Product</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>