<?php   
include ("../Config/config.php");
$lt=$_POST['latbox'];
$ln=$_POST['lngbox'];
$name=$_POST['address'];
echo $ln.$lt.$name;
$sql="INSERT INTO location(name,lt,ln)values('$name','$lt','$ln')";
$result = mysql_query($sql);
mysql_close($link);
if($result){
header('Location: '.$add); 
}
else{
header('Location: '.$error); 
}