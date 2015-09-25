<?php
include ("../Config/config.php");
?>
<?php include ("../Header/header.php"); ?>
<section id="content" class="column-left">
<article id="content_article">
<br/>
<form id="myForm1" action="register.php" method="post"><table>
<tr><td>First Name</td><td><input placeholder="First Name" name="fname" type="text" required=""/></td></tr>
<tr><td>Last Name</td><td><input placeholder="Last Name" name="lname" type="text" required=""/></td></tr>
<tr><td>Gender</td><td><input id="gender" name="gender" type="radio" value="M" checked=""/>Male&nbsp;
<input id="gender" name="gender" type="radio" value="F" />Female</td></tr>
<tr><td>Birthday</td><td><input placeholder="Birthday" name="birthday" type="date" required=""/></td></tr>
<tr><td>Country</td><td> <select id="country" name="country">
<?php $sql = "SELECT id, nicename FROM country";
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){
while ($row = mysql_fetch_assoc($result)) {
?>  
<option value="<?php echo $row['id']; ?>"><?php echo $row['nicename']; ?></option>
<?php
}
}
?>
</select></td></tr>
<tr><td>Zip Code</td><td><input placeholder="Zip Code" name="postal" type="number" maxlength="6" required=""/></td></tr>
<tr><td>Email</td><td><input placeholder="Email" id="email" name="email" type="email" required="" onkeyup="verifyEmail(this.value);"/></td><td><label id="email_label"></label></td></tr>
<tr><td>Password</td><td><input placeholder="Password" id="password" name="password" type="password" required="" onkeyup="checkPass1();"/></td><td><label id="message1"></label></td></tr>
<tr><td>Confirm Password</td><td><input placeholder="Confirm Password" id="cpassword" name="cpassword" type="password" required="" onkeyup="checkPass();"/></td><td><label id="message"></label></td></tr>
<tr><td></td><td><input type="submit" value="Register"></td></tr>
</table>
</form>
</article>
</section>
<?php include ("../Footer/footer.php"); ?>
