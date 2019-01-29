<?php 
	include("confs/config.php");

	$id=$_GET['id'];
	$sql="delete from books where id='$id' ";

	mysqli_query($conn,$sql);
	header("location:book-list.php");
?>