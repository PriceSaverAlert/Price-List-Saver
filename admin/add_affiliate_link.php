<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
$all_affi_name="SELECT * FROM affiliate";
$all_affi_result=mysqli_query($con,$all_affi_name);
$all_cat_sql="SELECT * FROM category";
$all_cat_result=mysqli_query($con,$all_cat_sql);
if(isset($_POST['addafflinks'])){
	$affiliate_id=trim($_POST['affi']);
	$affiliate_link=mysqli_real_escape_string($con,trim($_POST['affilink']));
	$cat_id=trim($_POST['cat_id']);
	if(isset($_FILES['ebay_img']) and $_FILES['ebay_img']!=''){
		$img=$_FILES['ebay_img'];
	}
	if(empty($affiliate_id)){
		$aff_error['empty_affi']='Please Select A Affiliate Name';
	}
	if(empty($affiliate_link)){
		$aff_error['empty_link']='Please Enter A Affiliated Link';
	}
	if(empty($cat_id)){
		$aff_error['empty_cat']='Please Select A Category';
	}
	if(empty($aff_error)){
		if($img['name']!=''){
			$img_names=$img['name'];
			$img_name=str_replace(' ','_' ,date('Y-m-d h-i-s').'_'.$img_names['name']);
			$temp_name=$img['tmp_name'];
			$path='../assets/images/products/'.$img_name;
			move_uploaded_file($tem_name,$path);
		}
		else{
			$img_name='';
		}
		$date=date('Y-m-d h:i:s');
		$add_aff_link_sql="INSERT INTO affiliate_links (cat,affiliate_id,img,affiliate_link,date) VALUES ('$cat_id','$affiliate_id','$img_name','$affiliate_link','$date')";
		$add_aff_link_result=mysqli_query($con,$add_aff_link_sql);
		if($add_aff_link_result){
			$aff_link_error['add_success']='Affliate Link Added Succesfully';
		}
		else{
			$aff_link_error['add_fail']='Failed To Add Affliated Link';
		}
	}
	
}
?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 well">
					<?php
						if(isset($aff_link_error['add_success']) and $aff_link_error['add_success']!=''){
							echo '<div class="alert alert-success">'.$aff_link_error['add_success'].'</div>';
						}
						if(isset($aff_link_error['add_fail']) and $aff_link_error['add_fail']!=''){
							echo '<div class="alert alert-danger">'.$aff_link_error['add_fail'].'</div>';
						}
					?>
					<h4>Add Affiliate Link</h4>
					<form action="" method="post">
						<label for="cat" class="control-label">Select An Affiliate(*)</label>
						<select name="affi" class="form-control" id="forEbay">
							<option value="">-- Select An Affiliate --</option>
							<?php while($aff=mysqli_fetch_assoc($all_affi_result)){ ?>
							<option value="<?php echo $aff['id']; ?>"><?php echo $aff['affiliate_name']; ?></option>
							<?php } ?>
						</select>
						<div class="for-ebay">
							<label for="cat" class="control-label">Select An Image(*)</label>
							<input type="file" name="ebay_img"><br>
						</div>
						<?php
						if(isset($aff_error['empty_affi']) and $aff_error['empty_affi']!=''){
							echo '<div class="text-danger">'.$aff_error['empty_affi'].'</div>';
						}
						?>
						<label for="cat" class="control-label">Select A Category(*)</label>
						<select name="cat_id" class="form-control">
							<option value="">-- Select An Category --</option>
							<?php while($cat=mysqli_fetch_assoc($all_cat_result)){ ?>
							<option value="<?php echo $cat['c_id']; ?>"><?php echo $cat['cat_name']; ?></option>
							<?php } ?>
						</select>
						<?php
						if(isset($aff_error['empty_cat']) and $aff_error['empty_cat']!=''){
							echo '<div class="text-danger">'.$aff_error['empty_cat'].'</div>';
						}
						?>
						<label for="cat" class="control-label">Affiliate Link(*)</label>
						<input type="text" class="form-control" name="affilink" id="cat" required>
						<?php
						if(isset($aff_error['empty_link']) and $aff_error['empty_link']!=''){
							echo '<div class="text-danger">'.$aff_error['empty_link'].'</div>';
						}
						?>
						<br><br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="addafflinks" class="btn btn-success">Add Affiliate Link</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>