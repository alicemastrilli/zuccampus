<?php
require_once 'bootstrap.php';
    //controllare che i campi siano pieni
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

        if($_SESSION["agricoltore"] == 1){
            $cliente = 0;
            $agricoltore = 1;
        }
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

        $msg = $dbh->insertNewAgricoltore($username, $nome_azienda);
        $msg_azienda = $dbh->insertNewAzienda($nome_azienda, $via, $numero_civico, $cap, $descrizione, $citta);

        $fields = array($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore, $nome_azienda, $via, $numero_civico, $cap, $descrizione);
        $error = checkFormFilledCorrectly($fields);
        //TODO: if user is agricoltore require user_logged.php
        if($msg && $msg_azienda){  
            $_SESSION["agricoltore"] = 1;
            $msg = "Registrazione avvenuta con successo";
            registerLoggedUser($username);
            header("location:login_form.php?formmsg=".$msg);
        }
        else{
            var_dump($msg);
            var_dump($msg_error);
        }
    }
    else{

        $error = checkFormFilledCorrectly($fields);
        if($msg){
            $_SESSION["agricoltore"]= 0;
            $msg = "Registrazione avvenuta con successo";
            $_SESSION["username"] = $username;
            header("location:login.php?formmsg=".$msg);
        }else{
            var_dump($msg);
            var_dump($msg_error);
        }
    }


?>