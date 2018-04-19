<?php include_once('connectionDb.php'); ?>
<?php
$about_sql="SELECT * FROM contact";
$about_result=mysqli_query($con,$about_sql);
?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	  <h4>Contact Us</h4>
	          <div class="table table-responsive">
	          	<?php if(mysqli_num_rows($about_result)>0){ ?>
	          	<table class="table table-hover">
	          		<tbody>
	          			<tr>
	          				<td>Sl. No.</td>
	          				<td>Title</td>
	          				<td>Content</td>
	          				<td>[Action]</td>
	          			</tr>
	          		</tbody>
	          		<tbody>
	          			<?php 
	          			while($content=mysqli_fetch_assoc($about_result)){
	          				$count=1;
	          			?>
	          			<tr>
	          				<td><?php echo $count; ?></td>
	          				<td><?php echo $content['title']; ?></td>
	          				<td width="500"><?php echo $content['content']; ?></td>
	          				<td class="action-con">
	          					<a href="edit_contact.php?id=<?php echo $content['id']; ?>"><span class="fa fa-pencil"></span></a>
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
	          			echo '<h4>No cotent found<h4>';
	          		}
	          	?>
	          </div>
          </section>
      </section>
<?php include_once('footer.php'); ?>			