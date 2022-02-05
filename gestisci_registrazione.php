<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Zuccampus- Registrati";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

$templateParams["main"] = "registrazione.php";
$templateParams["registrazione_agricoltore"] = "registrazione_agricoltore.php";

if (isset($_POST['cliente'])) {
    $_SESSION["agricoltore"] = 0;
}
if (isset($_POST['agricoltore'])) {
    $_SESSION["agricoltore"] = 1;
}


if (isUserLoggedIn()){
    //due righe che mi servono per l'header
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
$templateParams["azione"] = getAction($_GET["action"]);

//TODO: correggere dentro l'if, renderlo coerente con tutto
if($templateParams["azione"] == 'Inserisci'){
    $templateParams["utente"] = getEmptyUser();
    $templateParams["azienda"] = getEmptyAzienda();
    $templateParams["immagine"] = "utente_generico.jpg";
}
//altrimenti riempo i campi prendendo da database
if($templateParams["azione"] == 'Modifica') {    
    
    $templateParams["utente"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["immagine"] = $templateParams["utente"]["immagine"];
    if(is_null($templateParams["immagine"]) ){
        $templateParams["immagine"] = "utente_generico.jpg";
    }
    if (isUserLoggedIn()){
        //due righe che mi servono per l'header
        $templateParams["utente"] = $dbh->getUserByUsername($_SESSION["username"])[0];
        $templateParams["utente"]["username"] = $_SESSION["username"];
        //se è un agricoltore
        if($_SESSION["agricoltore"]==1){
            $nome_azienda = $_POST['nome_azienda'];
            $templateParams["azienda"] = $dbh -> getAziendaAgrByName($nome_azienda)[0];
        }
    }
}   

require("template/homePage.php");
?>