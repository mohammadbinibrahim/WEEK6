<?php
	include_once('db.php');
	$action = false;
	if(isset($_POST['save'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mobile = $_POST['mobile'];

		if($_POST['save']=='Save!'){
			$usr_query = "INSERT INTO users (name, email, password, mobile) VALUES ('$name', '$email', '$password', '$mobile')";
		}
		else{
			$id = $_POST['id'];
			$usr_query = "UPDATE users SET name='$name', email='$email', password='$password', mobile='$mobile' WHERE id=$id";
		}
		$usr = mysqli_query($conn, $usr_query);
		if(!$usr){
			die(mysqli_error($conn));
		}
		else{
			if(isset($_POST['id'])){
				$action  = 'edit';
			}else{
				$action ='add';
			}
		}
	}
	if(isset($_GET['action']) && $_GET['action']==='del'){
		$id = $_GET['id'];
		$delusr_query = "DELETE FROM users WHERE id=$id";
		$delusr = mysqli_query($conn, $delusr_query);
		if(!$delusr){
			die(mysqli_error($conn));
		}
		else{
			$action = 'del';
		}
	}
	$showusrs_query = "SELECT * FROM users";
	$showusrs = mysqli_query($conn, $showusrs_query);
?>

<!DOCTYPE HMTL>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<link rel='stylesheet' href='css/toastr.css'>
		<title>Users App</title>
	</head>
	<body>
		<div class='container'>
			<div class='wrapper p-5 m-5'>
				<div class='d-flex p-2 justify-content-between mb-2'>
					<h2>All users</h2>
					<div><a href='add_user.php'><i data-feather='user-plus'></i></a></div>
				</div>
				<hr>
				<table class='table table-striped'>
					<thead>
						<tr>
							<th scope='col'>#</th>
							<th scope='col'>Name</th>
							<th scope='col'>Email</th>
							<th scope='col'>Phone Number</th>
							<th scope='col'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($user = $showusrs->fetch_assoc()){?>
								<tr>
									<td><?php echo $user['id'];?></td>
									<td><?php echo $user['name'];?></td>
									<td><?php echo $user['email'];?></td>
									<td><?php echo $user['mobile'];?></td>
									
									<td>
										<div class='d-flex justify-content-evenly'>
											<i onclick= 'confirm_delete(<?php echo $user['id']?>)' class='text-danger' data-feather='x-circle'></i> <!-- the id gets reflected in the js function for manipulation -->
											<i onclick= 'edit(<?php echo $user['id']?>)' class='text-info' data-feather='edit-2'></i>
										</div>
									</td>
								</tr>
							<?php }?>
				</table>
			</div>
		</div>

		<script src='js/jquery.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/icons.js'></script>
		<script src='js/toastr.js'></script>
		<script src='js/main.js'></script>
		<?php
			if($action!=false){
				if($action=='add'){?>
					<script>
						add_success();
					</script>
			<?php
				}
			}
			?>
		<?php
			if($action!=false){
				if($action=='edit'){?>
					<script>
						edit_success();
					</script>
			<?php		
				}
				if(!$usr){
					die(mysqli_error($conn));
				}
				else{
						if(isset($_POST['id'])){
						$action  = 'edit';
					}else{
						$action ='add';
					}
				}
			}
			?>
		<script>
			feather.replace();
		</script>
	</body>
</html>