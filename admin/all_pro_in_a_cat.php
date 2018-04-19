<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_product.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="clearfix"></div>
				<?php
				if(isset($_GET['del_pro_status']) and $_GET['del_pro_status']=='success'){
					echo '<div class="alert alert-success">Product Deleted Successfully</div>';
				}
				if(isset($_GET['del_pro_status']) and $_GET['del_pro_status']=='fail'){
					echo '<div class="alert alert-danger">Failed To Delete Product</div>';
				}
				?>
				<h4>All Products</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($del_cat_status) and $del_cat_status=='success'){
						echo '<div class="alert alert-success">Category Deleted Successfully</div>';
					}
					elseif(isset($del_cat_status) and $del_cat_status=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$c_id=$_GET['c_id'];
					$all_pro_sql="SELECT * FROM products WHERE cat_id=$c_id ORDER BY pid DESC";
					$all_pro_result=mysqli_query($con,$all_pro_sql);
					if(mysqli_num_rows($all_pro_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>Product Name</th>
									<th>Product Image</th>
									<th>Description</th>
									<th>Price</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($product=mysqli_fetch_assoc($all_pro_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><a href="product_details.php?pid=<?php echo $product['pid']; ?>"><?php echo $product['p_title']; ?></a></td>
								<td><img src="../assets/images/products/<?php echo $product['p_img']; ?>" <?php if(isset($product['img_width']) and $product['img_width']!=0){echo 'width='.$product['img_width']; }else{echo 'width="60"'; } ?> <?php if(isset($product['img_height']) and $product['img_height']!=0){echo 'height='.$product['img_height']; }else{echo 'height="90"'; } ?>></td>
								<td width="300"><?php echo $product['p_desc']; ?>"</td>
								<td>$ <?php echo $product['p_price']; ?></td>
								<td class="action-con">
									<a href="product_details.php?pid=<?php echo $product['pid']; ?>" title="View Details" class=""><span class="fa fa-eye"></span></a>
									<a href="edit_pro.php?p_id=<?php echo $product['pid']; ?>" title="Edit Price" class=""><span class="fa fa-pencil"></span></a>
									<a href="del_pro.php?p_id=<?php echo $product['pid']; ?>" title="Delete Product"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
								</td>
							</tr>
							<?php
							$count++;
							}
							?>
							</tbody>
						</table>
							<?php
						}
					else{
						echo "<h4>No Product Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>