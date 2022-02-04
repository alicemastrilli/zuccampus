<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
$templateParams["titolo"] = "Zuccampus- Informazioni Prodotto";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "info_prodotti.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
if(!isset($_SESSION['product'])){
    $_SESSION['product'] = array();
}

if(isset($_GET["id"])){
    $nome_zucca = $_GET["id"];
}

$nome_azienda = $_POST["nome_azienda"];

$templateParams["zucca_info"] = $dbh -> getProductByFarmerAndName($nome_azienda, $nome_zucca);
$templateParams["produttori"] = $dbh -> getProduttoriByZuccaName($nome_zucca);
$templateParams["recensioni"] = $dbh -> getAllReviews($nome_zucca);

require("template/homePage.php");
?>