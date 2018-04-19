<?php $http=$_SERVER['REQUEST_URI'];
include_once('admin/connectionDb.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Price Saver Alert</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton|Playfair+Display:900" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="assets/css/SimpleChart.css">
	<link type="text/css" rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
	<div class="mainWrapper">
		<nav class="navbar navbar-default fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">Price Saver Alert</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
				<li><a href="about.php"><span class="fa fa-info"></span> About Us</a></li>
				<li><a href="contact.php"><span class="fa fa-envelope-o"></span> Contact Us</a></li>
		      	<?php if(isset($_SESSION['uid']) and $_SESSION['uid']!=''){ ?>
		      	<li class=""><a href="you_price.php"><span class="fa fa-dollar"></span> Your Prices</a></li>
		      	<li><a href="edit_account.php?uid=<?php echo $_SESSION['uid']; ?>"><span class="fa fa-pencil"></span> My Account</a></li>
		      	<li><a href="feedback.php"><span class="fa fa-list"></span> Feedback</a></li>
		      	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
		      	<?php } else{ ?>
		        <li><a href="login.php?http=<?php echo $http; ?>"><span class="fa fa-key"></span> Login</a></li>
		        <li><a href="registration.php"><span class="fa fa-user-o"></span> Registration</a></li>
		        <?php } ?>
		      </ul>
		    </div>
		  </div>
		</nav>