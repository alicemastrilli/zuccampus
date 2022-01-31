<?php
require_once 'bootstrap.php';

$templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
$templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
$login_result = $dbh->checkAgricoltore($_SESSION["username"]);
$templateParams["aziende_agricole"] = $dbh->getAziendaAgricolaInfo();
$nome_azienda = $templateParams["aziende_agricole"]["nome_azienda"];

//inserisco
if($_GET("action" == 1){
    $nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
    $tipo = htmlspecialchars($_POST["tipo"]);
    $prezzo = htmlspecialchars($_POST["prezzo"]);
    $peso = htmlspecialchars($_POST["prezzo"]);
    $disponibilita = htmlspecialchars($_POST["prezzo"]);
    $descrizione = htmlspecialchars($_POST["descrizione_zucca"]); 
    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
    $immagine = $msg;

    if($result != 0){
        $msg = $dbh->insertNewZucca($nome_azienda, $nome_zucca, $tipo, $immagine, $prezzo, $peso, $disponibilita, $descrizione);
    
        if($msg){
            $msg = "Registrazione avvenuta con successo";
            header("location: info_prodotto_venditore.php?formmsg=".$msg);    
        }
    }
    //altrimenti TODO: gestisco l'errore con un messaggio a video
    else{
        var_dump($msg);
    }
}

if($_GET("action") == 2){
    $nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
    $tipo = htmlspecialchars($_POST["tipo"]);
    $prezzo = htmlspecialchars($_POST["prezzo"]);
    $peso = htmlspecialchars($_POST["prezzo"]);
    $disponibilita = htmlspecialchars($_POST["prezzo"]);
    $descrizione = htmlspecialchars($_POST["descrizione_zucca"]);
    
    if(isset($_FILES["immagine"]) && strlen($_FILES["immagine"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticolo"]);
        $immagine = $msg;
    }
    else{
        $immagine = $_POST["oldimg"];
        $msg = 1;
    }
}

?>