<?php
include 'db.php';
session_start();
ob_start();
echo $_SESSION['abc']; // ผลลัพธ์คือแสดงข้อความ Hello 
$count = $_SESSION['abc'];
//$count = isset($_POST['count']) ? $_POST['count'] : '';

$score = isset($_POST['score']) ? $_POST['score'] : '';
$score2 = isset($_POST['score2']) ? $_POST['score2'] : '';
if ( isset( $_POST['input'] ) ){
foreach ($_POST['input'] as $key => $value) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = "UPDATE district SET value = '$value', valuegane = '$score[$key]', valuekoon = '$score2[$key]'  where id = '$key' ";
    
        // Prepare statement
        $stmt = $conn->prepare($sql);
    
        // execute the query
        $stmt->execute();
    
        // echo a message to say the UPDATE succeeded
        
        //header("Location:selectbootstrap.php");
        echo "<script>
        alert('แก้ไขสำเร็จ');
        window.location.href='select1.php';
        </script>";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
}
}
?>