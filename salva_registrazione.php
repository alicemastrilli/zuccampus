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
    unset($_SESSION["registrazione"]);


    if(isset($_FILES["immagine"]) && strlen($_FILES["immagine"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
        $immagine = $msg;
    }
    else{     
        $immagine = $_POST["oldimg"];
        $msg = 1; 
    }

    
    $msg = $dbh->insertNewUser($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore);
    if($_SESSION["agricoltore"] == 1){
        $cliente = 0;
        $agricoltore = 1;
        $nome_azienda = htmlspecialchars($_POST["nome_azienda"]);
        $via = htmlspecialchars($_POST["via"]);
        $numero_civico = htmlspecialchars($_POST["numero_civico"]);
        $cap = htmlspecialchars($_POST["cap"]);
        $descrizione = htmlspecialchars($_POST["descrizione"]);
        $citta = htmlspecialchars($_POST["citta"]);

        $msg_azienda = $dbh->insertNewAzienda($nome_azienda, $via, $numero_civico, $cap, $descrizione, $citta);
        if($msg_azienda) $msg = $dbh->insertNewAgricoltore($username, $nome_azienda);
        
    }
    //registrazione per cliente
    else $_SESSION["agricoltore"] = 0;

    if(isset($_POST["tipo_cliente"])){
        if ($_POST["tipo_cliente"] == "studente"){
            $matricola = htmlspecialchars($_POST["matricola"]);

        }
        else $matricola = NULL;
        $msg = $dbh->insertNewCliente($username, $matricola);
    }

    if($msg){  
        $msg = "Registrazione avvenuta con successo";
        $_SESSION["username"] = $username;
        require("dati_utente.php");
    }
}

if($_POST["action"] == 'Modifica'){

    $num_telefono = htmlspecialchars($_POST["num_telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = $_SESSION["username"];
    $password = htmlspecialchars($_POST["password"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);
    $cliente = 1;
    $agricoltore = 0;

    if(isset($_FILES["immagine"]) && strlen($_FILES["immagine"]["name"])>0){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
        $immagine = $msg;
    }
    else{
        $immagine = $_POST["oldimg"];
        $msg = 1;
    }


    if($_SESSION["agricoltore"]==1){
        $cliente = 0;
        $agricoltore = 1;
        $nome_azienda = $_POST["nome_azienda"];
        $descrizione = htmlspecialchars($_POST["descrizione"]);

        $msg_azienda = $dbh->updateAzienda($descrizione, $nome_azienda);

    }
    
    $msg = $dbh->updateUser($immagine, $num_telefono, $email, $password, $nome, $cognome, $cliente, $agricoltore, $username);
    header("location:dati_utente.php?formmsg=".$msg);

}



?>