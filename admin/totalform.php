<?php
include 'db.php';
include('../functions.php');
//$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
//$ap = $_SESSION['user']['apid'];
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
$y = isset($_GET['y']) ? $_GET['y'] : '';
$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
$ep = isset($_GET['ep']) ? $_GET['ep'] : '';
//echo $id; // ผลลัพธ์คือแสดงข้อความ Hello 

?>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="fuk.css">
<?php
?>
  <body>
  <div class="container">
  <div class="page-header" align="center">
  <h1>รวมคะแนนทุกอำเภอ</h1>

</div>
<?php include 'headbut.php' ?>
</div>
<div class="container-fluid">
<br>
  <table class="table table-bordered testimonial-group" >
  <thead class="thead-dark">
  <tr>
      <th scope="col" rowspan="2" style="font-size:12px">PA/สตป.</th>
      <th scope="col" rowspan="2" style="font-size:12px">ลำดับ</th>
      <th rowspan="2" style="font-size:12px; min-width:500px; text-align:center">ตัวชี้วัดประเมินผล</th>
      <th scope="col" rowspan="2" style="font-size:12px">เกณฑ์ ปี 2561</th>
      <th scope="col" rowspan="2" style="font-size:12px">แหล่งข้อมูล</th>
      <th scope="col" rowspan="2" style="font-size:12px">สสอ</th>
      <th scope="col" colspan="5"style="text-align:center">เกณฑ์การให้คะแนน</th>
      <?php
include 'db.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ampher;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        $apnum=0;
        foreach($result as $ampher){?>
           <?php $apnum +=1;?>
            <th scope="col" colspan="3"style="text-align:center"><?php echo $ampher['name']?></th><?php
        }  
    }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
?>
      
    </tr>
    <tr>
      <th scope="col" style="font-size:12px">ระดับ1</th>
      <th scope="col" style="font-size:12px">ระดับ2</th>
      <th scope="col" style="font-size:12px">ระดับ3</th>
      <th scope="col" style="font-size:12px">ระดับ4</th>
      <th scope="col" style="font-size:12px">ระดับ5</th>
      <?php for($r=1;$r<=$apnum;$r++){
          ?>
        <th scope="col" style="font-size:12px">ผลการดำเนินงาน</th>
      <th scope="col" style="font-size:12px">ค่าคะแนนที่ได้</th>
      <th scope="col" style="font-size:12px">คะแนนถ่วงน้ำหนัก</th>
      <?php
      }?>

    </tr>
  </thead>
  <tbody>
  <form action="update.php?y=<?php echo $y?>&ap=<?php echo $ap?>" method="POST"> 
