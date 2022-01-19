<?php
require_once("bootstrap.php");

$username = htmlspecialchars($_SESSION["username"]);
$testo = htmlspecialchars($_POST["testo"]);
var_dump($testo);
$data = htmlspecialchars($_POST["data"]);
var_dump($data);
$ora = htmlspecialchars($_POST["ora"]);
var_dump($ora);
//verifico che il messaggio che voglio inserire non è già nel db
$messaggio = $dbh->checkMessage($username, $data, $ora);
var_dump($messaggio);
if(count($messaggio) == 0){
    //messaggio non c'è, lo inserisco
    $img = $dbh->insertMessage($username, $testo, $data, $ora, 0);
    var_dump($img);
}

?>