<?php
require_once 'bootstrap.php';
date_default_timezone_set('Europe/Berlin');
$t = time();
$username = $_SESSION["username"];
$data_ordine = date("Y-m-d");;
$ora = date("H:i:sa", $t);
$via = "Via dell'Università";
$numero_civico = "50";
$cap = "40013";

//inserisco una nuova row con l'ordine
$msg = $dbh-> insertNewOrdine($username, $data_ordine, $ora, $via, $numero_civico, $cap);

//decremento i valori delle quantita' delle zucche comprate
//per ogni prodotto comprato recupero la zucca corrispondente
//recupero la quantita 
//decremento la quantita in zucca
if($msg){
    foreach($_SESSION['product'] as $prodotto){
        $nome_zucca = $prodotto["nome"];
        $quantity = $prodotto["quantita"][0];
        $templateParams["zucca"] = $dbh -> getZuccaByName($nome_zucca)[0];
        $zucca = $templateParams["zucca"];
        $disponibilita = bcsub($zucca["disponibilita"], $quantity);
        $msg = $dbh -> updateZucca($zucca["immagine"], $zucca["prezzo"], $zucca["peso"], $disponibilita, $zucca["descrizione_zucca"], $zucca["nome_azienda"], $zucca["nome_zucca"], $zucca["tipo"]);
    }
}

header("location: casella_messaggi.php?formmsg=".$msg);

?>