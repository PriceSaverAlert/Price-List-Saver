<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_aff_link.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="clearfix"></div>
				<?php
				if(isset($_GET['del_aff_link_status']) and $_GET['del_aff_link_status']=='success'){
					echo '<div class="alert alert-success">Product Deleted Successfully</div>';
				}
				if(isset($_GET['del_aff_link_status']) and $_GET['del_aff_link_status']=='fail'){
					echo '<div class="alert alert-danger">Failed To Delete Product</div>';
				}
				?>
				<h4>Affliate Links</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($del_cat_status) and $del_cat_status=='success'){
						echo '<div class="alert alert-success">Category Deleted Successfully</div>';
					}
					elseif(isset($del_cat_status) and $del_cat_status=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$id=$_GET['id'];
					$all_aff_link_sql="SELECT affiliate_links.*,affiliate.affiliate_name FROM affiliate_links LEFT JOIN affiliate ON affiliate_links.affiliate_id=affiliate.id WHERE affiliate_links.id='$id'";
					$all_aff_link_result=mysqli_query($con,$all_aff_link_sql);
					if(mysqli_num_rows($all_aff_link_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>Affiliate Name</th>
									<th>Affiliate Link</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($affliate=mysqli_fetch_assoc($all_aff_link_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $affliate['affliate_name']; ?></td>
								<td width="300"><?php echo $affliate['affiliate_link']; ?>"</td>
								<td class="action-con">
									<a href="affliate_link_details.php?id=<?php echo $affliate['id']; ?>" title="View Details" class=""><span class="fa fa-eye"></span></a>
									<a href="edit_pro.php?id=<?php echo $affliate['pid']; ?>" title="Edit" class=""><span class="fa fa-pencil"></span></a>
									<a href="del_pro.php?id=<?php echo $affliate['id']; ?>" title="Delete"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
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
						echo "<h4>No Affliate Links Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>