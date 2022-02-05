<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}

$templateParams["titolo"] = $dbh->getNomeApp()[0]["nome_app"]."-Lista recensione";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "lista_recensioni.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
if(isset($_POST['submit'])){
    $nome_zucca = htmlspecialchars($_POST["zucca"]);
    $nome_azienda = htmlspecialchars($_POST["produttori"]);
    $punteggio = intval(htmlspecialchars($_POST["punteggio"]));
    $descrizione_zucca = htmlspecialchars($_POST["descrizione_zucca"]); 
    $data=date("Y-m-d");
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $dbh->insertNewRecensione($descrizione_zucca,$punteggio,$nome_azienda, $nome_zucca,$_SESSION["username"],$data);
}

if($_SESSION["agricoltore"]==1){
    $templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"])[0]["nome_azienda"];
    $templateParams["recensioni"] = $dbh->getRecensioneFromAzienda($templateParams["nome_azienda"]);
} else{
    $templateParams["recensioni"] = $dbh->getRecensioneFromCliente($_SESSION["username"]);
}
require("template/homePage.php");
?>