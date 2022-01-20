<?php
require_once("bootstrap.php");

$nome_azienda = $_GET["nome_azienda"];
$nome_zucca = $_GET["nome_zucca"];
$result = $dbh -> getProductByFarmerAndName($nome_azienda, $nome_zucca);
//per tornare indietro ad ajax la risposta
header('Content-Type: application/json');
echo json_encode($result);
?>