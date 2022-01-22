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
    <?php foreach($templateParams["zucca_info"] as $zucca):?> 
        <div class="row">
            <div class="col-sm-0 text-center">
                <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                <p><?php echo $zucca["tipo"]; ?></p>
                <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="50%" alt="">
                <p><?php echo $zucca["descrizione_zucca"]; ?></p>
                <p>€<?php echo $zucca["prezzo"]; ?></p>
                <p><?php echo $zucca["peso"]; ?>kg</p>
                <p>Disponibilità: <?php echo $zucca["disponibilita"]; ?> pezzi </p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>Costo: €<?php echo $zucca["prezzo"]; ?></p>
                <form action="gestisci_prodotto.php?action=2" method="post">
                    <button class="visualize mt-2 mb-2"  name="modifica">Modifica prodotto</button>
                </form>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    <script src="./js/window_functions.js"></script>
</html>