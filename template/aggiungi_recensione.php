<?php
require_once 'bootstrap.php';
if(isset($_POST['submit'])){
    $nome_zucca = htmlspecialchars($_POST["zucca"]);
    $nome_azienda = htmlspecialchars($_POST["produttori"]);
    $punteggio = intval(htmlspecialchars($_POST["punteggio"]));
    $descrizione_zucca = htmlspecialchars($_POST["descrizione_zucca"]); 
    $data=date("Y-m-d");
    $templateParams["user"] = $dbh->getUserByUsername($_SESSION["username"])[0];
    $dbh->insertNewRecensione($descrizione_zucca,$punteggio,$nome_azienda, $nome_zucca,$_SESSION["username"],$data);
    echo '<div class="alert alert-dark">La recensione è stata aggiunta con successo!</div>';
    //rimanda a lista-recensione
    //puoi togliere l'alert che tanto se la ha inserita lo vedi
    //controllo che tutti i campi siano sttai riempiti
    //rimanda a un altra pagina lista-recensione
    $_POST["recensione"] = array($descrizione_zucca,$punteggio,$nome_azienda, $nome_zucca,$_SESSION["username"],$data);
    $_POST["messaggio_action"]=3;
    require_once "invia_messaggio.php";
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

