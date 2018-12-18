<?php

$curl = curl_init();

$url = "http://conf.moph.go.th/showDetailCalenderVDO.php?page=view_detail&day=2018-12-07";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

preg_match_all("!<table>[^\s]*?</table>!", $result, $matches);
//echo $result;
print_r($matches);

curl_close($curl);
?>