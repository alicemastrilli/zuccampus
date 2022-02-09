<?php
require_once 'bootstrap.php';

if($_GET["action"] == "Inserisci"){
    //Inserisco
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);
    $numero_carta = htmlspecialchars($_POST["numero_carta"]);
    $cvv = htmlspecialchars($_POST["cvv"]);
    $anno_scadenza = htmlspecialchars($_POST["anno_scadenza"]);
    $mese_scadenza = htmlspecialchars($_POST["mese_scadenza"]);
    $username = $_SESSION["username"];

    $msg = $dbh -> insertNewCC($cvv, $nome, $numero_carta, $mese_scadenza, $anno_scadenza, $cognome, $username);
}


header("location:form_pagamento.php");

?>