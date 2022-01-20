<?php
require_once("bootstrap.php");

$nome_azienda = $_GET["nome_azienda"];
$result = $dbh -> getProductsByFarmer($nome_azienda);

//per tornare indietro ad ajax la risposta
header('Content-Type: application/json');
echo json_encode($result);
?>