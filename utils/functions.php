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

function registerLoggedUser($user){
    $_SESSION["img_user"] = getImageOfUser($user["immagine"]);
    $_SESSION["username"] = $user["username"];
}

function getEmptyUser(){
    return array("immagine" => "", "num_telefono" => "", "email" => "", "username" => "", "password" => "", "nome" => "", "cognome" => "");
}
?>