<?php
require_once("bootstrap.php");

if($_GET["tipo_ordine"]=="ASC"){
    $result=$dbh ->orderByPriceUp();
}else{
    $result=$dbh ->orderByPriceDown();
}

//per tornare indietro ad ajax la risposta
header('Content-Type: application/json');
echo json_encode($result);
?>