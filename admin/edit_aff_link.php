<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
}
$all_affi_link_name="SELECT affiliate_links.*,affiliate.affiliate_name FROM affiliate_links LEFT JOIN affiliate ON affiliate_links.id=affiliate.id WHERE affiliate_links.id='$id'";
$all_affi_link_result=mysqli_query($con,$all_affi_link_name);
$aff_link=mysqli_fetch_assoc($all_affi_link_result);
$all_cat_sql="SELECT * FROM category";
$all_cat_result=mysqli_query($con,$all_cat_sql);
if(isset($_POST['editafflink'])){
	$affiliate_id=trim($_POST['affi']);
	$affiliate_link=mysqli_real_escape_string($con,trim($_POST['affilink']));
	$cat_id=trim($_POST['cat_id']);
	$id=$_POST['id'];
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
		$add_aff_link_sql="UPDATE affiliate_links SET cat='$cat_id',affiliate_id='$affiliate_id',img='$img_name',affiliate_link='$affiliate_link' WHERE id='$id'";
		$add_aff_link_result=mysqli_query($con,$add_aff_link_sql);
		if($add_aff_link_result){
			$aff_link_error['add_success']='Affliate Link Added Succesfully';
		}
		else{
			$aff_link_error['add_fail']='Failed To Add Affliated';
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
						$all_affi_sql="SELECT * FROM affiliate";
						$all_affi_result=mysqli_query($con,$all_affi_sql);
					?>
					<h4>Edit Affiliate Link</h4>
					<form action="" method="post">
						<label for="cat" class="control-label">Select An Affiliate(*)</label>
						<select name="affi" class="form-control">
							<option value="">-- Select An Affiliate --</option>
							<?php while($aff=mysqli_fetch_assoc($all_affi_result)){ ?>
							<option value="<?php echo $aff['id']; ?>" <?php if($aff['id']==$aff_link['affiliate_id']){echo 'selected';} ?>><?php echo $aff['affiliate_name']; ?></option>
							<?php } ?>
						</select>
						<?php
						if(isset($aff_error['empty_affi']) and $aff_error['empty_affi']!=''){
							echo '<div class="text-danger">'.$aff_error['empty_affi'].'</div>';
						}
						?>
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
							<option value="<?php echo $cat['c_id']; ?>"<?php if($aff_link['cat']==$cat['c_id']){echo 'selected'; } ?>><?php echo $cat['cat_name']; ?></option>
							<?php } ?>
						</select>
						<?php
						if(isset($aff_error['empty_cat']) and $aff_error['empty_cat']!=''){
							echo '<div class="text-danger">'.$aff_error['empty_cat'].'</div>';
						}
						?>
						<label for="cat" class="control-label">Affiliate Link(*)</label>
						<input type="text" class="form-control" name="affilink" value="<?php echo $aff_link['affiliate_link']; ?>" required>
						<?php
						if(isset($aff_error['empty_link']) and $aff_error['empty_link']!=''){
							echo '<div class="text-danger">'.$aff_error['empty_link'].'</div>';
						}
						?>
						<input type="hidden" class="" name="id" value="<?php echo $aff_link['id']; ?>">
						<br><br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="editafflink" class="btn btn-success">Edit Affiliate Link</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>