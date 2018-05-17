<?php
include 'db.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
echo $id; // ผลลัพธ์คือแสดงข้อความ Hello 
?>