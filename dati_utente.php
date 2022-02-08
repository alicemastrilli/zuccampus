<?php
require_once("bootstrap.php");

if(isUserLoggedIn() ){
    $templateParams["username"] = $_SESSION["username"];
    //info dell'utente loggato
    $templateParams["user_loggato"] = $dbh-> getUserByUsername($templateParams["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
if (isUserLoggedIn()){
    //due righe che mi servono per l'header
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
    $templateParams["utente"] = $dbh->getUserByUsername($_SESSION["username"])[0];

}


//accedo al form tramite 'scopri il venditore"
if(isset($_GET["id"])){
        $nome_azienda = $_GET["id"];
        $templateParams["utente"] = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0];
        $templateParams["azienda_info"] = $dbh -> getAziendaAgrByName($nome_azienda)[0];
}

//sono loggato e sono un venditore
// -> accedo tramite il mio profilo
// -> accedo tramite scopri il venditore
else{   
    if($_SESSION["agricoltore"] == 1){
        $templateParams["nome_azienda"] = $dbh->getAziendaByUsername($templateParams["username"]);
        $nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];
        //info utente del profilo che sto visitando
        $templateParams["utente"] = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0]; //immagine, num_telefono, email, nome, cognome
        $templateParams["azienda_info"] = $dbh -> getAziendaAgrByName($nome_azienda)[0]; //nome_azienda, descrizione, via, citta, numero_civico, cap
    }
}

$templateParams["titolo"] = "Zuccampus - Il mio profilo";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "dati_utente.php";

$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();




require("template/base.php");
?>