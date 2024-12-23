<?php
	include('config.php');
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pass = mysqli_real_escape_string($conn, md5($_POST['password']));
		$cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
		$image = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = 'uploaded_img/'.$image;

		$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email='$email' && password='$pass'") or die('query failed');

		if(mysqli_num_rows($select)>0){
			$message[] = 'user already exists';
		}
		else{
			if($pass != $cpass){
				$message[] = "passwords aren't matching";
			}
			elseif($image_size > 2000000){
				$message[] = 'image size is too large!';
			}
			else{
				$insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES ('$name', '$email', '$pass', '$image')") or die('query failed');

				if($insert){
					move_uploaded_file($image_tmp_name, $image_folder);
					$message[] = 'registered successfuly!';
					header('location: login.php');
				}
				else{
					$message[] = 'registration failed!';
				}
			}
		}
	}
?>

<!DOCTYPE HTML>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content='IE=edge'>
		<meta name="viewport" content='width=device-width, initial-scale=1.0'>
		<title>إنشاء حساب</title>
		<link rel='stylesheet' href='styles.css'>
	</head>
	<body>
		<div class='form-container'>
			<form action='' method='post' enctype="multipart/form-data">
				<h3>إنشاء حساب</h3>
				<?php
					if(isset($message)){
						foreach($message as $message){
							echo "<div class='message'>".$message."</div>";
						}
					}
				?>
				<input type='text' name = 'username' placeholder="إسم المستخدم" class='box required'>
				<input type='email' name = 'email' placeholder="البريد الإلكتروني" class='box required'>
				<input type='password' name = 'password' placeholder="كلمة السر" class='box required'>
				<input type='password' name = 'cpassword' placeholder="تأكيد كلمة المرور" class='box required'>
				<input type='file' name='image' class='box' accept='image/jpg, image/jpeg, image/png'>
				<input type='submit' name='submit' value="!إنشاء حساب" class='btn'>
				<p>عندك حساب بالفعل؟<br> <a href='login.php'>!تسجيل دخول</a></p>
			</form>




	</body>
</html>