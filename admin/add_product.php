<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
if(isset($_POST['addpro'])){
	$cat_id=trim($_POST['cat_id']);
	$p_title=trim($_POST['p_title']);
	$p_desc=addslashes(trim($_POST['p_desc']));
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
		$graph_value='';
		$year='';
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
	$p_img=$_FILES['p_img'];
	$img_ext_arry=explode('.',$_FILES['p_img']['name']);
	$img_ext=end($img_ext_arry);
	
	if(empty($p_img['name'])){
		$pro_error['img_empty']='Please Select An Image';
	}
	$expensions= array("jpeg","jpg","png");
	if(in_array($img_ext,$expensions)===false){
		$pro_error['img_type']='Please Select PNG Or JPG Image';
	}
	if(empty($cat_id)){
		$pro_error['cat_id']='Please Select A Category';
	}
	if(empty($p_title)){
		$pro_error['p_title']='Please Enter Product Title';
	}
	if(empty($p_desc)){
		$pro_error['p_desc']='Please Enter Product Description';
	}
	if(empty($p_price)){
		$pro_error['p_price']='Please Enter Product Price';
	}
	if(empty($pro_error)){
		$tem_name=$p_img['tmp_name'];
		$name=str_replace(' ','_' ,date('Y-m-d h-i-s').'_'.$p_img['name']);
		$path='../assets/images/products/'.$name;
		if(move_uploaded_file($tem_name,$path)){
			$date=date('Y-m-d h:i:s');
			$add_cat_sql="INSERT INTO products (cat_id,p_title,p_desc,p_img,property,p_price,img_width,img_height,show_on_home,top_three,year,graph_values,p_date) VALUES ('$cat_id','$p_title','$p_desc','$name','$prop','$p_price','$img_width','$img_height','$show_on_home','$top_three','$year','$graph_value','$date')";
			$add_cat_result=mysqli_query($con,$add_cat_sql);
			if($add_cat_result){
				$pro_error['add_success']='Product Added Succesfully';
			}
			else{
				$pro_error['add_fail']='Failed To Add Product';
			}
		}
		
	}
	
}
?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_product.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="col-md-6 col-md-offset-3 col-sm-12 well">
					<?php
						if(isset($pro_error['add_success']) and $pro_error['add_success']!=''){
							echo '<div class="alert alert-success">'.$pro_error['add_success'].'</div>';
						}
						if(isset($pro_error['add_fail']) and $pro_error['add_fail']!=''){
							echo '<div class="alert alert-danger">'.$pro_error['add_fail'].'</div>';
						}
					?>
					<h4>Add Ptoduct</h4>
					<form action="" method="post" enctype="multipart/form-data" onSubmit="return vali_pro();">
						<label class="control-label" for="cat">Category</label>
						<?php
						$cat_sql="SELECT * FROM category";
						$cat_result=mysqli_query($con,$cat_sql);
						?>
						<select name="cat_id" class="form-control" id="cat">
							<option value="">-- Select A category --</option>
							<?php
							while ($cat=mysqli_fetch_assoc($cat_result)) {
							?>
							<option value="<?php echo $cat['c_id']; ?>" <?php if(isset($_POST['cat_id'])){if($cat['c_id']==$_POST['cat_id']){echo 'selected'; }} ?>><?php echo $cat['cat_name']; ?></option>
							<?php
							}
							?>
						</select>
						<div class="cat"></div>
						<?php
						if(isset($pro_error['cat_id']) and $pro_error['cat_id']!=''){
							echo '<div class="text-danger">'.$pro_error['cat_id'].'</div>';
						}
						?>
						<label for="p_title" class="control-label">Product Title (*)</label>
						<input type="text" class="form-control" name="p_title" id="p_title" id="p_title" <?php if(isset($_POST['p_title'])){echo 'value="'.$_POST['p_title'].'"'; } ?>>
						<?php
						if(isset($pro_error['p_title']) and $pro_error['p_title']!=''){
							echo '<div class="text-danger">'.$pro_error['p_title'].'</div>';
						}
						?>
						<div class="p_title"></div>
						<label for="p_desc" class="control-label">Description (*)</label>
						<textarea class="form-control" name="p_desc" id="p_desc"> <?php if(isset($_POST['p_desc'])){echo $_POST['p_desc']; } ?></textarea>
						<?php
						if(isset($pro_error['p_desc']) and $pro_error['p_desc']!=''){
							echo '<div class="text-danger">'.$pro_error['p_desc'].'</div>';
						}
						?>
						<div class="p_desc"></div>
						<label for="p_price" class="control-label">Price (*)</label>
						<input type="text" class="form-control" name="p_price" id="p_price" <?php if(isset($_POST['p_price'])){echo 'value="'.$_POST['p_price'].'"'; } ?>>
						<?php
						if(isset($pro_error['p_price']) and $pro_error['p_price']!=''){
							echo '<div class="text-danger">'.$pro_error['p_price'].'</div>';
						}
						?>
						<div class="p_price"></div>

						<div class="add-labels">

						</div>
						<br><button type="button" class="btn btn-info pull-right hide" id="add_pro">Add Property</button><br>
						<label for="p_img" class="control-label">Image (*)</label>
						<input type="file" class="" name="p_img" id="p_img">
						<?php
						if(isset($pro_error['img_empty']) and $pro_error['img_empty']!=''){
							echo '<div class="text-danger">'.$pro_error['img_empty'].'</div>';
						}
						if(isset($pro_error['img_type']) and $pro_error['img_type']!=''){
							echo '<div class="text-danger">'.$pro_error['img_type'].'</div>';
						}
						?>
						<label for="img_width" class="control-label">Image Width</label>
						<input type="text" name="img_width" class="form-control" id="img_width" <?php if(isset($_POST['img_width'])){echo 'value="'.$_POST['img_width'].'"'; } ?>>
						<label for="img_width" class="control-label">Image Height</label>
						<input type="text" name="img_height" class="form-control" id="img_height" <?php if(isset($_POST['img_height'])){echo 'value="'.$_POST['img_height'].'"'; } ?>>
						<br>
						<label for="show_on_home" class="control-label ckeck"><input type="checkbox" name="show_on_home" value="1" <?php if(isset($_POST['show_on_home']) and $_POST['show_on_home']==1){echo 'checked=checked'; } ?> id="show_on_home"> <span></span> Show At Home</label><br><br>
						<label for="top-three" class="control-label ckeckbox"><input type="checkbox" name="top_three" value="1" <?php if(isset($_POST['top_three']) and $_POST['top_three']==1){echo 'checked=checked'; } ?> id="top-three"> <span></span> Add To Top Three</label><br><br>
						<div class="graph-val" <?php if(isset($_POST['top_three']) and $_POST['top_three']==1){ echo 'id="active"'; }?>>
							
							<?php
							if(isset($pro_error['year']) and $pro_error['year']!=''){
								echo '<div class="text-danger">'.$pro_error['year'].'</div>';
							}
							if(!isset($years)){
								?>
								<label for="graph_value">Enter Year</label>
								<input type="text" class="form-control" name="graph_year[]" placeholder="2017">
								<label for="graph_value">According To Month</label>
								<input type="text" class="form-control"  name="graph_values[]" id="graph_value" placeholder=" 120 | 200 | 250 | 220">
								<?php
							}
							if(isset($pro_error['graph_values']) and $pro_error['graph_values']!=''){
								echo '<div class="text-danger">'.$pro_error['graph_values'].'</div>';
							}
							if(isset($years)){

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
							}
							?>
							<div id="graph_val_error"></div>
							<div class="add_more_year">

							</div>
							<br><button type="button" id="addMoreGraphVal" class="btn btn-info pull-right">Add Another</button>
							<div class="clearfix"></div>
						</div>
						<br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="addpro" class="btn btn-success" id="product_submit">Add Product</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>