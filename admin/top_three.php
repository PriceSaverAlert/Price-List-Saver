<?php include_once('connectionDb.php'); ?>
<?php
$cat_sql="SELECT * FROM category";
$cat_result=mysqli_query($con,$cat_sql);
?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	  <h4>Top Three</h4>
          	  <div class="col-md-4 col-sm-6 col-xs-12">
          	  	<label class="control-label">Select A Category</label>
	          	  <select class="form-control" name="cat" id="cat_for_top_three">
	          	  		<option value="">-- Select A Category --</option>
	          	  		<?php while($cat=mysqli_fetch_assoc($cat_result)){  ?>
	          	  		<option value="<?php echo $cat['c_id']; ?>"><?php echo $cat['cat_name']; ?></option>}
	          	  		<?php } ?>
	          	  </select>
          	  </div>
	          <div class="table table-responsive" id="top_three">
	          	
	          </div>
	          <div id="graph">
	          	
	          </div>
	      </section>
	   </section>
<?php include_once('footer.php'); ?>