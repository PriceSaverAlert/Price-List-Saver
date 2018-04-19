<?php
include_once('header.php');
$http=$_SERVER['REQUEST_URI'];
?>
		<div class="container">
			<?php
			$product_query="SELECT * FROM products WHERE show_on_home=1 ORDER BY pid DESC";
			$products=mysqli_query($con,$product_query);
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
					<?php if(mysqli_num_rows($products)>0){
						$id=1;
						while($product=mysqli_fetch_assoc($products)){
					?>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="product main-product" id="<?php echo $id; ?>">
								<div class="text-center product-image">
									<img src="assets/images/products/<?php echo $product['p_img']; ?>" <?php if(isset($product['img_width']) and $product['img_width']!=0){echo 'width='.$product['img_width']; }else{echo 'width="70"'; } ?> <?php if(isset($product['img_height']) and $product['img_height']!=0){echo 'height='.$product['img_height']; }else{echo 'height="120"'; } ?>>
								</div>
								<div class="text-center product-info">
									<h4><?php echo $product['p_title']; ?></h4>
									<p><?php $desc_arry=explode(' ',$product['p_desc']);$less_dec=array_slice($desc_arry,0,15);echo implode(' ',$less_dec).'...<a href="single_product.php?pid='.$product["pid"].'">View Details</a>'; ?></p>
									<p><strong>Price :</strong> $<?php echo $product['p_price']; ?></p>
									<p>
									Your price: <input type="text" name="user_price" class="user_price">
									<button <?php if(!isset($_SESSION['uid']) || $_SESSION['uid']==''){echo 'disabled'; } ?> type="button" class="btn_user_price" value="<?php echo $product['pid'] ?>" name="myprice">Submit</button>
									</p>
									<p class="ajax_result <?php echo $product['pid']; ?>"></p>
									<?php if(!isset($_SESSION['uid']) || $_SESSION['uid']==''){ ?><p>Please <a href="login.php?http=<?php echo $http; ?>">Login Here</a> To Submit</p><?php } ?>
								</div>
							</div>
						</div>
					<?php
					$id++;
						} 
					}
					else{
						echo "<h4>No Product Found In Phone Category</h4>";
					}
					?>
				</div>
			</div>
		</div>
<?php include_once('footer.php'); ?>