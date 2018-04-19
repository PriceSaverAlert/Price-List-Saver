<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
if(isset($_POST['addcat'])){
	$cat=trim($_POST['cat']);
	$cat_icon=trim($_POST['cat_icon']);

	$lbl='';
	if(isset($_POST['label']) and $_POST['label']!=''){
		$labels=$_POST['label'];
		foreach($labels as $label){
			if($label!=''){
				$lbl.=$label.'@|@';
			}
		}
	}

	if(empty($cat)){
		$cat_error['empty']='Please Enter A Category';
	}
	if(empty($cat_error)){
		$date=date('Y-m-d h:i:s');
		$add_cat_sql="INSERT INTO category (cat_name,cat_icon,label,date) VALUES ('$cat','$cat_icon','$lbl','$date')";
		$add_cat_result=mysqli_query($con,$add_cat_sql);
		if($add_cat_result){
			$cat_error['add_success']='Category Added Succesfully';
		}
		else{
			$cat_error['add_fail']='Failed To Add Category';
		}
	}
	
}
?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-12 well">
					<?php
						if(isset($cat_error['add_success']) and $cat_error['add_success']!=''){
							echo '<div class="alert alert-success">'.$cat_error['add_success'].'</div>';
						}
						if(isset($cat_error['add_fail']) and $cat_error['add_fail']!=''){
							echo '<div class="alert alert-danger">'.$cat_error['add_fail'].'</div>';
						}
					?>
					<h4>Add Category</h4>
					<form action="" method="post">
						<label for="cat" class="control-label">Category (*)</label>
						<input type="text" class="form-control" name="cat" id="cat" required>
						<?php
						if(isset($cat_error['empty']) and $cat_error['empty']!=''){
							echo '<div class="text-danger">'.$cat_error['empty'].'</div>';
						}
						?>
						<label for="cat_icon" class="control-label">Category Icon (Font Awesome)</label>
						<input type="text" class="form-control" name="cat_icon" id="cat_icon">
						<div class="add-here">
							
						</div>
						<br><button type="button" class="btn btn-info pull-right" id="add_pro">Add Label</button><br>
						<br><br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="addcat" class="btn btn-success">Add Category</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>