<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/info_prodotti.css" /> 
    </head>
    <nav class="navbar">
        <div class="container">
            <div class="float-start">
                <a class="text-decoration-none" href="./prodottiHomePage.php">
                    <img class="img-fluid ps-1 " src="./icons/freccia.png" width="10%" alt="" />
                </a>
            </div>
        </div>
    </nav>
    <div class="container-fluid"> 
    <?php foreach($templateParams["zucca_info"] as $zucca):?>
        <div class="row"> 
            <div class="col-sm-0 text-center">
                <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                <p><?php echo $zucca["tipo"]; ?></p>
                <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="60%" alt="">
                <div class="container mb-2" width="68%">
                    <label for="browser" class="form-label">Produttori:</label>
                    <select class="form-select" onchange="seleziona_fornitore(this.value,'<?php echo $zucca["nome_zucca"]; ?>'); aggiorna_recensioni(this.value,'<?php echo $zucca["nome_zucca"]; ?>');">
                    <?php foreach($templateParams["produttori"] as $produttori):?>
                        <option value="<?php echo $produttori["nome_azienda"]; ?>"><?php echo $produttori["nome_azienda"]; ?></option>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row" id="div1">
            <div class="col sm-0 text-center">
                <div class="text-center mb-2">
                    <a><?php echo $zucca["descrizione_zucca"]; ?></a>
                </div>
                <p> €<?php echo $zucca["prezzo"]; ?></p>
                <p><?php echo $zucca["peso"]; ?> kg </p>
                <p>Quantità:</p>
                <form width="300px">
                    <label for="quantity">Quantità:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $zucca["disponibilita"]; ?>"><br><br>
                </form>
                <p>Disponibilità: <?php echo $zucca["disponibilita"]; ?> pezzi </p>
                <div class="text-center">
                    <button class="aggiungi-al-carrello">Aggiungi al carrello</button>
                </div>
            </div>
        </div> 
        <hr>
        <div class="container text-center appendino">
            <p>Recensioni clienti:</p>
            <a>Scrivi recensioni</a>
            <?php if(empty($templateParams["recensioni"])): ?>
            <p>Non c'è alcuna recensione per questo prodotto.</p>
            <?php endif;?>
            <?php foreach($templateParams["recensioni"] as $recensione):?>
            <div class="row recensioni-da-eliminare">
                <div class="col sm-0">
				    <div class="star-rating text-center" id="div-star">
                    <?php for($k=0;$k<intval($recensione["punteggio"]);$k++):?>
                        <img class="rounded" src="./icons/star.png" width="6%" alt="" />
                    <?php endfor;?>
                    </div>
                    <p><?php echo $recensione["descrizione"]; ?></p>
                    <p>-<?php echo $recensione["username"]; ?></p>
                </div>
            </div>
            <?php endforeach;?>
            <hr>
        </div>
    <?php endforeach;?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./js/elisa.js"></script>
</html>