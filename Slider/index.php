<?php
$x=0;
include ("../Config/config.php");
include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article">
<?php include ("../Config/cookie.php"); ?>
<script type="text/javascript">
function changeImage(){
var img = document.getElementById("slider");
fadeImg(img, 0, true);
img.src = images[x];
x++;
if(x >= images.length){
x = 0;
} 
timer = setTimeout("changeImage()", 6000);
}
function fadeImg(el, val, fade){
if(fade === true){
val++;
}
else{
val --;
    }
if(val > 0 && val < 100){
el.style.opacity = val / 100;
setTimeout(function(){fadeImg(el, val, fade);}, 10);
}
}
function next(){
x++;
if(x >= images.length){
x = 0;
} 
clearTimeout(timer);
changeImage();
}
function prev(){
x--;
if(x < 0){
x=0;
}
clearTimeout(timer);
changeImage();
}
var images = [],
x = -1;
<?php
$sql="select id from movies ORDER BY id DESC LIMIT 5";
foreach ($dbo->query($sql) as $row) { ?>
images[++x] = "<?php echo $site ?>images/<?php echo $row["id"] ?>.jpg";
<?php	}
?>
setTimeout("changeImage()", 6000);
</script>
<a  onclick="prev();" id="prev" name="" style="left: 26%;
top:52%; position: absolute;z-index: 30;background-color:red;">&lt;&lt;</a>
<img id="slider" src="http://movies.sj/images/slider.jpg" style="height:70%; width:70%;
padding: 4px 8px;
color: #333;
position: absolute;
left: 23%;
top:20%;
z-index: 20;" alt="Loading">
<a onclick="next();"  id="next" name="" style="left: 90%;
top:52%; position: absolute;z-index: 30;background-color:red;">&gt;&gt;</a>
</article>
</section>
<?php include ("../Footer/footer.php");
