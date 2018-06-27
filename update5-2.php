<?php
include 'db.php';
session_start();
ob_start();
//echo $_SESSION['abc']; // ผลลัพธ์คือแสดงข้อความ Hello 
$count = $_SESSION['abc'];
//$count = isset($_POST['count']) ? $_POST['count'] : '';
if ( isset( $_POST['input'] ) ){
foreach ($_POST['input'] as $key => $value)  {
        echo $key;
        echo $value; ?> <br>
        <?php
}
}
?>