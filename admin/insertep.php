<?php
include 'functions.php';
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}
include 'db.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT count(*) as tnum, Max(year), Max(ep2) from 
        (
         SELECT *,max(year), max(ep) as ep2 FROM information_schema.tables, ssj.year WHERE table_schema = 'ssj' 
        and year = (select max(year) from ssj.year) GROUP by table_name) as fuk;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->FetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $newyear = $row['Max(year)'];
            $newep = $row['Max(ep2)']+3;
            $tnum = $row['tnum'];
            //echo {$newep}_$newyear;
            $sql = "INSERT INTO year (year,ep) VALUES ($newyear,$newep);
             RENAME TABLE `table $tnum` TO form_{$newep}_$newyear;
            DELETE FROM `form_{$newep}_$newyear` WHERE `COL 14` = 'status';
            ALTER TABLE form_{$newep}_$newyear add column id int PRIMARY key NOT NULL AUTO_INCREMENT first;
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 1` pa varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 2` lumdub varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 3` name varchar(200);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 4` gane varchar(15);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 5` data varchar(15);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 6` koon1 decimal(10,2);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 7` koon2 decimal(10,2);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 8` koon3 decimal(10,2);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 9` gane1 varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 10` gane2 varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 11` gane3 varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 12` gane4 varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 13` gane5 varchar(10);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 14` status int(5);
            ALTER TABLE form_{$newep}_$newyear CHANGE `COL 15` kor int(3);
            INSERT INTO ap1(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap1
            where ap1.year = year.year and ap1.ep = year.ep and ap1.type = pa.type and ap1.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap2(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap2
            where ap2.year = year.year and ap2.ep = year.ep and ap2.type = pa.type and ap2.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;

INSERT INTO ap3(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap3
            where ap3.year = year.year and ap3.ep = year.ep and ap3.type = pa.type and ap3.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap4(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap4
            where ap4.year = year.year and ap4.ep = year.ep and ap4.type = pa.type and ap4.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap5(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap5
            where ap5.year = year.year and ap5.ep = year.ep and ap5.type = pa.type and ap5.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap6(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap6
            where ap6.year = year.year and ap6.ep = year.ep and ap6.type = pa.type and ap6.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;

INSERT INTO ap7(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap7
            where ap7.year = year.year and ap7.ep = year.ep and ap7.type = pa.type and ap7.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap8(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap8
            where ap8.year = year.year and ap8.ep = year.ep and ap8.type = pa.type and ap8.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     
     
INSERT INTO ap9(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap9
            where ap9.year = year.year and ap9.ep = year.ep and ap9.type = pa.type and ap9.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap10(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap10
            where ap10.year = year.year and ap10.ep = year.ep and ap10.type = pa.type and ap10.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;

INSERT INTO ap11(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap11
            where ap11.year = year.year and ap11.ep = year.ep and ap11.type = pa.type and ap11.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap12(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap12
            where ap12.year = year.year and ap12.ep = year.ep and ap12.type = pa.type and ap12.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap13(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap13
            where ap13.year = year.year and ap13.ep = year.ep and ap13.type = pa.type and ap13.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap14(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap14
            where ap14.year = year.year and ap14.ep = year.ep and ap14.type = pa.type and ap14.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;

INSERT INTO ap15(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap15
            where ap15.year = year.year and ap15.ep = year.ep and ap15.type = pa.type and ap15.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap16(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap16
            where ap16.year = year.year and ap16.ep = year.ep and ap16.type = pa.type and ap16.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id; 

INSERT INTO ap17(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap17
            where ap17.year = year.year and ap17.ep = year.ep and ap17.type = pa.type and ap17.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap18(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap18
            where ap18.year = year.year and ap18.ep = year.ep and ap18.type = pa.type and ap18.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;

INSERT INTO ap19(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap19
            where ap19.year = year.year and ap19.ep = year.ep and ap19.type = pa.type and ap19.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap20(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap20
            where ap20.year = year.year and ap20.ep = year.ep and ap20.type = pa.type and ap20.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap21(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap21
            where ap21.year = year.year and ap21.ep = year.ep and ap21.type = pa.type and ap21.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     

INSERT INTO ap22(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap22
            where ap22.year = year.year and ap22.ep = year.ep and ap22.type = pa.type and ap22.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;

INSERT INTO ap23(`year`,`ep`, `rid`, `type`) 
select year.year, year.ep, form_{$newep}_$newyear.id, pa.type FROM form_{$newep}_$newyear INNER join year
inner join pa where not exists 
(select * from ap23
            where ap23.year = year.year and ap23.ep = year.ep and ap23.type = pa.type and ap23.rid = form_{$newep}_$newyear.id)
            ORDER by year.year, year.ep, pa.type, form_{$newep}_$newyear.id;     
INSERT INTO total_score (`name`,`apid`,`time`, `ep`,`type`) 
            select ampher.name , ampher.id, year.year, year.ep, pa.type from ampher INNER join year
            inner join pa where not exists
            (select time from total_score
            where total_score.time = year.year and total_score.ep = year.ep)
            ORDER by year.year, year.ep, pa.type, ampher.id ;
INSERT INTO log (`apid`,`name`,`year`, `ep`,`type`)
            SELECT ampher.id, ampher.name, year.year, year.ep, pa.type from ampher inner join year 
            inner join pa where not EXISTS
            (select time, ep from log 
	        where log.year = year.year AND log.ep = year.ep and log.type = pa.type)
            ORDER by year.year, year.ep, pa.type, ampher.id;
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