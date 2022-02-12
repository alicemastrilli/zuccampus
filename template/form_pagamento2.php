<!DOCTYPE html>
<html lang="it">
<head>
       <script  src="./js/jquery-3.4.1.min.js"></script> 
        <script  src="./js/form_pagamento.js"></script> 
  </head>

<?php 
$azione = $templateParams["azione"];
$num_cc = 1;
?>

    <div class="row">
        <a class="col-3" onclick="goBack()">
            <img class="freccia" src="<?php echo UPLOAD_DIR?>freccia.png" alt="freccia indietro">
        </a>
    </div>
    
  
  <form action="salva_cc.php?action=<?php echo $azione?>" class="text-center pb-2"method="POST" enctype="multipart/form-data">
    <?php foreach($templateParams["pagamento"] as $pagamento):?>
        <article class="rounded mx-2">
        <?php if($azione != "Modifica" && $azione != "Inserisci"):?>
            <div>
                <?php if(isset($_SESSION["acquista"]) && $_SESSION["acquista"]==1):?>
                    <input type="radio" id="selezione" name="selezione" required  value="<?php echo $num_cc?>" <?php if ($num_cc == 1){ echo "checked";}?>/>
                    <label>Selezione questa carta di credito</label>
                <?php endif;?>
            </div>
            <?php endif;?>
            <h3 class="pt-2 px-2 text-center">Carta di credito</h3>
            <div class="mb-3 mt-3">
                <label for="nome" class="form-label px-2">Nome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="nome" required value="<?php echo $pagamento["nome"]; ?>" name="nome" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                   <span class="error" aria-live="polite"></span>

                </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cognome" required value="<?php echo $pagamento["cognome"]; ?>" name="cognome" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                   <span class="error" aria-live="polite"></span>

                </div>
                <label for="numero_carta" class="form-label px-2 ">Numero carta:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="form-control " id="numero_carta"  required value="<?php echo $pagamento["numero_carta"]; ?>" name="numero_carta" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                   <span class="error" aria-live="polite"></span>

                </div>
                <label for="cvv" class="form-label px-2 ">Cvv:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="form-control " id="cvv"  required value="<?php echo $pagamento["cvv"]; ?>" name="cvv" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                   <span class="error" aria-live="polite"></span>

                </div>
                <div class="row">
                    <label for="mese_scadenza" class="form-label mx-2  col-5">Mese scadenza:</label>
                    <label for="anno_scadenza" class="form-label mx-2 align-content-end  col-5">Anno scadenza:</label><br>
                    <div class="mx-2 pb-3 col-5">
                    <input  type="number" class="form-control col-2" id="mese_scadenza" min="1" max="12" required value="<?php echo $pagamento["mese_scadenza"]; ?>" name="mese_scadenza" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                    <span class="error" aria-live="polite"></span>
    
                </div>
                    <div class="mx-2 pb-3 col-5">
                    <input  type="number" class="form-control " id="anno_scadenza" min="2022" max="2027" step="1" required value="<?php echo $pagamento["anno_scadenza"]; ?>" name="anno_scadenza" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                    <span class="error" aria-live="polite"></span>
                </div>
                </div>
            </div>
        </article>
    <?php $num_cc += 1; endforeach;?>
    <?php if( isUserLoggedIn() && $azione == "Inserisci"): ?>
            <button id="btn" class="rounded p-4"  name="<?php echo $azione?>">Salva metodo di pagamento</button>
        </form>
    <?php else: ?>
        <form  action="./form_pagamento.php" method="post">
            <button style="visibility:hidden;" name="Inserisci" value="Inserisci" class="acquista">Modifica metodo di pagamento</button>           
        </form>  
        <form action="./form_pagamento.php" class="text-center pb-1 mb-3" method="post">
            <button name="Inserisci" value="Inserisci" class="rounded p-4" >Modifica metodo di pagamento</button>
        </form>
    <?php endif;?>
    <?php if(isset($_SESSION["acquista"]) && $_SESSION["acquista"] == 1 && $azione != "Inserisci"): ?>
        <form action="salva_pagamento.php" class="text-center pb-2" method="post">
            <button id="paga_ora" class="rounded p-4"  name="paga">Paga ora</button>
        </form>
    <?php endif; ?>




