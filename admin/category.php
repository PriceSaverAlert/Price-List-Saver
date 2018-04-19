<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row">
          		<div class="col-md-12 text-right">
          			<a href="add_cat.php" title="Add Category"><span class="fa fa-plus"></span></a>
          		</div>
				<div class="clearfix"></div>
				<h4>All Categories</h4>
				<div class="col-md-12 table-responsive">
					<?php
					if(isset($del_cat_status) and $del_cat_status=='success'){
						echo '<div class="alert alert-success">Category Deleted Successfully</div>';
					}
					elseif(isset($del_cat_status) and $del_cat_status=='fail'){
						echo '<div class="alert alert-danger">Please Try Again</div>';
					}
					$all_cat_sql="SELECT * FROM category";
					$all_cat_result=mysqli_query($con,$all_cat_sql);
					if(mysqli_num_rows($all_cat_result)>0){
						?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>Category Name</th>
									<th>Icon</th>
									<th>Date</th>
									<th>[Actions]</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$count=1;
							while($cat=mysqli_fetch_assoc($all_cat_result)){
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><a href="all_pro_in_a_cat.php?c_id=<?php echo $cat['c_id']; ?>"><?php echo $cat['cat_name']; ?></a></td>
								<td><span class="fa <?php echo $cat['cat_icon']; ?>"></span></td>
								<td><?php echo $cat['date']; ?></td>
								<td class="action-con">
									<a href="all_pro_in_a_cat.php?c_id=<?php echo $cat['c_id']; ?>" title="View All Product"><span class="fa fa-eye"></span></a>
									<a href="edit_cat.php?c_id=<?php echo $cat['c_id']; ?>" title="Edit Category"><span class="fa fa-pencil"></span></a>
									<a href="del_cat.php?c_id=<?php echo $cat['c_id']; ?>" title="Delete Category"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
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
						echo "<h4>No Category Found</h4>";
					}
					?>
				</div>
	    	</div>
          </section>
       </section>
<?php include_once('footer.php'); ?>