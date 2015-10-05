<?php
$x=0;
include ("Config/config.php");
include ("Header/header.php"); ?>
<section id="content" class="column-left">
<?php include ("Display/display.php"); ?>
<?php include ("Slider/slider.php"); ?>
</div>
</div>
<article id="content_article">
<?php include ("Config/cookie.php"); ?>
<script type="text/javascript">search1(myForm1.movie.value,0,<?php echo $limit ?>,<?php echo $offset ?>);</script>
</article>
</section>
<?php include ("Footer/footer.php");

