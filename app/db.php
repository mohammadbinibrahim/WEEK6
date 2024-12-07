<?php
	$conn=new mysqli('db', 'root', 'root', 'users_app');
	if(!$conn){
		die(mysqli_error($conn));
	}
?>
