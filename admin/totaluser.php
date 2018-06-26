<?php
	include('../functions.php');
	//$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
    //$ap = $_SESSION['user']['apid'];
    if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
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
  <?php
  $y = isset($_GET['y']) ? $_GET['y'] : '';
  $t = isset($_GET['t']) ? $_GET['t'] : '';
  $ep = isset($_GET['ep']) ? $_GET['ep'] : '';
  ?>
  <style>
  @page {
    size: auto;
}
</style>
</head>

<body>

<div class="container" align="center">

<h2>คะแนนรวม</h2>
<?php include 'headbutform.php' ?>
<br>
<table class="table table-hover table-bordered table-striped table-sm">
  <thead style="text-align:center" class="thead-dark">
    <tr>
      <th scope="col">ลำดับที่</th>
      <th scope="col">ชื่อผู้ใช้</th>
      <th scope="col">อำเภอ</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody style="text-align:center">
  <?php
include 'db.php';
$i = 0;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql = "SELECT * FROM total_score where time = $y && ep = $ep && type = $t order by mp5 desc;";
        $sql = "SELECT users.*, ampher.name FROM users left join ampher on users.apid = ampher.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
             $i+=1;
            ?><tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['username']?></td>
      <td><?php echo $row['name']?></td>
      <td><a href="updateuserform2.php?id=<?php echo $row['id'] ?>">
      <button type="button" class="btn btn-warning">แก้ไข</button></td>
      <td>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal_<?php echo $row['id']?>">
  ลบ
</button>
      </td>
    </tr>
<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ลบชื่อผู้ใช้</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ยืนยันที่จะลบ
      </div>
      <div class="modal-footer">
      <a href = "deleteuser.php?id=<?php echo $row['id']?>">
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
  </tbody>
</table>
</div>
</body>
</html>