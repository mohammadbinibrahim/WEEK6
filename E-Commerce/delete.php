<?php
	include('config.php');
	$ID = $_GET['id'];
	$query = "DELETE FROM products WHERE id=$ID";
	mysqli_query($conn, $query);
	header('location: products.php');
?>