<?php
$y = isset($_GET['y']) ? $_GET['y'] : '';
$ep = isset($_GET['ep']) ? $_GET['ep'] : '';
$t = isset($_GET['t']) ? $_GET['t'] : '';

include 'db.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ampher";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){?>
            <a href="form.php?y=<?php echo $y?>&ap=<?php echo $row['id']?>&ep=<?php echo $ep?>&t=<?php echo $t?>" 
            role="button"><button class="btn btn-primary"><?php echo $row['name']; ?></button></a><?php
            $_SESSION['name'][$row['id']]= $row['name'];
        }  
        
    }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
?>