<!DOCTYPE html>
<html lang="it">
    <head>
    <link rel="stylesheet" type="text/css" href="./css/lista_recensioni.css" /> 

    </head>
    <a class="col-3"  onclick="goBack()">
      <img id = "freccia" src="./icons/freccia.png" alt="freccia indietro">
    </a>
    

<?php if (count($templateParams["recensioni"])==0):?>
    <?php if($_SESSION["agricoltore"]):?>
        <p class="text-center">Non ci sono recensioni per prodotti della tua azienda agricola.</p>
    <?php else:?>
        <p class="text-center">Non hai lasciato alcuna recensione!</p>
    <?php endif;?>
<?php endif;?>
<ul class="list-group mx-4">
<?php foreach($templateParams["recensioni"] as $recensione):?>
    <li class="list-group-item border-0">
    <div class="row">
        <div class="col sm-0">
			<div class="star-rating text-center div-star" >
                <p class="text-center fw-bold"><?php echo $recensione["data"]; ?></p>
                <?php for($k=0;$k<intval($recensione["punteggio"]);$k++):?>
                    <img class="rounded" src="<?php echo UPLOAD_DIR?>stella_piena.png"  alt="" />
                <?php endfor;?>
                <?php for($k=0;$k<(5-intval($recensione["punteggio"]));$k++):?>
                    <img class="rounded" src="<?php echo UPLOAD_DIR?>stella.png"  alt="" />
                <?php endfor;?>
                </div>
                
                <h2>Azienda: </h2> <p><?php echo $recensione["nome_azienda"]; ?></p> 
                <h2>Zucca: </h2> <p><?php echo $recensione["nome_zucca"]; ?></p>
                <h2>Descrizione: </h2><p><?php echo $recensione["descrizione"]; ?></p>
                <p class="text-end fw-bold"> -<?php echo $recensione["username"]; ?> </p> 
            </div>
        </div>
</li>
<?php endforeach;?>
</ul>
