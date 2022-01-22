<?php
require_once 'bootstrap.php';

//se inserisco riempo i campi con vuoto
if($_GET["action"]==1){
    $templateParams["utente"] = getEmptyUser();
}
$templateParams["titolo"] = "Zuccampus- Registrati";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
    
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

    $templateParams["utente"] = getEmptyUser();
    $templateParams["main"] = "registrazione.php";
    $templateParams["registrazione_agricoltore"] = "registrazione_agricoltore.php";

    if (isset($_POST['cliente'])) {
        $_SESSION["agricoltore"] = 0;
    }
    if (isset($_POST['agricoltore'])) {
        $_SESSION["agricoltore"] = 1;
    }


    $templateParams["azione"] = getAction($_GET["action"]);
require("template/homePage.php");
?>