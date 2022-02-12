
<!DOCTYPE html>
<html lang="it">


<head>
       <link rel="stylesheet" type="text/css" href="./css/venditore.css"/> 
       <script  src="./js/jquery-3.4.1.min.js"></script> 
        <script  src="./js/form_registrazione_agricoltore.js"></script> 
  </head>
  <body>
<?php 
  $azienda = $templateParams["azienda"] ;
  $utente = $templateParams["utente"];
  $azione = $templateParams["azione"];
?>
<h3 class="pt-2 px-2">Azienda agricola</h3>
<label for="nome_azienda" class="form-label px-2">Nome azienda agricola</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="nome_azienda" name="nome_azienda" required 
            <?php if($azione=="Modifica"):?> value="<?php echo $azienda["nome_azienda"]; ?>" disabled <?php endif;?>/>
                  <span class="error" aria-live="polite"></span>

      </div>

<label for="descrizione" class="form-label px-2">Descrizione</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="descrizione" name="descrizione"  <?php if($azione=="Modifica"):?> value="<?php echo $azienda["descrizione"]; ?>" <?php endif;?> />
                  <span class="error" aria-live="polite"></span>

            </div>

<?php if($azione == "Inserisci"):?>
<label for="via" class="form-label px-2">Via</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" maxLength="20" id="via" name="via" required <?php if($azione=="Modifica"):?> value="<?php echo $azienda["via"]; ?>" <?php endif;?> />
                  <span class="error" aria-live="polite"></span>

            </div>

<label for="numero_civico" class="form-label px-2">Numero Civico</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="number" id="numero_civico" name="numero_civico" required <?php if($azione=="Modifica"):?> value="<?php echo $utente["numero_civico"]; ?>" <?php endif;?> />
            <span class="error" aria-live="polite"></span>

      </div>

<label for="citta" class="form-label px-2">Citta</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="citta" name="citta" required  <?php if($azione=="Modifica"):?> value="<?php echo $utente["citta"]; ?>" <?php endif;?> />
            <span class="error" aria-live="polite"></span>

      </div>

<label for="cap" class="form-label px-2">CAP</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="number" id="cap" name="cap" required <?php if($azione=="Modifica"):?> value="<?php echo $utente[$field["cap"]]; ?>" <?php endif;?>/>
            <span class="error" aria-live="polite"></span>

      </div>

     
<?php else: ?>
<input type="hidden" id="submit" name="nome_azienda" value="<?php echo $azienda["nome_azienda"]?>" />
<?php endif; ?>

</body>