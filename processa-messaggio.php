<?php
require_once("bootstrap.php");
//3 casi
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione

$_POST["campus_info"] = $dbh->getAppInfo($templateParams["nome"])[0];
for($i =0; $i<count($_POST["info"]["testo"]); $i++){

//controllo se messaggio è diretto a persona
if($_POST["info"]["agr"][$i] == 0 ){
     $username = htmlspecialchars($_SESSION["username"]);
}
//messaggio è diretto all'agricoltore
else{
    if(isset($_POST["zucca"])){
        $zucca=$_POST["zucca"];
        $username = $dbh->getAgricoltoreOfAzienda($_POST["produttori"])[0]["username"];
       
    } else if(isset($_POST["nome_azienda"])){
        $nome_azienda =$_POST["nome_azienda"];
        $username = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0]["username"];
    } else{
    $nome_azienda =$dbh->getOrderById($_POST["ordine"]["id_ordine"])[0]["nome_azienda"];
    $username = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0]["username"];
    }
    }
    $testo = htmlspecialchars($_POST["info"]["testo"][$i]);
    $data = htmlspecialchars($_POST["data"]);
    $ora = htmlspecialchars($_POST["ora"]);
    $link = htmlspecialchars($_POST["link"]);

    $messaggio = $dbh->checkMessage($username, $data, $ora,$testo);
    if(count($messaggio) == 0){
        $dbh->insertMessage($username, $testo, $data, $ora, $link, 0);
    }
}

if($_POST["messaggio_action"]==1){
    $_POST["messaggio_action"]=2;
  
    require "invia_messaggio.php";
}

?>
