<script type="text/javascript">
function show(target , src,x){
document.getElementById(target).style.display = 'block';
if(parseInt(x)==1){
document.getElementById('displayImg').src="../images/" + src + ".jpg";
}
else {
document.getElementById('displayImg').src="images/" + src + ".jpg";
}
var n=parseInt(src) +1;
var p=parseInt(src) -1;
if(p == 0){
p=1;
document.getElementById('prev').style.display = 'none';
}
else{
document.getElementById('prev').style.display = 'block';
}
if(n > <?php echo $displaymax ?>){
n=<?php echo $displaymax ?>;
document.getElementById('next').style.display = 'none';
}
else{
document.getElementById('next').style.display = 'block';
}
document.getElementById('prev').name=p.toString();
document.getElementById('next').name=n.toString();
document.onkeydown = function() {
if(document.getElementById(target).style.display !=='none')
{
switch (window.event.keyCode) {
case 37:
show('display',p.toString(),<?php echo $x ?>);
break;
case 39:
show('display',n.toString(),<?php echo $x ?>); 
break;
} 
}
};
document.onkeyup = function() {
switch (window.event.keyCode) {
case 27:
document.getElementById('display').style.display = 'none';
break;
}
};
}
function hide(target){
document.getElementById(target).style.display = 'none';
}
</script>
<div id="display" style="z-index:100; display:none;">
<a  onclick="show('display',this.name,<?php echo $x ?>);" onmouseover="show('display',this.name,<?php echo $x ?>);" id="prev" name="" style="left: 26%;
top:52%; position: absolute;z-index: 30;background-color:red;">&lt;&lt;</a>
<a  onclick="hide('display');" style="left: 90%;
top:22%; position: absolute;z-index: 30;background-color:red;">X</a>
<img id="displayImg" src="images/1.jpg" 
style="height:70%; width:70%;
padding: 4px 8px;
color: #333;
position: absolute;
left: 23%;
top:20%;
z-index: 20;">
<a onclick="show('display',this.name,<?php echo $x ?>);" onmouseover="show('display',this.name,<?php echo $x ?>);" id="next" name="" style="left: 90%;
top:52%; position: absolute;z-index: 30;background-color:red;">&gt;&gt;</a>
</div>