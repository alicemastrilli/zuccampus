<!DOCTYPE html>
<html lang="it">
    <head>
    <link rel="stylesheet" type="text/css" href="./css/lista_recensioni.css" /> 

    </head>
    <a class="col-3"  onclick="goBack()">
      <img id = "freccia"src="./icons/freccia.png"width="60px" alt="freccia indietro">
    </a>
<ul class="list-group">
<?php foreach($templateParams["recensioni"] as $recensione):?>
    <li class="list-group-item">
    <div class="row">
        <div class="col sm-0">
			<div class="star-rating text-center" id="div-star">
                <?php for($k=0;$k<intval($recensione["punteggio"]);$k++):?>
                    <img class="rounded" src="<?php echo UPLOAD_DIR?>stella_piena.png" width="6%" alt="" />
                <?php endfor;?>
                <?php for($k=0;$k<(5-intval($recensione["punteggio"]));$k++):?>
                    <img class="rounded" src="<?php echo UPLOAD_DIR?>stella.png" width="6%" alt="" />
                <?php endfor;?>
                </div>
                <br>
                <span class="fw-bold">Azienda: </span> <span><?php echo $recensione["nome_azienda"]; ?></span> <br>
                <span class="fw-bold">Zucca: </span> <span><?php echo $recensione["nome_zucca"]; ?></span><br>
                <span class="fw-bold">Descrizione: </span><span><?php echo $recensione["descrizione"]; ?></span><br>
                <p class="text-end fw-bold"> -<?php echo $recensione["username"]; ?> </p> 
            </div>
        </div>
    <hr>
</li>
<?php endforeach;?>
</ul>
