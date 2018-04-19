<?php
include_once('admin/connectionDb.php');
include_once('header.php');
error_reporting(0);
$http=$_SERVER['HTTP_REFERER'];
?>
<div class="container">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-xs-12 xol-sm-12 product-wrapper">
			<div class="col-md-3 col-xs-12 col-sm-12 no-padding all_cat" id="all_cat">
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
<?php
if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
	$single_pro_sql="SELECT products.*,category.cat_name,category.label FROM products JOIN category ON products.cat_id=category.c_id WHERE products.pid='$pid'";
	$single_pro_result=mysqli_query($con,$single_pro_sql);
	if(mysqli_num_rows($single_pro_result)==1){
		$product=mysqli_fetch_assoc($single_pro_result);
		?>
		<div class="col-md-9 col-sm-12 col-xs-12" id="banner">
			<h4>Details About :: <?php echo $product['p_title']; ?></h4>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Features</th>
							<th>Values</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$labels=explode('@|@',$product['label']);
						$property=explode('@|@',$product['property']);
						if(!empty($labels)){
							for($i=0;$i<count($labels); $i++){
							?>
							<tr>
								<td><?php if($labels[$i]!=''){echo $labels[$i]; }else{echo '-'; } ?></td>
								<td><?php if($property[$i]!=''){echo $property[$i]; }else{echo '-'; } ?></td>
							</tr>
							<?php
							}
						}	
						?>
						<tr>
							<td colspan="2" align="right"><a href="<?php echo $http; ?>" class="btn btn-info">Back</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php
	}
	else{
		echo 'No Data Found';
	}
}

?>
		</div>
	</div>
</div>

<?php include_once('footer.php'); ?>