

<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- HomePage";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
/*
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["articoli"] = $dbh->getPosts(2);
*/

require("template/base.php");
?>