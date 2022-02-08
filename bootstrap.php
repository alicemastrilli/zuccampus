<?php
header('Cache-Control: no cache'); //no cache
session_start();
require_once("db/database.php");
require_once("utils/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "zuccampus", 3306);
define("UPLOAD_DIR", "./icons/");
define("JS_DIR", "./js/");
define("CSS_DIR", "./css/");
?>