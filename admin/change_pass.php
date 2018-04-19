<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
<?php 
if(isset($_POST['changepass'])){
	$old_pass=sha1(trim($_POST['old_pass']));
	$new_pass=sha1(trim($_POST['new_pass']));
	$con_pass=sha1(trim($_POST['con_pass']));

	if($old_pass==''){
		$error['old_pass']='Please Enter Old Password';
	}
	if($new_pass==''){
		$error['new_pass']='Please Enter New Password';
	}
	if(strlen($new_pass)<4){
		$error['new_pass_len']='Please Enter At Least 4 Character';
	}
	if($new_pass!=$con_pass){
		$error['con_pass']='Password Did Not Match';
	}

	if(empty($error)){
		$select_pass="SELECT aid FROM admin WHERE pass='$old_pass'";
		$sql_result=mysqli_query($con,$select_pass);
		if(mysqli_num_rows($sql_result)>0){
			$change_pass_sql="UPDATE admin SET pass='$new_pass' WHERE aid='".$_SESSION['aid']."'";
			$sql_result=mysqli_query($con,$change_pass_sql);
			if($sql_result){
				$success='Password Changed Successfully';
			}
			else{
				$wrong='Please Try Again';
			}
		}
		else{
			$wrong_old_pass='Wrong Old Password';
		}
	}
}

?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h4>Change Password</h4>
	          	<div class="col-md-4 col-sm-6 col-xs-12">
	          	<?php
	          	if(isset($wrong_old_pass)){
	          		echo '<div class="alert alert-danger">'.$wrong_old_pass.'</div>';
	          	}
	          	if(isset($success)){
	          		echo '<div class="alert alert-success">'.$success.'</div>';
	          	}
	          	if(isset($wrong)){
	          		echo '<div class="alert alert-danger">'.$wrong.'</div>';
	          	}
	          	?>
          		<form action="" method="post">
          			<label for="old_pass">Old Password</label>
          			<input type="password" name="old_pass" id="old_pass" class="form-control"><br>
          			<?php
          			if(isset($error['old_pass'])){
          				echo '<div class="alert alert-danger">'.$error['old_pass'].'</div>';
          			}
          			?>
          			<label for="new_pass">New Password</label>
          			<input type="password" name="new_pass" id="new_pass" class="form-control"><br>
          			<?php
          			if(isset($error['new_pass'])){
          				echo '<div class="alert alert-danger">'.$error['new_pass'].'</div>';
          			}
          			?>
          			<label for="con_pass">Confirm Password</label>
          			<input type="password" name="con_pass" id="con_pass" class="form-control"><br>
          			<?php
          			if(isset($error['con_pass'])){
          				echo '<div class="alert alert-danger">'.$error['con_pass'].'</div>';
          			}
          			if(isset($error['new_pass_len'])){
          				echo '<div class="alert alert-danger">'.$error['new_pass_len'].'</div>';
          			}
          			?>
          			<div class="text-right">
          				<button type="reset" class="btn btn-info">Reset</button>
          				<button type="submit" name="changepass" class="btn btn-success">Change</button>
          			</div>
          		</form>
          	</div>
          </section>
      </section>