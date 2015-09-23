<!DOCTYPE html>
<html>
<head>
<?php
include ("../Config/config.php");
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
<li><a href="<?php echo $site ?>">Home</a></li>
<li><a href="<?php echo $admin ?>">Admin</a></li>
<li class="selected-item"><a href="<?php echo $Subscribe ?>" >Subscribe</a></li>
</ul>
</nav>
</aside>
<section id="content" class="column-left">
<article id="content_article">
<br/>
<form id="myForm1" action="sub.php" method="post">
Subscribe for latest news<br/><input placeholder="Email" name="email" type="email"/>
<input type="submit" value="Subscribe">
</form>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>
<div class="clear"></div>
</section>
</body>
</html>
