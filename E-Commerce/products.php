<!DOCTYPE html>
<html lang='en'>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=Edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>E-Commerce | المنتجات</title>
		<link rel='stylesheet' href='styles.css'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
		<style>
			.card {
				float: right;
				margin-top: 20px;
				margin-left: 10px;
				margin-right: 10px;
			}
			.card img{
				width: 100%;
				height: 200px;
			}
			main {
				width: 60%;
			}
		</style>
	</head>
	<body style='text-align: center;'>
		<h3>لوحة تحكم المدير</h3>

		<?php
			include('config.php');
			$query = "SELECT * FROM products";
			$result = mysqli_query($conn, $query);
			while($row=mysqli_fetch_array($result)){
				echo "
					<center>
						<main>
							<div class='card' style='width: 18rem;'>
		  						<img src='$row[image]' class='card-img-top' alt='...'>
		 					 	<div class='card-body'>
		   	 						<h5 class='card-title'>$row[name]</h5>
		    						<p class='card-text'>$row[price]</p>
		    						<a href='delete.php?id=$row[id]' class='btn btn-danger'>حذف المنتج</a>
		  							<a href='edit.php?id=$row[id]' class='btn btn-primary'>تعديل المنتج</a>
				  				</div>
							</div>
						</main>
					</center>
				";
			}

		?>
		
		
	</body>
</html>