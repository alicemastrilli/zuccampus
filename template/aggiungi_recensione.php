<?php
require_once 'bootstrap.php';
if(isset($_POST['submit'])){
    $idReview = rand(1,1342);
    $nome_zucca = htmlspecialchars($_POST["zucca"]);
    $nome_azienda = htmlspecialchars($_POST["produttori"]);
    $punteggio = htmlspecialchars($_POST["punteggio"]);
    $descrizione_zucca = htmlspecialchars($_POST["descrizione_zucca"]); 
    if(isUserLoggedIn()){
        $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
        $templateParams["ordine"] = $dbh->getOrdersOfUser($nome_zucca,$nome_azienda,$_SESSION["username"][0]);
        if(!empty($templateParams["ordine"])){
            $dbh->insertNewRecensione($idReview,$descrizione_zucca,$punteggio,$nome_azienda, $zucca,$_SESSION["username"]);
            echo "la recensione è stata aggiunta con successo!";
        }else{
            echo "Attenzione! Per effettuare la recensione su questo prodotto bisogna aver effettuato un ordine";
        }
    }else{
        echo "Attenzione! Per rilasciare una recensione bisogna prima effettuare il login!";
    }
}
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/info_prodotti.css" /> 
    </head>
    <nav class="navbar">
        <div class="container">
            <div class="float-start">
                <a class="text-decoration-none" onclick="goBack()">
                    <img class="img-fluid ps-1 " src="./icons/freccia.png" width="10%" alt="" />
                </a>
            </div>
        </div>
    </nav>
    <form action="#" method="POST" enctype="multipart/form-data">
        <section>
            <div class="row mb-3 mt-3">
                <div class="col-sm-0 text-center">
                    <div class="font-weight-bold">
                        <label for="nome_zucca"><strong><?php echo $nome_zucca; ?></strong></label>
                        <input type="hidden" name="zucca" value="<?php echo $nome_zucca; ?>" />
                        <br><br>
                        <div class="mt-2 m-2" width="20%" >
                            <label for="produttore"><strong>Produttore:</strong></label>
                            <select class="form-select mb-2" name="produttori" width="30%">
                            <?php foreach($templateParams["produttori"] as $produttore):?>
                                <option value="<?php echo $produttore["nome_azienda"]; ?>"><?php echo $produttore["nome_azienda"]; ?></option>
                            <?php endforeach;?>
                            </select> 
                        </div>
                        <br><br>
                    </div>
                    <div class="mt-2 m-2" width="20%" >
                        <label for="valutazione"><strong>Valutazione:</strong></label>    
                        <select class="form-select mb-2" name="punteggio" width="30%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <label for="descrizione_zucca" class="form-label px-2"><strong>Descrizione:</strong></label><br>
                    <div class="mx-2 pb-3">
                        <textarea class="form-control" rows="5" id="descrizione" 
                        name="descrizione_zucca"></textarea>
                    </div>
                </div>
            </div>
            <div class="pb-3 text-center">
                <input type="submit" name="submit" value="Aggiungi recensione" />
            </div>
        </section>
    </form>
    <script src="./js/window_functions.js"></script>
</html>

