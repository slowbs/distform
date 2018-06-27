<?php
include 'functions.php';
//$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
//$ap = $_SESSION['user']['apid'];
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
$ap = $_SESSION['user']['apid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid" align="center" style="background-color: #8cf19d;">
<br>
<h1 align="center">การประเมินผลการพัฒนางานสาธารณสุข </h1>
  <h2 align="center">สำนักงานสาธารณสุขจังหวัดนครศรีธรรมราช</h2>
  <br>
  </div>
  <br>
  <div class="container" align="center">
<div align="right">
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    เพิ่มครั้ง
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="insertyear.php">เพิ่มปีใหม่</a>
    <a class="dropdown-item" href="insertep.php">เพิ่มครั้งใหม่ (ภายในปี)</a>
  </div>
</div>
<div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    จัดการบัญชีผู้ใช้
  </button>
  <div class="dropdown-menu">
  <a class="dropdown-item" href="create_user.php">เพิ่มชื่อผู้ใช้</a>
    <a class="dropdown-item" href="updateuserform.php?id=<?php echo $_SESSION['user']['id'] ?>">เปลี่ยนรหัสผ่าน</a>
    <a class="dropdown-item" href="totaluser.php">จัดการผู้ใช้</a>
  </div>
</div>

<!-- <a href="create_user.php"><button type="button" class="btn btn-primary">เพิ่มชื่อผู้ใช้</button></a>
<a href="updateuserform.php?id=<?php echo $_SESSION['user']['id'] ?>">
<button type="button" class="btn btn-warning">แก้ไขรหัสผ่าน</button></a> -->
<a href="../index.php?logout='1'"><button type="button" class="btn btn-danger">ออกจากระบบ</button></a></div>

<br>
<?php
include 'db.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM year order by year;";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row){?>
  <div class="btn-group">
  <a class="btn btn-primary" href="type.php?y=<?php echo $row['year']?>&ep=<?php echo $row['ep']?>"><?php echo "{$row['ep']}/{$row['year']}"; ?></button></a>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">ล็อค</a>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal_<?php echo $row['id']?>">ลบ</a>
  </div>
</div>
      <!-- <a class="btn btn-primary"  href="type.php?y=<?php echo $row['year']?>&ep=<?php echo $row['ep']?>" role="button">
      <?php echo "{$row['ep']}/{$row['year']}"; ?></a> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ลบปีงบประมาณ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ยืนยันที่จะลบ
      </div>
      <div class="modal-footer">
      <a href = "deleteyear.php?id=<?php echo $row['id']?>">
      <button type="button" class="btn btn-danger">ยืนยัน</button></a>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>
      <?php
  }  
}
catch(PDOException $e)
  {
  echo $sql . "<br>" . $e->getMessage();
  }

$conn = null;
?>
  <br>
<!--   <a href="insertep.php">Insert Ep</a>
  <a href="insertyear.php">Insert year</a> -->
</div>
</div>
</body>
</html>