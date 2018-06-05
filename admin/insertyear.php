<?php
include 'db.php';
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT Max(year) FROM year;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $newyear = $row['Max(year)']+1;
            $newep = 1;
            //echo $newyear;
            $sql = "INSERT INTO year (year) VALUES ($newyear);
            alter table ap1 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap2 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap3 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap4 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap5 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap6 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap7 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap8 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap9 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap10 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap11 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap12 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap13 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap14 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap15 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap16 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap17 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap18 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap19 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap20 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap21 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap22 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            alter table ap23 add column value_{$newep}_$newyear varchar (10) not null, add column valuekoon_{$newep}_$newyear varchar (10) not null, add column valuegane_{$newep}_$newyear varchar (10) not null;
            INSERT INTO ap1 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap1 where form_{$newep}_$newyear.id = ap1.id);
            INSERT INTO ap2 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap2 where form_{$newep}_$newyear.id = ap2.id);
            INSERT INTO ap3 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap3 where form_{$newep}_$newyear.id = ap3.id);
            INSERT INTO ap4 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap4 where form_{$newep}_$newyear.id = ap4.id);
            INSERT INTO ap5 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap5 where form_{$newep}_$newyear.id = ap5.id);
            INSERT INTO ap6 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap6 where form_{$newep}_$newyear.id = ap6.id);
            INSERT INTO ap7 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap7 where form_{$newep}_$newyear.id = ap7.id);
            INSERT INTO ap8 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap8 where form_{$newep}_$newyear.id = ap8.id);
            INSERT INTO ap9 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap9 where form_{$newep}_$newyear.id = ap9.id);
            INSERT INTO ap10 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap10 where form_{$newep}_$newyear.id = ap10.id);
            INSERT INTO ap11 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap11 where form_{$newep}_$newyear.id = ap11.id);
            INSERT INTO ap12 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap12 where form_{$newep}_$newyear.id = ap12.id);
            INSERT INTO ap13 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap13 where form_{$newep}_$newyear.id = ap13.id);
            INSERT INTO ap14 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap14 where form_{$newep}_$newyear.id = ap14.id);
            INSERT INTO ap15 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap15 where form_{$newep}_$newyear.id = ap15.id);
            INSERT INTO ap16 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap16 where form_{$newep}_$newyear.id = ap16.id);
            INSERT INTO ap17 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap17 where form_{$newep}_$newyear.id = ap17.id);
            INSERT INTO ap18 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap18 where form_{$newep}_$newyear.id = ap18.id);
            INSERT INTO ap19 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap19 where form_{$newep}_$newyear.id = ap19.id);
            INSERT INTO ap20 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap20 where form_{$newep}_$newyear.id = ap20.id);
            INSERT INTO ap21 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap21 where form_{$newep}_$newyear.id = ap21.id);
            INSERT INTO ap22 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap22 where form_{$newep}_$newyear.id = ap22.id);
            INSERT INTO ap23 (`value_{$newep}_$newyear`) select '' from form_{$newep}_$newyear where not exists (select id from ap23 where form_{$newep}_$newyear.id = ap23.id);
            INSERT INTO total_score (`name`,`time`, `ep`) select ampher.name , year.year, year.ep from ampher INNER join year where not exists (select time from total_score
            where total_score.time = year.year)ORDER by year.year, year.ep, ampher.id ;
            INSERT INTO log (`apid`,`name`,`year`, `ep`)
            SELECT ampher.id, ampher.name, year.year, year.ep from ampher inner join year where not EXISTS
            (select time, ep from log where log.year = year.year AND log.year = year.ep)ORDER by year.year, 
            year.ep, ampher.id ;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("Location:year.php");
        }  
    }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
?>