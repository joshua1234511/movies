<?php
include ("../Config/config.php");
$sql = "SELECT email as co FROM email";
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){  
while ($row = mysql_fetch_assoc($result)) {
$to = $row['co'];
$subject = "Movie Updates";
$txt = "New Movie Released/Updated!";
mail($to,$subject,$txt,$headers);
}
}
echo "<script>window.close();</script>";
?>