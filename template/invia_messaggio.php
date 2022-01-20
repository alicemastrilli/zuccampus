<?php
    //3 casi
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione

if($_POST["messaggio_action"]==1){
    $ordine = $_POST["ordine"];
    $_POST["testo"] = "Gentile ". $_SESSION["username"] . " la sua azienda agricola ha ricevuto un nuovo ordine da parte di: ".$ordine["username"];
    $_POST["data"] = $ordine["data_ordine"]; 
    $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?id=". $ordine["id_ordine"];
    require_once "processa-messaggio.php";
} elseif ($_POST["messaggio_action"] ==2) {
    $ordine = $_POST["ordine"];
    $campus_info = $_POST["campus_info"];
    $_POST["testo"] = "Gentile ". $_SESSION["username"] . " l'ordine di ".$ordine["username"]. "arriverà in giornata! ";    $_POST["data"] = date_format(computeDeliveryTime($ordine, $campus_info)[0], "Y-m-d");     $_POST["ora"] = $ordine["ora"];
    $_POST["link"] = "ordine.php?id=". $ordine["id_ordine"];
    require_once "processa-messaggio.php";
}
?>