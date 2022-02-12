<?php
require_once 'bootstrap.php';

if (isUserLoggedIn()){
    //due righe che mi servono per l'header
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
    $templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);
}
$templateParams["azione"] = getAction($_GET["action"]);

if($_GET["action"]==1){
    $templateParams["zucca"] = getEmptyZucca();
    $templateParams["immagine"] = "zuccadefault.jpg";
}

if($templateParams["azione"] == 'Modifica'){
    $nome_zucca = $_POST["nome_zucca"];
    $templateParams["zucca"] = $dbh -> getZuccaByName($nome_zucca)[0];
    $templateParams["immagine"] = $templateParams["zucca"]["immagine"];
}

if($templateParams["azione"] == 'Cancella'){
    $nome_zucca = $_POST["nome_zucca"];
    $templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);
    $nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];
    $msg = $dbh->deleteFarmerElement($nome_azienda, $nome_zucca);
    header("location: agricoltore_prodotti.php?formmsg=".$msg);
}

$templateParams["titolo"] = "Zuccampus- Inserisci prodotto";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "form_prodotto.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["azione"] = getAction($_GET["action"]);

require("template/base.php");
?>