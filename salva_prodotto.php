<?php
require_once 'bootstrap.php';

$templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
$templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
$login_result = $dbh->checkAgricoltore($_SESSION["username"]);
$templateParams["nome_azienda"] = $dbh->getAziendaByUsername($_SESSION["username"])[0];
//$nome_azienda = $templateParams["nome_azienda"]["nome_azienda"];

//inserisco
if($_POST["action"] == 'Inserisci'){
    $nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];
    $nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
    $tipo = htmlspecialchars($_POST["tipo"]);
    $prezzo = htmlspecialchars($_POST["prezzo"]);
    $peso = htmlspecialchars($_POST["peso"]);
    $disponibilita = htmlspecialchars($_POST["disponibilita"]);
    $descrizione_zucca = htmlspecialchars($_POST["descrizione_zucca"]); 
    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
    $immagine = $msg;

    if($result != 0){
        $msg = $dbh->insertNewZucca($nome_azienda, $nome_zucca, $tipo, $immagine, $prezzo, $peso, $disponibilita, $descrizione_zucca);
    
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

if($_POST["action"] == 'Modifica'){
    $nome_azienda = htmlspecialchars($_POST["nome_azienda"]);
    $nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
    $tipo = htmlspecialchars($_POST["tipo"]);
    $prezzo = htmlspecialchars($_POST["prezzo"]);
    $peso = htmlspecialchars($_POST["peso"]);
    $disponibilita = htmlspecialchars($_POST["disponibilita"]);
    $descrizione_zucca = htmlspecialchars($_POST["descrizione_zucca"]);

    if(isset($_FILES["immagine"]) && strlen($_FILES["immagine"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
        $immagine = $msg;
    }
    else{
        $immagine = $_POST["oldimg"];
        $msg = 1;
    }

    $msg = $dbh->updateZucca($immagine, $prezzo, $peso, $disponibilita, $descrizione_zucca, $nome_azienda, $nome_zucca, $tipo);
    if($msg){
        $msg = "Modifica avvenuta con successo";
        header("location: info_prodotto_venditore.php?formmsg=".$msg."&id=".$nome_zucca);    
    }
    //TODO: gestisco l'errore con un messaggio a video
    else{
        var_dump($msg);
    }
}

?>