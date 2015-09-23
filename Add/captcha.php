<?php
session_start();
$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; 
$code = '';

if(isset($_GET['random_code']) && strlen($_GET['random_code']) < 6) {
	$code = $_GET['random_code'];
}
else {
	for($i=1;$i<=5;$i++)
	{
		$code .= substr($str, rand(0,62),1);
	}
}		

$_SESSION['captcha_code'] = $code;

$im = imagecreatetruecolor(62, 30);
$bg = imagecolorallocate($im, 222, 222, 222); // background color
$fg = imagecolorallocate($im, 163,2,52); // text color
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>