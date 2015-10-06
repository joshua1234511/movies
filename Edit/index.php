<?php   
include ("../Config/config.php");
$id=test_input($_POST['id']);
$sql = "SELECT MAX(id) as co FROM movies";
$result = mysql_query($sql);
$maxid=1;
if (mysql_num_rows($result) !== 0){  
while ($row = mysql_fetch_assoc($result)) {
$maxid = $row['co'] + 1;
}
}
else{
$maxid = 1;
}
if($id!=='')
{
$maxid =$id;
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$name=test_input($_POST['name']);
$genre=test_input($_POST['genre']);
$rating=test_input($_POST['rating']);
$year=test_input($_POST['year']);
$id=test_input($_POST['id']);
if(is_uploaded_file($_FILES['image']['tmp_name'])){  
$fileTmpLoc = $_FILES["image"]["tmp_name"];
$r =basename($_FILES["image"]["name"]);
$rest= strtolower(strrchr($r, '.'));
if(($rest!=='.jpg')){
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Error on page :".$actual_link." Error timeStamp: ".date_timestamp_get($date)." Error : Invalid image format". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$error);
}
else{
$pathAndName = "../images/".$maxid.$rest;
$pathAndName1 = "../thumnails/".$maxid.$rest;
list($width, $height) = getimagesize($fileTmpLoc);
$thumb = imagecreatetruecolor(150, 150);
$source = imagecreatefromjpeg($fileTmpLoc);
imagecopyresized($thumb, $source, 0, 0, 0, 0, 150, 150, $width, $height);
imagejpeg($thumb,$pathAndName1);
imagedestroy($thumb);    
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
$img_url  =$rest;
if($id==null){
$sql="INSERT INTO movies(name,genre,rating,year)values('$name','$genre','$rating','$year')";
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Insert on page :".$actual_link." Insert timeStamp: ".date_timestamp_get($date)." Insert :Insert operation done". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
$result = mysql_query($sql);
if($result){
foreach($_POST['country'] as $k) {
    $sql_loc = "INSERT INTO movies_running(movies_id,location_id) values('$maxid','$k')";
    mysql_query($sql_loc);
}
}
}
else{
$sql="UPDATE movies SET name='$name', genre='$genre', rating='$rating', year='$year' where id=$id";
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Update on page :".$actual_link." Update timeStamp: ".date_timestamp_get($date)." Update operation done". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
$result = mysql_query($sql);
if($result){
$sql_dec = "delete  from movies_running where movies_id = $id";
    mysql_query($sql_dec);
foreach($_POST['country'] as $k) {
    $sql_loc = "INSERT INTO movies_running(movies_id,location_id) values('$id','$k')";
    mysql_query($sql_loc);
}
}
} 
mysql_close($link);
if($result){
echo "<script type='text/javascript'>window.open('".$site."','_self');window.open('".$Subscribe."mail.php');</script>";
}
else{
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Error on page :".$actual_link." Error timeStamp: ".date_timestamp_get($date)." Error : Mysql Invalid Format". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$error); 
}
} 
}


