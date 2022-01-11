<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Venditore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "venditore.php";

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();
$templateParams["agricoltore"] = $dbh->getAgricoltoreOfAzienda("La fattoria di Mario")[0];
$templateParams["azienda_info"] = $dbh -> getAziendaAgrByName("La fattoria di Mario")[0];
/*
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["articoli"] = $dbh->getPosts(2);
*/

require("template/homePage.php");
?>