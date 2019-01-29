<!DOCTYPE html>
<html>
<head>
	<title>Book Details</title>
</head>
<body>
	<h1>Book Details</h1>

	<?php 
		include("admin/confs/config.php");
		$id=$_GET['id'];
		$book=mysqli_query($conn,"select * from books where id='$id' ");
		$row=mysqli_fetch_assoc($book);
	 ?>

	 <div class="detail">
	 	<a href="index.php" class="back">$laquo; Go Back</a>

	 	<img src="admin/cover/<?php echo $row['cover'] ?>">

	 	<h2><?php echo $row['title'] ?></h2>
	 	<i><?php echo $row['author'] ?></i>
	 	<b><?php echo $row['price'] ?></b>

	 	<p><?php echo $row['summary'] ?></p>

	 	<a href="add-to-cart.php?id=<?php echo $id  ?>" class="add-to-cart">
	 		Add to Cart
	 	</a>
	 </div>
	 <div class="footer">
	 	&copy; <?php echo date("Y") ?> All right reserved.
	 </div>
</body>
</html>