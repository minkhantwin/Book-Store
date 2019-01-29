<?php 
	session_start();
	include("admin/confs/config.php");

	$cart=0;
	if(isset($_SESSION['cart'])){
		foreach ($_SESSION['cart'] as $qty) {
			$cart +=$qty;
		}
	}
	
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
		$books=mysqli_query($conn,"select * from books where category_id='$cat_id' ");
	}else{
		$books=mysqli_query($conn,"select * from books");
	}
	$cats=mysqli_query($conn,"select * from categories");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Book Store</h1>

	<div class="info">
		<a href="view-cart.php">
			(<?php echo $cart ?>) books in your cart.
		</a>
	</div>
	<div class="sidebar">
		<ul class="cats">
			<li>
				<b><a href="index.php">All Categories</a></b>
			</li>
			<?php while($row=mysqli_fetch_assoc($cats)): ?>
			<li>
				<a href="index.php?cat=<?php echo $row['id'] ?>">
					<?php echo $row['name'] ?>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
	</div>
	<div class="main">
		<ul class="books">
			<?php while($row=mysqli_fetch_assoc($books)): ?>
			<li>
				<img src="admin/cover/<?php echo $row['cover'] ?>" height="80">
				<b>
					<a href="book-details.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
				</b>
				<i>$<?php echo $row['price'] ?></i>
				<a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">Add to Cart</a>
			</li>
		<?php endwhile; ?>
		</ul>
	</div>
	<div class="footer">
		&copy; <?php echo date("Y") ?>All right reserved.
	</div>
</body>
</html>