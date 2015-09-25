<?php
include ("../Config/config.php");
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
  header('Location: '.$login);
}
?>
<?php
$id=$_POST['id'];
if($id){
$sql = "SELECT * FROM movies where id = $id LIMIT 1";
$result = mysql_query($sql);
$name;
$genre;
$rating;
$year;
$poster;
if (mysql_num_rows($result) !== 0) {
while ($row = mysql_fetch_assoc($result)) {
$name = $row["name"];
$genre = $row["genre"];
$rating = $row["rating"];
$year = $row["year"];
$poster = $row["poster"]; 
}
}
mysql_close($link);   
}
?>
<?php include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article"><center>
<form action="<?php echo $site ?>Edit/" method="post" enctype="multipart/form-data">
<table class="table-responsive">
<tr>
<td></td><td><input type="hidden" id="id" name="id" value="<?php echo $id ?>" readonly/></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" id="name"  name="name" required value="<?php echo $name ?>" maxlength="15"/></td>
</tr>
<tr>
<td>Genre</td>
<td><select id="genre" name="genre" >
<option value="Action" <?php if($genre ==="Action"){?>selected=""<?php }?>>Action</option>
<option value="Comedy" <?php if($genre ==="Comedy"){?>selected=""<?php }?>>Comedy</option>
</select></td>
</tr>
<tr>
<td>Rating:</td>
<td>1<input id="rating" name="rating" type="radio" value="1"<?php if($rating ==='1'){?>checked<?php }?>/>&nbsp;
2<input id="rating" name="rating" type="radio" value="2" <?php if($rating ==='2'){?>checked<?php }?>/>&nbsp;
3<input id="rating" name="rating" type="radio" value="3" <?php if($rating ==='3'){?>checked<?php }?>/>&nbsp;
4<input id="rating" name="rating" type="radio" value="4" <?php if($rating ==='4'){?>checked<?php }?>/>&nbsp;
5<input id="rating" name="rating" type="radio" value="5" <?php if($rating ==='5'){?>checked<?php }?>/></td>
</tr>
<tr>
<td>Year</td>
<td><input id="year"  name="year" type="date" required  value="<?php echo $year ?>"/></td>
</tr>
<tr>
<td>Poster</td>
<td><input type="file" required name="image" id="image"  accept="image/jpeg" /></td>
</tr>
<tr>
<?php
$a =rand(0,5);
$b =rand(0,4);
$ab =$a + $b;
?>
<td><?php echo $a ?> + <?php echo $b ?> </td>
<td><input type="text" required="" onkeyup="if(this.value!=='<?php echo $ab ?>')alert('No Match');" on/></td>
</tr>
<tr><td></td><td><input type="submit" value="Submit" class="btn" /></td></tr>
</table></form>
</center>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>

