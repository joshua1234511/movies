<?php
include ("../Config/config.php");
session_start();
$username=$_POST['username'];
$pass;
$sql = "SELECT * FROM user WHERE email = '$username'";
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
header('Location: '.$admin); 
}
else{
header('Location: '.$error); 
}
?>