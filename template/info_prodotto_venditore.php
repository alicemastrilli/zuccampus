<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodottiHomePage.css" />
    </head>
    <?php if(isset($templateParams["errore"])):?>
      <div class="alert alert-warning text-center">      
         <?php echo $templateParams["errore"];?>
      </div>
    <?php endif;?>
    <?php if(isset($templateParams["errNomeZucca"])):?>
    <div class="alert alert-warning text-center">
        <strong>Attenzione!</strong> <?php echo $templateParams["errNomeZucca"]?>
    </div>
<?php endif;?>
    <div class="row col-sm-1">
        <div class="col-sm-1">
        <a class="col-3"  onclick="goBack()">
        <img class="freccia"id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
        </a>
        </div>
    </div>
    <div class="container-fluid">
    <?php foreach($templateParams["zucca_info"] as $zucca):?> 
        <div class="row">
            <div class="col text-center">
                <h2 class="nome_zucca"><?php echo $zucca["nome_zucca"]; ?></h2>
                <h3><?php echo $zucca["tipo"]; ?></h3>
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