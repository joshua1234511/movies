<?php
include ("../Config/config.php");
$data=test_input($_POST['comment']);
$li='data.txt';
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$data = $data. "\n";
file_put_contents($li, $data, FILE_APPEND | LOCK_EX);
header('Location: '.$Subscribe);
