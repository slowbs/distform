<!DOCTYPE html>
<html> 
<body>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
</head>
<form action="update.php" method="POST"> 
<?php
include 'db.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM district"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){ 
        ?>
          <label for="id"><?php echo $row['id']; ?></label>
          <label for="name">name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
          <label for="price">gane1</label>
          <input type="text" class="form-control" name="input[<?php echo $row['id']?>]" value="<?php echo $row['value'] ?>">
          <?php
          <input type="text" class="form-control"  id="gane1<?php echo $row['id']?>" name="gane1" value="<?php echo $row['gane1'] ?>" size="4">
          <label for="price">gane2</label>
          <input type="text" class="form-control"  id="gane2<?php echo $row['id']?>" name="gane2" value="<?php echo $row['gane2'] ?>" size="4">
          <label for="price">gane3</label>
          <input type="text" class="form-control"  id="gane3<?php echo $row['id']?>" name="gane3" value="<?php echo $row['gane3'] ?>"size="4">
          <label for="price">gane4</label>
          <input type="text" class="form-control"  id="gane4<?php echo $row['id']?>" name="gane4" value="<?php echo $row['gane4'] ?>" size="4">
          <label for="price">ตัวคูณ</label>
          <input type="text" class="form-control"  id="koon<?php echo $row['id']?>" name="gane5" value="<?php echo $row['gane5'] ?>" size="4">
          <label for="date">ผลการดำเนินงาน</label>
          <input type="text" class="form-control test" id="<?php echo $row['id']?>" name="input[<?php echo $row['id']?>]" 
          value="<?php echo $row['value'] ?>" size="4">
          <label for="date">คะแนน</label>
          <input type="text" class="form-control" id="box<?php echo $row['id']?>" name="score[<?php echo $row['id']?>]" value="<?php echo $row['valuekoon'] ?>" size="4">
          <label for="date">คะแนนถ่วงน้ำหนัก</label>
          <input class="test2" id="box2<?php echo $row['id']?>" type="text" name="score2[<?php echo $row['id']?>]" 
          value="<?php echo $row['valuegane'] ?>" size="4">
          <br>
<?php
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
$(document).ready(function () {
    $(".test").keyup(function () {
       var score = this.value;
       var boxid = this.id;
       var gane1 = parseInt($("#gane1"+boxid).val());
       var gane2 = parseInt($("#gane2"+boxid).val());
       var gane3 = parseInt($("#gane3"+boxid).val());
       var gane4 = parseInt($("#gane4"+boxid).val());
       //alert(score)
       var koon = $("#koon"+boxid).val()
       var newscore = score*koon;
        if(score <= gane1){
            var scorekoon = gane1;
        }
        else if(score <= gane2 && score > gane1){
            var scorekoon = gane2;
        }
        else if(score <= gane3 && score > gane2){
            var scorekoon = gane3;
        }
        else{
            var scorekoon = gane4;
        }
        $("#box2"+boxid).val(newscore)
        $("#box"+boxid).val(scorekoon)
    });
});
</script>
<a href ="testal.php">Insert</a>
