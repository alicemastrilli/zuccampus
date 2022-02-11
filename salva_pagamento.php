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
$data_ordine = date("Y-m-d");
$ora = date("H:i:sa", $t);
$via = "Via dell'Università";
$numero_civico = "50";
$cap = "40013";

list($bool,$id_ordine) = $dbh-> insertNewOrdine($username, $data_ordine, $ora, $via, $numero_civico, $cap);

if($bool!=false){

    foreach($_SESSION['product'] as $prodotto){
        $nome_zucca = $prodotto["nome"];
        $nome_azienda = $prodotto["nome_azienda"];
        $quantity = $prodotto["quantita"][0];
        $templateParams["zucca"] = $dbh -> getProductByFarmerAndName($nome_azienda, $nome_zucca)[0];
        $zucca = $templateParams["zucca"];
        
        if ($zucca["disponibilita"] >= $quantity){
            $disponibilita = bcsub($zucca["disponibilita"], $quantity);
            
            $msg = $dbh -> updateZucca($zucca["immagine"], $zucca["prezzo"], $zucca["peso"], $disponibilita, $zucca["descrizione_zucca"], $zucca["nome_azienda"], $zucca["nome_zucca"], $zucca["tipo"]);
            if($msg){
                $msg = $dbh->insertComprende($id_ordine, $zucca["nome_azienda"], $zucca["nome_zucca"], $quantity);

            }
            if($disponibilita <=1){                
                $_POST["zucca"] = array($nome_zucca, $nome_azienda);
                $_POST["messaggio_action"] = 4;
                require_once("template/invia_messaggio.php");
            }
        }else{
            //TODO: messaggio di errore
        }


    }
    unset($_SESSION["product"]);
    unset($_SESSION["acquista"]);
}

$_POST["messaggio_action"]=1;
$_POST["ordine"] =  $dbh->getUserOrders($_SESSION["username"],1)[0];

require("template/invia_messaggio.php");

$ordine = $_POST["ordine"]["id_ordine"];
//$templateParams["main"] = "lista_ordini.php";
$_GET["id"] = $ordine;
$_POST["ordine_effettuato"]=1;
require("ordine.php");
//header("location: casella_messaggi.php?formmsg=".$msg);



//header("location: casella_messaggi.php?formmsg=".$msg);

?>