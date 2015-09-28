<?php 
include ("../Config/config.php");
$handle = fopen($_FILES['filename']['tmp_name'], "r");
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
if($data[0]<=$displaymax){
$import="UPDATE movies SET name='$data[1]', genre='$data[2]', rating='$data[3]', year='$data[4]' where id=$data[0]";
}
else{
$import="INSERT into movies(name,genre,rating,year) values('$data[1]','$data[2]','$data[3]','$data[4]')";
}
mysql_query($import) or die(header('Location: '.$error));
}
fclose($handle);
mysql_close($link);
if($import){
echo "<script type='text/javascript'>window.open('http://movies.sj/','_self');window.open('http://movies.sj/Subscribe/mail.php');</script>";
}
else{
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Error on page :".$actual_link." Error timeStamp: ".date_timestamp_get($date)." Error : Mysql Invalid Format". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$error); 
}