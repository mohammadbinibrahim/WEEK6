<?php
	include('config.php');
	if(isset($_POST['upload'])){
		$NAME = $_POST['name'];
		$PRICE = $_POST['price'];
		$IMAGE = $_FILES['image'];
		$image_location = $_FILES['image']['tmp_name'];
		$image_name = basename($_FILES['image']['name']);
		$image_up = 'images/'.$image_name;
		$insert = "INSERT INTO products (name, price, image) VALUES ('$NAME','$PRICE', '$image_up')";
		mysqli_query($conn, $insert);
		if(move_uploaded_file($image_location, $image_up)){
			echo "<script>alert('تم رفع المنتج بنجاح');</script>";
		}
		else{
			echo "<script>alert('حدث خطأ ما');</script>";
		}
		header('location: index.php');
	}
?>