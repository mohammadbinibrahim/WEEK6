<?php
	include('config.php');

	if(isset($_POST['add'])){
		$NAME = $_POST['name'];
		$PRICE = $_POST['price'];
		$query = "INSERT INTO addcart (name, price) VALUES ('$NAME', '$PRICE')";
		mysqli_query($conn, $query);
		header('location: cart.php');
	}