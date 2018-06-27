<?php
include 'functions.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['apid'] != $ap){
  header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <style>
.btn{
         margin-bottom:10px;
 }
  </style>
</head>

<body>
<div class="container" align="center">
  <h1 align="center">อำเภอ</h1></div>
  <div class="container-fluid">
  <div align="left"><a href="year.php"><button type="button" class="btn btn-success">หน้าหลัก</button>
  </div>
  <div class="container" align="center">
<?php
session_start();
ob_start();
include 'db.php';
include 'campher.php';
?>
<br><a href="total.php?y=<?php echo $y?>&ep=<?php echo $ep?>"<button class="btn btn-warning">รายมิติ</button></a>
<a href="totalform.php?y=<?php echo $y?>&ep=<?php echo $ep?>"<button class="btn btn-danger">รวมคะแนนทุกอำเภอ</button></a>
  <br>
  <div align="right"><a href="index.php">หน้าหลัก</a></div>
</div>

</body>
</html>