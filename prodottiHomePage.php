<?php
require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
$templateParams["titolo"] = "Zuccampus- HomePage Prodotti";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "homepage_prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["zucchePopolari"] = $dbh->getPopularPumpkins();
$templateParams["primaZucca"] = $dbh->getFirstPumpkin();

require("template/base.php");
?>