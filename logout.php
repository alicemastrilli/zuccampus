<?php
require_once 'bootstrap.php';

$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
unset($_SESSION["username"]);
unset($_SESSION["agricoltore"]);
unset($_SESSION["product"]);
$_POST["out"]=1;
require "login.php";


?>