<?php
require_once 'bootstrap.php';


    $immagine = htmlspecialchars($_POST["immagine"]);
    $num_telefono = htmlspecialchars($_POST["num_telefono"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $cognome = htmlspecialchars($_POST["cognome"]);

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imgarticolo"]);
    if($result != 0){
        $imgarticolo = $msg;
        $id = $dbh->insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        if($id!=false){
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoryOfArticle($id, $categoria);
            }
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
        
    }
    header("location: login.php?formmsg=".$msg);


    if($_GET["action"]==2){
        //salvo anche i dati dell'agricoltore

    }

?>