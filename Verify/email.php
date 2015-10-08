<?php
require "../Config/config.php";
$in=$_GET['txt'];
if (filter_var($in, FILTER_VALIDATE_EMAIL)) {

$sql = "SELECT email FROM user WHERE email = '$in'";
$row1 = $dbo->query($sql);
if ($row1->rowCount() > 0) {
	echo "Email Already Exists";
}
else{
echo "Email Valid";
}
}
else{
echo "Invalid Email";
}
