<?php
include_once('admin/connectionDb.php');
include_once('header.php');
?>
		<div class="container">
			<?php
			$contact_query="SELECT * FROM contact";
			$contact_result=mysqli_query($con,$contact_query);
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
			<div class="col-md-9 col-xs-12 no-padding banner" id="banner">
				<div class="col-md-12 col-xs-12 xol-sm-12 no-padding">
					<?php if(mysqli_num_rows($contact_result)>0){
						while($contact=mysqli_fetch_assoc($contact_result)){
					?>
						
						<div class="col-md-12 col-xs-12 no-padding contact">
							<div class="contact-img">
								
							</div>
							<div class="content">
								<h3 class="page-title"><span class="fa fa-bookmark"> <?php echo $contact['title']; ?></h3>
								<div class="col-md-6 col-xs-12 no-padding">
									<h5><span class="fa fa-envelope"></span> &nbsp; Office Address ?</h5>
									2711 N 1st St, San Jose, CA-95134

									<hr>
									<h5><span class="fa fa-envelope-open"></span> &nbsp; Mailling Address?</h5>
									2711 N 1st St, San Jose, CA-95134
								</div>
								<div class="col-md-6 col-xs-12 no-padding">
									<?php echo $contact['content']; ?>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						
					<?php
						} 
					}
					else{
						echo "<h4>No  Data Found</h4>";
					}
					?>
				</div>
			</div>
		</div>
<?php include_once('footer.php'); ?>