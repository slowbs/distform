  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        input {display: block !important; padding: 0 !important; margin: 0 !important; width: 100% !important; border-radius: 0 !important; line-height: 1 !important;}
        input2 {display: block !important; padding: 0 !important; margin: 0 !important; width: 100% !important; border-radius: 0 !important; line-height: 1 !important;}
        td {margin: 0 !important; padding: 0 !important;}
        #right {border-right-style: none;}
        #left {border-left-style: none;}
        .foo
{
    padding-left: 108px !important;
}
    </style>
    
  <body>
  <div class="container-fluid">
  <table class="table table-condensed" style="width:100%">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="font-size:12px; width:6%">PA/สตป.</th>
      <th scope="col" style="font-size:12px">ลำดับ</th>
      <th scope="col" style="font-size:12px; width:100%; text-align:center">ตัวชี้วัดประเมินผล</th>
      <th scope="col" style="font-size:12px">เกณฑ์ ปี 2561</th>
      <th scope="col" style="font-size:12px">แหล่งข้อมูล</th>
      <th scope="col" style="font-size:12px">สสอ</th>
      <th scope="col" style="font-size:12px">ระดับ1</th>
      <th scope="col" style="font-size:12px">ระดับ2</th>
      <th scope="col" style="font-size:12px">ระดับ3</th>
      <th scope="col" style="font-size:12px">ระดับ4</th>
      <th scope="col" style="font-size:12px">ระดับ5</th>
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
  $stmt = $conn->prepare("SELECT * FROM form"); 
  $stmt->execute();
  $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
      if($row['status']==1){?>
        <tr>
        <td colspan="14"><input type="text" class="form-control foo" value="<?php echo $row['name']?>"
        style="background-color : #d1d1d1"></td>
      </tr><?php
    }
    else if($row['status']==3){?>
    <tr>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['pa']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['lumdub']?>"></td>
      <td style="width:100%"><input type="text" class="form-control" value="<?php echo $row['name']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['data']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['koon']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane1']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane2']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane3']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane4']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane5']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['value']?>"  tabindex="<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['valuegane']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['valuekoon']?>"></td>
    
    </tr>
    <?php
  }
    
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