<?php
include 'db.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Max(year) FROM year;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $newyear = $row['Max(year)']+1;
            //echo $newyear;
            $sql = "INSERT INTO year (year) VALUES ($newyear)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("Location:index.php");
        }  
    }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
?>