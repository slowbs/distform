<?php 
include('functions.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
//$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
//$ap = $_SESSION['user']['apid'];
if (!isset($_SESSION['user']) || $_SESSION['user']['id'] != $id || $_SESSION['user']['user_type'] != 'admin'){
    header('location: ../login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>แก้ไขรหัสผ่าน</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
		<h2>แก้ไขรหัสผ่าน</h2>
	</div>
	
	<form method="post" action="updateuserform.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>รหัสผ่านเก่า</label>
			<input type="password" name="passold">
		</div>
<!-- 		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div> -->
		<div class="input-group">
			<label>รหัสผ่านใหม่</label>
			<input type="password" name="passnew_1">
		</div>
		<div class="input-group">
			<label>ยืนยันรหัสผ่านใหม่</label>
			<input type="password" name="passnew_2">
			<input type="hidden" name="id">
		</div>
		<div>
			<button type="submit" class="btn btn-primary" name="updateuser_btn">บันทึก</button>
			<a href="year.php"><button type="button" class="btn btn-danger">ยกเลิก</button></a>
		</div>
	</form>
</body>
</html>