<?php
include ("data.php");
?>
<!DOCTYPE html>
<html>
<head>
<?php
include ("Config/config.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8"/>
<title>Movies</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="js/functions.js"></script>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<?php include ("Social/facebook_script.php"); ?>
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
<form id="myForm1">
Enter Movie Details<br/><input placeholder="Name/ID/Year" name="movie" type="text" onkeyup="ajaxFunction1(this.value,0,myForm2.size.value);"/>
</form>
<form id="myForm2">
Size<br/><select name="size" onchange="ajaxFunction1(myForm1.movie.value,0,this.value);" >
<option value="3">Default</option>
<option value="6">6</option>
<option value="12">12</option>
<option value="18">18</option>
</select>
</form>
</header>
<aside id="sidebar" class="column-left">
<nav id="mainnav">
<ul>
<li class="selected-item"><a href="<?php echo $site ?>">Home</a></li>
<li><a href="<?php echo $admin ?>">Admin</a></li>
<li><a href="<?php echo $Subscribe ?>" >Subscribe</a></li>
<li>
<?php include ("Social/facebook.php"); ?>
</li>
</ul>
</nav>
</aside>
<section id="content" class="column-left">
<article id="content_article">
<?php include ("Config/cookie.php"); ?>
<script type="text/javascript">ajaxFunction1(myForm1.movie.value,0,myForm2.size.value,<?php echo $offset ?>);</script>
</article>
</section>
<?php include ("Footer/footer.php"); ?>
<div class="clear"></div>
</section>
</body>
</html>
