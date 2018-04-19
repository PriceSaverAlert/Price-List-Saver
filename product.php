<?php
include_once('admin/connectionDb.php');
include_once('header.php');
?>
		<div class="container">
			<?php
			$c_id=$_GET['c_id'];
			$product_query="SELECT * FROM products WHERE cat_id='$c_id' ORDER BY pid DESC";
			$products=mysqli_query($con,$product_query);
			$category_sql="SELECT cat_name FROM category WHERE c_id='$c_id'";
			$category_result=mysqli_query($con,$category_sql);
			$category=mysqli_fetch_assoc($category_result);
			?>
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
								echo '<li><h4>No Category Found</h4></li>';
							}
							?>
							
						</ul>
						<div class="col-md-3 col-xs-12 col-sm-12">
							<div class="affiliate_pro">
								<?php
								$all_affi_sql="SELECT affiliate_links.*,affiliate.affiliate_name FROM affiliate_links LEFT JOIN affiliate ON affiliate_links.affiliate_id=affiliate.id WHERE cat='$c_id' ORDER BY id DESC LIMIT 1";
								$all_affi_result=mysqli_query($con,$all_affi_sql);
								while($aff=mysqli_fetch_assoc($all_affi_result)){
									if($aff['affiliate_name']=='Amazon'){
										?>
										<iframe style="width:200px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="<?php echo $aff['affiliate_link']; ?>"></iframe>
										<?php
									}
									else{
										?>
										<a href="<?php echo $aff['affiliate_link']; ?>"><img src="asstes/images/products/<?php echo $aff['img']; ?>" width="70" hieght="100"></a>
										<?php
									}
								}
								?>
							</div>
						</div>
					</div>
					<?php
					$sql_top_three="SELECT products.*,category.cat_name,category.label FROM products LEFT JOIN category ON products.cat_id=category.c_id WHERE products.top_three=1 AND cat_id='$c_id' LIMIT 3";
					$top_three=mysqli_query($con,$sql_top_three);
					if(mysqli_num_rows($top_three)){
						$labels='';
						$properties='';
						$graph_values='';
						$titles='';
						$years='';
					?>
					<div class="col-md-9 col-sm-12 col-xs-12" id="top_three">
						<h4>Top Three Products :: <?php echo $category['cat_name']; ?></h4>
						<div class="product">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Features <img src="assets/images/table_down_arrow.png" alt=""></th>
											<?php while($topthree= mysqli_fetch_assoc($top_three)){
												$labels=$topthree['label'];
												$properties.=$topthree['property'].'|||';
												$graph_values.=$topthree['graph_values'].'|||';
												$titles.=$topthree['p_title'].'|||';
												$title=explode('|||',$titles);
												$years.=$topthree['year'].'@|@';
											?>
											<th><?php echo $topthree['p_title']; ?></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php
										$label=explode('@|@',$labels);

										$property=explode('|||',$properties);
										$productOne=explode('@|@',$property[0]);
										$productTwo=explode('@|@',$property[1]);
										$productThree=explode('@|@',$property[2]);

										$year=array_unique(array_filter(explode('@|@',$years)));
										$ys=array_reverse($year);

										$graph=explode('@|@',$graph_values);
										$graph1='';
										$graph2='';
										$graph3='';
										for($i=0;$i<count($ys);$i++){
											$graph1.=$graph[$i].'|||';
											$graph2.=$graph[$i+1*count($ys)].'|||';
											$graph3.=$graph[$i+2*count($ys)].'|||';
										}
										$graphOnes=explode('|||',$graph1);
										$graphTwos=explode('|||',$graph2);
										$graphThrees=explode('|||',$graph3);

										for($i=0;$i<count($label);$i++){
										?>
										<tr>
											<td class=""><?php echo $label[$i]; ?></td>
											<td><?php echo $productOne[$i]; ?></td>
											<td><?php echo $productTwo[$i]; ?></td>
											<td><?php echo $productThree[$i]; ?></td>
										</tr>
										<?php } ?>
										<tr>
											<td>
												<label for="showAll" class="control-label ckeckbox"><input type="radio" name="showgraph" value="all" id="showAll" checked> <span></span> Show All</label>
											</td>
											<?php
											$sql_top_three="SELECT products.*,category.cat_name,category.label FROM products LEFT JOIN category ON products.cat_id=category.c_id WHERE products.top_three=1 AND cat_id='$c_id' LIMIT 3";
												$top_three=mysqli_query($con,$sql_top_three);
											if(mysqli_num_rows($top_three)){
											$value=1;
											while($topthree= mysqli_fetch_assoc($top_three)){
											?>
											<td>
												<label for="<?php echo $topthree['pid']; ?>" class="control-label ckeckbox"><input type="radio" name="showgraph" value="<?php echo $value; ?>" id="<?php echo $topthree['pid']; ?>"> <span></span> <?php echo $topthree['p_title']; ?></label></td>
											<?php $value++; } } ?>
										</tr>
										<tr>
											<td colspan="2" class="year">
												<strong><?php if(isset($_POST['select_year'])){echo '';}else{ echo end($year); } ?></strong>
											</td>
											<td colspan="">
												<form action="" method="post">
													<select name="select_year" class="form-control" id="seletedYear">
														<option>-- Select A Specific Year --</option>
														<?php
														foreach($year as $k=>$y){
														?>
															<option value="<?php echo $k; ?>" <?php if(isset($_POST['select_year']) and $_POST['select_year']==$k){echo 'selected';} ?>><?php echo $y; ?></option>
														<?php
														}
														?>
													</select>
													<td>
														<button type="submit" class="btn btn-info" name="yeargo">GO</button>
													</td>
												</form>
											</td>
										</tr>
										<tr>
											<td colspan="4">
												<div id="LinegraphAll" class="graph"></div>
												<div id="Linegraph1" class="graph"></div>
												<div id="Linegraph2" class="graph"></div>
												<div id="Linegraph3" class="graph"></div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if(mysqli_num_rows($products)>0){
						$id=1;
						while($product=mysqli_fetch_assoc($products)){
					?>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="product main-product" id="<?php echo $id; ?>">
								<div class="text-center product-image">
									<img src="assets/images/products/<?php echo $product['p_img']; ?>" <?php if(isset($product['img_width']) and $product['img_width']!=0){echo 'width='.$product['img_width']; }else{echo 'width="70"'; } ?> <?php if(isset($product['img_height']) and $product['img_height']!=0){echo 'height='.$product['img_height']; }else{echo 'height="120"'; } ?>>
								</div>
								<div class="text-center product-info">
									<h4><?php echo $product['p_title']; ?></h4>
									<p><?php $desc_arry=explode(' ',$product['p_desc']);$less_dec=array_slice($desc_arry,0,15);echo implode(' ',$less_dec).'...<a href="single_product.php?pid='.$product["pid"].'">View Details</a>'; ?></p>
									<p><strong>Price : </strong>$<?php echo $product['p_price']; ?></p>
									<p>
									Your price: <input type="text" name="user_price" class="user_price">
									<button <?php if(!isset($_SESSION['uid']) || $_SESSION['uid']==''){echo 'disabled'; } ?> type="button" class="btn_user_price" value="<?php echo $product['pid'] ?>" name="myprice">Submit</button>
									</p>
									<p class="ajax_result <?php echo $product['pid']; ?>"></p>
									<?php if(!isset($_SESSION['uid']) || $_SESSION['uid']==''){ ?><p>Please <a href="login.php?http=<?php echo $http; ?>">Login Here</a> To Submit</p><?php } ?>
									
								</div>
							</div>
						</div>
					<?php
					$id++;
						} 
					}
					else{
						echo "<h4>No Product Found In This Category</h4>";
					}
					?>
					<div class="clearfix"></div>
					<hr>
					
					<?php
					$all_affi_sqls="SELECT affiliate_links.*,affiliate.affiliate_name FROM affiliate_links LEFT JOIN affiliate ON affiliate_links.affiliate_id=affiliate.id WHERE cat='$c_id' ORDER BY id DESC";
					$all_affi_results=mysqli_query($con,$all_affi_sqls);
					while($affs=mysqli_fetch_assoc($all_affi_results)){
						?>
						<?php
						if($affs['affiliate_name']=='Amazon'){
							?>
							<div class="col-md-3 col-xs-12 col-sm-12">
								<div class="affiliate_pro">
									<iframe style="width:200px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="<?php echo $affs['affiliate_link']; ?>"></iframe>
								</div>
							</div>
							<?php
						}
						else{
							?>
							<a href="<?php echo $affs['affiliate_link']; ?>"><img src="asstes/images/products/<?php echo $affs['img']; ?>" width="70" hieght="100"></a>
							<?php
						
						}
					}
					?>
				</div>
			</div>
		</div>
<?php include_once('footer.php'); ?>