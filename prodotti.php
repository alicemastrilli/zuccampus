<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}

$templateParams["titolo"] = "Zuccampus- Prodotti";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isset($_SESSION['produttore'])){
    unset($_SESSION['produttore']);
}
$_SESSION['produttore'] = array();

if(isset($_GET["id"])){
    $nome_azienda=$_GET["id"];
    $templateParams["zucche"] = $dbh->getProductsByFarmer($nome_azienda);
    array_push($_SESSION['produttore'],$nome_azienda);
}else{
    $templateParams["zucche"] = $dbh->getAllPumpkins();
}

$templateParams["agricoltori"] = $dbh->getAllFarmers();

require("template/base.php");
?>