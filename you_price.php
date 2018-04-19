<?php
include_once('admin/connectionDb.php');
include_once('header.php');
?>
		<div class="container">
			<?php
			$user_price_query="SELECT products.p_title,products.p_price,user_price.id,user_price.price,user_price.date FROM  products LEFT JOIN user_price ON products.pid=user_price.p_id WHERE user_price.u_id='".$_SESSION['uid']."'";
			$user_price_result=mysqli_query($con,$user_price_query);
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
			<div class="col-md-9 col-xs-12 no-padding" id="banner">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
			    <!-- Indicators -->
			    <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			      <li data-target="#myCarousel" data-slide-to="3"></li>
			    </ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner">
			      <div class="item active">
			        <img src="assets/images/laptop.jpg" alt="Laptop" style="width:100%;">
			        <a href="product.php?c_id=2"><button type="button" class="buyNow">Buy Now</button></a>
			      </div>
			      <div class="item">
			        <img src="assets/images/mobile.png" alt="Mobile" style="width:100%;">
			        <a href="product.php?c_id=1"><button type="button" class="buyNow">Buy Now</button></a>
			      </div>
			      <div class="item">
			        <img src="assets/images/monitor.png" alt="Mobile" style="width:100%;">
			        <a href="product.php?c_id=2"><button type="button" class="buyNow">Buy Now</button></a>
			      </div>
			      <div class="item">
			        <img src="assets/images/mobileTwo.jpg" alt="Mobile" style="width:100%;">
			        <a href="product.php?c_id=1"><button type="button" class="buyNow">Buy Now</button></a>
			      </div>
			    </div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      <span class="sr-only">Next</span>
			    </a>
			  </div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-xs-12 xol-sm-12 product-wrapper">
					<?php if(mysqli_num_rows($user_price_result)>0){
						
					?>
						<h3>All Of Your Wish Price</h3>
						<div class="table table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Sl No.</th>
										<th>Product Name</th>
										<th>Original Price</th>
										<th>Your Price</th>
										<th>Your Entry Date</th>
										<th>[Edit Price]</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count=1;
									while($price=mysqli_fetch_assoc($user_price_result)){
									?>
										<tr>
											<td><?php echo $count ?></td>
											<td><?php echo $price['p_title']; ?></td>
											<td><?php echo '$'.$price['p_price'];?></td>
											<td><?php echo '$'.$price['price']; ?></td>
											<td><?php echo $price['date']; ?></td>
											<td><a href="edit_your_price.php?id=<?php echo $price['id']; ?>"><span class="fa fa-pencil"></span></a></td>
										</tr>
									<?php $count++; } ?>
								</tbody>
							</table>
						</div>
					<?php
					}
					else{
						echo "<h4>No Price Is Found In You List</h4>";
					}
					?>
				</div>
			</div>
		</div>
<?php include_once('footer.php'); ?>