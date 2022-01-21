<?php
require_once 'bootstrap.php';

$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["nome"] = $dbh->getNomeApp()[0]["nome_app"];
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

if(isUserLoggedIn()){
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];  
}
if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isset($_GET["formmsg"])){
    $_POST["mail"] = $templateParams["user"]["email"];
    $_POST["messaggio_action"]=0;
    $_POST["password"]=$templateParams["user"]["password"];
    require "template/invia_messaggio.php";
}
if(isUserLoggedIn()){
    $login_result = $dbh->checkAgricoltore($_SESSION["username"]);
    if( $login_result[0]["AGRICOLTORE"]==0){
        $_SESSION["agricoltore"]= 0;
        require "user_logged.php";
    }
    else{
        $_SESSION["agricoltore"] = 1;
        require "agricoltore_vendite.php";
    }
}
else{
    $templateParams["titolo"] = "Zuccampus - Login";
    $templateParams["nome"] = "login-form.php";
    $templateParams["main"] = "login-form.php";
    require 'template/homePage.php';
}




?>