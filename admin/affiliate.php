<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_affiliate.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="clearfix"></div>
				<h4>All Affiliates</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($del_aff_status) and $del_aff_status=='success'){
						echo '<div class="alert alert-success">Affiliate Deleted Successfully</div>';
					}
					elseif(isset($del_aff_status) and $del_aff_status=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$all_aff_sql="SELECT * FROM affiliate";
					$all_aff_result=mysqli_query($con,$all_aff_sql);
					if(mysqli_num_rows($all_aff_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>Affiliate Name</th>
									<th>Date</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($aff=mysqli_fetch_assoc($all_aff_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><a href="all_links_in_a_aff.php?id=<?php echo $aff['id']; ?>"><?php echo $aff['affiliate_name']; ?></a></td>
								<td><?php echo $aff['date']; ?></td>
								<td class="action-con">
									<a href="all_links_in_a_aff.php?id=<?php echo $aff['id']; ?>" title="View All Affliliate"><span class="fa fa-eye"></span></a>
									<a href="edit_aff.php?id=<?php echo $aff['id']; ?>" title="Edit Category"><span class="fa fa-pencil"></span></a>
									<a href="del_aff.php?id=<?php echo $aff['id']; ?>" title="Delete Category"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
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
						echo "<h4>No Affiliate Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>