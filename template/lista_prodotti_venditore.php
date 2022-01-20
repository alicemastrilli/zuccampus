<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/lista_prodotti_venditore.css" />
    </head>
    <div class="container-fluid">
        <div class="row">
            <div class="col sm-0 text-center">
                <button class="btn">Aggiungi Prodotto</button>
            </div>
        </div>
        <article>
            <table class="table table-striped">
                <tbody>
                <?php foreach($templateParams["prodottiVenditore"] as $prodotto): ?>
                    <tr>                   
                        <td class="col-9">
                            <h3><?php echo $prodotto["nome_zucca"]; ?></h3>
                            <h5><?php echo $prodotto["tipo"]; ?></h5>
                            <p>Quantità disponibile:<?php echo $prodotto["disponibilita"]; ?></p>
                            <div class="row">
                                <div class="col-6 text-center">
                                    <button class="rounded" type="button">
                                        <a class=" text-decoration-none text-black" href="#">Visualizza prodotto</a>
                                    </button>
                                </div>
                                <div class="col-6 text-center">
                                    <form  action="info_prodotti.php?id=<?php echo $zucca["nome_zucca"]?>" method="post">
                                        <button class="rounded " type="button">Elimina il Prodotto</button> 
                                    </form>                            
                                </div>
                            </div>
                        </td>
                        <td class="col-3 p-2">
                            <img class="float-end" src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" alt="" />
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </article>
    </div>
</html>