<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Messaggi";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";

$templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
var_dump($templateParams["messaggi"]);
 $templateParams["main"] = "messaggio.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
}

require("template/homePage.php");
?>