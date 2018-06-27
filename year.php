<?php 
	include('functions.php');
	//$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
    //$ap = $_SESSION['user']['apid'];
    if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
    }
    $ap = $_SESSION['user']['apid'];
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
</head>
<body>
<br>
<div class="container" align="center">
<h1 align="center">การประเมินผลการพัฒนางานสาธารณสุข </h1>
  <h2 align="center">สำนักงานสาธารณสุขจังหวัดนครศรีธรรมราช</h2>
  <br>
<div align="right"><a href="updateuserform.php?id=<?php echo $_SESSION['user']['id']; ?>">
<button type="button" class="btn btn-warning">แก้ไขรหัสผ่าน</button></a>
<a href="index.php?logout='1'"><button type="button" class="btn btn-danger">ออกจากระบบ</button></a></div>

<br>
<?php
include 'db.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM year order by year";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){?>
        <a class="btn btn-primary"  href="type.php?y=<?php echo $row['year']?>&ep=<?php echo $row['ep']?>&ap=<?php echo $ap?>" role="button">
        <?php echo "{$row['ep']}/{$row['year']}"; ?></a><?php
    }  
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
  <br>
  <!-- <a href="insertyear.php">Insert year</a> -->
</div>

</body>
</html>