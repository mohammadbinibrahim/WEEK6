<!DOCTYPE HTML>
<html lang='en'>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=Edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='stylesheet' href='styles.css'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">

		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=edge'>
		<meta name='viewport' content='width=devicewidth, initial-scale=1.0'>
		<title>عربة التسوق خاصّتي</title>
		<style>
			h3{
				font-weight: normal;
			}
			main{
				margin: auto;
				width: 40%;
				margin-top: 30px;
			}
			table{
				box-shadow: 1px 1px 10px silver;
			}

		</style>
	</head>
	<body style='text-align: center;'>
		<h3>المنتجات التي بداخل العربة</h3>
		<?php
			include('config.php');
			$result = mysqli_query($conn, "SELECT * FROM addcart");
			while($row=mysqli_fetch_array($result)){
				echo "
					<main>
						<table class='table'>
							<thead>
								<tr>
									<th scope='col'>إسم المنتج</th>
									<th scope='col'>سعر المنتج</th>
									<th scope='col'>حذف المنتج</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>$row[name]</td>
									<td>$row[price]</td>
									<td><a href='del_cart.php?id=$row[id]' class='btn btn-danger'>حذف</td>
								</tr>
							</tbody>
						</table>
					</main>
				";
			}?>
			<a href='shop.php'>الرجوع لصفحة المنتجات</a>
	</body>
</html>