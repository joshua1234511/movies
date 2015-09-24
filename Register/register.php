<?php
include ("../Config/config.php");
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$fname=test_input($_POST['fname']);
$lname=test_input($_POST['lname']);
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];
$country=$_POST['country'];
$postal=$_POST['postal'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO user(fname,lname,gender,birthday,country,postal,email,password)values('$fname','$lname','$gender','$birthday', '$country','$postal', '$email', '$password')";
$result = mysql_query($sql);
if($result){
	$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Register on page :".$actual_link." Register timeStamp: ".date_timestamp_get($date)." Register".$email. "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$login); 
}
else{
	$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Register on page :".$actual_link." Register timeStamp: ".date_timestamp_get($date)." Register error". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$error); 
}
?>