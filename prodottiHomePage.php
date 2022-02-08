<?php
require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
$templateParams["titolo"] = "Zuccampus- HomePage Prodotti";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "homepage_prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["primaZucca"] = $dbh->getFirstPumpkin();
$templateParams["zucchePopolari"] = $dbh->getPopularPumpkins();

$zucchePopolari=array();
$nome_zucche=array();
foreach($templateParams["zucchePopolari"] as $zucca){
    if($zucca["nome_zucca"]!=$templateParams["primaZucca"][0]["nome_zucca"]){
        if(!in_array($zucca["nome_zucca"],$nome_zucche)){
            array_push($nome_zucche,$zucca["nome_zucca"]);
            array_push($zucchePopolari,$zucca);
        }
    }
}

$templateParams["zucchePopolari"]=$zucchePopolari;

require("template/base.php");
?>