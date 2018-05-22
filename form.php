<?php
include 'db.php';
$y = isset($_GET['y']) ? $_GET['y'] : '';
$ap = isset($_GET['ap']) ? $_GET['ap'] : '';
//echo $id; // ผลลัพธ์คือแสดงข้อความ Hello 

?>
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
@page {
    size: auto;
}
    </style>
    
  <body>
  <div class="container-fluid">
  <p><a href="index.php">หน้าหลัก/<a href="ampher.php?y=<?php echo $y ?>">อำเภอ</a></p>
  <table class="table table-bordered" style="width:100%">
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
  <form action="update.php?y=<?php echo $y?>&ap=<?php echo $ap?>" method="POST"> 
<?php
include 'db.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM form_$y"); 
  $stmt->execute();
  $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
  $i=0;
    foreach($result as $row){
      if($row['status']==1){?>
        <tr>
        <td colspan="14"><input type="text" class="form-control foo" value="<?php echo $row['name']?>"
        style="background-color : #d1d1d1"></td>
      </tr><?php
    }
    else if($row['status']==2){?>
    <tr>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['pa']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['lumdub']?>"></td>
      <td style="width:100%"><input type="text" class="form-control" value="<?php echo $row['name']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['data']?>"></td>
      <td><input type="text" class="form-control fuk" style="text-align:center" value="<?php echo $row['koon']?>"
      id="koon<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane1']?>"
      id="gane1<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane2']?>"
      id="gane2<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane3']?>"
      id="gane3<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane4']?>"
      id="gane4<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane5']?>"
      id="gane5<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control test <?php echo $row['kor']?>" style="text-align:center" value="<?php echo $row['value']?>" 
      id="<?php echo $row['id']?>" name="input[<?php echo $row['id']?>]" tabindex="<?php echo $row['id']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['valuegane']?>"
      id="box_<?php echo $row['id']?>" name="score[<?php echo $row['id']?>]" readonly="readonly"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['valuekoon']?>"
      id="box2_<?php echo $row['id']?>" name="score2[<?php echo $row['id']?>]" readonly="readonly"></td>
    
    </tr>
    <?php
    } 
else if($row['status']==3){?>
        <tr>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['pa']?>"></td>
      <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['lumdub']?>"></td>
        <td colspan="12"><input type="text" class="form-control" value="<?php echo $row['name']?>"
        ></td>
      </tr><?php
    }
    else if($row['status']==4){?>
      <tr>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['pa']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['lumdub']?>"></td>
        <td style="width:100%"><input type="text" class="form-control" value="<?php echo $row['name']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['data']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['koon']?>"
        id="koon<?php echo $row['id']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane1']?>">
        <input type="hidden" class="form-control" style="text-align:center" value="1"
        id="gane1<?php echo $row['id']?>"</td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane2']?>">
        <input type="hidden" class="form-control" style="text-align:center" value="2"
        id="gane2<?php echo $row['id']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane3']?>">
        <input type="hidden" class="form-control" style="text-align:center" value="3"
        id="gane3<?php echo $row['id']?>"</td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane4']?>">
        <input type="hidden" class="form-control" style="text-align:center" value="4"
        id="gane4<?php echo $row['id']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['gane5']?>">
        <input type="hidden" class="form-control" style="text-align:center" value="5"
        id="gane5<?php echo $row['id']?>"></td>
        <td><input type="text" class="form-control test <?php echo $row['kor']?>" style="text-align:center" value="<?php echo $row['value']?>" 
        id="<?php echo $row['id']?>" name="input[<?php echo $row['id']?>]" tabindex="<?php echo $row['id']?>"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['valuegane']?>"
        id="box_<?php echo $row['id']?>" name="score[<?php echo $row['id']?>]" readonly="readonly"></td>
        <td><input type="text" class="form-control" style="text-align:center" value="<?php echo $row['valuekoon']?>"
        id="box2_<?php echo $row['id']?>" name="score2[<?php echo $row['id']?>]" readonly="readonly"></td>
      
      </tr>
      <?php
      } 
      else if($row['status']==5){?>
        <tr>
        <td><input type="text" class="form-control"></td>
      <td><input type="text" class="form-control"></td>
        <td colspan="10"><input type="text" class="form-control" value="<?php echo $row['name']?>"
        ></td><?php
        $i +=1;
        //$stmt = $conn->prepare("SELECT sum(koon) FROM form_$id where kor = $i; select * from total_score"); 
        $stmt = $conn->prepare("select total_score.*, kor, sum(koon) from form_$y inner join total_score 
        where total_score.id = 1 && form_$y.kor = $i"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){?>
        <?php $maxscore = ($row['sum(koon)']*5)/100;?>
        <input type="hidden" name="input2[<?php echo $i ?>]">
        <td><input type="text" class="form-control" style="text-align:center" id="maxscore_<?php echo $i?>" 
        value="<?php echo $maxscore ?>" name="score[<?php echo $i?>]" readonly="readonly"></td>
        <td><input type="text" class="form-control" style="text-align:center" id="box3_<?php echo $i?>"
        name="score[<?php echo $i?>]" readonly="readonly" value="<?php echo $row["m$i"]?>"></td><?php
        }
      }
      else if($row['status']==6){?>
        <tr>
        <td><input type="text" class="form-control"></td>
      <td><input type="text" class="form-control"></td>
        <td colspan="10"><input type="text" class="form-control" value="<?php echo $row['name']?>"
        ></td>
        <?php
        $stmt = $conn->prepare("select total_score.*, kor, sum(koon) from form_$y inner join total_score 
        where total_score.id = 1 && form_$y.kor = $i"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){?>
        <?php //$newid = $row['max(id)'];?>
        <input type="hidden" name="input2[<?php echo $i?>]">
        <td><input type="text" class="form-control" style="text-align:center" id="percent_<?php echo $row['kor']?>" 
        value="<?php echo $row['sum(koon)']?>" readonly="readonly"></td>
        <td><input type="text" class="form-control" style="text-align:center" id="box4_<?php echo $i?>"
        name="score2[<?php echo $i?>]" readonly="readonly" value="<?php echo $row["mp$i"]?>"></td><?php
        }
      }
      else if($row['status']==7){?>
        <tr>
        <td><input type="text" class="form-control"></td>
      <td><input type="text" class="form-control"></td>
        <td colspan="10"><input type="text" class="form-control" value="<?php echo $row['name']?>"
        ></td><?php
        $i +=1;
        //$stmt = $conn->prepare("SELECT sum(koon) FROM form_$id where kor = $i; select * from total_score"); 
        $stmt = $conn->prepare("select total_score.*, kor, sum(koon) from form_$y inner join total_score 
        where total_score.id = 1 && kor != 0;"); 
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){?>
        <?php $maxscore = ($row['sum(koon)']*5)/100;?>
        <input type="hidden" name="input2[<?php echo $i ?>]">
        <td><input type="text" class="form-control" style="text-align:center" id="maxscore_<?php echo $i?>" 
        value="<?php echo $maxscore ?>" name="score[<?php echo $i?>]" readonly="readonly"></td>
        <td><input type="text" class="form-control" style="text-align:center" id="box5"
        name="score[<?php echo $i?>]" readonly="readonly" value="<?php echo $row["m$i"]?>"></td><?php
        }
    }
    else if($row['status']==8){?>
      <tr>
      <td><input type="text" class="form-control"></td>
    <td><input type="text" class="form-control"></td>
      <td colspan="10"><input type="text" class="form-control" value="<?php echo $row['name']?>"
      ></td>
      <?php
      $stmt = $conn->prepare("select total_score.*, kor, sum(koon) from form_$y inner join total_score 
      where total_score.id = 1 && kor != 0;"); 
      $stmt->execute();
      $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
      foreach($result as $row){?>
      <?php //$newid = $row['max(id)'];?>
      <input type="hidden" name="input2[<?php echo $i?>]">
      <td><input type="text" class="form-control" style="text-align:center" id="percent_<?php echo $row['kor']?>" 
      value="<?php echo $row['sum(koon)']?>" readonly="readonly"></td>
      <td><input type="text" class="form-control" style="text-align:center" id="box6"
      name="score2[<?php echo $i?>]" readonly="readonly" value="<?php echo $row["mp$i"]?>"></td><?php
      }
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
<script>
$(document).ready(function () {
    $(".test").on('input', function () {
       var score = this.value;
       var boxid = this.id;
       var gane1 = parseFloat($("#gane1"+boxid).val());
       var gane2 = parseFloat($("#gane2"+boxid).val());
       var gane3 = parseFloat($("#gane3"+boxid).val());
       var gane4 = parseFloat($("#gane4"+boxid).val());
       var gane5 = parseFloat($("#gane5"+boxid).val());
       //alert(score)
       var koon = $("#koon"+boxid).val()
       if ( score != "" ){
           if (isNaN(score)){
               alert("not number")
           }
           else{
       if(gane1 < gane5){
        if(score <= gane1){
            var scorekoon = 1;
        }
        else if(score <= gane2 && score > gane1){
            var scorekoon = 1+((score-gane1)/(gane2-gane1));
        }
        else if(score <= gane3 && score > gane2){
            var scorekoon = 2+((score-gane2)/(gane2-gane1));
        }
        else if(score <= gane4 && score > gane3){
            var scorekoon = 3+((score-gane3)/(gane2-gane1));
        }
        else if(score <= gane5 && score > gane4){
            var scorekoon = 4+((score-gane4)/(gane2-gane1));
        }
        else{
            var scorekoon = 5;
        }
       }
       else{
        if(score <= gane5){
            var scorekoon = 5;
        }
        else if(score <= gane4 && score > gane5){
            var scorekoon = 5-((score-gane5)/(gane4-gane5));
        }
        else if(score <= gane3 && score > gane4){
            var scorekoon = 4-((score-gane4)/(gane4-gane5));
        }
        else if(score <= gane2 && score > gane3){
            var scorekoon = 3-((score-gane3)/(gane4-gane5));
        }
        else if(score <= gane1 && score > gane2){
            var scorekoon = 2-((score-gane2)/(gane4-gane5));
        }
        else {
            var scorekoon = 1;
        }   
       }
       var scorekoon = parseFloat(scorekoon).toFixed(2)
       var newscore = (scorekoon*koon)/100;
       var newscore = parseFloat(newscore).toFixed(2)
        $("#box2_"+boxid).val(newscore)
        $("#box_"+boxid).val(scorekoon)
       }
       }
       else{
        $("#box2_"+boxid).val("")
        $("#box_"+boxid).val("")
       }
    });
    $(".test").on('input', function (){
        var kor = this.classList[2]
        var sum = 0;
        var sum2 = 0;
        var percent = $("#percent_"+kor).val();
        var maxscore = $("#maxscore_"+kor).val();

        $('.'+kor).each(function(){
            var boxid = this.id;
            if($("#box2_"+boxid).val() != ""){
           sum += parseFloat($("#box2_"+boxid).val());
           sum2 = (sum*percent)/maxscore;
            }
        });
        sum = parseFloat(sum).toFixed(2)
        sum2 = parseFloat(sum2).toFixed(2)
        $("#box3_"+kor).val(sum)
        $("#box4_"+kor).val(sum2)
        var sum3 = parseFloat($("#box3_1").val())+parseFloat($("#box3_2").val())
        +parseFloat($("#box3_3").val())+parseFloat($("#box3_4").val())
        var sum4 = parseFloat($("#box4_1").val())+parseFloat($("#box4_2").val())
        +parseFloat($("#box4_3").val())+parseFloat($("#box4_4").val())
        sum3 = parseFloat(sum3).toFixed(2)
        sum4 = parseFloat(sum4).toFixed(2)
        $("#box5").val(sum3)
        $("#box6").val(sum4)
        //alert(sum)
        //alert(kor)
    });
    /*$(".test").keyup(function(){
        var sum = 0;
        var kor = this.classList[2]
        $('.'+kor).each(function(){
            if(this.value != ""){
           sum += parseFloat(this.value);
            }
        });
        sum = parseFloat(sum).toFixed(2)
        alert(sum)
        //alert(kor)
    });*/
});
</script>
</body>