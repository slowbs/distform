<?php 
$sampher = "SELECT * FROM ampher";
$syear = "SELECT * FROM year order by year";
$stype = "SELECT * FROM pa;";
$synctotal_score = "INSERT INTO total_score (`name`,`apid`,`time`, `ep`,`type`) 
select ampher.name , ampher.id, year.year, year.ep, pa.type from ampher INNER join year
inner join pa where not exists
(select time from total_score
            where total_score.time = year.year and total_score.ep = year.ep)
            ORDER by year.year, year.ep, pa.type, ampher.id ;";
$sform = "SELECT ap$ap.*, form_{$ep}_$y.* from form_{$ep}_$y inner join ap$ap on form_{$ep}_$y.id = ap$ap.rid
            where ap$ap.year = $y and ap$ap.ep = $ep and ap$ap.type = $t;";
$sform5 = "SELECT total_score.*, kor, sum(koon$t) from form_{$ep}_$y inner join total_score 
where total_score.apid = '$ap' and form_{$ep}_$y.kor = '$i' and total_score.time = $y
and total_score.ep = $ep and total_score.type = $t;";

?>