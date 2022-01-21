<?php
require_once 'bootstrap.php';

//se inserisco riempo i campi con vuoto
if($_GET["action"]==1){
    $templateParams["zucca"] = getEmptyZucca();
}
//altrimenti riempo i campi prendendo da database



$templateParams["titolo"] = "Zuccampus- Registrati";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "form_prodotto.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["azione"] = $_GET["action"];

require("template/homePage.php");
?>