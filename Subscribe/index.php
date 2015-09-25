<?php
include ("../Config/config.php");
?>
<?php include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article">
<br/>
<form id="myForm1" action="sub.php" method="post">
Subscribe for latest news<br/><input placeholder="Email" name="email" type="email"/>
<input type="submit" value="Subscribe">
</form>
<br/><br/>
<table><tr><label>Latest Comments</label></tr><tr>
<iframe id="NewsWindow" src="news_win.php" width="100%" height="100%" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" style="border: #000000 1px solid;"></iframe>
</tr>
</tr>
<tr> </tr>
<tr>Comment&nbsp</tr><tr><form action="comment.php" method="post"><input type="text" name="comment">&nbsp<input type="submit" value="Post"></form></tr>
</table>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>

