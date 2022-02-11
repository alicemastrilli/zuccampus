
<!DOCTYPE html>
<html lang="it">


<head>
       <link rel="stylesheet" type="text/css" href="./css/dati_utente.css"/> 
       <script  src="./js/jquery-3.4.1.min.js"></script> 
        <script  src="./js/form_registrazione.js"></script> 
  </head>
  <body>
   
<?php 
  $azione = $templateParams["azione"];
  $utente = $templateParams["utente"];
  $immagine = $templateParams["immagine"];
?>
<form id="form" method="post"  enctype="multipart/form-data"  > 
<?php if($azione == "Modifica"):?>
  <input type="hidden" name="salva_modifica" value="1"/>
  <?php endif;?>
<?php if(isset($templateParams["errUsername"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errUsername"]?>
                </div>
              <?php endif;?>
  <script>
    
  
    function myFunction(){
      $("#matricola, #matricola_label").show();
    }
    function hide(){
      $("#matricola, #matricola_label").hide();
    }
    function hideAll($c){
      $($c).hide();
    }
    function disableUsername(){
      document.getElementById('username').disabled = true;    
    }
  </script>
  <section>
    
    <div class="row">
      <div class="col-12 p-3 text-center ">
         <img class="fotoprofilo"src="<?php echo UPLOAD_DIR.$immagine?>" class="round-circle max" alt="foto profilo default"/>
        <div class="pb-1 text-center">
          <label  for="immagine">Foto profilo:</label>
          <input type="file" name="immagine" id="immagine"/>
        </div>
      </div>
    </div>
   
    <article class="rounded mx-2">
      <h4 class="pt-2 px-2 col-12 text-center">Informazioni di base</h4>
        <div class="mb-3 mt-3">
        
        <?php foreach(fillForm() as $field):?>

          <label for=<?php echo str_replace(' ', '',  $field["text"]);?> class="form-label px-2"><?php echo ucwords($field["text"])?>:</label>
            <div class="mx-2 pb-3">
              <input class="form-control" type="<?php echo $field["type"]?>" id="<?php echo str_replace(' ', '',  $field["text"]);?>" name="<?php echo $field["text"]?>" required

              <?php if($azione=="Modifica"):?> value="<?php echo $utente[$field["text"]]; ?>" <?php endif;?>  />
                <span class="error" aria-live="polite"></span>

            </div>
          <?php endforeach;?>
          <?php if($azione=="Modifica"):?>
        <script>disableUsername();</script> 
     <?php endif; ?>
          <?php foreach(fillToHide() as $field):?>

          <label <?php if(isUserLoggedIn()){ echo "hidden";}?>  for=<?php echo str_replace(' ', '',  $field["text"]);?> class="form-label px-2"><?php echo ucwords($field["text"])?> :</label>
            <div class="mx-2 pb-3">
              <input class="form-control" type="<?php if(isUserLoggedIn()){ echo "hidden";} else{echo $field["type"];}?>" id="<?php echo str_replace(' ', '',  $field["text"]);?>" name="<?php echo $field["text"]?>" required/>
                <span class="error" aria-live="polite"></span>

            </div>
          <?php endforeach;?>
          <?php if(isset($utente["matricola"]) && $_SESSION["agricoltore"]==0 && !is_null($utente["matricola"]) ):?>
          <label for="matricola"id="matricola_label" class="form-label px-2">Matricola:</label>
            <div class="mx-2 pb-3">
              <input class="form-control" type="number" size="10" id="matricola" name="matricola" <?php if($azione=="Modifica"):?> value="<?php echo $utente["matricola"]; ?>" <?php endif;?> />
                <span class="error" aria-live="polite"></span>
              </div>
          <?php endif;?>
            <?php if($_SESSION["agricoltore"]== 0 && !isUserLoggedIn()): ?>
              <fieldset>
                <label class="mx-2">Professione:</label>
              <div class="mx-2 pb-3 tipocliente">
                <input type="radio" id="studente" name="tipo_cliente" value=studente required onchange="myFunction()"/><label for="studente">Studente</label>
              </div>
              <div class="mx-2 pb-3 tipocliente">
                <input type="radio" id="altro" name="tipo_cliente" value=altro onchange="hide()"/><label for="altro">Altro</label>
              </div>
              </fieldset>
            <?php endif; ?>
            <?php if (!isUserLoggedIn()): ?>
              <label for="matricola"id="matricola_label" class="form-label px-2">Matricola:</label>
            <div class="mx-2 pb-3">
              <input class="form-control" type="number"  id="matricola" name="matricola" <?php if($azione=="Modifica"):?> value="<?php echo $utente["matricola"]; ?>" <?php endif;?> />
                <span class="error" aria-live="polite"></span>

              </div>
            <?php endif;?>
        </div>
      </article>
      <article class="rounded mx-2">
        <?php if($_SESSION["agricoltore"] == 1):?>
          <h3> </h3>
          <?php    require($templateParams["registrazione_agricoltore"]); ?>
            
        <?php endif; ?>
      </article>
      
      <article class="rounded mx-2 mt-3">
        <h4 class="pt-2 px-2 col-12 text-center">Informazioni di contatto</h4>
        <div class="mb-3 mt-3">
          <?php foreach(contattoForm() as $field):?>
          <label for=<?php echo str_replace(' ', '',  $field["text"]);?> class="form-label px-2"><?php echo ucwords($field["text"])?>:</label>
            <div class="mx-2 pb-3">
              <input class="form-control" type="<?php echo $field["type"]?>" id="<?php echo str_replace(' ', '',  $field["text"]);?>" name="<?php echo str_replace(' ', '',  $field["text"]);?>" required
              <?php if($azione=="Modifica"):?> value="<?php echo $utente[$field["text"]]; ?>" <?php endif;?> />
                <span class="error" aria-live="polite"></span>

            </div>
          <?php endforeach;?>  
          
          <label for="num_telefono" class="form-label px-2">Numero di telefono:</label>
            <div class="mx-2 pb-3">
              <input class="form-control" type="number" id="numeroditelefono" name="num_telefono" required
              <?php if($azione=="Modifica"):?> value="<?php echo $utente["num_telefono"]; ?>" <?php endif;?> />
                <span class="error" aria-live="polite"></span>

            </div>
        </div>
    </article>  
      <div class="pb-3 text-center button">
        
        <input id="submit" type="submit" name="submit" value="<?php echo $azione?>"/>
        <input type="hidden" name="action" value="<?php echo $azione?>"/>
      </div>
  <input type="hidden" name="oldimg" value="<?php echo $immagine?>" />
</form>
</section>
</body>
</html>