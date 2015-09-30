<!DOCTYPE html>
<html>
<head>
	<title>Movies | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
<script type="text/javascript">
	function hide(x){
		document.getElementById(x).style.display = 'none';
	}
</script>
<div class="pop_details" id="pop_details">
<a onclick="hide('pop_details');" style="float:right;top:0;">X</a>
<br/><br/><br/><br/>
	<form id="subscribe" action="" method="post">
	<h2>Subscribe for latest news</h2><br/><input placeholder="Email" name="email" type="email"/>
	<input type="submit" value="Subscribe">
	</form>
</div>
<div class="header">
    <div class="row">
    	<div class="block" style="background:transparent;">
    		<br/>
    		<h1>Movies</h1>
			<h2>It's funny how the colors of the real world only seem really real when you watch them on a screen.</h2>
			<br/><br/>
		</div>
		<div class="top_left">TOP LEFT</div>
		<div class="top_right">TOP RIGHT</div>
	</div>
	<div class="row">
		<div class="bottom_left">BOTTOM LEFT</div>
		<div class="bottom_right">BOTTOM RIGHT</div>
	</div>
</div>
<br/>
<div class="menu"><a onclick="toggle('aside_left');"><h1>Menu</h1></a></div>
<div class="aside_left" id="aside_left">
<br/>
		<div class="nav">
			<ul>
				<li><a href="">MENU_1</a></li>
				<li><a href="">MENU_2</a></li>
				<li><a href="">MENU_3</a></li>
				<li><a href="">MENU_4</a></li>
			</ul>
	    </div>
<br/>
</div>
<br/>
<div class="container">
<div class="content">
		<?php include ("Config/config.php"); ?>
<script type="text/javascript">
function changeImage(){
	var temp =x;
	for(var i=1;i<=5;i++)
	{
var img = document.getElementById(String(i));
img.src = images[x];
x++;
if(x >= images.length){
x = 0;
}
}
x=temp;
x++;
if(x >= images.length){
x = 0;
}
timer = setTimeout("changeImage()", 1000);
}
var images = [],
x = -1;
<?php
$sql="select id from movies ORDER BY id DESC";
foreach ($dbo->query($sql) as $row) { ?>
images[++x] = "<?php echo $site ?>thumnails/<?php echo $row["id"] ?>.jpg";
<?php	}
?>
setTimeout("changeImage()", 0);
function stop(){
clearTimeout(timer);
}
</script>
		<div class="row" onmouseover="stop();" onmouseout="changeImage();">
			<div class="left w20"><img src="" id="1"></div>
			<div class="left w20"><img src="" id="2"></div>
			<div class="left w20"><img src="" id="3"></div>
			<div class="right w20"><img src="" id="4"></div>
			<div class="right w20"><img src="" id="5"></div>
		</div>


		<p>Content</p>
		<div class="row">
			<div class="left">LEFT<br/><br/></div>
			<div class="right">RIGHT<br/><br/></div>
		</div>
		<p>Content</p>
		<div class="row">
			<div class="left w20">LEFT<br/><br/></div>
			<div class="right w20">RIGHT<br/><br/></div>
			<div class="block w20">BLOCK<br/><br/></div>	
		</div>
		<p>Content</p>
		<div class="row">
			<div class="left w30">LEFT<br/><br/></div>
			<div class="right w30">RIGHT<br/><br/></div>
			<div class="right w30">RIGHT<br/><br/></div>
		</div>

</div>
</div>
<br/>
<div class="footer">
	<div class="row">
		<div class="content">
			<p>&copy; 2010 - <?php echo date("Y"); ?> Movies. Designed by <a href="#">Joshua Fernandes</a></p>
		</div>
	</div>
</div>
</body>
</html>