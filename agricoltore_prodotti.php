<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus-Prodotti Agricoltore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main_agr"] = "lista_prodotti_venditore.php";
$templateParams["main"] = "agricoltore_base.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
//il venditore non è sempre gigi e le sue zucche
//quidni chiarire questo
$templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);
var_dump($templateParams["nome_azienda"]);
$templateParams["prodottiVenditore"] = $dbh->getProductsByFarmer($templateParams["nome_azienda"][0]["nome_azienda"]);
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}


require("template/base.php");
?>