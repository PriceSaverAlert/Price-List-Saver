<?php
include_once('admin/connectionDb.php');
include_once('header.php');
include_once('check_login.php');

if(isset($_POST['feedback'])){
	$title=trim($_POST['title']);
	$message=trim($_POST['message']);
	$uid=trim($_POST['uid']);

	if(empty($title) || empty($message)){
		$error='<div class="alert alert-danger">Both Fields Are Required</div>';
	}
	else{
		$date=date('Y-m-d h:i:s');
		$feedback_sql="INSERT INTO feedback (uid,title,message,date) VALUES ('$uid','$title','$message','$date')";
		if(mysqli_query($con,$feedback_sql)){
			$seccess='<div class="alert alert-success">Feedback Submitted Successfuly</div>';
		}
		else{
			$error='<div class="alert alert-danger">Sorry Try Again</div>';
		}
	}
}
?>
		<div class="container">
			<?php
			$product_query="SELECT * FROM products WHERE cat_id=1";
			$products=mysqli_query($con,$product_query);
			?>
			<div class="col-md-3 col-xs-12 no-padding" id="all_cat">
				<ul>
					<li><h4>Product Categories</h4></li>
					<?php
						$cat_sql="SELECT * FROM category ORDER BY c_id ASC";
						$cat_result=mysqli_query($con,$cat_sql);
						if(mysqli_num_rows($cat_result)){
						while($cat=mysqli_fetch_assoc($cat_result)){
					?>
					<li><a href="product.php?c_id=<?php echo $cat['c_id']; ?>"><span class="fa <?php echo $cat['cat_icon']; ?>"></span> <?php echo $cat['cat_name']; ?></a></li>
					<?php }
					}
					else{
						echo '<li><h4>No Category Found</h4><li>';
					}
					?>
					
				</ul>
			</div>
			<div class="col-md-9 col-xs-12 col-sm-12 feedback no-padding">
				<div class="col-md-12 col-xs-12 col-sm-12 feedback-img">
					
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12 content">
					<h3 class="page-title"><span class="fa fa-envelope"> &nbsp; Feedback</span></h3>
					<?php if(isset($error)){echo $error;} ?>
					<?php if(isset($seccess)){echo $seccess;} ?>
					<form action="" method="post">
						<label class="control-label">Title (*)</label>
						<input type="text" name="title" class="form-control">
						<label class="control-label">Message (*)</label>
						<textarea name="message" class="form-control"></textarea><br>
						<input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
						<div class="text-right">
							<input type="reset" class="btn btn-primary">
							<input type="submit" name="feedback" value="Submit" class="btn btn-info">
						</div>
					</form>
				</div>
			</div>
		</div>
<?php include_once('footer.php'); ?>