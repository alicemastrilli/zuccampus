<?php
require_once 'bootstrap.php';


    //controllare che i campi siano pieni
    //Inserisco
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
    if($_GET["action"]==2){
        //salvo anche i dati dell'agricoltore

    }

?>