<?php
include 'db.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT form_{$ep}_$y.*, ap1.id 'ap1_id', ap2.id 'ap2_id' , ap3.id 'ap3_id', ap4.id 'ap4_id',ap5.id 'ap5_id', ap6.id 'ap6_id', ap7.id 'ap7_id', ap8.id 'ap8_id',
  ap9.id 'ap9_id',ap10.id 'ap10_id',ap11.id 'ap11_id', ap12.id 'ap12_id', ap13.id 'ap13_id', ap14.id 'ap14_id', ap15.id 'ap15_id', ap16.id 'ap16_id', 
  ap17.id 'ap17_id', ap18.id 'ap18_id', ap19.id 'ap19_id', ap20.id 'ap20_id', ap21.id 'ap21_id', ap22.id 'ap22_id', ap23.id 'ap23_id',
  ap1.value_{$ep}_$y 'ap1_value_{$ep}_$y', ap2.value_{$ep}_$y 'ap2_value_{$ep}_$y' , ap3.value_{$ep}_$y 'ap3_value_{$ep}_$y', ap4.value_{$ep}_$y 'ap4_value_{$ep}_$y',ap5.value_{$ep}_$y 'ap5_value_{$ep}_$y', 
  ap6.value_{$ep}_$y 'ap6_value_{$ep}_$y', ap7.value_{$ep}_$y 'ap7_value_{$ep}_$y', ap8.value_{$ep}_$y 'ap8_value_{$ep}_$y',ap9.value_{$ep}_$y 'ap9_value_{$ep}_$y',ap10.value_{$ep}_$y 'ap10_value_{$ep}_$y',
  ap11.value_{$ep}_$y 'ap11_value_{$ep}_$y', ap12.value_{$ep}_$y 'ap12_value_{$ep}_$y', ap13.value_{$ep}_$y 'ap13_value_{$ep}_$y', ap14.value_{$ep}_$y 'ap14_value_{$ep}_$y', ap15.value_{$ep}_$y 'ap15_value_{$ep}_$y', 
  ap16.value_{$ep}_$y 'ap16_value_{$ep}_$y', ap17.value_{$ep}_$y 'ap17_value_{$ep}_$y', ap18.value_{$ep}_$y 'ap18_value_{$ep}_$y', ap19.value_{$ep}_$y 'ap19_value_{$ep}_$y', ap20.value_{$ep}_$y 'ap20_value_{$ep}_$y', 
  ap21.value_{$ep}_$y 'ap21_value_{$ep}_$y', ap22.value_{$ep}_$y 'ap22_value_{$ep}_$y', ap23.value_{$ep}_$y 'ap23_value_{$ep}_$y',
  ap1.valuegane_{$ep}_$y 'ap1_valuegane_{$ep}_$y', ap2.valuegane_{$ep}_$y 'ap2_valuegane_{$ep}_$y' , ap3.valuegane_{$ep}_$y 'ap3_valuegane_{$ep}_$y', ap4.valuegane_{$ep}_$y 'ap4_valuegane_{$ep}_$y',
  ap5.valuegane_{$ep}_$y 'ap5_valuegane_{$ep}_$y', ap6.valuegane_{$ep}_$y 'ap6_valuegane_{$ep}_$y', ap7.valuegane_{$ep}_$y 'ap7_valuegane_{$ep}_$y', ap8.valuegane_{$ep}_$y 'ap8_valuegane_{$ep}_$y',
  ap9.valuegane_{$ep}_$y 'ap9_valuegane_{$ep}_$y',ap10.valuegane_{$ep}_$y 'ap10_valuegane_{$ep}_$y',ap11.valuegane_{$ep}_$y 'ap11_valuegane_{$ep}_$y', ap12.valuegane_{$ep}_$y 'ap12_valuegane_{$ep}_$y', 
  ap13.valuegane_{$ep}_$y 'ap13_valuegane_{$ep}_$y', ap14.valuegane_{$ep}_$y 'ap14_valuegane_{$ep}_$y', ap15.valuegane_{$ep}_$y 'ap15_valuegane_{$ep}_$y', ap16.valuegane_{$ep}_$y 'ap16_valuegane_{$ep}_$y', 
  ap17.valuegane_{$ep}_$y 'ap17_valuegane_{$ep}_$y', ap18.valuegane_{$ep}_$y 'ap18_valuegane_{$ep}_$y', ap19.valuegane_{$ep}_$y 'ap19_valuegane_{$ep}_$y', ap20.valuegane_{$ep}_$y 'ap20_valuegane_{$ep}_$y', 
  ap21.valuegane_{$ep}_$y 'ap21_valuegane_{$ep}_$y', ap22.valuegane_{$ep}_$y 'ap22_valuegane_{$ep}_$y', ap23.valuegane_{$ep}_$y 'ap23_valuegane_{$ep}_$y',
  ap1.valuekoon_{$ep}_$y 'ap1_valuekoon_{$ep}_$y', ap2.valuekoon_{$ep}_$y 'ap2_valuekoon_{$ep}_$y' , ap3.valuekoon_{$ep}_$y 'ap3_valuekoon_{$ep}_$y', ap4.valuekoon_{$ep}_$y 'ap4_valuekoon_{$ep}_$y',
  ap5.valuekoon_{$ep}_$y 'ap5_valuekoon_{$ep}_$y', ap6.valuekoon_{$ep}_$y 'ap6_valuekoon_{$ep}_$y', ap7.valuekoon_{$ep}_$y 'ap7_valuekoon_{$ep}_$y', ap8.valuekoon_{$ep}_$y 'ap8_valuekoon_{$ep}_$y',
  ap9.valuekoon_{$ep}_$y 'ap9_valuekoon_{$ep}_$y',ap10.valuekoon_{$ep}_$y 'ap10_valuekoon_{$ep}_$y',ap11.valuekoon_{$ep}_$y 'ap11_valuekoon_{$ep}_$y', ap12.valuekoon_{$ep}_$y 'ap12_valuekoon_{$ep}_$y', 
  ap13.valuekoon_{$ep}_$y 'ap13_valuekoon_{$ep}_$y', ap14.valuekoon_{$ep}_$y 'ap14_valuekoon_{$ep}_$y', ap15.valuekoon_{$ep}_$y 'ap15_valuekoon_{$ep}_$y', ap16.valuekoon_{$ep}_$y 'ap16_valuekoon_{$ep}_$y', 
  ap17.valuekoon_{$ep}_$y 'ap17_valuekoon_{$ep}_$y', ap18.valuekoon_{$ep}_$y 'ap18_valuekoon_{$ep}_$y', ap19.valuekoon_{$ep}_$y 'ap19_valuekoon_{$ep}_$y', ap20.valuekoon_{$ep}_$y 'ap20_valuekoon_{$ep}_$y', 
  ap21.valuekoon_{$ep}_$y 'ap21_valuekoon_{$ep}_$y', ap22.valuekoon_{$ep}_$y 'ap22_valuekoon_{$ep}_$y', ap23.valuekoon_{$ep}_$y 'ap23_valuekoon_{$ep}_$y' 
  from form_{$ep}_$y, ap1, ap2,ap3,ap4,ap5,ap6,ap7,ap8,ap9, ap10, ap11, ap12, ap13, ap14, ap15, ap16, ap17, ap18, ap19, ap20, ap21, ap22, 
  ap23 where form_{$ep}_$y.id = ap1.id and ap1.id = ap2.id and ap2.id = ap3.id and ap3.id = ap4.id and ap4.id = ap5.id and ap5.id = ap6.id 
  and ap6.id = ap7.id and ap7.id = ap8.id and ap8.id = ap9.id and ap9.id = ap10.id and ap10.id = ap11.id
  and ap11.id = ap12.id and ap12.id = ap13.id and ap13.id = ap14.id and ap14.id = ap15.id and ap15.id = ap16.id and ap16.id = ap17.id 
  and ap17.id = ap18.id  and ap18.id = ap19.id and ap19.id = ap20.id and ap20.id = ap21.id and ap21.id = ap22.id and ap22.id = ap23.id"); 
  $stmt->execute();
  $result = $stmt->FetchAll(PDO::FETCH_BOTH);
  $i=0;
    foreach($result as $row){
      if($row['status']==1){?>
        <tr>
        <td colspan="11" style="background-color : #b1b9af" class="foo"><?php echo $row['name']?></td>
        <?php for($r=1;$r<=$apnum;$r++){?>
        <td class="cl<?php echo $r ?>"></td>
        <td class="cl<?php echo $r ?>"></td>
        <td class="cl<?php echo $r ?>"></td>
        <?php }
        ?>
        </tr><?php
    }
    else if($row['status']==2){?>
    <tr>
      <td align="center"><?php echo $row['pa']?></td>
      <td align="center"><?php echo $row['lumdub']?></td>
      <td><?php echo $row['name']?></td>
      <td align="center"><?php echo $row['gane']?></td>
      <td align="center"><?php echo $row['data']?></td>
      <td align="center" id="koon<?php echo $row['id']?>"><?php echo $row['koon']?></td>
      <td align="center" id="gane1<?php echo $row['id']?>"><?php echo $row['gane1']?></td>
      <td align="center" id="gane2<?php echo $row['id']?>"><?php echo $row['gane2']?></td>
      <td align="center" id="gane3<?php echo $row['id']?>"><?php echo $row['gane3']?></td>
      <td align="center" id="gane4<?php echo $row['id']?>"><?php echo $row['gane4']?></td>
      <td align="center" id="gane5<?php echo $row['id']?>"><?php echo $row['gane5']?></td>
      <?php for($r=1;$r<=$apnum;$r++){
          ?>
      <td style="text-align:center" class="cl<?php echo $r?>"><?php echo $row["ap{$r}_value_{$ep}_{$y}"]?></td>
      <td style="text-align:center" class="cl<?php echo $r?>"><?php echo $row["ap{$r}_valuegane_{$ep}_$y"]?></td>
      <td style="text-align:center" class="cl<?php echo $r?>"><?php echo $row["ap{$r}_valuekoon_{$ep}_$y"]?></td> 
      <?php }?>
    </tr>
    <?php
    } 
else if($row['status']==3){?>
        <tr>
        <td align="center"><?php echo $row['pa']?></td>
      <td align="center"><?php echo $row['lumdub']?></td>
        <td colspan="9" ><?php echo $row['name']?></td>
        <td colspan="69" style="background-color : #666f6394"></td>
      </tr><?php
    }
    else if($row['status']==4){?>
      <tr>
      <td align="center"><?php echo $row['pa']?></td>
      <td align="center"><?php echo $row['lumdub']?></td>
      <td><?php echo $row['name']?></td>
      <td align="center"><?php echo $row['gane']?></td>
      <td align="center"><?php echo $row['data']?></td>
        <td align="center" id="koon<?php echo $row['id']?>"><?php echo $row['koon']?></td>
        <td align="center"><?php echo $row['gane1']?></td>
        <td style="display:none;" id="gane1<?php echo $row['id']?>">1</td>
        <td align="center"><?php echo $row['gane2']?></td>
        <td style="display:none;" id="gane2<?php echo $row['id']?>">2</td>
        <td align="center"><?php echo $row['gane3']?></td>
        <td style="display:none;" id="gane3<?php echo $row['id']?>">3</td>
        <td align="center"><?php echo $row['gane4']?></td>
        <td style="display:none;" id="gane4<?php echo $row['id']?>">4</td>
        <td align="center"><?php echo $row['gane5']?></td>
        <td style="display:none;" id="gane5<?php echo $row['id']?>">5</td>
        <?php for($r=1;$r<=$apnum;$r++){
          ?>
      <td style="text-align:center" class="cl<?php echo $r?>"><?php echo $row["ap{$r}_value_{$ep}_{$y}"]?></td>
      <td style="text-align:center" class="cl<?php echo $r?>"><?php echo $row["ap{$r}_valuegane_{$ep}_$y"]?></td>
      <td style="text-align:center" class="cl<?php echo $r?>"><?php echo $row["ap{$r}_valuekoon_{$ep}_$y"]?></td> 
      <?php }?>
      
      </tr>
      <?php
      } 
      else if($row['status']==5){?>
        <tr>
        <td ></td>
      <td></td>
        <td colspan="9"><?php echo $row['name']?></td>
        <?php
        $i +=1;
        $r =0;
        //$stmt = $conn->prepare("SELECT sum(koon) FROM form_$id where kor = $i; select * from total_score"); 
        $stmt = $conn->prepare("select m$i from total_score 
        where time = '$y' && ep = $ep"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
          $r +=1;?>
        <td colspan="2"></td>
        <td style="text-align:center"><strong><font color="black"><?php echo $row["m$i"]?></strong></td>
        <?php
        }
        ?>
        </tr><?php
        
      }
      else if($row['status']==6){?>
        <tr>
        <td ></td>
      <td></td>
        <td colspan="9"><?php echo $row['name']?></td>
        <?php
        $r =0;
        //$stmt = $conn->prepare("SELECT sum(koon) FROM form_$id where kor = $i; select * from total_score"); 
        $stmt = $conn->prepare("select mp$i from total_score 
        where time = '$y' && ep = $ep"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
          $r +=1;?>
        <td colspan="2"></td>
        <td style="text-align:center"><strong><font color="black"><?php echo $row["mp$i"]?></strong></td>
        <?php
        }
        ?>
        </tr><?php
      }
      else if($row['status']==7){?>
        <tr>
        <td ></td>
      <td></td>
        <td colspan="9"><?php echo $row['name']?></td>
        <?php
        $i +=1;
        $r =0;
        //$stmt = $conn->prepare("SELECT sum(koon) FROM form_$id where kor = $i; select * from total_score"); 
        $stmt = $conn->prepare("select m$i from total_score 
        where time = '$y' && ep = $ep"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
          $r +=1;?>
        <td colspan="2"></td>
        <td style="text-align:center"><strong><font color="blue"><?php echo $row["m$i"]?></strong></td>
        <?php
        }
        ?>
        </tr><?php
        
      }
      else if($row['status']==8){?>
        <tr>
        <td ></td>
      <td></td>
        <td colspan="9"><?php echo $row['name']?></td>
        <?php
        $r =0;
        //$stmt = $conn->prepare("SELECT sum(koon) FROM form_$id where kor = $i; select * from total_score"); 
        $stmt = $conn->prepare("select mp$i from total_score 
        where time = '$y' && ep = $ep"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
          $r +=1;?>
        <td colspan="2"></td>
        <td style="text-align:center"><strong><font color="blue"><?php echo $row["mp$i"]?></strong></td>
        <?php
        }
        ?>
        </tr><?php
      }
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
    </div>
  </tbody>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>