<?php
include ("../Config/config.php");
$id=$_POST["id"];
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
header('Location: '.$site); 
}
else {
header('Location: '.$error); 

}
