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
          <input type="text" class="form-control"  id="gane1<?php echo $row['id']?>" name="gane1" value="<?php echo $row['gane1'] ?>" size="3">
          <label for="price">gane2</label>
          <input type="text" class="form-control"  id="gane2<?php echo $row['id']?>" name="gane2" value="<?php echo $row['gane2'] ?>" size="3">
          <label for="price">gane3</label>
          <input type="text" class="form-control"  id="gane3<?php echo $row['id']?>" name="gane3" value="<?php echo $row['gane3'] ?>"size="3">
          <label for="price">gane4</label>
          <input type="text" class="form-control"  id="gane4<?php echo $row['id']?>" name="gane4" value="<?php echo $row['gane4'] ?>" size="3">
          <label for="price">gane5</label>
          <input type="text" class="form-control"  id="gane5<?php echo $row['id']?>" name="gane5" value="<?php echo $row['gane5'] ?>" size="3">
          <label for="price">ตัวคูณ</label>
          <input type="text" class="form-control"  id="koon<?php echo $row['id']?>" name="koon" value="<?php echo $row['koon'] ?>" size="3">
          <label for="date">ผลการดำเนินงาน</label>
          <input type="text" class="form-control test" id="<?php echo $row['id']?>" name="input[<?php echo $row['id']?>]" 
          value="<?php echo $row['value'] ?>" size="3">
          <label for="date">คะแนน</label>
          <input type="text" class="form-control" id="box_<?php echo $row['id']?>" name="score[<?php echo $row['id']?>]" 
          value="<?php echo $row['valuegane'] ?>" size="3" readonly="readonly">
          <label for="date">คะแนนถ่วงน้ำหนัก</label>
          <input class="test2" id="box2_<?php echo $row['id']?>" type="text" name="score2[<?php echo $row['id']?>]" 
          value="<?php echo $row['valuekoon'] ?>" size="4" readonly="readonly">
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
       var gane1 = parseFloat($("#gane1"+boxid).val());
       var gane2 = parseFloat($("#gane2"+boxid).val());
       var gane3 = parseFloat($("#gane3"+boxid).val());
       var gane4 = parseFloat($("#gane4"+boxid).val());
       var gane5 = parseFloat($("#gane5"+boxid).val());
       //alert(score)
       var koon = $("#koon"+boxid).val()
       var newscore = score*koon;
       var newscore = parseFloat(newscore).toFixed(2)
       if ( score != "" ){
           if (isNaN(score)){
               alert("not number")
           }
           else{
       if(gane1 < gane2){
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
        $("#box2_"+boxid).val(newscore)
        $("#box_"+boxid).val(scorekoon)
       }
       }
       else{
        $("#box2_"+boxid).val("")
        $("#box_"+boxid).val("")
       }
    });
});
</script>
<a href ="testal.php">Insert</a>
