<?php
function getImageOfUser($img){
    if($img == NULL) {
        $img = "utente_generico.jpg";
    }
    return $img;
}

function isUserLoggedIn(){
    return !empty($_SESSION['username']);
}
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo "active ";
    }
}

function getFootersIcons(){
    $icons=array();
    if(isUserLoggedIn()){
        if($_SESSION["agricoltore"] == 0){
            array_push($icons, array("img"=>UPLOAD_DIR."carrello.png", "a"=>"carrello.php"));
        } 
    }
    else {
        array_push($icons, array("img"=> UPLOAD_DIR."carrello.png","a"=>"carrello.php"));
        array_push($icons, array("img"=> UPLOAD_DIR."user.png","a"=>"login.php"));
    }
    return $icons;
}

function countMessagesUnread($messaggi){
    $i=0;
    foreach($messaggi as $messaggio){
        if($messaggio["tag_letto"] == 0 && canBeAdded($messaggio)){
            $i= $i+1;
        }
    }
    return $i;
}

function getMessagesUnread($messaggi){
    $arr = array();
    foreach($messaggi as $messaggio){
        if($messaggio["tag_letto"] == 0 && canBeAdded($messaggio)){
           array_push($arr, $messaggio);
        }
    }
    return $arr;
}
function setRecensioneMessageText(){
        $arr = array();
        array_push($arr,array("testo"=>"Il cliente ". $_SESSION["username"]." ha lasciato una nuova recensione! ", "agr"=>1));
        array_push($arr,array("testo"=>"Gentile ". $_SESSION["username"] . " la sua recensione è stata salvata!", "agr"=>0));
        return $arr;
    
}
function setMessageText($n, $ordine){
    if($n==1){
        $arr = array();
        array_push($arr,array("testo"=>"La sua azienda agricola ha ricevuto un nuovo ordine da parte di: ".$ordine["username"],"agr"=>1 ));
        array_push($arr,array("testo"=>"Gentile ".$_SESSION["username"] . " il suo ordine è andato a buon fine.", "agr"=>0));
        return $arr;
    } elseif($n==2){
        $arr = array();
        array_push($arr,array("testo"=>"L'ordine di ".$ordine["username"]. " arriverà in giornata! ", "agr"=>1));
        array_push($arr,array("testo"=>"Gentile ". $_SESSION["username"] . " il suo ordine arriverà in giornata", "agr"=>0));
        return $arr;
    } 
}
function setFineProdottoText($zucca){
    $arr = array();
    array_push($arr,array("testo"=>"Gentile agricoltore, la sua ". $zucca[0] . " è in esaurimento!", "agr"=>1));
    return $arr;
}
function countShoppingCartProducts($cart_products){
    $i=0;
    if(!empty($cart_products)){
        foreach($cart_products as $product){
            $i= $i+1;
        }
    }
    return $i;
}
function fillForm(){
    $arr = array();
    array_push($arr, array("text"=>"nome", "type"=>"text"));
    array_push($arr, array("text"=>"cognome", "type"=>"text"));
    array_push($arr, array("text"=>"username", "type"=>"text"));
    
    return $arr;
}
function fillToHide() {
    $arr = array();

    array_push($arr, array("text"=>"password", "type"=>"password"));
    array_push($arr, array("text"=>"conferma password", "type"=>"password"));
    return $arr;
}

function contattoForm(){
    $arr = array();
    array_push($arr, array("text"=>"email", "type"=>"email"));

    return $arr;
}
function UserWindowFields(){
    $field = array();
    if(isUserLoggedIn()){
        if($_SESSION["agricoltore"]==1){
            array_push($field, array("text" => "Home", "href" => "agricoltore_vendite.php"));
        }
    }
    array_push($field, array("text" => "Il mio profilo", "href" => "dati_utente.php"));
    array_push($field, array("text" => "Ordini", "href" => "lista_ordini.php"));
    array_push($field, array("text" => "Metodo di pagamento", "href" => "form_pagamento.php"));
    array_push($field, array("text" => "Recensioni", "href" => "lista_recensioni.php"));
    array_push($field, array("text" => "Esci", "href" => "logout.php"));
    return $field;
}

