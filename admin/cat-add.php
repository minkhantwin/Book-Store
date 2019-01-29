<?php 
	include("confs/config.php");
	$name=$_POST['name'];
	$remark=$_POST['remark'];

	$sql="insert into categories (name,remark,created_date,modified_date) values('$name','$remark',now(),now())";

	mysqli_query($conn,$sql);

	header("location:cat-list.php");
?>