
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html><head>
<style type="text/css">
<!--
BODY 		{ margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; }

TABLE		{ COLOR: #000000; FONT: 11px arial, sans-serif; font-weight: normal }

.title		{ COLOR: #0033FF; FONT: 12px arial, sans-serif; font-weight: bold; }

#NewsDiv	{ position: absolute; left: 0; top: 0; width: 100% }
-->
</style>
</head>
<body bgcolor="#F0F0F0" text="#000000" onmouseover="scrollspeed=0" onmouseout="scrollspeed=current" onload="NewsScrollStart();">

<div id="NewsDiv">
<table cellpadding="5" cellspacing="0" border="0" width="100%"><tr><td>


<?php
$handle = fopen("data.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        ?>
        <span class="title">
        <?php echo $line; ?>
        </span><br>

        <?php
    }

    fclose($handle);
} else {
    
} 
?>
</td></tr></table>
</div>






<script language="JavaScript" type="text/javascript">
<!-- HIDE CODE

var scrollspeed		= "1"		// SET SCROLLER SPEED 1 = SLOWEST
var speedjump		= "30"		// ADJUST SCROLL JUMPING = RANGE 20 TO 40
var startdelay 		= "0" 		// START SCROLLING DELAY IN SECONDS
var nextdelay		= "0" 		// SECOND SCROLL DELAY IN SECONDS 0 = QUICKEST
var topspace		= "2px"		// TOP SPACING FIRST TIME SCROLLING
var frameheight		= "304px"	// IF YOU RESIZE THE WINDOW EDIT THIS HEIGHT TO MATCH



current = (scrollspeed)


function HeightData(){
AreaHeight=dataobj.offsetHeight
if (AreaHeight==0){
setTimeout("HeightData()",( startdelay * 1000 ))
}
else {
ScrollNewsDiv()
}}

function NewsScrollStart(){
dataobj=document.all? document.all.NewsDiv : document.getElementById("NewsDiv")
dataobj.style.top=topspace
setTimeout("HeightData()",( startdelay * 1000 ))
}

function ScrollNewsDiv(){
dataobj.style.top=parseInt(dataobj.style.top)-(scrollspeed)
if (parseInt(dataobj.style.top)<AreaHeight*(-1)) {
dataobj.style.top=frameheight
setTimeout("ScrollNewsDiv()",( nextdelay * 1000 ))
}
else {
setTimeout("ScrollNewsDiv()",speedjump)
}}


</script>


</body>
</html>
