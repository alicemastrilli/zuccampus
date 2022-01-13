<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Informazioni Prodotto";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "info_prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];

if(isset($_GET["id"])){
    $nome_zucca = $_GET["id"];
}
var_dump($nome_zucca);
$templateParams["zucca_info"] = $dbh -> getZuccaByName($nome_zucca)[0];
var_dump($templateParams["zucca_info"]);

require("template/homePage.php");
?>