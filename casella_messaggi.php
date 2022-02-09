<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Messaggi";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";

$templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
    foreach(getMessagesUnread($templateParams["messaggi"]) as $id){
        $dbh->updateMessageAsRead($id["id_messaggio"]);
    }

$templateParams["main"] = "messaggio.php";
$templateParams["aggiungi"] = "processa-messaggio.php";
require("template/base.php");
?>