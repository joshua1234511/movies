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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8"/>
<title>Movies</title>
<script src="https://www.google.com/recaptcha/api.js"></script>
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
<li><a href="<?php echo $Subscribe ?>">Subscribe</a></li>
</ul>
</nav>
</aside>
<section id="content" class="column-left">
<article id="content_article"><center>
<form action="<?php echo $site ?>Edit/" method="post" enctype="multipart/form-data">
<table class="table-responsive">
<tr>
<td>Name</td>
<td><input type="text" id="name"  name="name" required="" value="" maxlength="15"/></td>
</tr>
<tr>
<td>Genre</td>
<td><select id="genre" name="genre" >
<option value="Action" >Action</option>
<option value="Comedy" >Comedy</option>
</select></td>
</tr>
<tr>
<td>Rating:</td>
<td>1<input id="rating" name="rating" type="radio" value="1" checked=""/>&nbsp;
2<input id="rating" name="rating" type="radio" value="2" />&nbsp;
3<input id="rating" name="rating" type="radio" value="3" />&nbsp;
4<input id="rating" name="rating" type="radio" value="4" />&nbsp;
5<input id="rating" name="rating" type="radio" value="5"/></td>
</tr>
<tr>
<td>Year</td>
<td><input id="year"  name="year" type="date" required="" value="" /></td>
</tr>
<tr>
<td>Poster</td>
<td><input type="file" required="" name="image" id="image"  accept="image/jpeg,image/png,image/gif" /></td>
</tr>
<!--<tr>
<?php
$a =rand(0,5);
$b =rand(0,4);
$ab =$a + $b;
?>
<td><?php echo $a ?> + <?php echo $b ?> </td>
<td><input type="text" required="" onkeyup="if(this.value!=='<?php echo $ab ?>')alert('No Match');" on/></td>
</tr>-->
<tr><td><img src="captcha.php" alt="CAPTCHA Image" id="captcha" /></td><td>
<input type="text" id="captcha_code" name="captcha_code" value="" size="" maxlength="5"  />
</td>
</tr>
<tr><td>
<a href="javascript:void(0);" onclick="generate_captcha();" title="Refresh Captcha Image">Reload Image</a>
</td></tr>
<tr><td></td><td><input type="submit" value="Submit" class="btn" onClick="return validate_captcha()" /></td></tr>
</table></form>
</center>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>
<div class="clear"></div>
</section>
<script type="text/javascript">
function generate_captcha()
{
	var random_text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ ) {
        random_text += possible.charAt(Math.floor(Math.random() * possible.length));
	}
	
	document.getElementById("captcha").src = 'captcha.php?random_code='+random_text;
        document.getElementById("captcha_code").focus();
}

function validate_captcha()
{
	if(document.getElementById("captcha_code").value == '') {
		alert("Please enter the Captcha code"); 
		document.getElementById("captcha_code").focus();
		return false;
	}
	return true;
}
</script>
</body>
</html>
