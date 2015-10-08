<?php
include ("../Config/config.php");
$id=$_POST["id"];
$sql = "DELETE FROM movies where id = $id";
$result = $dbo->query($sql);
unlink("../images/".$id."jpg");
unlink("../thumnails/".$id."jpg");
mysql_close($link);
if($result){
header('Location: '.$site); 
}
else {
header('Location: '.$error); 

}
