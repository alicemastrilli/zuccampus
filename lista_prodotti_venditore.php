<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Lista Prodotti Venditore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "lista_prodotti_venditore.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["prodottiVenditore"] = $dbh->getProductsByFarmer('Gigi e le sue zucche');
require("template/homePage.php");
?>