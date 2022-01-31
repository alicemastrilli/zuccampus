<?php
require_once 'bootstrap.php';

if($_POST["action"] == 'Inserisci'){
    //Inserisco
    $num_telefono = htmlspecialchars($_POST["num_telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);
    $cliente = 1;
    $agricoltore = 0;

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
    if($result != 0){
        $immagine = $msg;
        $msg = $dbh->insertNewUser($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore);
        $fields = array($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore);
        //var_dump($msg);
    }

    if($_SESSION["agricoltore"] == 1){
        $cliente = 0;
        $agricoltore = 1;
        $nome_azienda = htmlspecialchars($_POST["nome_azienda"]);
        $via = htmlspecialchars($_POST["via"]);
        $numero_civico = htmlspecialchars($_POST["numero_civico"]);
        $cap = htmlspecialchars($_POST["cap"]);
        $descrizione = htmlspecialchars($_POST["descrizione_azienda"]);
        $citta = htmlspecialchars($_POST["citta"]);

        $msg_azienda = $dbh->insertNewAzienda($nome_azienda, $via, $numero_civico, $cap, $descrizione, $citta);
        if($msg_azienda) $msg = $dbh->insertNewAgricoltore($username, $nome_azienda);
        
        //controllo che i campi siano pieni
        $fields = array($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore, $nome_azienda, $via, $numero_civico, $cap, $descrizione);
        //TODO: if user is agricoltore require user_logged.php
    }
    //registrazione per cliente
    else $_SESSION["agricoltore"] = 0;

    $error = checkFormFilledCorrectly($fields);
    if($msg){  
        $msg = "Registrazione avvenuta con successo";
        $_SESSION["username"] = $username;
        header("location:login.php?formmsg=".$msg);
    }
    else print($error);
}

if($_POST["action"] == 'Modifica'){

    $num_telefono = htmlspecialchars($_POST["num_telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);
    $cliente = 1;
    $agricoltore = 0;

    if(isset($_FILES["immagine"]) && strlen($_FILES["immagine"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticolo"]);
        $immagine = $msg;
    }
    else{
        $immagine = $_POST["oldimg"];
        $msg = 1;
    }
    

    if($_SESSION["agricoltore"]==1){
        $cliente = 0;
        $agricoltore = 1;
        $nome_azienda = htmlspecialchars($_POST["nome_azienda"]);
        $via = htmlspecialchars($_POST["via"]);
        $numero_civico = htmlspecialchars($_POST["numero_civico"]);
        $cap = htmlspecialchars($_POST["cap"]);
        $descrizione = htmlspecialchars($_POST["descrizione_azienda"]);
        $citta = htmlspecialchars($_POST["citta"]);

        $msg_azienda = $dbh->updateAzienda($nome_azienda, $via, $numero_civico, $cap, $descrizione, $citta);
        if($msg_azienda) $msg = $dbh->updateAgricoltore($username, $nome_azienda);

    }
    
    $msg = $dbh->updateUser($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore);
    header("location:login.php?formmsg=".$msg);

}



?>