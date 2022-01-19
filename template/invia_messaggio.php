<?php
    //3 casi
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione

if($_POST["messaggio_action"]==1){
    $ordine = $_POST["ordine"];
    $_POST["testo"] = "Gentile ". $_SESSION["username"] . "la sua azienda agricola ha ricevuto un nuovo ordine: ";
    //$testo = $testo."Clicchi qui per visualizzare il nuovo ordine.";
    //var_dump($ordine["data"]->format('d-m-Y'));
    $_POST["data"] = $ordine["data_ordine"]; 
    $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?". $ordine["id_ordine"];
    require_once "processa-messaggio.php";
}
?>