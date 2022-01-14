<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus-Vendite Agricoltore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main_agr"] = "agricoltore_vendite.php";
$templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);

$templateParams["main"] = "agricoltore_base.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$vendite = $dbh->getVendite($templateParams["nome_azienda"][0]["nome_azienda"]);
$templateParams["xV"] = array();
$templateParams["yV"] = array();
foreach($vendite as $vendita){
    array_push($templateParams["xV"], $vendita["data"]);
    array_push($templateParams["yV"], $vendita["quantita"]);
}

$templateParams["js"] = "js/chart.js";
require("template/homePage.php");
?>