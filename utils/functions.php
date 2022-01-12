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
            array_push($icons, array("img"=>UPLOAD_DIR."carrello.png", "a"=>"login.php"));   
        } 
        array_push($icons, array("img"=>UPLOAD_DIR."posta.jpg","a"=>"login.php" ));
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
?>