<?php
include ("../Config/config.php");
include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article">
<br/>
<form id="myForm1" action="pass.php" method="post"><table>
<tr><td><input placeholder="Username" name="username" type="text" required/></td></tr>
<tr><td><input placeholder="Password" name="password" type="password" required/></td></tr>
<tr><td><input type="submit" value="Login">&nbsp&nbsp&nbsp<a href="<?php echo $register ?>">Register</a></td></tr>
</table>
</form>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>

