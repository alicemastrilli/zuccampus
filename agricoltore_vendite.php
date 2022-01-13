<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus-Vendite Agricoltore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main_agr"] = "agricoltore_vendite.php";
$templateParams["js"] = JS_DIR."chart.js";
$templateParams["main"] = "agricoltore_base.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);



require("template/homePage.php");
?>