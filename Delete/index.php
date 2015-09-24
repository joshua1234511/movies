<?php
include ("../Config/config.php");
$id=$_POST["id"];
echo $id;

$sql = "SELECT poster as co FROM movies where id= $id LIMIT 1";
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){  
while ($row = mysql_fetch_assoc($result)) {
$poster = $row['co'];
}
}
$sql = "DELETE FROM movies where id = $id";
$result = mysql_query($sql);
unlink("../images/".$id.$poster);
unlink("../thumnails/".$id.$poster);
mysql_close($link);
if($result){
	$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Delete on page :".$actual_link." Delete timeStamp: ".date_timestamp_get($date)." delete id: ". $id. "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$site); 
}
else {
	$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Delete on page :".$actual_link." Delete timeStamp: ".date_timestamp_get($date)." Delete unsuccessfull". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$error); 

}
?>