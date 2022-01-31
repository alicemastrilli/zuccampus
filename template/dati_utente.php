<?php 

$azienda = $templateParams["azienda_info"];
?>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/venditore.css" /> 
   
    </head>
    <section>
       <div class="row">
       <a class="col-3" onclick="goBack()">
         <img src="<?php echo UPLOAD_DIR?>freccia.png" alt="freccia indietro">
       </a>
        <div class="col-6 p-3 text-center ">
        <img src="<?php echo UPLOAD_DIR.getImageOfUser($templateParams["user"]["immagine"]);?>" class=" rounded-circle border border-2 border-dark" 
        alt="<?php echo $templateParams["user"]["nome"]?>"/>
        </div>
        </div>
        <h3 class="text-center"><?php echo $templateParams["user"]["nome"]; ?> <?php echo $templateParams["user"]["cognome"]; ?></h3>
        <h5 class="text-center"><?php echo $templateParams["user"]["email"]; ?></h5>
        <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Informazioni di base</h3>
            <div class="mb-3 mt-3">
                <label for="nome" class="form-label px-2">Nome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="nome" value="<?php echo $templateParams["user"]["nome"]; ?>" name="nome" readonly>
                </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cognome" value="<?php echo $templateParams["user"]["cognome"]; ?>" name="cognome" readonly>
                </div>
                <!-- TODO: gestire la matricola
              <?php //if (isset($templateParams["matricola"]) && $templateParams["matricola"]!= ""): ?>
              <label for="matricola" class="form-label px-2 ">Matricola:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="cognome" value="<?php //echo $templateParams["matricola"]; ?>" name="matricola" readonly>
                </div>
                <?php //endif; ?>
              -->
              </div>
        </article>
        <!--perche' l'utente deve essere loggato?-->
        <?php if ( !isUserLoggedIn() || $_SESSION["agricoltore"]==1): ?>
        <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Azienda Agricola</h3>
            <div class="mb-3 mt-3">
            <label for="azienda_agricola" class="form-label px-2">Azienda agricola:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="azienda_agricola" value="<?php echo $azienda["nome_azienda"]; ?>"
                    name="azienda_agricola" readonly>
                </div>
                <label for="descrizione_azienda_agricola" class="form-label px-2">Descrizione Azienda agricola:</label><br>
                <div class="mx-2 pb-3">
                   <textarea class="form-control" rows="5" id="descrizione_azienda_agricola" 
                   name="descrizione_azienda_agricola" readonly><?php echo $azienda["descrizione"]; ?> </textarea>
                </div>
                <label for="indirizzo" class="form-label px-2">Indirizzo:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="indirizzo" value="<?php echo $azienda["via"]; ?> <?php echo $azienda["numero_civico"]; ?>" name="indirizzo" readonly>
                </div>
                <label for="città" class="form-label px-2">Città:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="città" value="<?php echo $azienda["citta"]; ?>" name="città" readonly>
                </div>
                <label for="cap" class="form-label px-2">Cap:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="form-control " id="cap" value="<?php echo $azienda["cap"]; ?>" name="cap" readonly>
                </div>
              </div>
        </article>
        <?php endif;?>
        <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Informazioni di contatto</h3>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label px-2">Email:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="email" class="form-control " id="email" value="<?php echo $templateParams["user"]["email"]; ?>" name="email" readonly>
                </div>
                <label for="num_telefono" class="form-label px-2">Numero telefonico:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="form-control " id="num_telefono" value="<?php echo $templateParams["user"]["num_telefono"]; ?>" name="numero_telefono" readonly>
                </div>
                
              </div>
        </article>
        <?php if(isUserLoggedIn() && $templateParams["user_loggato"]["nome"]==$templateParams["user"]["nome"]): ?>
         <!--passare come post lo username dell'utente -->
         <form class="text-center pb-2" action="gestisci_registrazione.php?action=2" method="post">
            <input type="hidden" name="nome_azienda" value="<?php echo $azienda["nome_azienda"]; ?>" />
            <button class="rounded p-4" name="agricoltore">Modifica profilo</button>    
         </form>
         <?php endif;?>
    </section>