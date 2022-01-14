<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Zuccampus- Registrati";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
    
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

    $templateParams["utente"] = getEmptyUser();
    $templateParams["main"] = "registrazione.php";
    $templateParams["registrazione_agricoltore"] = "registrazione_agricoltore.php";

require("template/homePage.php");
?>