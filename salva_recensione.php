<?php
require_once 'bootstrap.php';

$idReview = rand(1,1342);
$nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
$produttore = htmlspecialchars($_POST["produttore"]);
$punteggio = htmlspecialchars($_POST["punteggio"]);
$descrizione_zucca = htmlspecialchars($_POST["descrizione_zucca"]); 

//TODO: e' necessario userLoggedIn? Non avvengono controlli gia' precedentemente?
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
    $login_result = $dbh->checkLogin($_SESSION["username"],$_SESSION["password"]);
    if( $login_result[0]["CLIENTE"]==0){
        if($result != 0){
            $msg = $dbh->insertNewRecensione($idReview,$descrizione_zucca,$punteggio,$nome_azienda, $nome_zucca);
            if($msg){
                $msg = "Registrazione recensione avvenuta con successo";
                header('location: prodotti.php');  
                exit;  
            }
        }
        else{
            error_log("Oracle database not available!", 0);
            header('location: prodotti.php');  
            exit;
        }
    }

} else{
    error_log("Oracle database not available!", 0);
    header('location: prodotti.php');  
    exit;
}

?>