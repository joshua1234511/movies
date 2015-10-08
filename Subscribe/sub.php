<?php   
include ("../Config/config.php");
$email=$_POST['email'];
$sql="INSERT INTO email(email)values('$email')";
$result = $dbo->query($sql);
mysql_close($link);
if($result){
header('Location: '.$site); 
}
else{
header('Location: '.$error); 
}