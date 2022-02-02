<?php 
$azione = $templateParams["azione"];
if(!empty($templateParams["pagamento"])){
   $pagamento = $templateParams["pagamento"];
}
else{
   $pagamento = getEmptyPagamento();
}
?>
    
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
                <?php foreach($pagamento):?>
                <article class="rounded mx-2">
            <h3 class="pt-2 px-2 text-center">Carta di credito salvata</h3>
            <div class="mb-3 mt-3">
                <label for="nome" class="form-label px-2">Nome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="nome" value="<?php echo $pagamento["nome"]; ?>" name="nome" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cognome" value="<?php echo $pagamento["cognome"]; ?>" name="cognome" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                </div>
              <label for="numero_carta" class="form-label px-2 ">Numero carta:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="numero_carta" value="<?php echo $pagamento["numero_carta"]; ?>" name="numero_carta" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                </div>
                <label for="cvv" class="form-label px-2 ">Cvv:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cvv" value="<?php echo $pagamento["cvv"]; ?>" name="cvv" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                </div>
                <div class="row">
                <label for="mese_scadenza" class="form-label mx-2  col-5">Mese scadenza:</label>
                <label for="anno_scadenza" class="form-label mx-2 align-content-end  col-5">Anno scadenza:</label><br>
                <div class="mx-2 pb-3 col-5">
                   <input  type="text" class="form-control col-2" id="mese_scadenza" value="<?php echo $pagamento["mese_scadenza"]; ?>" name="mese_scadenza" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                </div>
                <div class="mx-2 pb-3 col-5">
                   <input  type="text" class="form-control " id="anno_scadenza" value="<?php echo $pagamento["anno_scadenza"]; ?>" name="anno_scadenza" <?php if ($azione == "Visualizza"){ echo "readonly"; }?>>
                </div>
            </div>
              </div>
            </article>
              <?php endforeach;?>
              <?php else: ?>
                <p class="text-center bg-light">Non è salvata alcuna carta di credito!</p>
                  <?php if( isUserLoggedIn()): ?>
                     <form action="form_pagamento.php?action=1" class="text-center pb-2" method="post">
                        <?php $azione = 1?>
                         <button class="rounded p-4"  name="inserisci">Inserisci metodo di pagamento</button>
                     </form>
                  <?php endif;?>
               <?php endif;?>
        
                
        <!--TODO: gestisci registrazione chiamando il giusto form e inserendo una nuova carta di credito-->
        <?php if( isUserLoggedIn()): ?>
            <?php if(isset($_GET["action"]) && $_GET["action"]=="acquista"):?>
               <?php if($azione != 1):?>
                  <form action="form_pagamento.php?action=2" class="text-center pb-2" method="post">
                     <?php $azione = 2?>
                        <button class="rounded p-4"  name="modifica">Modifica metodo di pagamento</button>
                  </form>
                  <form action="salva_pagamento.php" class="text-center pb-2" method="post">
                     <button class="rounded p-4"  name="acquista">Acquista</button>
                  </form>
               <?php endif;?>
            
            <?php else: ?>
               <form action="salva_carta.php?action=<?php echo $azione?>" class="text-center pb-2" method="post">
                  <button class="rounded p-4"  name="acquista">Salva</button>
               </form>
               <?php endif;?>
         <?php endif;?>
    </section>