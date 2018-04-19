<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
if(isset($_POST['addaff'])){
	$affiliate_name=trim($_POST['affi']);
	if(empty($affiliate_name)){
		$aff_error['empty']='Please Enter A Category';
	}
	if(empty($aff_error)){
		$date=date('Y-m-d h:i:s');
		$add_aff_sql="INSERT INTO affiliate (affiliate_name,date) VALUES ('$affiliate_name','$date')";
		$add_aff_result=mysqli_query($con,$add_aff_sql);
		if($add_aff_result){
			$aff_error['add_success']='Affliated Added Succesfully';
		}
		else{
			$aff_error['add_fail']='Failed To Add Affliated';
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
					<h4>Add Affiliate</h4>
					<form action="" method="post">
						<label for="cat" class="control-label">Affiliate (*)</label>
						<input type="text" class="form-control" name="affi" id="cat" required>
						<?php
						if(isset($aff_error['empty']) and $aff_error['empty']!=''){
							echo '<div class="text-danger">'.$aff_error['empty'].'</div>';
						}
						?>
						<br><br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="addaff" class="btn btn-success">Add Affiliate</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>