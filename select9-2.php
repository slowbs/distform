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
    $count = $stmt->rowCount();
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
    print $count;
    session_start();
    ob_start();
    $_SESSION['abc']= $count;
    foreach($result as $row){ 
        ?>
            <input type="text" class="form-control" name="id" value="<?php echo $row['id'] ?>">
          <label for="name">name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
          <label for="price">gane1</label>
          <input type="text" class="form-control" name="gane1" value="<?php echo $row['gane1'] ?>">
          <label for="date">gane2</label>
          <input type="text" class="form-control" name="gane2" value="<?php echo $row['gane2'] ?>">
          <label for="date">กรอกค่า</label>
          <input type="text" class="form-control" name="input[<?php echo $row['id']?>]" value="<?php echo $row['value'] ?>">
          <label for="date">results</label>
          <?php
          if($row['gane1'] < 5){
             $cal = "10";
          }
          else {$cal = "20";
         }
         ?>

          <input type="text" class="form-control" name="result" value="<?php echo $cal ?>">
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
<a href ="testal.php">Insert</a>