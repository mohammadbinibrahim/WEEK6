<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=Edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>E-Commerce | تعديل المنتج</title>
		<link rel='stylesheet' href='styles.css'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
	</head>
	<body style='text-align: center;'>
		<?php
			include('config.php');
			$ID = $_GET['id'];
			$query = "SELECT * FROM products WHERE id= $ID";
			$up = mysqli_query($conn, $query);
			$data = mysqli_fetch_array($up);
		?>

		<div class='main'>
			<form action='edit.php?id=<?php echo $ID; ?>' method='POST' enctype='multipart/form-data'>
				<h2>تعديل المنتجات</h2>
				<input type='text' name='id' value="<?php echo $data['id']; ?>">
				<br/>
				<input type='text' name='name' value="<?php echo $data['name']; ?>">
				<br/>
				<input type='text' name='price' value="<?php echo $data['price']; ?>">
				<br/>
				<input type='file' id='file' name='image' style='display: none;' value=''>
				<button name='edit' style='height: 45px; width: 120px;'>تعديل  المنتج</button>
				<label for='file'>تحديث صورة المنتج</label>
				<br/>
				<a href='products.php'>عرض كل المنتجات</a>
			</form>
		</div>
		<p>طوّر مِن قِبَل مُحَمّد</p>
	</body>
</html>

<?php
	include('config.php');
	if(isset($_POST['edit'])){
		$ID = $_POST['id'];
		$NAME = $_POST['name'];
		$PRICE = $_POST['price'];
		$IMAGE = $_FILES['image'];
		$image_location = $_FILES['image']['tmp_name'];
		$image_name = basename($_FILES['image']['name']);
		$image_up = 'images/'.$image_name;
		$edit = "UPDATE products SET name='$NAME', price='$PRICE', image='$image_up' WHERE id='$ID'";
		mysqli_query($conn, $edit);
		if(move_uploaded_file($image_location, $image_up)){
			echo "<script>alert('تم تعديل المنتج بنجاح');</script>";
		}
		else{
			echo "<script>alert('حدث خطأ ما');</script>";	
		}
	}
?>