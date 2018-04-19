<?php
include_once('admin/connectionDb.php');
if(isset($_GET['http'])){
	$http=$_GET['http'];
}
else{
	$http=$_SERVER['HTTP_REFERER'];
}
if(isset($_POST['signin'])){
	$email=trim($_POST['email']);
	$pass=trim($_POST['pass']);

	if(empty($email)){
		$login_error['email']='Please Enter Your Register Email';
	}
	if(empty($pass)){
		$login_error['pass']='Please Enter Your Password';
	}
	if(empty($login_error)){
		$login_sql="SELECT uid FROM users WHERE email='$email' AND pass='$pass'";
		$login_result=mysqli_query($con,$login_sql);

		if(mysqli_num_rows($login_result)>0){
			$row=mysqli_fetch_assoc($login_result);
			$_SESSION['uid']=$row['uid'];
			header("Location: ".$http);
		}
		else{
			$login_error['invalid']='Invalid Email Or Password';
		}
	}
}
?>
<?php
include_once('header.php');
?>
<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-12 well">
			<?php
				if(isset($login_error['invalid']) and $login_error['invalid']!=''){
					echo '<div class="text-danger">'.$login_error['invalid'].'</div>';
				}
			?>
			<h4>Signin Here</h4>
			<form action="" method="post">
				<label for="email" class="control-label">Email (*)</label>
				<input type="text" class="form-control" name="email" id="email" required>
				<?php
				if(isset($login_error['email']) and $login_error['email']!=''){
					echo '<div class="text-danger">'.$login_error['email'].'</div>';
				}
				?>
				<label for="pass" class="control-label">Password (*)</label>
				<input type="password" class="form-control" name="pass" id="pass" required>
				<?php
				if(isset($login_error['pass']) and $login_error['pass']!=''){
					echo '<div class="text-danger">'.$login_error['pass'].'</div>';
				}
				?>
				<br>
				<div class="text-right">
					<button type="reset" class="btn btn-primary">Reset</button>
					<button type="submit" name="signin" class="btn btn-success">Signin</button>
				</div>
			</form>
		</div>
</div>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/custom.jquery.js"></script>
	<script>
		$(function(){
			$('.well').addClass('onload-top');
		});
		
	</script>
