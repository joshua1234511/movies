<div class="container">
<div class="content">
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
$sql="select id from movies ORDER BY id DESC LIMIT 10";
foreach ($dbo->query($sql) as $row) { ?>
images[++x] = "<?php echo $site ?>thumnails/<?php echo $row["id"] ?>.jpg";
<?php	}
?>
setTimeout("changeImage()", 0);
function stop(){
clearTimeout(timer);
}
</script>
<div class="row" id="row" onmouseover="stop();" onmouseout="changeImage();">
<div class="left w15"><img src="" id="1"></div>
<div class="left w20"><img src="" id="2"></div>
<div class="left w25"><img src="" id="3"></div>
<div class="right w15"><img src="" id="5"></div>
<div class="right w20"><img src="" id="4"></div>
</div>