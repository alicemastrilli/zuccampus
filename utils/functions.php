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
        array_push($icons, array("img"=> UPLOAD_DIR.$_SESSION["img_user"],"a"=>"login.php"));
    }
    else {
        array_push($icons, array("img"=> UPLOAD_DIR."carrello.png","a"=>"login.php"));
        array_push($icons, array("img"=> UPLOAD_DIR."user.png","a"=>"login.php"));
    }
    return $icons;
}
function computeDeliveryTime($ordine, $campus_info){
    $date = date_create($ordine["data"]);
    if($ordine["cap"] == $campus_info["cap"]){
        if($ordine["via"] == $campus_info["via"] && $ordine["numero_civico"] == $campus_info["numero_civico"]){
            date_add($date,date_interval_create_from_date_string("2 days"));
        } else{
             date_add($date,date_interval_create_from_date_string("3 days"));
        }
    } else{
       date_add($date,date_interval_create_from_date_string("5 days"));  
    }
    //date_format($date,"Y-m-d");
    return  $date;
}

function isInCorso($ordine, $campus_info){
    $consegna = computeDeliveryTime($ordine, $campus_info);
    $today = date_create();
    return $consegna>=$today;
}
function registerLoggedUser($user){
    $_SESSION["img_user"] = getImageOfUser($user["immagine"]);
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
?>