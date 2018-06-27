<?php 
	include('functions.php');
	$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
	if (isset($_SESSION['user']) && $_SESSION['user']['id'] != $ap || $_SESSION['user']['user_type'] != "admin"){
		$ap = $_SESSION['user']['id'];
		echo "<script>window.location.href='form.php?ap=$ap;</script>";
    }
    //echo $ap;
    //echo $_SESSION['user']['id'];
/* 	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	} */
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="updateuserform.php?id=<?php echo $_SESSION['user']['id']; ?>" style="color: red;">แก้ไข</a>
						<a href="index.php?logout=''" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>