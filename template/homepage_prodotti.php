<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodottiHomePage.css" /> 
    </head>
    <div class="row col-sm-1">
        <div class="col-sm-1">
            <a class="col-3"  onclick="goBack()">
            <img class="freccia"id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-content-center">
            <div class="col-sm text-center mt-3">
                <h2 class="sezione">Prodotti più venduti</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner text-center">
                    <?php foreach($templateParams["primaZucca"] as $zucca): ?>
                        <div class="carousel-item active">
                            <h2 class="nome_zucca"><?php echo $zucca["nome_zucca"]; ?></h2>
                            <h3><?php echo $zucca["tipo"]; ?></h3>
                            <img class=" zucca mx-auto d-block" src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="220" alt="First slide">
                            <p>€<?php echo $zucca["prezzo"]; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($templateParams["zucchePopolari"] as $zuccaPopolare): ?>
                        <div class="carousel-item">
                            <h2 class="nome_zucca"><?php echo $zuccaPopolare["nome_zucca"]; ?></h2>
                            <h3><?php echo $zuccaPopolare["tipo"]; ?></h3>
                            <img class="mx-auto d-block" src="<?php echo UPLOAD_DIR.$zuccaPopolare["immagine"]; ?>" width="220" alt="First slide">
                            <p>€<?php echo $zuccaPopolare["prezzo"]; ?></p>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <p>Zuccampus nasce per offrire prodotti a kilometro 0 ai suoi utenti con un ottimo rapporto qualità prezzo. </p>
        </div>
        <div class="row">
            <div class="col-sm text-center mb-2">
                <button class="rounded" type="button" id="visualizeButton"> Visualizza tutti i prodotti</button>
                <script>
                    document.getElementById("visualizeButton").onclick = function () {
                    location.href = "./prodotti.php";
                    };
                </script>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./js/window_functions.js"></script>
</html>