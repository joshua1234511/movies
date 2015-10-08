<?php
define('DATABASE', 'test');
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
$site="http://movies.sj/";
$admin=$site."Admin/";
$add=$site."Add/";
$error=$site."Error/";
$display=$site."Display/";
$Subscribe=$site."Subscribe/";
$login=$site."Login/";
$logout=$site."Login/logout.php";
$register=$site."Register/";
$blog=$site."blog/";
$slider=$site."Slider/";
$displaySingle=$site."Display.php";
/*$link = mysql_connect(HOSTNAME, USERNAME, PASSWORD);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
$db_selected = mysql_select_db(DATABASE, $link);
if (!$db_selected) {
die ('Can\'t select database: ' . mysql_error());
}*/
try {
$dbo = new PDO('mysql:host='.HOSTNAME.';dbname='.DATABASE, USERNAME, PASSWORD);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$sql = "SELECT MAX(id) as co FROM movies";
$displaymax=0;
if ($row1 = $dbo->query($sql)) {
if ($row1->rowCount() > 0) {
  	foreach ($row1 as $row) {
$displaymax = $row['co'];
}
}
}
