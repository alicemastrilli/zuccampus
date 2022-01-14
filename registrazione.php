<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus - Registrazione";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "registrazione.php";
$templateParams["registrazione_agricoltore"] = "registrazione_agricoltore.php";

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);


require("template/homePage.php");
?>