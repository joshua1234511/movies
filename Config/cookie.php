<?php
$offset;
$limit;
if(!isset($_COOKIE["page"])) {
$offset=0;
} else {
$offset= $_COOKIE["page"];
}
if(!isset($_COOKIE["limit"])) {
$limit=3;
} else {
$limit= $_COOKIE["limit"];
}