<?php
include_once('admin/connectionDb.php');
include_once('header.php');
?>
		<div class="container">
			<?php
			$about_query="SELECT * FROM about";
			$about_result=mysqli_query($con,$about_query);
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
					<?php if(mysqli_num_rows($about_result)>0){
						while($about=mysqli_fetch_assoc($about_result)){
					?>
						
						<div class="col-md-12 col-xs-12 no-padding about">
							<div class="about-img">
								
							</div>
							<div class="content">
								<h3 class="page-title"><span class="fa fa-compass"> <?php echo $about['title']; ?></h3>
								<div class="col-md-6 col-xs-12 no-padding">
									<h5><span class="fa fa-question"></span> &nbsp; Whow We Are ?</h5>
									Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
									<hr>
									<h5><span class="fa fa-heart"></span> &nbsp; What We Love To Do?</h5>
									It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
								</div>
								<div class="col-md-6 col-xs-12 no-padding">
									<?php echo $about['content']; ?>
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
			<div class="clearfix"></div>
		</div>
<?php include_once('footer.php'); ?>