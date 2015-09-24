<?php
include ("../Config/config.php");
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
  header('Location: '.$login);
}
?>
<!DOCTYPE html>
<html>
<head>
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
else{
	$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="update on page :".$actual_link." update timeStamp: ".date_timestamp_get($date)." update page error". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$site); 
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8"/>
<title>Movies</title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="../js/functions.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<section id="body" class="width">
<header>
<h1><a href="#">Movies</a></h1>
<h2>“<i>It's funny how the colors of the real world only seem really real when you watch them on a screen.</i>”</h2>
<?php
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
  <label id="name"> Welcome <?php echo $_SESSION['username']?></label><a id="logout" href="<?php echo $logout ?>" >Logout</a>
<?php }
?>
</header>
<aside id="sidebar" class="column-left">
<nav id="mainnav">
<ul>
<li class="selected-item"><a href="<?php echo $site ?>">Home</a></li>
<li><a href="<?php echo $admin ?>">Admin</a></li>
<li><a href="#">Subscribe</a></li>
</ul>
</nav>
</aside>
<section id="content" class="column-left">
<article id="content_article"><center>
<form action="<?php echo $site ?>Edit/" method="post" enctype="multipart/form-data">
<table class="table-responsive">
<tr>
<td></td><td><input type="hidden" id="id" name="id" value="<?php echo $id ?>" readonly=""/></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" id="name"  name="name" required="" value="<?php echo $name ?>" maxlength="15"/></td>
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
<td>1<input id="rating" name="rating" type="radio" value="1"<?php if($rating ==='1'){?>checked=""<?php }?>/>&nbsp;
2<input id="rating" name="rating" type="radio" value="2" <?php if($rating ==='2'){?>checked=""<?php }?>/>&nbsp;
3<input id="rating" name="rating" type="radio" value="3" <?php if($rating ==='3'){?>checked=""<?php }?>/>&nbsp;
4<input id="rating" name="rating" type="radio" value="4" <?php if($rating ==='4'){?>checked=""<?php }?>/>&nbsp;
5<input id="rating" name="rating" type="radio" value="5" <?php if($rating ==='5'){?>checked=""<?php }?>/></td>
</tr>
<tr>
<td>Year</td>
<td><input id="year"  name="year" type="date" required=""  value="<?php echo $year ?>"/></td>
</tr>
<tr>
<td>Poster</td>
<td><input type="file" required="" name="image" id="image"  accept="image/jpeg" /></td>
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
<div class="clear"></div>
</section>
</body>
</html>
