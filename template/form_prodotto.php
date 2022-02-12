<!DOCTYPE html>
<?php 
    $azione = $templateParams["azione"];
    $zucca = $templateParams["zucca"];
    $immagine = $templateParams["immagine"];
    $nome_azienda = $templateParams["nome_azienda"][0]["nome_azienda"];
?>
<div class="row col-sm-1">
    <div class="col-sm-1">
    <a class="col-3"  onclick="goBack()">
      <img class="freccia"id = "freccia"src="./icons/freccia.png" alt="freccia indietro">
    </a>
    </div>
</div>
<form action="salva_prodotto.php" method="POST" enctype="multipart/form-data">
    <section>
        <div class="row text-center">
            <h2 class=" px-2"><?php echo $azione?> prodotto</h2>
        </div>
        <div class="row text-center">
        <article aria-label="article" class="rounded mx-2">
            <div class=" zucca col-12 text-center ">
                <img class="zucca" src="<?php echo UPLOAD_DIR.$immagine?>" alt="foto profilo default"/>
                <div class="pb-1 text-center">
                    <label for="immagine">Inserisci immagine</label>
                    <input type="file" name="immagine" id="immagine" />
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="nome_zucca">Nome zucca:</label>
                <input type="text" id="nome_zucca" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]; ?>" <?php if ($azione == 'Modifica') echo "disabled"?>/>               
                <div class="col-sm-0">
                    <label for="tipo" class="form-label px-2 ">Tipo zucca:</label>
                    <select name="tipo" id="tipo" <?php if ($azione == 'Modifica') echo "disabled"?>>
                     <option value="commestibile">commestibile</option>
                     <option value="ornamentale">ornamentale</option>
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
                <input type="number"step=".01" id="peso" name="peso" value="<?php echo $zucca["peso"]; ?>" />
            </div>
            <div  class="mb-3 mt-3">
            <label for="prezzo">Prezzo al chilo:</label>
                <input type="number" step=".01" id="prezzo" name="prezzo" value="<?php echo $zucca["prezzo"]; ?>" />
            </div>
            <div  class="mb-3 mt-3">
            <label for="disponibilita">Disponibilità:</label>
                <input type="number" id="disponibilita" name="disponibilita" value="<?php echo $zucca["disponibilita"]; ?>" />
            </div>    
        </div>
        </article>
        </div>
        
        <div class="pb-3 text-center">
            <input type="submit" name="submit" value="<?php echo $azione?> prodotto" />
            <input type="hidden" name="action" value="<?php echo $azione?>"/>
        </div>
    </section>
    <input type="hidden" name="oldimg" value="<?php echo $immagine?>" />
    <input type="hidden" name="nome_azienda" value="<?php echo $nome_azienda; ?>" />
    <!--<input type="hidden" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]; ?>" />-->
    <?php  if($azione == 'Modifica'): ?>
        <input type="hidden" name="nome_zucca" value="<?php echo $zucca["nome_zucca"]; ?>" />
        
        <input type="hidden" name="tipo" value="<?php echo $zucca["tipo"]; ?>" />
    <?php endif ?>
</form>