<?php
require_once 'bootstrap.php';

$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]

if($templateParams["azione"] == 'Modifica') {    
    $templateParams["utente"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    
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

require 'template/base.php';
?>