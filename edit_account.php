<?php
include_once('admin/connectionDb.php');
include_once('check_login.php');
$account_detail_sql="SELECT * FROM users WHERE uid='".$_SESSION['uid']."'";
$result_acc=mysqli_query($con,$account_detail_sql);
$acc_row=mysqli_fetch_assoc($result_acc);
$uid=$_GET['uid'];
if(isset($_POST['update_acc'])){
	$fname=trim($_POST['fname']);
	$lname=trim($_POST['lname']);
	$email=trim($_POST['email']);
	$mobile=trim($_POST['mobile']);
	$pass=trim($_POST['pass']);
	$conpass=trim($_POST['conpass']);

	if(empty($fname)){
		$vali_error['fname']='Please Enter Your First Name';
	}
	if(empty($lname)){
		$vali_error['lname']='Please Enter Your Last Name';
	}
	if(empty($email)){
		$vali_error['email']='Please Enter Your Email';
	}
	if(!empty($mobile) and !is_numeric($mobile)){
		$vali_error['mobile']='Mobile Number Should Be Numeric';
	}
	if(empty($pass)){
		$vali_error['pass']='Please Enter Your Password';
	}
	if(!empty($pass) and strlen($pass)<4){
		$vali_error['min_length']='Your Password should Be At Least 4 Chacters';
	}
	if(!empty($pass) and strlen($pass)>4 and $pass!=$conpass){
		$vali_error['pass_match']='Both Password Should Be Same';
	}
	if(empty($vali_error)){
		$update_acc_sql="UPDATE users SET fname='$fname',lname='$lname',email='$email',mobile='$mobile',pass='$pass' WHERE uid='$uid'";
		if(mysqli_query($con,$update_acc_sql)){
			$update_acc_success='Updated Successfully';
		}
		else{
			$vali_error['fail_to_create_ac']='Sorry Try Again'.mysqli_error($con);
		}
	}
}
include_once('header.php');

?>
<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-12 well">
			<?php
				if(isset($vali_error['fail_to_create_ac']) and $vali_error['fail_to_create_ac']!=''){
					echo '<div class="text-danger">'.$vali_error['fail_to_create_ac'].'</div>';
				}
				if(isset($update_acc_success) and $update_acc_success!=''){
					echo '<div class="text-success">'.$update_acc_success.'</div>';
				}
			?>
			<h4>Edit Your Account</h4>
			<form action="" method="post" name="">
				<label for="fname" class="control-label">First Name (*)</label>
				<input type="text" class="form-control" name="fname" value="<?php echo $acc_row['fname']; ?>" id="fname" required>
				<?php
				if(isset($vali_error['fname']) and $vali_error['fname']!=''){
					echo '<div class="text-danger">'.$vali_error['fname'].'</div>';
				}
				?>
				<label for="lname" class="control-label">Last Name (*)</label>
				<input type="text" class="form-control" name="lname" value="<?php echo $acc_row['lname']; ?>" id="lname" required>
				<?php
				if(isset($vali_error['fname']) and $vali_error['fname']!=''){
					echo '<div class="text-danger">'.$vali_error['fname'].'</div>';
				}
				?>
				<label for="email" class="control-label">Email (*)</label>
				<input type="email" class="form-control" name="email" value="<?php echo $acc_row['email']; ?>" id="email" required>
				<?php
				if(isset($vali_error['email']) and $vali_error['email']!=''){
					echo '<div class="text-danger">'.$vali_error['email'].'</div>';
				}
				?>
				<label for="mobile" class="control-label">Mobile</label>
				<input type="text" class="form-control" name="mobile" value="<?php echo $acc_row['mobile']; ?>" id="mobile">
				<?php
				if(isset($vali_error['mobile']) and $vali_error['mobile']!=''){
					echo '<div class="text-danger">'.$vali_error['mobile'].'</div>';
				}
				?>
				<label for="pass" class="control-label">Password (*)</label>
				<input type="password" class="form-control" name="pass" value="<?php echo $acc_row['pass']; ?>" id="pass" required>
				<?php
				if(isset($vali_error['pass']) and $vali_error['pass']!=''){
					echo '<div class="text-danger">'.$vali_error['pass'].'</div>';
				}
				if(isset($vali_error['min_length']) and $vali_error['min_length']!=''){
					echo '<div class="text-danger">'.$vali_error['min_length'].'</div>';
				}
				?>
				<label for="conpass" class="control-label">Confirm Password (*)</label>
				<input type="password" class="form-control" name="conpass" value="<?php echo $acc_row['pass']; ?>" id="conpass" required>
				<?php
				if(isset($vali_error['pass_match']) and $vali_error['pass_match']!=''){
					echo '<div class="text-danger">'.$vali_error['pass_match'].'</div>';
				}
				?><br>
				<div class="text-right">
					<button type="reset" class="btn btn-primary">Reset</button>
					<input type="submit" value="Update" name="update_acc" class="btn btn-success">
				</div>
			</form>
		</div>
</div>
<?php include_once('footer.php'); ?>