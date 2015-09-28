<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8"/>
<title>Movies</title>
<?php
$actual_link = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
if($site === $actual_link){
$src="news_win.php";
include ("Social/facebook_script.php");
?>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<script type="text/javascript" src="js/functions.js"></script>
<?php
}
else {
$src="../news_win.php";
include ("../Social/facebook_script.php");
?>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<script type="text/javascript" src="../js/functions.js"></script>
<?php
}
?>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<section id="body" class="width">
<header>
<h1><a href="#">Movies</a></h1>
<h2>“<i>It's funny how the colors of the real world only seem really real when you watch them on a screen.</i>”</h2>
<iframe id="NewsWindow" src="<?php echo $src ; ?>" width="50%"  height="10%" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>
<?php
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
 <label id="name"> Welcome <?php echo $_SESSION['username']?></label><a id="logout" href="<?php echo $logout ?>" >Logout</a>
<?php }
if(($site === $actual_link )|| ($admin ===$actual_link)){
?>
<form id="myForm1">
Enter Movie Details<br/><input placeholder="Name/ID/Year" name="movie" type="text" onkeyup="search1(this.value,<?php echo $x ; ?>,myForm2.size.value);"/>
</form>
<form id="myForm2">
Size<br/><select name="size" onchange="search1(myForm1.movie.value,<?php echo $x ; ?>,this.value);" >
<option value="3">Default</option>
<option value="6">6</option>
<option value="12">12</option>
<?php 
if($site === $actual_link ) { ?>
<option value="18">18</option>
<?php } ?>
</select>
</form>
<?php
}
?>
</header>
<aside id="sidebar" class="column-left">
<nav id="mainnav">
<ul>
<li <?php if($site === $actual_link) {?> class="selected-item" <?php } ?>><a href="<?php echo $site ?>">Home</a></li>
<li <?php if($admin === $actual_link) {?> class="selected-item" <?php } ?>><a href="<?php echo $admin ?>">Admin</a></li>
<?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
<li <?php if($add === $actual_link) {?> class="selected-item" <?php } ?>><a href="<?php echo $add ?>">Add</a></li>
<?php } ?>
<li <?php if($Subscribe === $actual_link) {?> class="selected-item" <?php } ?>><a href="<?php echo $Subscribe ?>" >Subscribe</a></li>
<li <?php if($blog === $actual_link) {?> class="selected-item" <?php } ?>><a href="<?php echo $blog ?>" >Blog</a></li>
<li <?php if($slider === $actual_link) {?> class="selected-item" <?php } ?>><a href="<?php echo $slider ?>" >Slider</a></li>
<li>
<?php 
if($site === $actual_link){
include ("Social/facebook.php");
}
else{
include ("../Social/facebook.php");
}
?>
</li>
</ul>
</nav>
</aside>