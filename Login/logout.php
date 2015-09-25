<?php
include ("../Config/config.php");
session_start();
session_unset(); 
session_destroy();
$li='log.txt';
$actual_link = "http://.".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$date = date_create();
$errorlog="Logout on page :".$actual_link." Logout timeStamp: ".date_timestamp_get($date)." Logout done". "\n";
file_put_contents($li, $errorlog, FILE_APPEND | LOCK_EX);
header('Location: '.$site);
