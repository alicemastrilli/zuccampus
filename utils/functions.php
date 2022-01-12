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

function getFootersIcons(){
    $icons=array();
    if(isUserLoggedIn()){
        if($_SESSION["agricoltore"] == 0){
            array_push($icons, UPLOAD_DIR."carrello.png");   
        } 
        array_push($icons, UPLOAD_DIR."posta.jpg");
        array_push($icons, UPLOAD_DIR.$_SESSION["img_user"]);
    }
    else {
        array_push($icons, UPLOAD_DIR."carrello.png");
        array_push($icons, UPLOAD_DIR."user.png");
    }
    return $icons;
}

function registerLoggedUser($user){
    $_SESSION["img_user"] = getImageOfUser($user["immagine"]);
    $_SESSION["username"] = $user["username"];
}
?>