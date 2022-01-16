<?php
require_once 'bootstrap.php';
    //controllare che i campi siano pieni

    //$immagine = ;
    $num_telefono = htmlspecialchars($_POST["num_telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["immagine"]);
    if($result != 0){
        $immagine = $msg;
        $iduser = $dbh->insertNewUser($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome);

        if($iduser!=false){
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
    }

    if($_SESSION["utente"]=="agricoltore"){
        $username = htmlspecialchars($_POST["username"]);
        $nome_azienda = htmlspecialchars($_POST["nome_azienda"]);
        $via = htmlspecialchars($_POST["via"]);
        $numero_civico = htmlspecialchars($_POST["numero_civico"]);
        $cap = htmlspecialchars($_POST["cap"]);
        $descrizione = htmlspecialchars($_POST["descrizione"]);

        $idagricoltore = $dbh->insertNewAgricoltore($username, $nome_azienda);
        $idazienda = $dbh->insertNewAzienda($nome_azienda, $via, $numero_civico, $cap, $descrizione);

        if($idagricoltore!=false && $idazienda!=false){
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
    }

    if($_SESSION["utente"]=="cliente"){
        //TO DO: manca un controllo 
            header("location: login.php?formmsg=".$msg);
        
        
    }

?>