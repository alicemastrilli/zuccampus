<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodottiHomePage.css" /> 
    </head>
    <nav class="navbar">
        <div class="container">
            <div class="float-start">
                <a class="text-decoration-none" onclick="goBack()" >
                    <img class="rounded" src="./icons/freccia.png" width="10%" alt="" />
                </a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm text-center">
                <p>PRODOTTI PIÙ VENDUTI</p>
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
                            <p><?php echo $zucca["nome_zucca"]; ?></p>
                            <p><?php echo $zucca["tipo"]; ?></p>
                            <img class="mx-auto d-block" src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="50%" alt="First slide">
                            <p>€<?php echo $zucca["prezzo"]; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <?php foreach($templateParams["zucchePopolari"] as $zuccaPopolare): ?>
                        <div class="carousel-item">
                            <p><?php echo $zuccaPopolare["nome_zucca"]; ?></p>
                            <p><?php echo $zuccaPopolare["tipo"]; ?></p>
                            <img class="mx-auto d-block" src="<?php echo UPLOAD_DIR.$zuccaPopolare["immagine"]; ?>" width="50%" alt="First slide">
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
        <div class="row">
            <div class="col-sm text-center mb-2">
                <button class="visualize" type="button" width="50%" id="visualizeButton"> Visualizza tutti i prodotti</button>
                <script type="text/javascript">
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