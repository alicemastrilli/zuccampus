<?php
require_once 'bootstrap.php';

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

if(isUserLoggedIn()){
    $login_result = $dbh->checkAgricoltore($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        $templateParams["titolo"] = "Zuccampus - Utente";
        $_SESSION["agricoltore"]= 0;
        $templateParams["nome"] = "utente_loggato.php";
        $templateParams["main"] = "user_logged.php";
    }
    else{
        $templateParams["titolo"] = "Zuccampus - Agricoltore";
        $_SESSION["agricoltore"] = 1;
        $templateParams["main"] = "agricoltore_logged.php";
    }
}
else{
    $templateParams["titolo"] = "Zuccampus - Login";
    $templateParams["nome"] = "login-form.php";
    $templateParams["main"] = "login-form.php";
}
$templateParams["nome"] = "Zuccampus";
$templateParams["header"] = "header.php";
$templateParams["footer"] = "footer.php";
$templateParams["info"] = $dbh->getAppInfo($templateParams["nome"])[0];
$templateParams["links"] = $dbh->getLink($templateParams["nome"]);

require 'template/homePage.php';
?>