<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodottiHomePage.css" />
    </head>
    <div class="container col-sm-0">
        <div class="float-start">
            <a class="text-decoration-none" onclick="goBack()" >
                <img class="freccia" src="./icons/freccia.png" width="40" alt="goBack" />
            </a>
        </div>
    </div>
    <div class="container-fluid">
    <?php foreach($templateParams["zucca_info"] as $zucca):?> 
        <div class="row">
            <div class="col text-center">
                <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                <p><?php echo $zucca["tipo"]; ?></p>
                <img class="zucca" src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" width="220" alt="">
                <p><?php echo $zucca["descrizione_zucca"]; ?></p>
                <p>Costo: €<?php echo $zucca["prezzo"]; ?></p>
                <p>Peso: <?php echo $zucca["peso"]; ?>kg</p>
                <p>Disponibilità: <?php echo $zucca["disponibilita"]; ?> pezzi </p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>Costo: €<?php echo $zucca["prezzo"]; ?></p>
                <form action="gestisci_prodotto.php?action=2" method="post">
                    <input type="submit" class="mb-2" name="modifica" value="Modifica">
                    <input type="hidden" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]?>"/>
                </form>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    <script src="./js/window_functions.js"></script>
</html>