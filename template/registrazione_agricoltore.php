<?php 
  $azienda = $templateParams["azienda"] ;
  $utente = $templateParams["utente"];
  $azione = $templateParams["azione"];
?>
<h3 class="pt-2 px-2">Azienda agricola</h3>
<label for="nome" class="form-label px-2">Nome azienda agricola</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="nome_azienda" name="nome_azienda" value="<?php echo $azienda["nome_azienda"]; ?>" <?php if($azione == "Modifica") echo "disabled"; ?>/>
      </div>
<label for="descrizione_azienda" class="form-label px-2">Descrizione</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="descrzione" name="descrizione"  value="<?php echo $azienda["descrizione"]; ?>" />
      </div>
<?php if($azione == "Inserisci"):?>
<label for="via" class="form-label px-2">Via</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="via" name="via"  value="<?php echo $azienda["via"]; ?>" />
      </div>
<label for="numero_civico" class="form-label px-2">Numero Civico</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="numero_civico" name="numero_civico"  value="<?php echo $azienda["numero_civico"]; ?>" />
      </div>
<label for="citta" class="form-label px-2">Citta</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="text" id="citta" name="citta"  value="<?php echo $azienda["citta"]; ?>" />
      </div>
<label for="cap" class="form-label px-2">CAP</label><br>
      <div class="mx-2 pb-3">
            <input class="form-control" type="number" id="cap" name="cap"  value="<?php echo $azienda["cap"]; ?>" />
      </div>
     
<?php else: ?>
<input type="hidden" name="nome_azienda" value="<?php echo $azienda["nome_azienda"]?>" />
<?php endif; ?>