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
header('Location: '.$login); 
}
else{
header('Location: '.$error); 
}