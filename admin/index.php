<?php
include_once('connectionDb.php');
if(isset($_POST['signin'])){

	$email=trim($_POST['email']);
	$pass=sha1(trim($_POST['pass']));

	if(empty($email)){
		$login_error['email']='Please Enter Your Register Email';
	}
	if(empty($pass)){
		$login_error['pass']='Please Enter Your Password';
	}
	if(empty($login_error)){
		$login_sql="SELECT aid FROM admin WHERE email='$email' AND pass='$pass'";
		$login_result=mysqli_query($con,$login_sql);

		if(mysqli_num_rows($login_result)>0){
			$row=mysqli_fetch_assoc($login_result);
			$_SESSION['aid']=$row['aid'];
			header('Location: dashboard.php');
		}
		else{
			$login_error['invalid']='Invalid Email Or Password';
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Price Saver Alert</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  <body>
<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-12 well" style="margin-top: 10%;">
			<?php
				if(isset($login_error['invalid']) and $login_error['invalid']!=''){
					echo '<div class="text-danger">'.$login_error['invalid'].'</div>';
				}
			?>
			<h4>Admin Login</h4>
			<form action="index.php" method="post">
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
