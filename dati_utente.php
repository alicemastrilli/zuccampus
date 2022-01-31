<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Zuccampus- Venditore";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "dati_utente.php";

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();


//non e' detto che se e' settato l'id l'utente non sia loggato e viceversa

//accedo e sono un cliente -> vedo il form da "scopri l'agricoltore", le info non sono mai uguali al mio username
//accedo come agricoltore:
// -> vedo il form dal mio profilo, username==info presenti
// -> vedo il form degli altri agri., username != dall'agricoltore che sto guardando

if(isset($_GET["id"])){
    $nome_azienda = $_GET["id"];
    $templateParams["user"] = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0];
    $templateParams["azienda_info"] = $dbh -> getAziendaAgrByName($nome_azienda)[0];
}
elseif (isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
    $templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"]);
    $nome_azienda = $templateParams["nome_azienda"]["nome_azienda"];
    $templateParams["azienda_info"] = $dbh -> getAziendaAgrByName($nome_azienda);
    
    if($_SESSION["agricoltore"]==0){
        $templateParams["matricola"] =$dbh->checkStudente($_SESSION["username"])[0]["matricola"];
    }
    
}

require("template/homePage.php");
?>