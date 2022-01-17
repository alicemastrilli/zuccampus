<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Venditore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "venditore.php";

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $nome_azienda = $dbh->getAziendaByUsername($_SESSION["username"])[0]["nome_azienda"];
}
if(isset($_GET["id"])){
    $nome_azienda = $_GET["id"];
}

$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();
$templateParams["agricoltore"] = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0];
$templateParams["azienda_info"] = $dbh -> getAziendaAgrByName($nome_azienda)[0];

require("template/homePage.php");
?>