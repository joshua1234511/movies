<?php
include ("../Config/config.php");
session_start();
$username=$_POST['username'];
$pass;
$sql = "SELECT * FROM user WHERE email = '$username' and Active ='1'";
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){  
while ($row = mysql_fetch_assoc($result)) {
$pass = $row['password'];
$username = $row['fname'].' '.$row['lname'];
}
}
$password=md5($_POST['password']);
echo "pass=".$pass."<br/>"."password=".$password;
if($password===$pass){ 
$_SESSION["username"] = $username;
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Login on page :".$actual_link." Login timeStamp: ".date_timestamp_get($date)." Login done:".$username. "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$admin); 
}
else{
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Login on page :".$actual_link." login timeStamp: ".date_timestamp_get($date)." login error : ".$username. "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$error); 
}
