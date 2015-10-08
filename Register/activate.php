<?php
include ("../Config/config.php");
include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article">
<br/>
<?php
$id=$_GET['id'];
$sql = "select * from user where Active = '$id' LIMIT 1";
$result = $dbo->query($sql);
if ($result->rowCount() > 0){
$sql1="UPDATE user SET Active='1' where Active='$id'";
$result1 = $dbo->query($sql1);
}
if($result1){

echo " <h2>Verification Successfull!</h2>";
echo "<a href='".$login."' >Login </a>";
}
else{
header('Location: '.$error);
}
?>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>
