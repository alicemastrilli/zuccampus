<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
$templateParams["titolo"] = "Zuccampus - Info Prodotto Venditore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "info_prodotto_venditore.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isset($_POST["nome_zucca"])){
    $nome_zucca = $_POST["nome_zucca"];
}
$templateParams["zucca_info"] = $dbh -> getZuccaByName($nome_zucca);

require("template/homePage.php");
?>