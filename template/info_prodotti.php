<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/info_prodotti.css" /> 
    </head>
    <?php foreach($templateParams["zucca_info"] as $zucca):?>
        <p><?php echo $zucca["nome_zucca"]; ?></p>
    <?php endforeach;?>
    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-0">
                    <div class="text-center">
                        <h2>Zucca Delica</h2>
                        <p>Categoria</p>
                        <img src="../icons/zuccaDelica.png" alt="zucca_delica">
                        <a>Descrizione:Questo tipo di zucca presenta una buccia verde scuro polpa arancione. Caratterizzata da un sapore dolciastro e la consistenza di una castagna, è ideale per essere cotta al forno e condita con erbe aromatiche ed olio.
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <p>Costo</p>
                    <p>Peso</p>
                    <p>Quantità</p>
                    <p>Disponibilità</p>
                    <button class=class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Categoria</button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">ornamentale</li>
                        <li class="dropdown-item">commestibile</li>
                    </ul>
                </div>
            </div>
        </div>
</html>