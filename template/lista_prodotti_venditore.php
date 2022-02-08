<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/prodottiHomePage.css" />
    </head>
    <div class="container-fluid">
        <div class="row">
            <div class="col sm-0 text-center">
                <form action="gestisci_prodotto.php?action=1" method="post">
                    <button class="visualize mb-2 mt-2"  name="inserisci">Inserisci nuovo prodotto</button>
                </form>
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
                                    <form  action="info_prodotto_venditore.php" method="post">
                                        <button class="visualize mb-2">Visualizza Prodotto</button>
                                        <input type="hidden" name="nome_zucca" value="<?php echo $prodotto["nome_zucca"]; ?>" />
                                    </form>
                                </div>
                                <div class="col-6 text-center">
                                <form action="gestisci_prodotto.php?action=3" method="post">
                                    <input class="visualize mb-2" type="submit" name="elimina" value="Elimina Prodotto">  
                                    <input type="hidden" name="nome_zucca" value="<?php echo $prodotto["nome_zucca"]; ?>" />
                                </form>                 
                                </div>
                            </div>
                        </td>
                        <td class="col-3 p-2">
                            <img class="float-end" src="<?php echo UPLOAD_DIR.$prodotto["immagine"]; ?>" width="150" alt="" />
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
    <script src="./js/window_functions.js"></script>
</html>