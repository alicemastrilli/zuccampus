<!DOCTYPE html>
<html lang="it">
<head>
        <link rel="stylesheet" type="text/css" href="./css/dati_utente.css" /> 
   
    </head>
<body>
   

<?php 
if(isset($_GET["id"]) || $_SESSION["agricoltore"] == 1){
   $azienda = $templateParams["azienda_info"];
}
?>

    <section>
       <div class="row">
       <a class="col-3" onclick="goBack()">
         <img class="freccia" src="<?php echo UPLOAD_DIR?>freccia.png" alt="freccia indietro">
       </a>
        <div class="col-6 p-3 text-center ">
        <img class="fotoprofilo" src="<?php echo UPLOAD_DIR.getImageOfUser($templateParams["utente"]["immagine"]);?>" class=" rounded-circle border border-2 border-dark" 
        alt="<?php echo $templateParams["utente"]["nome"]?>"/>
        </div>
        </div>
        <h2 class="text-center"><?php echo $templateParams["utente"]["nome"]; ?> <?php echo $templateParams["utente"]["cognome"]; ?></h2>
        <h3 class="text-center"><?php echo $templateParams["utente"]["email"]; ?></h3>
            <h4 class="pt-2 px-2">Informazioni di base</h4>
            <div class="mb-3 mt-3">
                <label for="nome" class="form-label px-2">Nome:</label><br>
                <div class="mx-2">
                   <input  type="text" class="input-box" id="nome" value="<?php echo $templateParams["utente"]["nome"]; ?>" name="nome" readonly>
                </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="input-box " id="cognome" value="<?php echo $templateParams["utente"]["cognome"]; ?>" name="cognome" readonly>
                </div>
            </div>
        <!--aggiungere che si deve vedere anche se arrivo da aziende agricole -->
        <?php if ( !isUserLoggedIn() || $_SESSION["agricoltore"]==1 || isset($_GET["id"])): ?>
            <div class="mb-3 mt-3">
            <label for="azienda_agricola" class="form-label px-2">Azienda agricola:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="input-box" id="azienda_agricola" value="<?php echo $azienda["nome_azienda"]; ?>"
                    name="azienda_agricola" readonly>
                </div>
                <label for="descrizione_azienda_agricola" class="form-label px-2">Descrizione Azienda agricola:</label><br>
                <div class="mx-2 pb-3">
                   <textarea class="input-box" rows="5" id="descrizione_azienda_agricola" 
                   name="descrizione_azienda_agricola" readonly><?php echo $azienda["descrizione"]; ?> </textarea>
                </div>
                <label for="indirizzo" class="form-label px-2">Indirizzo:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="input-box" id="indirizzo" value="<?php echo $azienda["via"]; ?> <?php echo $azienda["numero_civico"]; ?>" name="indirizzo" readonly>
                </div>
                <label for="città" class="form-label px-2">Città:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="input-box" id="città" value="<?php echo $azienda["citta"]; ?>" name="città" readonly>
                </div>
                <label for="cap" class="form-label px-2">Cap:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="input-box" id="cap" value="<?php echo $azienda["cap"]; ?>" name="cap" readonly>
                </div>
              </div>
        <?php endif;?>
        <article class="rounded mx-2">
            <h4>Informazioni di contatto</h4>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label px-2">Email:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="email" class="input-box" id="email" value="<?php echo $templateParams["utente"]["email"]; ?>" name="email" readonly>
                </div>
                <label for="num_telefono" class="form-label px-2">Numero telefonico:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="input-box" id="num_telefono" value="<?php echo $templateParams["utente"]["num_telefono"]; ?>" name="numero_telefono" readonly>
                </div>
                
              </div>
        <?php if(isUserLoggedIn() && $templateParams["user_loggato"]["nome"]==$templateParams["utente"]["nome"]): ?>
         <!--passare come post lo utentename dell'utente -->
         <form class="text-center pb-2" action="gestisci_registrazione.php?action=2" method="post">
            <?php if($_SESSION["agricoltore"] == 1):?>
               <input type="hidden" name="nome_azienda" value="<?php echo $azienda["nome_azienda"]; ?>" />
               <button class="rounded p-4" name="agricoltore">Modifica profilo</button> 
            <?php else: ?>
               <button class="rounded p-4" name="cliente">Modifica profilo</button> 
            <?php endif;?>
         </form>
         <?php endif;?>
    </section>
    </body>
    </html>