<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus-Vendite Agricoltore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";

$templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);

//$templateParams["main"] = "agricoltore_base.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];
$vendite = $dbh->getVendite($nome_azienda);
$templateParams["xV"] = array();
$templateParams["yV"] = array();
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);}
foreach($vendite as $vendita){
    array_push($templateParams["xV"], $vendita["data_ordine"]);
    array_push($templateParams["yV"], $vendita["quantita"]);
}
$templateParams["ordini"] = $dbh->getAllOrders($nome_azienda);
$templateParams["guadagno"] =0;
foreach($templateParams["ordini"] as $ordine){
    $templateParams["guadagno"]+=$ordine["prezzo"]*$ordine["quantita"];
    
}
$templateParams["main"] = "agricoltore_vendite.php";
$templateParams["js"] = "js/chart.js";
require("template/homePage.php");
?>