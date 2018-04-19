<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
 <section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row">
			<div class="col-md-6 col-sm-12">
				<?php
				if(isset($_GET['pid'])){
					$pid=$_GET['pid'];
					$single_pro_sql="SELECT products.*,category.cat_name,category.label FROM products JOIN category ON products.cat_id=category.c_id WHERE products.pid='$pid'";
					$single_pro_result=mysqli_query($con,$single_pro_sql);
					if(mysqli_num_rows($single_pro_result)==1){
						$product=mysqli_fetch_assoc($single_pro_result);
					?>
				
				<h4>Details About :: <?php echo $product['p_title']; ?></h4>
				<strong>Price : <?php echo $product['p_price']; ?></strong>
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
							<td colspan="2" align="right"><a href="products.php" class="btn btn-info">Back</a></td>
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
	</section>
</section>
<?php include_once('footer.php'); ?>