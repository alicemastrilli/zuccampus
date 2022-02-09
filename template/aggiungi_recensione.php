<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/dati_utente.css" /> 
    </head>
        <div class="container">
            <div class="float-start">
                <a class="text-decoration-none" onclick="goBack()">
                    <img class="img-fluid ps-1 freccia " src="./icons/freccia.png" width="40" alt="goBack" />
                </a>
            </div>
        </div>
    <form action="lista_recensioni.php" method="POST" enctype="multipart/form-data">
        <section class="text-center">
            <h2>Aggiungi una recensione</h2>
            <div class="row mb-3 mt-3">
                <div class="col-sm-0 text-center">
                    <div >
                        <h3><?php echo $nome_zucca; ?></h3>
                        <input type="hidden" name="zucca" value="<?php echo $nome_zucca; ?>" />
                        <div class=" m-2 text-center" >
                            <label for="produttori" ><strong>Produttore:</strong></label>
                            <select class="form-select mb-2" id="produttori" name="produttori">
                            <?php foreach($templateParams["produttori"] as $produttore):?>
                                <option value="<?php echo $produttore["nome_azienda"]; ?>"><?php echo $produttore["nome_azienda"]; ?></option>
                            <?php endforeach;?>
                            </select> 
                        </div>
                    </div>
                    <div class="mt-2 m-2">
                        <label for="valutazione"><strong>Valutazione:</strong></label>    
                        <select class="form-select mb-2" id="valutazione" name="punteggio">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <label for="descrizione"><strong>Descrizione:</strong></label><br>
                    <div class="mx-2 pb-3">
                        <textarea class="form-control" id="descrizione" rows="5" id="descrizione" 
                        name="descrizione_zucca"></textarea>
                    </div>
                </div>
            </div>
            <div class="pb-3 text-center">
                <input type="submit" name="submit" value="Aggiungi recensione" />
            </div>
        </section>
    </form>
    <script src="./js/window_functions.js"></script>
</html>

