<?php
require_once 'bootstrap.php';
date_default_timezone_set('Europe/Rome');

$id_ordine = 
$username = $_SESSION["username"];
$data_ordine = date('m-d-Y h:i:s a');
$ora = time();
$via = "Via dell'Università"
$numero_civico = "50";
$cap = "40013";

//inserisco una nuova row con l'ordine
$msg = $dbh-> insertNewOrdine($id_ordine, $username, $data_ordine, $ora, $via, $numero_civico, $cap);

//decremento i valori delle quantita' delle zucche comprate


?>