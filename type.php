<?php 
	include('functions.php');
	//$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
    //$ap = $_SESSION['user']['apid'];
    if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
    }
$ap = $_SESSION['user']['apid'];
$y = isset($_GET['y']) ? $_GET['y'] : '';
$ep = isset($_GET['ep']) ? $_GET['ep'] : '';
$t = isset($_GET['t']) ? $_GET['t'] : '';
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
  <div class="container">
  <div style="float: left"><a href="year.php"><button type="button" class="btn btn-success">หน้าหลัก</button></div>
  </div>
  <div class="container">
  <div style="float: right"><a href="index.php?logout='1'"><button type="button" class="btn btn-danger">ออกจากระบบ</button></a></div>
  <br><br><br><div class="container" align="center">
<?php
include 'db.php';
//include '../ctype.php';
?>
<br>
<table class="table table-hover table-sm">
  <thead style="text-align:center" class="thead-dark">
    <tr>
      <th scope="col">ลำดับที่</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">แก้ไขล่าสุดเมื่อ</th>
      <th scope="col">แก้ไขล่าสุดโดย</th>
    </tr>
  </thead>
  <tbody style="text-align:center">
<?php
include 'db.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT pa.*, log.apid, log.time, log.username from log left join pa on log.type = pa.id where log.apid = $ap and log.year = $y and log.ep = $ep
    GROUP By log.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){?>
        <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <th><a href="form.php?y=<?php echo $y ?>&ap=<?php echo $row['apid'] ?>&ep=<?php echo $ep ?>&t=<?php echo $row['type'] ?>"
            role="button"><?php echo $row['name']; ?></button></a>
            <?php $_SESSION['name'][$row['apid']] = $row['name'];
                  $_SESSION['time'][$row['apid']] = $row['time'];  
            ?></td>
      <td><?php echo $row['time'] ?></td>
      <td><?php echo $row['username'] ?></td>
    </tr>
    <?php
    }  
    
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
</div>

</body>
</html>