<?php
include ("../Config/config.php");
$x=1;
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
header('Location: '.$login);
}
include ("../Header/header.php"); ?>
<script type="text/css">
div.container {
display: block;
}</script>
<section id="content" class="column-left">
<?php include ("../Display/display.php"); ?>
<article id="content_article" >
<div style="display:inline-block;">
<?php include ("../Config/cookie.php"); ?>
<script type="text/javascript">search1(myForm1.movie.value,1,myForm2.size.value,<?php echo $offset ?>);</script>
</div>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>

