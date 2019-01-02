<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>เข้าสู่ระบบ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="header">
		<h2>เข้าสู่ระบบ</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>ชื่อผู้ใช้</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>รหัสผ่าน</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">เข้าสู่ระบบ</button>
		</div>
<!-- 		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p> -->
	</form>


</body>
</html>