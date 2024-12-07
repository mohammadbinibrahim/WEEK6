<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=Edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>E-Commerce | إضافة منتجات</title>
		<link rel='stylesheet' href='styles.css'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
	</head>
	<body style='text-align: center;'>
		<div class='main'>
			<form action='insert.php' method='POST' enctype='multipart/form-data'>
				<h2>موقع تسويقي</h2>
				<img src='images/webapp_logo.jpeg' alt='ecommerce webpp logo' width='450px'>
				<br/>
				<input type='text' name='name'>
				<br/>
				<input type='text' name='price'>
				<br/>
				<input type='file' id='file' name='image' style='display: none;'>
				<button name='upload'>!إرفع</button>
				<label for='file'>إختيار الصورة</label>
				<br/>
				<a href='products.php'>عرض كل المنتجات</a>
			</form>
		</div>
		<p>طوّر مِن قِبَل مُحَمّد</p>
	</body>
</html>