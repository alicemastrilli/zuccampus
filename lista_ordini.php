<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Lista ordini";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "lista_ordini.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
}
$nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];

$templateParams["ordini"] = $dbh->getAllOrders($nome_azienda);

require("template/homePage.php");
?>