<?php 
    $azione = $templateParams["azione"];
    $zucca = $templateParams["zucca"];
?>
<form action="salva_prodotto.php" method="POST" enctype="multipart/form-data">
    <section>
        <div class="row text-center">
            <h3 class=" px-2"><?php echo $azione?> prodotto</h3>
        </div>
        <div class="row text-center">
        <article class="rounded mx-2">
            <div class="col-12 p-3 text-center ">
                <!--correggere la tondita' della foto profilo di default-->
                <img src="./icons/utente_generico.jpg" alt="foto profilo default"/>
                <div class="pb-1 text-center">
                    <input type="file" name="immagine" id="immagine" />
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="nome_zucca">Nome zucca:</label>
                <input type="text" id="nome_zucca" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]; ?>" />               
                <div class="col-sm-0">
                    <label for="tipo" class="form-label px-2 ">Tipo zucca:</label>
                    <select name="tipo" id="tipo">
                     <option value="zucca_commestibile">Zucca commestibile</option>
                     <option value="zucca_ornamentale">Zucca ornamentale</option>
                    </select>
                    
                </div>
            </div>
            <label for="descrizione_zucca" class="form-label px-2">Descrizione:</label><br>
            <div class="mx-2 pb-3">
                <!--controllare il placeholder della textarea-->
                <textarea class="form-control" rows="5" id="descrizione_zucca" 
                name="descrizione_zucca"><?php echo $zucca["descrizione_zucca"]; ?></textarea>
            </div>
            <div  class="mb-3 mt-3">
            <label for="peso">Peso:</label>
                <input type="text" id="peso" name="peso" value="<?php echo $zucca["peso"]; ?>" />
            </div>
            <div  class="mb-3 mt-3">
            <label for="prezzo">Prezzo al chilo:</label>
                <input type="text" id="prezzo" name="prezzo" value="<?php echo $zucca["prezzo"]; ?>" />
            </div>
            <div  class="mb-3 mt-3">
            <label for="disponibilita">Disponibilità:</label>
                <input type="text" id="disponibilita" name="disponibilita" value="<?php echo $zucca["disponibilita"]; ?>" />
            </div>    
        </div>
        </article>
        </div>
        
        <div class="pb-3 text-center">
            <input type="submit" name="submit" value="<?php echo $azione?> prodotto" />
        </div>
    </section>
</form>