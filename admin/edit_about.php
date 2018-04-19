<?php include_once('connectionDb.php'); ?>
<?php
$id=$_GET['id'];
$fetch_edit_about="SELECT * FROM about WHERE id='$id'";
$about_result=mysqli_query($con,$fetch_edit_about);
$content=mysqli_fetch_assoc($about_result);
if(isset($_POST['about'])){
	$id=trim($_POST['id']);
	$title=trim($_POST['title']);
	$content=trim($_POST['content']);

	if(empty($title) || empty($content)){
		$error['vali']='All Fields Are Required';
	}
	else{
		$update_about_sql="UPDATE about SET title='$title',content='$content' WHERE id='$id'";
		if(mysqli_query($con,$update_about_sql)){
			$error['success']='All Fields Are Required';
		}
		else{
			$error['fail']='Sorry Try Again';
		}
	}
}
?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="col-md-6 col-md-offset-3 well">
          	<?php if(isset($error['success']) and $error['success']!=''){
          			echo '<div class="alert alert-success">'.$error['success'].'</div>';
          		}
				if(isset($error['fail']) and $error['fail']!=''){
          			echo '<div class="alert alert-danger">'.$error['fail'].'</div>';
          		}
          		if(isset($error['vali']) and $error['vali']!=''){
          			echo '<div class="alert alert-danger">'.$error['vali'].'</div>';
          		}
          	?>
				<h4>About Us</h4>
				<form action="" method="post">
					<label for="title" class="control-label">Title</label>
					<input type="text" id="title" name="title" value="<?php if(isset($content['title'])){echo $content['title']; } ?>" class="form-control">
					<label for="content" class="control-label">Content</label>
					<textarea id="content" name="content" class="form-control"><?php if(isset($content['content'])){echo $content['content']; } ?></textarea><br>
					<input type="hidden" name="id" value="<?php echo $content['id']; ?>">
					<div class="text-right">
						<input type="reset" class="btn btn-info" value="Reset">
						<input type="submit" name="about" class="btn btn-success" value="Edit Content">
					</div>
				</form>
			</div>
          </section>
      </section>
<?php include_once('footer.php'); ?>	