<!DOCTYPE html>
<html>
<head>
	<title>Book List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Book List</h1>
	<ul class="menu">
		<li><a href="book-list.php">Manage Books</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="order.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<?php 
		include("confs/config.php");

		$result=mysqli_query($conn,"select books.*,categories.name from books left join categories on books.category_id=categories.id order by books.created_date desc");

	?>

	<ul class="books">
		<?php 
			while($row=mysqli_fetch_assoc($result)): ?>
				<li>
					<img src="cover/<?php echo $row['cover'] ?>" alt="" align="right" height="80">

					<b><?php echo $row['title'] ?></b>
					<i>by <?php echo $row['author'] ?></i>
					<small>(in <?php echo $row['name'] ?>)</small>
					<span>$<?php echo $row['price'] ?></span>
					<div><?php echo $row['summary'] ?></div>

					[<a href="book-del.php?id=<?php echo $row['id'] ?>" class="del">del</a>]
					[<a href="book-edit.php?id=<?php echo $row['id'] ?>" class="edit">edit</a>]
				</li>
			<?php endwhile; ?>
	</ul>
	<a href="book-new.php" class="new">New Book</a>
</body>
</html>