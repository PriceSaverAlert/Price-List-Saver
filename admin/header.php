<?php
include_once('check_login.php');
include_once('connectionDb.php');
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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="dashboard.php" class="logo"><b>Price List</b></a>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/images/default_admin.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Welcome Admin</h5>
              	  	
                  <li class="mt">
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="category.php">
                          <i class="fa fa-pencil"></i>
                          <span>Category</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="products.php">
                          <i class="fa fa-file"></i>
                          <span>Products</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="user_price.php">
                          <i class="fa fa-user"></i>
                          <span>User Price</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="top_three.php">
                          <i class="fa fa-arrow-up"></i>
                          <span>Top Three</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="affiliate_link.php">
                          <i class="fa fa-link"></i>
                          <span>Affiliate Link</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="affiliate.php">
                          <i class="fa fa-globe"></i>
                          <span>Affiliate</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="about.php">
                          <i class="fa fa-info"></i>
                          <span>About Us</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="contact.php">
                          <i class="fa fa-envelope"></i>
                          <span>Contact Us</span>
                      </a>
                  </li>
                   <li class="">
                      <a href="feedback.php">
                          <i class="fa fa-list"></i>
                          <span>Feedback</span>
                      </a>
                  </li>
                  <li class="">
                      <a href="change_pass.php">
                          <i class="fa fa-lock"></i>
                          <span>Change Password</span>
                      </a>
                  </li>
              </ul>
          </div>
      </aside>