function fillOrders($ordine, $campus_info, $isStudente){
    
    $costo_sped = 2;
    $costo_ordine  = $ordine["quantita"] * $ordine["prezzo"];
    $costo_tot = $costo_ordine + $costo_sped;
    if($isStudente){
        $sconto_stud = "20 %";
        $costo_tot = $costo_tot * 80 /100; 
    }
    $costo_ordine = round($costo_ordine,2);
    $costo_tot= round($costo_tot, 2);
    $info=array("Produttore: "=>$ordine["nome_azienda"],"Tipo prodotto: " => $ordine["tipo"],"Quantità: " => $ordine["quantita"],
    "Data dell'ordine: "=> $ordine["data_ordine"],
    "Indirizzo di spedizione: "=> $ordine["via"]." ".$ordine["numero_civico"],
    "Costo ordine: " => $costo_ordine . " €",
    "Costi di spedizione: " => $costo_sped . " €");
    if($isStudente){
        $info["Sconto studente: "] = $sconto_stud;
    }
    $info["Costo totale: "] = $costo_tot . " €";
    $info["Stato: "] = computeDeliveryStatus($ordine, $campus_info)[0];

    return $info;
    
}

function canBeAdded($messaggio){
    $messaggio =strtotime($messaggio["data"]);
    $today = strtotime(date_format(date_create(), "Y-m-d"));
    if($messaggio <=$today){
        return true;
    } else {
        return false;
    }
}

function marksAsRead($messaggi){
    $id = array();
    foreach($messaggi as $messaggio){
        if(canBeAdded($messaggio)){
            array_push($id, $messaggio["id_messaggio"]);
        }
    }
    return $id;
}


function computeDeliveryTime($ordine, $campus_info){
    $date = date_create($ordine["data_ordine"]);
    $costo_sped=0;
    if($ordine["cap"] == $campus_info["cap"]){
        if($ordine["via"] == $campus_info["via"] && $ordine["numero_civico"] == $campus_info["numero_civico"]){
            date_add($date,date_interval_create_from_date_string("2 days"));
            $costo_sped = 0;
        } else{
             date_add($date,date_interval_create_from_date_string("3 days"));
             $costo_sped = 2;
        }
    } else{
       date_add($date,date_interval_create_from_date_string("5 days"));  
       $costo_sped = 5;
    }
    return  array($date, $costo_sped);
}

function isInCorso($ordine, $campus_info){
    $consegna = computeDeliveryTime($ordine, $campus_info)[0];
    $today = date_create();
    return $consegna>=$today;
}

function computeDeliveryStatus($ordine, $campus_info){
    $consegna = computeDeliveryTime($ordine, $campus_info)[0];
    $today = date_create();
    
    if($ordine["data_ordine"] == date_create()->format('Y-m-d')){
        return array("in preparazione","10" );
    } elseif($consegna > $today) {
        
        $diff = date_diff($consegna, $today);
        $pro =$diff->format('%a');
        $percent = $pro *10 + 20;
        return array("in arrivo , arriverà il ". $consegna->format('d-m-yy'), 100-$percent);
    } elseif($consegna == $today) {
        return array("arriverà oggi", "90");
    }
    return array("completato", "100");
}



function registerLoggedUser($user){
    $_SESSION["username"] = $user["username"];
}

function getEmptyUser(){
    return array("immagine" => "", "num_telefono" => "", "email" => "", "username" => "", "password" => "", "nome" => "", "cognome" => "", "cliente" => "", "agricoltore" => "");
}
function getEmptyAzienda(){
    return array("nome_azienda" => "", "descrizione" => "", "via" => "", "numero_civico" => "", "citta" => "", "cap" => "");
}
function getEmptyPagamento(){
    return array("cvv" => "", "nome" => "", "numero_carta" => "", "mese_scadenza" => "", "anno_scadenza" => "", "cognome" => "", "username" => "");
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg =$image["name"];
        }
    }
    return array($result, $msg);
}


function checkFormFilledCorrectly($fields){
/*funzione per verificare i tutti i campi di un form siano pieni (TO DO: e validi )
input: array tipo $nome $cognome $num_telefono $
*/
    $error = False;
    $msg = "";
    foreach($fields as $field) {
        if (empty($field) || !strcmp($field, "")) {
            $error = True;
            $msg = "Inserisci tutti i dati";
        }
    }
    return $error;
}

function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

function getEmptyZucca(){
    return array("nome_azienda" => "", "nome_zucca" => "", "tipo" => "", "immagine" => "", "prezzo" => "", "peso" => "", "disponibilita" => "", "descrizione_zucca" => "");
}
?>