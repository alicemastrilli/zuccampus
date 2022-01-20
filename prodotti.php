<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Prodotti";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["zucche"] = $dbh->getAllPumpkins();
$templateParams["agricoltori"] = $dbh->getAllFarmers();

require("template/homePage.php");
?>