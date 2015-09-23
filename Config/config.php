<?php
$hostname="localhost";
$database="test";
$username="root";
$password="";
$site="http://movies.sj/";
$admin="http://movies.sj/Admin/";
$error="http://movies.sj/Error/";
$display="http://movies.sj/Display/";
$Subscribe="http://movies.sj/Subscribe/";
$login="http://movies.sj/Login/";
$logout="http://movies.sj/Login/logout.php";
$register="http://movies.sj/Register/";
$link = mysql_connect($hostname, $username, $password);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
die ('Can\'t select database: ' . mysql_error());
}
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>