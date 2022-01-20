<?php
require_once 'bootstrap.php';

$nome_azienda = "Gino e le sue zucche";
$nome_zucca = htmlspecialchars($_POST["nome_zucca"]);
$tipo = htmlspecialchars($_POST["tipo"]);
$immagine = "ZuccaSpeciale.png";
$prezzo = 3;
$peso = 5;
$disponibilita = 1;
$descrizione = htmlspecialchars($_POST["descrizione_zucca"]); 

$msg = $dbh->insertNewZucca($nome_azienda, $nome_zucca, $tipo, $immagine, $prezzo, $peso, $disponibilita, $descrizione);

//console.log($msg);
if($msg){
    header("location: registrati.php?formmsg=".$msg);    
}



?>