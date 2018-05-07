<?php
include 'db.php';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$gane1 = isset($_POST['gane1']) ? $_POST['gane1'] : '';
$gane2 = isset($_POST['gane2']) ? $_POST['gane2'] : '';
$gane3 = isset($_POST['gane3']) ? $_POST['gane3'] : '';
$gane4 = isset($_POST['gane4']) ? $_POST['gane4'] : '';
$gane5 = isset($_POST['gane5']) ? $_POST['gane5'] : '';
$value = isset($_POST['value']) ? $_POST['value'] : '';
$valuekoon = isset($_POST['valuekoon']) ? $_POST['valuekoon'] : '';
$valuegane = isset($_POST['valuegane']) ? $_POST['valuegane'] : '';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO district (name, gane1, gane2)
    VALUES ('$name', '$gane1','$gane2')";
    // use exec() because no results are returned
    $conn->exec($sql);
    header("Location:select.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>