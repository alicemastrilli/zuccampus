<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodotti.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <button class=class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Ordina per</button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item" href="#">Prezzo:crescente</li>
                        <li class="dropdown-item" href="#">Prezzo:decrescente</li>
                    </ul>
                </div>
                <div class="col">
                    <button class=class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Produttori</button>
                    <ul class="dropdown-menu">
                    <?php foreach($templateParams["agricoltori"] as $agricoltore): ?>
                        <li class="dropdown-item" href="#"><?php echo $agricoltore["nome_azienda"]; ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col">
                    <button class=class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Categoria</button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">ornamentale</li>
                        <li class="dropdown-item">commestibile</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div data-bs-spy="scroll" class="col-sm-0">
                <?php foreach($templateParams["zucche"] as $zucca): ?>
                    <div class="text-center">
                        <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                        <p><?php echo $zucca["tipo"]; ?></p>
                        <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" alt="zucca_delica">
                        <p>€<?php echo $zucca["prezzo"]; ?></p>
                        <form  action="info_prodotti.php?id=<?php echo $zucca["nome_zucca"]?>" method="post">
                            <button class="rounded">Acquista</button>
                        </form>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </body>
</html>