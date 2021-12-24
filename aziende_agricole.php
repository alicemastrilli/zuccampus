

<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Aziende Agricole";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "agricoltori.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();
/*
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["articoli"] = $dbh->getPosts(2);
*/

require("template/homePage.php");
?>