<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_affiliate_link.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="clearfix"></div>
				<h4>All Affiliates Links</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($del_aff_status) and $del_aff_status=='success'){
						echo '<div class="alert alert-success">Affiliate Link Deleted Successfully</div>';
					}
					elseif(isset($del_aff_status) and $del_aff_status=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$all_aff_link_sql="SELECT affiliate_links.*,affiliate.affiliate_name FROM affiliate_links LEFT JOIN affiliate ON affiliate_links.affiliate_id=affiliate.id";
					$all_aff_link_result=mysqli_query($con,$all_aff_link_sql);
					if(mysqli_num_rows($all_aff_link_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>Affiliate Name</th>
									<th>Affiliate Link</th>
									<th>Date</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($aff=mysqli_fetch_assoc($all_aff_link_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $aff['affiliate_name']; ?></td>
								<td><iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="<?php echo $aff['affiliate_link']; ?>"></iframe></td>
								<td><?php echo $aff['date']; ?></td>
								<td class="action-con">
									
									<a href="edit_aff_link.php?id=<?php echo $aff['id']; ?>" title="Edit Affliate Links"><span class="fa fa-pencil"></span></a>
									<a href="del_aff_link.php?id=<?php echo $aff['id']; ?>" title="Delete Affliate Links"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
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
						echo "<h4>No Affliate Link Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>