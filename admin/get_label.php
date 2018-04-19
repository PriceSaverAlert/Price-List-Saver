<?php
include_once('connectionDb.php');
if(isset($_POST['cat'])){
	$cat=$_POST['cat'];
	$top_fields_sql="SELECT label FROM category WHERE c_id='$cat'";
	$top_fields_result=mysqli_query($con,$top_fields_sql);
	if(mysqli_num_rows($top_fields_result)==1){
		$all_labels=mysqli_fetch_assoc($top_fields_result);
		$labels=array_filter(explode('@|@',$all_labels['label']));
		$html='';
		foreach($labels as $label){
			$html.='<label class="control-label">Label</label>';
			$html.='<input type="text" value="'.$label.'" class="form-control" name="label[]">';
			$html.='<label class="control-label">Property</label>';
			$html.='<input type="text" class="form-control" name="property[]">';
		}
	}
	else{
		$html='';
	}
	echo $html;
}