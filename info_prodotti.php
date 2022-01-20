<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Informazioni Prodotto";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "info_prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isset($_GET["id"])){
    $nome_zucca = $_GET["id"];
}
$templateParams["zucca_info"] = $dbh -> getZuccaByName($nome_zucca);
$templateParams["produttori"] = $dbh -> getProduttoriByZuccaName($nome_zucca);
require("template/homePage.php");
?>