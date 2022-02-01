<?php
require_once 'bootstrap.php';
if(isset($_POST['submit'])){
    $newproduct=array(
        'id' => $_POST["id"],
        'tipo' => $_POST["tipo"],
        'immagine' => $_POST["immagine"],
        'nome_azienda' => $_POST["nome_azienda"],
        'prezzo' => $_POST["prezzo"],
        'peso' => $_POST["peso"],
        'quantita' => $_POST["quantity"]
    );
	//check if product is already in the cart
    $value=0;
    foreach($_SESSION['product'] as $key){
        if($key["id"]==$newproduct["id"]){
            if($key["nome_azienda"]==$newproduct["nome_azienda"]){
                $value=$value + 1;
            }
        }
    }
    if($value==0){
        array_push($_SESSION['product'], $newproduct);
    }else{
        echo '<div class="alert alert-dark">Attenzione! Il prodotto selezionato è già nel carrello!</div>';
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
                <a class="text-decoration-none" onclick="goBack()" >
                    <img class="img-fluid ps-1 " src="./icons/freccia.png" width="10%" alt="" />
                </a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="container per-appendere">
            <?php foreach($templateParams["zucca_info"] as $zucca):?>
                <div class="row"> 
                    <div class="col-sm-0 text-center">
                        <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                        <input type="hidden" name="id" value="<?php echo $zucca["nome_zucca"]; ?>">
                        <p><?php echo $zucca["tipo"]; ?></p>
                        <input type="hidden" name="tipo" value="<?php echo $zucca["tipo"]; ?>">
                        <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="60%" alt="">
                        <input type="hidden" name="immagine" value="<?php echo $zucca["immagine"]; ?>">
                        <div class="container mb-2" width="68%">
                            <label for="browser" class="form-label">Produttori:</label>
                            <select class="form-select" name="nome_azienda" onchange="seleziona_fornitore(this.value,'<?php echo $zucca["nome_zucca"]; ?>');" >
                            <?php foreach($templateParams["produttori"] as $produttori):?>
                                <option value="<?php echo $produttori["nome_azienda"]; ?>"><?php echo $produttori["nome_azienda"]; ?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row da-sostituire">
                <div class="col sm-0 text-center">
                    <div class="text-center mb-2">
                        <a><?php echo $zucca["descrizione_zucca"]; ?></a>
                    </div>
                    <p> €<?php echo $zucca["prezzo"]; ?></p>
                    <input type="hidden" name="prezzo" value="<?php echo $zucca["prezzo"]; ?>">
                    <p><?php echo $zucca["peso"]; ?> kg </p>
                    <input type="hidden" name="peso" value="<?php echo $zucca["peso"]; ?>">
                    <label for="quantity">Quantità:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $zucca["disponibilita"]; ?>"><br><br>
                    <p>Disponibilità: <?php echo $zucca["disponibilita"]; ?> pezzi </p>
                    <div class="text-center mb-2">
                        <input type="submit" name="submit" value="Aggiungi al Carrello" />                
                    </div>
                </div>
            </div> 
        </form>
        <hr>
        <div class="container text-center appendino">
            <p>Recensioni clienti:</p>
            <form action="aggiungi_recensione.php" method="post">
                <button class="aggiungi-al-carrello mt-2 mb-2 text-decoration-underline">aggiungi una recensione</button>
                <input type="hidden" name="zucca" value="<?php echo $zucca["nome_zucca"]; ?>">
            </form>
            <hr>
            <?php foreach($templateParams["recensioni"] as $recensione):?>
            <div class="row">
                <div class="col sm-0">
				    <div class="star-rating text-center" id="div-star">
                    <?php for($k=0;$k<intval($recensione["punteggio"]);$k++):?>
                        <img class="rounded" src="./icons/star.png" width="6%" alt="" />
                    <?php endfor;?>
                    </div>
                    <p class="font-weight-bold" ><?php echo $recensione["nome_azienda"]; ?></p>
                    <p><?php echo $recensione["descrizione"]; ?></p>
                    <p>-<?php echo $recensione["username"]; ?></p>
                </div>
            </div>
            <hr>
            <?php endforeach;?>
        </div>
    <?php endforeach;?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./js/elisa.js"></script>
    <script src="./js/window_functions.js"></script>
</html>