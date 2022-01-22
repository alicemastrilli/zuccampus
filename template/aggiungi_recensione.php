<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/info_prodotti.css" /> 
    </head>
    <nav class="navbar">
        <div class="container">
            <div class="float-start">
                <a class="text-decoration-none" onclick="goBack()">
                    <img class="img-fluid ps-1 " src="./icons/freccia.png" width="10%" alt="" />
                </a>
            </div>
        </div>
    </nav>
    <form action="salva_recensione.php" method="POST" enctype="multipart/form-data">
        <section>
            <div class="row mb-3 mt-3">
                <div class="col-sm-0 text-center">
                    <div class="font-weight-bold">
                        <label for="nome_zucca"><?php echo $nome_zucca; ?></label>
                        <input type="hidden" name="nome_zucca" value="<?php echo $nome_zucca; ?>" />
                        <br><br>
                        <label for="produttore"><?php echo $produttore; ?></label>
                        <input type="hidden" name="produttore" value="<?php echo $produttore; ?>" /> 
                        <br><br>
                    </div>
                    <div class="mt-2 m-2" width="20%" >
                        <label for="valutazione">Valutazione:</label>    
                        <select class="form-select mb-2" name="punteggio" width="30%">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <label for="descrizione_zucca" class="form-label px-2">Descrizione:</label><br>
                    <div class="mx-2 pb-3">
                        <textarea class="form-control" rows="5" id="descrizione" 
                        name="descrizione_zucca"></textarea>
                    </div>
                </div>
            </div>
            <div class="pb-3 text-center">
                <input type="submit" name="submit" value="submit" />
            </div>
        </section>
    </form>
    <script src="./js/window_functions.js"></script>
</html>