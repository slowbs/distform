  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    	input {display: block !important; padding: 0 !important; margin: 0 !important; width: 100% !important; border-radius: 0 !important; line-height: 1 !important;}
		td {margin: 0 !important; padding: 0 !important;}
    </style>
  <body>
  <div class="container-fluid">
  <table class="table table-condensed">
  <thead class="thead-dark">
    <tr>
      <th scope="col">PA/สตป.</th>
      <th scope="col">ลำดับ</th>
      <th scope="col" style="font-size:12px">ตัวชี้วัดประเมินผล</th>
      <th scope="col" style="font-size:12px">เกณฑ์ ปี 2561</th>
      <th scope="col" style="font-size:12px">แหล่งข้อมูล</th>
      <th scope="col">สสอ</th>
      <th scope="col">ระดับ1</th>
      <th scope="col">ระดับ2</th>
      <th scope="col">ระดับ3</th>
      <th scope="col">ระดับ4</th>
      <th scope="col">ระดับ5</th>
      <th scope="col" style="font-size:12px">ผลการดำเนินงาน</th>
      <th scope="col" style="font-size:12px">ค่าคะแนนที่ได้</th>
      <th scope="col" style="font-size:12px">คะแนนถ่วงน้ำหนัก</th>
    </tr>
  </thead>
  <tbody>
  <form action="update.php" method="POST"> 
<?php
include 'db.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM district"); 
  $stmt->execute();
  $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){ 
        if($row['status']==1){
            print("1");
        }
        else if ($row['status']==2){
            print("2");
        }
        else if ($row['status']==3){
            print("3");
        }
        else if ($row['status']==4){
            print("4");
        }
        else {
            print("no");
        }
        ?>
    <tr>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td style="width:700px"><input type="text" class="form-control"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
      <td><input type="text" class="form-control" style="text-align:center"></td>
    </tr>
    <?php
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
    </form>
    </div>
  </tbody>
</table>

</body>