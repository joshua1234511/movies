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
if(($rest!=='.jpg')&&($rest!=='.png')&& ($rest!=='.gif'))
{
header('Location: '.$error);
}
else
{
$pathAndName = "../images/".$maxid.$rest;


$pathAndName1 = "../thumnails/".$maxid.$rest;

list($width, $height) = getimagesize($fileTmpLoc);
$thumb = imagecreatetruecolor(150, 150);
        if($rest==='.jpg')
        {
        $source = imagecreatefromjpeg($fileTmpLoc);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, 150, 150, $width, $height);
        imagejpeg($thumb,$pathAndName1);
        imagedestroy($thumb);
        }
        if($rest==='.png')
        {
        $source = imagecreatefrompng($fileTmpLoc);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, 150, 150, $width, $height);
        imagepng($thumb,$pathAndName1);
        imagedestroy($thumb);
        }
        if($rest==='.gif')
        {
        $source = imagecreatefromgif($fileTmpLoc);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, 150, 150, $width, $height);
        imagegif($thumb,$pathAndName1);
        imagedestroy($thumb);
        }
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
$img_url  =$rest;
if($id==null){
$sql="INSERT INTO movies(name,genre,rating,year,poster)values('$name','$genre','$rating','$year','$img_url')";

$result = mysql_query($sql);
}
else{
$sql="UPDATE movies SET name='$name', genre='$genre', rating='$rating', year='$year', poster='$img_url' where id=$id";
$result = mysql_query($sql);
} 
mysql_close($link);
if($result){
    echo "<script type='text/javascript'>window.open('http://movies.sj/','_self');window.open('http://movies.sj/Subscribe/mail.php');</script>";
//header('Location: '.$site); 
}
else{
header('Location: '.$error); 
}
} 
}
?>