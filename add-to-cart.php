<?php 
	session_start();
	$id=$_SESSION['id'];
	$_SESSION['cart'] [$id]++;

	header("location:index.php");
?>