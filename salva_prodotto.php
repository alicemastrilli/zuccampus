<?php
require_once 'bootstrap.php';

$nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
$tipo = htmlspecialchars($_POST["tipo"]);
//TODO: gestire l'immagine
$immagine = "ZuccaSpeciale.png";
$prezzo = htmlspecialchars($_POST["prezzo"]);
$peso = htmlspecialchars($_POST["prezzo"]);
$disponibilita = htmlspecialchars($_POST["prezzo"]);
$descrizione = htmlspecialchars($_POST["descrizione_zucca"]); 

//TODO: e' necessario userLoggedIn? Non avvengono controlli gia' precedentemente?
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
    $login_result = $dbh->checkAgricoltore($_SESSION["username"]);
    if( $login_result[0]["AGRICOLTORE"]==0){
        $templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();
        $nome_azienda = $templateParams["aziende_agricole"]["nome_azienda"];
        $msg = $dbh->insertNewZucca($nome_azienda, $nome_zucca, $tipo, $immagine, $prezzo, $peso, $disponibilita, $descrizione);

        if($msg){
            $msg = "Registrazione avvenuta con successo";
            header("location: info_prodotto_venditore.php?formmsg=".$msg);    
        }
        else{
            var_dump($msg);
        }
    }

}

?>