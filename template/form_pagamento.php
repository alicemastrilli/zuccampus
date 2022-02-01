<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="stylesheet" type="text/css" href="./css/venditore.css" /> 
   
    </head>
    <section>
       <div class="row">
       <a class="col-3" onclick="goBack()">
         <img src="<?php echo UPLOAD_DIR?>freccia.png" alt="freccia indietro">
       </a>
        </div>
        
            <?php if(!empty( $templateParams["pagamento"])):?>
                <?php foreach($templateParams["pagamento"] as $pagamento):?>
                <article class="rounded mx-2">
            <h3 class="pt-2 px-2 text-center">Carta di credito salvata</h3>
            <div class="mb-3 mt-3">
                <label for="nome" class="form-label px-2">Nome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="nome" value="<?php echo $pagamento["nome"]; ?>" name="nome" readonly>
                </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cognome" value="<?php echo $pagamento["cognome"]; ?>" name="cognome" readonly>
                </div>
              <label for="numero_carta" class="form-label px-2 ">Numero carta:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="numero_carta" value="<?php echo $pagamento["numero_carta"]; ?>" name="numero_carta" readonly>
                </div>
                <label for="cvv" class="form-label px-2 ">Cvv:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cvv" value="<?php echo $pagamento["cvv"]; ?>" name="cvv" readonly>
                </div>
                <div class="row">
                <label for="mese_scadenza" class="form-label mx-2  col-5">Mese scadenza:</label>
                <label for="anno_scadenza" class="form-label mx-2 align-content-end  col-5">Anno scadenza:</label><br>
                <div class="mx-2 pb-3 col-5">
                   <input  type="text" class="form-control col-2" id="mese_scadenza" value="<?php echo $pagamento["mese_scadenza"]; ?>" name="mese_scadenza" readonly>
                </div>
                <div class="mx-2 pb-3 col-5">
                   <input  type="text" class="form-control " id="anno_scadenza" value="<?php echo $pagamento["anno_scadenza"]; ?>" name="anno_scadenza" readonly>
                </div>
            </div>
              </div>
            </article>
              <?php endforeach;?>
              <?php else: ?>
                <p class="text-center bg-light">Non è salvata alcuna carta di credito!</p>
            <?php endif;?>
        
                
        <!--TODO: gestisci registrazione chiamando il giusto form e inserendo una nuova carta di credito-->
        <?php if( isUserLoggedIn()): ?>
        <form action="gestisci_registrazione.php?action=1" class="text-center pb-2" method="post">
            <button class="rounded p-4"  name="modifica">Modifica metodo di pagamento</button>
         </form>
         <form action="salva_pagamento.php" class="text-center pb-2" method="post">
            <button class="rounded p-4"  name="acquista">Ac</button>
         </form>

         <?php endif;?>
    </section>