<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Zuccampus- Riepilogo Ordine";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["main"] = "ordine.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);
if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $templateParams["messaggi"] = $dbh->getMessaggi($_SESSION["username"]);
}
date_default_timezone_set('Europe/Berlin');
$t = time();
$username = $_SESSION["username"];
$data_ordine = date("Y-m-d");;
$ora = date("H:i:sa", $t);
$via = "Via dell'Università";
$numero_civico = "50";
$cap = "40013";

//inserisco una nuova row con l'ordine
$id_ordine = $dbh-> insertNewOrdine($username, $data_ordine, $ora, $via, $numero_civico, $cap);

//decremento i valori delle quantita' delle zucche comprate
//per ogni prodotto comprato recupero la zucca corrispondente
//recupero la quantita 
//decremento la quantita in zucca
//inserisco comprende
if($id_ordine!=false){
    foreach($_SESSION['product'] as $prodotto){
        $nome_zucca = $prodotto["nome"];
        $quantity = $prodotto["quantita"][0];
        $templateParams["zucca"] = $dbh -> getZuccaByName($nome_zucca)[0];
        $zucca = $templateParams["zucca"];
        if ($zucca["disponibilita"] >= $quantity){
            $disponibilita = bcsub($zucca["disponibilita"], $quantity);
            $msg = $dbh -> updateZucca($zucca["immagine"], $zucca["prezzo"], $zucca["peso"], $disponibilita, $zucca["descrizione_zucca"], $zucca["nome_azienda"], $zucca["nome_zucca"], $zucca["tipo"]);
            if($msg){
                $msg = $dbh->insertComprende($id_ordine, $zucca["nome_azienda"], $zucca["nome_zucca"], $quantity);
            }
        }else{
            //TODO: messaggio di errore
        }
    }
}
$_POST["messaggio_action"]=1;
$_POST["ordine"] =  $dbh->getUserOrders($_SESSION["username"],1)[0];
require("template/invia_messaggio.php");
var_dump($_POST["ordine"]);

$templateParams["main"] = "ordine.php?id=".$_POST["ordine"]["id_ordine"];
require("template/homePage.php");
//header("location: casella_messaggi.php?formmsg=".$msg);


header("location: casella_messaggi.php?formmsg=".$msg);

?>