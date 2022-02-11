<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/aziende_agricole.css" /> 
    </head>
    <div class="row col-sm-1">
    <div class="col-sm-1">
    <a class="col-3"  onclick="goBack()">
      <img class="freccia"id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
    </a>
    </div>
</div>
<article>
        <table class="table table-striped">
            <tbody>
                <?php foreach($templateParams["aziende_agricole"] as $azienda):?>
                <tr>
                <td class="col-9">
                    <h2><?php echo $azienda["nome_azienda"]; ?> </h2>
                    <h3>di <?php echo $azienda["nome"]; ?> <?php echo $azienda["cognome"]; ?></h3>
                    <p><?php echo $azienda["descrizione"]; ?></p>
                    <div class="row">
                        <div class="col-6 text-center"> 
                            <form  action="prodotti.php" method="post">
                                <button class="rounded" >Scopri i prodotti</button>
                                <input type="hidden" name="nome_produttore" value="<?php echo $azienda["nome_azienda"]; ?>">
                            </form>
                        </div>  
                        <div class="col-6 text-center">
                        <form  action="dati_utente.php" method="post">
                            <button class="rounded">Scopri il venditore</button>
                            <input type="hidden" name="id" value="<?php echo $azienda["nome_azienda"]?>"/>
                        </form>
                    </div>
                </td>
                <td class="col-1 p-2">
                    <img class="float-end" src="<?php echo UPLOAD_DIR.getImageOfUser($azienda["immagine"])?>" alt="">
                </td>
                </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </article>