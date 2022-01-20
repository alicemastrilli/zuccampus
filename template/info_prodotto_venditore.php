<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/info_prodotto_venditore.css" />
    </head>
    <nav class="navbar">
        <div class="container">
            <div class="float-start">
                <a class="text-decoration-none" href="./prodottiHomePage.php">
                    <img class="img-fluid ps-1 " src="./icons/freccia.png" alt="" />
                </a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    <?php foreach($templateParams["zucca_info"] as $zucca):?> 
            <div class="row">
                <div class="col-sm-0 text-center">
                    <h2><?php echo $zucca["nome_zucca"]; ?></h2>
                    <p><?php echo $zucca["peso"]; ?></p>
                    <img src="<?php echo UPLOAD_DIR.$zucca["immagine"]; ?>" alt="zucca_delica">
                    <p><?php echo $zucca["descrizione"]; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <p>Costo: €<?php echo $zucca["prezzo"]; ?></p>
                    <button class="btn">Modifica Prodotto</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm p-0">
                    <footer class=" rounded-top">
                        <div class="text-white text-center">
                            <p>Zuccampus s.p.a <br> Via dell'Università 50 - 47521 <br> Cesena(FC) <br> <a class="text-white" href="#">zuccampusspa@gmail.com</a> <br>
                            </p>
                            <img src="../icons/instagram.png" alt="instagram logo">
                            <a class="text-white text-decoration-none" href="#">@zuccampus</a>
                        </div>
                    </footer>
                </div>
            </div>
        <?php endforeach;?>
        </div>
</html>