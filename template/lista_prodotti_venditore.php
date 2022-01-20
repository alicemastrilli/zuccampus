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
                                    <button class="rounded " type="button" onclick="deleteElement('<?php echo $prodotto["nome_azienda"]; ?>','<?php echo $prodotto["nome_zucca"]; ?>')">Elimina il Prodotto</button>                   
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./js/elisa.js"></script>
</html>