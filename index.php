

<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- HomePage";
//$templateParams["nomeApp"] = $dbh->getNomeApp();
$templateParams["nomeApp"] = $dbh->getNomeApp();
$templateParams["header"] = "header.php";
/*
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["articoli"] = $dbh->getPosts(2);
*/

require("template/homePage.php");
?>