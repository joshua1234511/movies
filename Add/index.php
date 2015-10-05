<?php
include ("../Config/config.php");
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
  header('Location: '.$login);
}
include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article"><center>
<form action="<?php echo $site ?>Edit/" method="post" enctype="multipart/form-data">
<table class="table-responsive">
<tr>
<td>Name</td>
<td><input type="text" id="name"  name="name" required value="" maxlength="15"/></td>
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
<td>1<input id="rating" name="rating" type="radio" value="1" checked/>&nbsp;
2<input id="rating" name="rating" type="radio" value="2" />&nbsp;
3<input id="rating" name="rating" type="radio" value="3" />&nbsp;
4<input id="rating" name="rating" type="radio" value="4" />&nbsp;
5<input id="rating" name="rating" type="radio" value="5"/></td>
</tr>
<tr>
<td>Year</td>
<td><input id="year"  name="year" type="date" required value="" /></td>
</tr>

<tr><td>Location</td><td> <select id="country" name="country">
<?php $sql = "SELECT id, name FROM location";
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){
while ($row = mysql_fetch_assoc($result)) {
?>  
<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php
}
}
?>
</select></td></tr>

<tr>
<td>Poster</td>
<td><input type="file" required name="image" id="image"  accept="image/jpeg" /></td>
</tr>
<tr><td><img src="captcha.php" alt="CAPTCHA Image" id="captcha" /></td><td>
<input type="text" id="captcha_code" name="captcha_code" value="" size="" maxlength="5"  />
</td>
</tr>
<tr><td>
<a href="javascript:void(0);" onclick="generate_captcha();" title="Refresh Captcha Image">Reload Image</a>
</td><td><input type="submit" value="Submit" class="btn" onClick="return validate_captcha()" /></td></tr>
</form>
<tr><td><br/></td></tr><tr><td><br/></td></tr>
<form action="<?php echo $site ?>Edit/csv.php" method="post" enctype="multipart/form-data">
<tr><td>Csv Upload</td><td><input type="file" required name="filename" id="filename"  accept=".csv" /></td><td><input type="submit" value="Submit" class="btn" /></td></tr>
</form>
</table>
</center>
</article>
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
<?php include ("../Footer/footer.php");

