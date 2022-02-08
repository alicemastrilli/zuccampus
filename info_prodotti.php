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

if(isset($_POST["nome_zucca"])){
    $nome_zucca = $_POST["nome_zucca"];
}

$nome_azienda = $_POST["nome_azienda"];
$templateParams["produttori"] = $dbh -> getProduttoriByZuccaName($nome_zucca);

if(!empty($_SESSION['produttore'])){
    $i=0;
    foreach($templateParams["produttori"] as $produttore){
        if($produttore["nome_azienda"]==$_SESSION['produttore'][0]){
            unset($templateParams["produttori"][$i]);
        }
        $i++;
    }
}

$templateParams["zucca_info"] = $dbh -> getProductByFarmerAndName($nome_azienda, $nome_zucca);
$templateParams["recensioni"] = $dbh -> getAllReviews($nome_zucca);

require("template/base.php");
?>