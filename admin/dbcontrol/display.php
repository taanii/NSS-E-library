<?php
include 'connect.php';

$selectquery = " select * from audios";
$query = mysqli_query($connection,$selectquery);
$res = mysqli_fetch_array($query);
echo $res['1'];
?>