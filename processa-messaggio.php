<?php
require_once("bootstrap.php");
//3 casi
//caso 1: viene mandato un messaggio per informare che un ordine è stato inviato/ricevuto
//caso 2: ordine è arrivato
//caso 3: è stata fatta una recensione
$_POST["campus_info"] = $dbh->getAppInfo($templateParams["nome"])[0];
for($i =0; $i<count($_POST["info"]["agr"]); $i++){
if($_POST["info"]["agr"][$i] == 0){
     $username = htmlspecialchars($_SESSION["username"]);
} elseif(isset($_POST["nome_azienda"])){
    $nome_azienda =$_POST["nome_azienda"];
    $username = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0]["username"];
} 
else{
    $nome_azienda =$dbh->getOrderById($_POST["ordine"]["id_ordine"])[0]["nome_azienda"];
    $username = $dbh->getAgricoltoreOfAzienda($nome_azienda)[0]["username"];
}
$testo = htmlspecialchars($_POST["info"]["testo"][$i]);
$data = htmlspecialchars($_POST["data"]);
$ora = htmlspecialchars($_POST["ora"]);
$link = htmlspecialchars($_POST["link"]);
//verifico che il messaggio che voglio inserire non è già nel db
$messaggio = $dbh->checkMessage($username, $data, $ora,$testo);
if(count($messaggio) == 0){
    
    //messaggio non c'è, lo inserisco
    $dbh->insertMessage($username, $testo, $data, $ora, $link, 0);
}
}
if($_POST["messaggio_action"]==1){
    $_POST["messaggio_action"]=2;
  
    require "template/invia_messaggio.php";
}
?>
