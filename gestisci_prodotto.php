<?php
require_once 'bootstrap.php';

//se inserisco riempo i campi con vuoto
if($_GET["action"]==1){
    $templateParams["zucca"] = getEmptyZucca();
}
if($_GET["action"]==2){
    /*
    if(isset($_GET["id"])){
        $nome_zucca = $_GET["id"];
    }
    */
    $nome_zucca = "Zucca Delica";
    $templateParams["zucca"] = $dbh -> getZuccaByName($nome_zucca);

}

//altrimenti riempo i campi prendendo da database



$templateParams["titolo"] = "Zuccampus- Registrati";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "form_prodotto.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["azione"] = getAction($_GET["action"]);

require("template/homePage.php");
?>