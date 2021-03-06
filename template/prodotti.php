<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodotti.css" />
    </head>
    <div class="row col-sm-1">
        <div class="col-sm-1">
            <a class="col-3"  onclick="goBack()">
            <img class="freccia"id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row text-center mt-3">
            <div class="col sm-2"></div>
            <div class="bottoni col-sm-2 ">
                <button  type="button" class="rounded" data-toggle="dropdown">Ordina per</button>
                <ul class="dropdown-menu">
                    <li class="dropdown-item" onclick="ordinaPerPrezzo('ASC');">Prezzo:crescente</li>
                    <li class="dropdown-item" onclick="ordinaPerPrezzo('DECS');">Prezzo:decrescente</li>
                </ul>
            </div>
            <div class="col-sm-2 bottoni ">
                <button  type="button" class="rounded" data-toggle="dropdown">Produttori</button>
                <ul class="dropdown-menu">
                <?php foreach($templateParams["agricoltori"] as $agricoltore): ?>
                    <li class="dropdown-item" onclick="filtra_prodotti_agricoltore('<?php echo $agricoltore["nome_azienda"]; ?>');"><?php echo $agricoltore["nome_azienda"]; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-2 bottoni">
                <button type="button" class="rounded" data-toggle="dropdown"> Categoria</button>
                <ul class="dropdown-menu">
                    <li class="dropdown-item" onclick="ordina_categoria('ornamentale');">ornamentale</li>
                    <li class="dropdown-item" onclick="ordina_categoria('commestibile');">commestibile</li>
                </ul>
            </div>
            <div class="col sm-3"></div>
        </div>
        <div class="row da-sostituire zucca mt-2">
            <div class="col-sm-0">
            <?php foreach($templateParams["zucche"] as $zucca): ?>
                <div class="text-center">
                    <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                    <h3><?php echo $zucca["tipo"]; ?></h3>
                    <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="200" alt="">
                    <p>???<?php echo $zucca["prezzo"]; ?></p>
                    <form  action="info_prodotti.php" method="post">
                        <button class="rounded mt-2 mb-2">Acquista</button>
                        <input type="hidden" name="nome_azienda" value="<?php echo $zucca["nome_azienda"]; ?>">
                        <input type="hidden" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]; ?>">
                    </form>
                </div>
                <hr>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./js/prodotti.js"></script>
    <script src="./js/window_functions.js"></script>
</html>