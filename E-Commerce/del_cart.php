<?php
	include('config.php');
	$ID = $_GET['id'];
	$query = "DELETE FROM addcart WHERE id=$ID";
	mysqli_query($conn, $query);
	header('location: cart.php');
?>