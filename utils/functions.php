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
            array_push($icons, array("img"=>UPLOAD_DIR."carrello.png", "a"=>"login.php"));
        } 
        array_push($icons, array("img"=>UPLOAD_DIR."posta.jpg","a"=>"casella_messaggi.php" ));
    }
    else {
        array_push($icons, array("img"=> UPLOAD_DIR."carrello.png","a"=>"login.php"));
        array_push($icons, array("img"=> UPLOAD_DIR."user.png","a"=>"login.php"));
    }
    return $icons;
}

function UserWindowFields(){
    $field = array();
    array_push($field, array("text" => "Home", "href" => "agricoltore_vendite.php"));
    array_push($field, array("text" => "Il mio profilo", "href" => "venditore.php"));
    array_push($field, array("text" => "Ordini", "href" => "lista_ordini.php"));
    array_push($field, array("text" => "Metodo di pagamento", "href" => ""));
    array_push($field, array("text" => "Esci", "href" => "login.php"));
    return $field;
}

function fillOrders($ordine, $campus_info){
    $costo_sped = computeDeliveryTime($ordine, $campus_info)[1];
    $costo_ordine  = $ordine["quantita"] * $ordine["prezzo"];
    $costo_tot = $costo_ordine + $costo_sped;
    $info=array("Tipo prodotto" => $ordine["tipo"],"Quantità: " => $ordine["quantita"],
    "Data dell'ordine: "=> $ordine["data_ordine"],
    "Indirizzo di spedizione: "=> $ordine["via"].$ordine["numero_civico"],
    "Costo ordine: " => $costo_ordine,
    "Costi di spedizione: " => $costo_sped, "Costo totale: " => $costo_tot,
    "Stato: "=> computeDeliveryStatus($ordine, $campus_info)[0]);
    return $info;
    
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
    
    if(date_format($consegna,"Y/m/d") == date_format($today,"Y/m/d")){
        var_dump(date_format($consegna,"Y/m/d"));

        var_dump("consegnaogg9");
        sendMessage();
    }
    return $consegna>=$today;
}

function sendMessage(){
    
}
function computeDeliveryStatus($ordine, $campus_info){
    $consegna = computeDeliveryTime($ordine, $campus_info)[0];
    $today = date_create();
    if($ordine["data_ordine"] == $today){
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
    return array("immagine" => "", "num_telefono" => "", "email" => "", "username" => "", "password" => "", "nome" => "", "cognome" => "");
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
            $msg = $imageName;
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
?>