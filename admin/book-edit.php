<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
	<?php 
		include("confs/config.php");
		$id=$_GET['id'];
		$result=mysqli_query($conn,"select * from books where id='$id' ");
		$row=mysqli_fetch_assoc($result);
	?>
	<h1>Edit Book</h1>

	<form action="book-update.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">

		<label for="title">Book Title</label>
		<input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">

		<label for="author">Author</label>
		<input type="text" name="author" id="author" value="<?php echo $row['author'] ?>">

		<label for="summary">Summary</label>
		<textarea name="summary" id="summary"><?php echo $row['summary'] ?></textarea>

		<label for="price">Price</label>
		<input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">

		<label for="categories">Category</label>
		<select name="category_id" id="categories">
			<option value="0">--Choose--</option>
			<?php 
				$categories=mysqli_query($conn,"select id,name from categories");
				while($cat=mysqli_fetch_assoc($categories)) :
			?>
			<option value="<?php echo $cat['id'] ?>" 
				<?php if($cat['id']==$row['category_id'])
						echo "selected"  ?> >
							<?php echo $cat['name']; ?>
			</option>
		<?php endwhile; ?>
		</select>

		<br/><br/>
		<img src="cover/<?php echo $row['cover'] ?>" alt="" height="140">
		<label for="cover">Change Cover</label>
		<input type="file" name="cover" id="cover">
		<br/><br/>
		<input type="submit" name="" value="Update Book">
		<a href="book-list.php">Back</a>
	</form>
</body>
</html>