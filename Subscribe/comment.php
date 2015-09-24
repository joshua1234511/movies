<?php
include ("../Config/config.php");
$data=$_POST['comment'];
$li='data.txt';
$data=$data. "\n";
file_put_contents($li, $data, FILE_APPEND | LOCK_EX);
header('Location: '.$Subscribe);
?>