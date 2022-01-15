<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Riepilogo Ordine";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "ordine.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);

$nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];

$templateParams["ordini"] = $dbh->getAllOrders($nome_azienda);


require("template/homePage.php");
?>