<!DOCTYPE html>
<html lang="it">
    <head>
    </head>
    <div class="row col-sm-1">
        <div class="col-sm-1">
            <a class="col-3"  onclick="goBack()">
            <img class="freccia"id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
            </a>
        </div>
    </div>

    <?php
    $disable= false;
    foreach($_SESSION["product"] as $p){
        if($p["nome"] == $_POST["nome_zucca"] && $p["nome_azienda"]==$_POST["nome_azienda"]){
            $disable=true;
        }
    }
    ?>
    <div class="container-fluid">
        <form action="carrello.php" method="POST" enctype="multipart/form-data">
            <div class="container per-appendere">
            <?php foreach($templateParams["zucca_info"] as $zucca):?>
                <div class="row"> 
                    <div class="col-sm-0 text-center zucca">
                        <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                        <input type="hidden" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]; ?>">
                        <h3><?php echo $zucca["tipo"]; ?></h3>
                        <input type="hidden" name="tipo" value="<?php echo $zucca["tipo"]; ?>">
                        <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="200" alt="">
                        <input type="hidden" name="immagine" value="<?php echo $zucca["immagine"]; ?>">
                        <div class="container mb-2 text-center">
                            <label for="produttori">Produttori:</label>
                            <select class="form-select" name="nome_azienda" id="produttori" onchange="seleziona_fornitore(this.value,'<?php echo $zucca["nome_zucca"]; ?>');" >
                            <?php if(!empty($_SESSION['produttore'])): ?>
                                <option selected><?php echo $_SESSION['produttore'][0]; ?></option>
                                <?php foreach($templateParams["produttori"] as $produttori):?>
                                    <option value="<?php echo $produttori["nome_azienda"]; ?>"><?php echo $produttori["nome_azienda"]; ?></option>
                                <?php endforeach;?>
                            <?php else: ?>
                                <?php foreach($templateParams["produttori"] as $produttori):?>
                                <option value="<?php echo $produttori["nome_azienda"]; ?>"><?php echo $produttori["nome_azienda"]; ?></option>
                                <?php endforeach;?>
                            <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row da-sostituire">
                <div class="col sm-0 text-center">
                    <div class="text-center mb-2">
                        <p><?php echo $zucca["descrizione_zucca"]; ?></p>
                    </div>
                    <p> €<?php echo $zucca["prezzo"]; ?></p>
                    <input type="hidden" name="prezzo" value="<?php echo $zucca["prezzo"]; ?>">
                    <p><?php echo $zucca["peso"]; ?> kg </p>
                    <input type="hidden" name="peso" value="<?php echo $zucca["peso"]; ?>">
                    <?php if($zucca["disponibilita"]==0): ?>
                        <p>Disponibilità: il prodotto non è momentaneamente disponibilie.</p>
                    <?php else: ?>
                        <label for="quantity">Quantità:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo $zucca["disponibilita"]; ?>"><br><br>
                        <p>Disponibilità: <?php echo $zucca["disponibilita"]; ?> pezzi </p>
                        <?php if(isset($_SESSION["agricoltore"]) && !$_SESSION["agricoltore"]):?>
                            <div class="text-center">
                                <input id="aggiungi" class="rounded" type="submit" name="submit" <?php if($disable):?> disabled <?php endif;?> value="Aggiungi al carrello" />  
                                <?php if($disable):?>
                                    <p>Il prodotto è già nel carrello</p>
                                <?php endif;?>              
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div> 
        </form>
        <hr>
        <div class="container text-center appendino">
            <p>Recensioni clienti:</p>
            <?php if(isUserLoggedIn()): ?>
                <?php if($_SESSION["agricoltore"] == 0): ?>
                    <form action="aggiungi_recensione.php" method="post">
                        <button class="rounded">Aggiungi una recensione</button>
                        <input type="hidden" name="zucca" value="<?php echo $zucca["nome_zucca"]; ?>">
                    </form>
                    <hr>
                <?php endif; ?>
            <?php elseif(!isUserLoggedIn()): ?>
                <form action="login.php" method="post">
                    <button class="rounded">Aggiungi una recensione</button>
                    <input type="hidden" name="zucca" value="<?php echo $zucca["nome_zucca"]; ?>">
                </form>
                <hr>
            <?php endif; ?>
            <?php foreach($templateParams["recensioni"] as $recensione):?>
            <div class="row">
                <div class="col sm-0">
				    <div class="star-rating text-center">
                    <?php for($k=0;$k<intval($recensione["punteggio"]);$k++):?>
                        <img class="rounded" src="<?php echo UPLOAD_DIR?>stella_piena.png" width="30" alt="" />
                    <?php endfor;?>
                    <?php for($k=0;$k<(5-intval($recensione["punteggio"]));$k++):?>
                        <img class="rounded" src="<?php echo UPLOAD_DIR?>stella.png" width="30" alt="" />
                    <?php endfor;?>
                    </div>
                    <p><?php echo $recensione["nome_azienda"]; ?></p>
                    <p><?php echo $recensione["descrizione"]; ?></p>
                    <p class="font-weight-bold">-<?php echo $recensione["username"]; ?></p>
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
    <script src="./js/prodotti.js"></script>
    <script src="./js/window_functions.js"></script>
</html>