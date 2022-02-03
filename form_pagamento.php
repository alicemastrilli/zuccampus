<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus-Prodotti Agricoltore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "form_pagamento2.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
var_dump($_POST);
if(isset($_POST["Inserisci"]) && $_POST["Inserisci"] == "Inserisci"){
    $templateParams["azione"] = "Inserisci";
    //header("location:form_pagamento2.php");
}


$templateParams["pagamento"] = $dbh->getPaymentInfo($_SESSION["username"]);
if(empty($templateParams["pagamento"])){
    $templateParams["pagamento"][0] = getEmptyPagamento();
    $templateParams["azione"] = "Inserisci";
}
else{
    $templateParams["azione"] = "Visualizza";
}





require("template/homePage.php");
?>