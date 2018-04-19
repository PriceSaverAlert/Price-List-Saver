<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
$id=$_GET['id'];
$fetch_aff_sql="SELECT * FROM affiliate WHERE id='$id'";
$fetch_cat_result=mysqli_query($con,$fetch_aff_sql);
$aff_row=mysqli_fetch_assoc($fetch_cat_result);
if(isset($_POST['editaff'])){
	$aff=trim($_POST['aff']);
	$id=$_POST['id'];


	if(empty($aff)){
		$aff_error['empty']='Please Enter Category';
	}
	if(empty($cat_error)){
		$edit_cat_sql="UPDATE affiliate SET affiliate_name='$aff' WHERE id='$id'";
		if(mysqli_query($con,$edit_cat_sql)){
			$aff_error['add_success']='Affliated Updated Succesfully';
		}
		else{
			$aff_error['add_fail']='Sorry Try Agin';
		}
	}
}
?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 well">
					<?php
						if(isset($aff_error['add_success']) and $aff_error['add_success']!=''){
							echo '<div class="alert alert-success">'.$aff_error['add_success'].'</div>';
						}
						if(isset($aff_error['add_fail']) and $aff_error['add_fail']!=''){
							echo '<div class="alert alert-danger">'.$aff_error['add_fail'].'</div>';
						}
					?>
					<h4>Edit Affiliate</h4>
					<form action="" method="post">
						<label for="cat" class="control-label">Affiliate (*)</label>
						<input type="text" class="form-control" name="aff" value="<?php echo $aff_row['affiliate_name']; ?>" id="cat">
						<?php
						if(isset($aff_error['empty']) and $aff_error['empty']!=''){
							echo '<div class="text-danger">'.$aff_error['empty'].'</div>';
						}
						?>
						<input type="hidden" class="" name="id" value="<?php echo $aff_row['id']; ?>" id="cat">
						<br><br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="editaff" class="btn btn-success">Edit Affliate</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>