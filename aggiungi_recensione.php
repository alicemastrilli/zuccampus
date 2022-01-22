<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}

$templateParams["titolo"] = "Zuccampus- Aggiungi una recensione";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "aggiungi_recensione.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isset($_POST["zucca"])){
    $nome_zucca = $_POST["zucca"];
}

if(isset($_POST["produttore"])){
    $produttore = $_POST["produttore"];
}

require("template/homePage.php");
?>