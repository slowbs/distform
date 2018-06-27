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
<?php $result = "";
?>

<body>

<div class="container">
<h1>Test Algho</h1>
<form action="insert.php" method = "post">
  <div class="form-row">
  <label>ชื่อ</label>
    <div class="col">
      <input type="text" class="form-control" name="name">
    </div>
    <label>เกณฑ์1</label>
    <div class="col">
      <input type="text" class="form-control" name="gane1">
    </div>
    <label>เกณฑ์2</label>
    <div class="col">
      <input type="text" class="form-control" name="gane2">
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>