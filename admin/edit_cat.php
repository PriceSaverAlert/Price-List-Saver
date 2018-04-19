<?php include_once('connectionDb.php'); ?>
<?php
include_once('header.php');
$c_id=$_GET['c_id'];
$fetch_cat_sql="SELECT * FROM category WHERE c_id='$c_id'";
$fetch_cat_result=mysqli_query($con,$fetch_cat_sql);
$cat_row=mysqli_fetch_assoc($fetch_cat_result);
if(isset($_POST['editcat'])){
	$cat=trim($_POST['cat']);
	$cat_icon=trim($_POST['cat_icon']);
	$c_id=$_POST['c_id'];

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
		$cat_error['empty']='Please Enter Category';
	}
	if(empty($cat_error)){
		$edit_cat_sql="UPDATE category SET cat_name='$cat',cat_icon='$cat_icon',label='$lbl' WHERE c_id='$c_id'";
		if(mysqli_query($con,$edit_cat_sql)){
			$cat_error['add_success']='Category Updated Succesfully';
		}
		else{
			$cat_error['add_fail']='Sorry Try Agin';
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
					<h4>Edit Category</h4>
					<form action="" method="post">
						<label for="cat" class="control-label">Category (*)</label>
						<input type="text" class="form-control" name="cat" value="<?php echo $cat_row['cat_name']; ?>" id="cat">
						<?php
						if(isset($cat_error['empty']) and $cat_error['empty']!=''){
							echo '<div class="text-danger">'.$cat_error['empty'].'</div>';
						}
						?>
						<label for="cat_icon" class="control-label">Category Icon (Font Awesome)</label>
						<input type="text" class="form-control" name="cat_icon" value="<?php echo $cat_row['cat_icon']; ?>" id="cat_icon">
						<input type="hidden" name="c_id"  value="<?php echo $cat_row['c_id']; ?>">
						<?php
						$label=explode('@|@',$cat_row['label']);
						for($i=0;$i<count($label)-1;$i++){
							echo '<label class="control-label">Label</label>';
							echo '<input type="text" class="form-control" value="'.$label[$i].'" name="label[]">';
						}
						
						?>
						<div class="add-here">

						</div>
						<br><button type="button" class="btn btn-info pull-right" id="add_pro">Add Label</button><br>
						<br><br>
						<br>
						<div class="text-right">
							<button type="reset" class="btn btn-primary">Reset</button>
							<button type="submit" name="editcat" class="btn btn-success">Edit Category</button>
						</div>
					</form>
				</div>
	    	</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>