<div class="footer">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<h4>Address</h4>
			<a class="navbar-brand" href="index.php">Price Saver Alert</a><br>
			<hr>
			2711 N 1st St<br>
			San Jose<br>
			CA-95134<br><br>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<h4>Usefull Links</h4>
			<ul>
				<li><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
				<li><a href="about.php"><span class="fa fa-info"></span> About Us</a></li>
				<li><a href="contact.php"><span class="fa fa-envelope-o"></span> Contact Us</a></li>
				<li><a href="login.php?http=<?php echo $http; ?>"><span class="fa fa-key"></span> Login</a></li>
		        <li><a href="registration.php"><span class="fa fa-user-o"></span> Registration</a></li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<h4>Follow Us On</h4>
			<ul>
				<li><a href="https://github.com/orgs/PriceSaverAlert">GitHub </a></li>
				
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	<div class="copyright text-center">
		<small>All rights reserved @ Price Saver Alert &copy; 2018 .</small>
	</div>
</div>
	</div>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/SimpleChart.js"></script>
	<script src="assets/js/SimpleChart-data.js"></script>
	<script type="text/javascript" src="assets/js/custom.jquery.js"></script>
	<script type="text/javascript">
		$('.btn_user_price').click(function(){
			var p_id=$(this).val();
			var user_price=$(this).prev('.user_price').val();
			if(user_price<=0 || isNaN(user_price)){
				$(this).parent('p').next('p.ajax_result').html('<div class="text-danger">Please Enter Valid Price</div>');
				return false;
			}
			$.ajax({
				type: 'GET',
				url : 'submit_price.php?p_id='+p_id+'&user_price='+user_price,
				dataType: 'html',
				success: function(data){
					if(data==1){
						$('.'+p_id).html('<div class="text-success">Submitted Successfull. You\'ll Be Notify</div>');
					}
					else if(data==0){
						$('.'+p_id).html('<div class="text-danger">Sorry try Again</div>');
					}
					else if(data==2){
						$('.'+p_id).html('<div class="text-danger">Please Enter Lower Price</div>');
					}
				},
				error: function(){
					$(this).parent('p').next('p.ajax_result').text('<div class="text-danger">Something went wrong</div>');
				}
			});
		});
	</script>
	<?php
	if(isset($_POST['select_year'])){
		$yearindex=$_POST['select_year'];
	}
	else{
		$yearindex=count($year)-1;
	}
	//$viewYear=array_keys($ys,$yearindex);
	$graphOne=explode('|',$graphOnes[$yearindex]);
	$graphTwo=explode('|',$graphTwos[$yearindex+1]);
	$graphThree=explode('|',$graphThrees[$yearindex+1]);
	?>
	<script>
		<?php 
		$month=['JAN','FEB','MAR','APR','MAY','JUN','JULY','AUG','SEP','OCT','NOV','DEC'];
		?>
		 var graphdata1 = {
            linecolor: "#CCA300",
            title: "<?php echo $title[0]; ?>",
            values: [
            	<?php for($x=0;$x<count($graphOne);$x++){ ?>
	            	<?php
	            		echo "{ X: \"$month[$x]\",";
	            		echo "Y: $graphOne[$x] },";
	            	}
	              ?>
            ]
        };
        var graphdata2 = {
            linecolor: "#00CC66",
            title: "<?php echo $title[1]; ?>",
            values: [
              <?php for($x=0;$x<count($graphOne);$x++){ ?>
	            	<?php
	            		echo "{ X: \"$month[$x]\",";
	            		echo "Y: $graphTwo[$x] },";
	            	}
	              ?>
            ]
        };
        var graphdata3 = {
            linecolor: "#FF99CC",
            title: "<?php echo $title[2]; ?>",
            values: [
                <?php for($x=0;$x<count($graphOne);$x++){ ?>
	            	<?php
	            		echo "{ X: \"$month[$x]\",";
	            		echo "Y: $graphThree[$x] },";
	            	 }
	              ?>
            ]
        };
      $(function () {
      	var datas=[graphdata3,graphdata2,graphdata1];
      	showGraphal('LinegraphAll',datas);
      	$('label.ckeckbox input').on('click',function() {
      		var howManyGraph=$(this).val();
      		if(howManyGraph=='all'){
      			$('#LinegraphAll').css({'display':'block'});
      			$('#Linegraph1,#Linegraph2,#Linegraph3').fadeOut(100);
      			datas=[graphdata3,graphdata2,graphdata1];
      			showGraphal('LinegraphAll',datas);
      		}
      		else if(howManyGraph==1){
      			$('#Linegraph1').css({'display':'block'});
      			$('#LinegraphAll,#Linegraph2,#Linegraph3').fadeOut(100);
      			datas=[graphdata1];
      			showGraphal('Linegraph1',datas);
      		}
      		else if(howManyGraph==2){
      			$('#Linegraph2').css({'display':'block'});
      			$('#LinegraphAll,#Linegraph1,#Linegraph3').fadeOut(100);
      			datas=[graphdata2];
      			showGraphal('Linegraph2',datas);
      		}
      		else if(howManyGraph==3){
      			$('#Linegraph3').css({'display':'block'});
      			$('#LinegraphAll,#Linegraph2,#Linegraph1').fadeOut(100);
      			datas=[graphdata3];
      			showGraphal('Linegraph3',datas);
      		}
      	});
      });
    function showGraphal(graph,datas){

      	$("#"+graph).SimpleChart({
	        ChartType: "Line",
	        toolwidth: "50",
	        toolheight: "25",
	        axiscolor: "#E6E6E6",
	        textcolor: "#6E6E6E",
	        showlegends: true,
	        data: datas,
	        legendsize: "140",
	        legendposition: 'bottom',
	        xaxislabel: 'Month',
	        title: "<p class='graph-title'>Top Three <?php echo $category['cat_name']; ?> in Graph<p>",
	        yaxislabel: 'Total Sell'
		});
    }
	</script>
	<script>
		$(function(){
			$('#all_cat,#banner,#top_three,.well').addClass('onload-top');
		});
		$(window).on('scroll',function(){
      		var scrollAmount=$(this).scrollTop();
      		var windowHeight=$(this).height();
      		if(scrollAmount>60){
      			$('.navbar-default').addClass('anim-header');
      		}
      		else if(scrollAmount<60){
      			$('.navbar-default').removeClass('anim-header');
      		}
      		$('.product').each(function(i){
      			var j=i+1;
      			if($('#'+j).offset().top-windowHeight+80<scrollAmount){
      				$('#'+j).addClass('onload-top');
      			}
      		});
      	});
	</script>
</body>
</html>