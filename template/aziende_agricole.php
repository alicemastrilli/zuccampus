<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/agricoltori.css" /> 

    </head>
<article>
        <table class="table table-striped">
            <tbody>
                <?php foreach($templateParams["aziende_agricole"] as $azienda):?>
                <tr>
                <td class="col-9">
                    <h3><?php echo $azienda["nome_azienda"]; ?> </h3>
                    <h5>di <?php echo $azienda["nome"]; ?> <?php echo $azienda["cognome"]; ?></h5>
                    <p><?php echo $azienda["descrizione"]; ?></p>
                    <div class="row">
                        <div class="col-6 text-center"> 
                            <form  action="#" method="get">
                            <button class="rounded">Scopri i prodotti</button>
                            </form>
                        </div>  
                        <div class="col-6 text-center">
                        <form  action="venditore.php?id=<?php echo $azienda["nome_azienda"]?>" method="post">
                            <button class="rounded">Scopri il venditore</button>
                            </form>
                        </div>
                    
                </td>
                <td class="col-1 p-2">
                    <img class="float-end" src="<?php echo UPLOAD_DIR.$azienda["immagine"]?>" alt="">
                </td>
                </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </article>