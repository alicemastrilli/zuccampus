<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}

$templateParams["titolo"] = "Zuccampus - Carrello";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "carrello.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();
if(isset($_POST['submit'])){
    $newproduct=array(
        'nome' => $_POST["nome_zucca"],
        'tipo' => $_POST["tipo"],
        'immagine' => $_POST["immagine"],
        'nome_azienda' => $_POST["nome_azienda"],
        'prezzo' => $_POST["prezzo"],
        'peso' => $_POST["peso"],
        'quantita' => $_POST["quantity"]
    );
    $value=0;
    foreach($_SESSION['product'] as $key){
        if($key["nome"]==$newproduct["nome"]){
            if($key["nome_azienda"]==$newproduct["nome_azienda"]){
                $value=$value + 1;
            }
        }
    }
    if($value==0){
        array_push($_SESSION['product'], $newproduct);
    }
}
/*
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["articoli"] = $dbh->getPosts(2);
*/
require("template/base.php");
?>

