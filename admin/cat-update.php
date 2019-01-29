<?php 
	include("confs/config.php");

	$id=$_POST['id'];
	$name=$_POST['name'];
	$remark=$_POST['remark'];

	$sql="update categories set name='$name',remark='$remark',modified_date=now() where id='$id' ";
	mysqli_query($conn,$sql);

	header("location:cat-list.php");
?>