<?php
	include('config.php');
	$ID = $_GET['id'];
	$query = "SELECT * FROM products WHERE id=$ID";
	$up = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($up);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=Edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>تأكيد الشراء</title>
		<style>
			input{
				display: none;
			}
			.main{
				width: 30%;
				padding: 20px;
				box-shadow: 1px 1px 10px silver;
				margin-top: 500px;
			}
		</style>
		<link rel='stylesheet' href='styles.css'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
	</head>
	<body style='text-align: center;'>
		<div class='main'>
			<form action="insert_cart.php" method="POST">
				<h2>هل فعلاً تريد إضافة امنتج للعربة؟</h2>
				<input type='text' name='id' value='<?php echo $data["id"]; ?>'>
				<input type='text' name='name' value='<?php echo $data["name"]; ?>'>
				<input type='text' name='price' value='<?php echo $data["price"]; ?>'>
				<br/>
				<button name='add' type='submit' class='btn btn-warning' style='width: 60%'>تأكيد إضافة المنتج للعربة</button>
				<br/>
				<a href='shop.php'>الرجوع لصفحة المنتجات</a>
			</form>
		</div>
	</body>
</html>