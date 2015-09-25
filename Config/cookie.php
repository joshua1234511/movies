<?php
$offset;
if(!isset($_COOKIE["page"])) {
$offset=0;
} else {
$offset= $_COOKIE["page"];
}