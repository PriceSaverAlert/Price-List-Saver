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
				if(isset($_GET['del_feed_status']) and $_GET['del_feed_status']=='success'){
					echo '<div class="alert alert-success">Feedback Deleted Successfully</div>';
				}
				if(isset($_GET['del_feed_status']) and $_GET['del_feed_status']=='fail'){
					echo '<div class="alert alert-danger">Failed To Delete Feedback</div>';
				}
				?>
				<h4>All Feedbacks</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($del_cat_status) and $del_cat_status=='success'){
						echo '<div class="alert alert-success">Category Deleted Successfully</div>';
					}
					elseif(isset($del_cat_status) and $del_cat_status=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$all_feed_sql="SELECT fid,title,message,fname,email FROM feedback INNER JOIN users ON feedback.uid=users.uid";
					$all_feed_result=mysqli_query($con,$all_feed_sql);
					if(mysqli_num_rows($all_feed_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Title</th>
									<th width="350">Message</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($feedback=mysqli_fetch_assoc($all_feed_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $feedback['fname']; ?></td>
								<td><?php echo $feedback['email']; ?>"</td>
								<td><?php echo $feedback['title']; ?></td>
								<td><?php echo $feedback['message']; ?></td>
								<td class="action-con">
				
									<a href="del_feed.php?fid=<?php echo $feedback['fid']; ?>" title="Delete Feedback"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
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
						echo "<h4>No Feedback Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>