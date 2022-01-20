<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Profilo personale";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}

$templateParams["main"] = "user_logged.php";

require("template/homePage.php");

?>