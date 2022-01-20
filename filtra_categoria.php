<?php
require_once("bootstrap.php");

$tipo=$_GET["tipo"];
$result= $dbh->getProductsByCategory($tipo);

//per tornare indietro ad ajax la risposta
header('Content-Type: application/json');
echo json_encode($result);
?>