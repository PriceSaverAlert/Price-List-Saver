<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_cat.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="clearfix"></div>
				<h4>User Price</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($_GET['del_status']) and $_GET['del_status']=='success'){
						echo '<div class="alert alert-success">User Price Deleted Successfully</div>';
					}
					elseif(isset($_GET['del_status']) and $_GET['del_status']=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$all_user_price_sql="SELECT id,u_id,p_id,price,lname,fname,p_title FROM user_price JOIN users ON user_price.u_id=users.uid JOIN products ON user_price.p_id=products.pid";
					$all_user_price_result=mysqli_query($con,$all_user_price_sql);
					if(mysqli_num_rows($all_user_price_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>User Name</th>
									<th>Product Name</th>
									<th>Offer Price</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($price=mysqli_fetch_assoc($all_user_price_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $price['fname'].' '.$price['lname']; ?></td>
								<td><?php echo $price['p_title']; ?></td>
								<td>$<?php echo $price['price']; ?></td>
								<td class="action-con">
									<a href="del_user_price.php?id=<?php echo $price['id']; ?>" title="Delete User Price"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
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
						echo "<h4>No User's Offer Price Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>