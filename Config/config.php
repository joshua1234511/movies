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
$link = mysql_connect(HOSTNAME, USERNAME, PASSWORD);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
$db_selected = mysql_select_db(DATABASE, $link);
if (!$db_selected) {
die ('Can\'t select database: ' . mysql_error());
}
try {
$dbo = new PDO('mysql:host=localhost;dbname='.DATABASE, USERNAME, PASSWORD);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$sql = "SELECT MAX(id) as co FROM movies";
$result = mysql_query($sql);
$displaymax=0;
if (mysql_num_rows($result) !== 0){  
while ($row = mysql_fetch_assoc($result)) {
$displaymax = $row['co'];
}
}
