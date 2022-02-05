<?php 
  $azione = $templateParams["azione"];
  $utente = $templateParams["utente"];
  $immagine = $templateParams["immagine"];
  $form_azione = "#";

?>
<form action="<?php echo $form_azione?>" method="POST" enctype="multipart/form-data">
  <head>
        <link rel="stylesheet" type="text/css" href="./css/venditore.css" /> 
     
  </head>
  <section>
    <div class="row">
      <div class="col-12 p-3 text-center ">
        <!--sistemare l'immagine-->
         <img src="<?php echo UPLOAD_DIR.$immagine?>" class="round-circle max" 
        alt="foto profilo default"/>
        <div class="pb-1 text-center">
          <input type="file" name="immagine" id="immagine" />
        </div>
      </div>
    </div>
    <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Informazioni di base</h3>
              <div class="mb-3 mt-3">
                <label for="nome" class="form-label px-2">Nome:</label><br>
                  <div class="mx-2 pb-3">
                     <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $utente["nome"]; ?>" />
                  </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                  <div class="mx-2 pb-3">
                     <input type="text" id="cognome" name="cognome" value="<?php echo $utente["cognome"]; ?>" />
                  </div>
                <label for="username" class="form-label px-2 ">Username:</label><br>
                  <div class="mx-2 pb-3">
                     <input type="text" id="username" name="username" value="<?php echo $utente["username"]; ?>" />
                  </div>
                <label for="password" class="form-label px-2 ">Password:</label><br>
                <div class="mx-2 pb-3">
                  <input type="text" id="password" name="password" value="<?php echo $utente["password"]; ?>" />
                </div>
                <?php if($_SESSION["agricoltore"] == 0): ?>
                  <form>
                    <div class="mx-2 pb-3">
                      <input type="radio" id="tipo_cliente" name="tipo_cliente" value=studente/><label for="studente">Studente</label>
                    </div>
                    <div class="mx-2 pb-3">
                      <input type="radio" id="tipo_cliente" name="tipo_cliente" value=professore/><label for="Professore">Professore</label>
                    </div>
                    <div class="mx-2 pb-3">
                      <input type="radio" id="tipo_cliente" name="tipo_cliente" value=altro/><label for="altro">Altro</label>
                    </div>
                  <!--  TODO: visualizzare la matricola solo se studente e' checkato  -->
                  <?php if($_POST['tipo_cliente'] == "studente"):?>
                    <label for="matricola" class="form-label px-2 ">Matricola:</label><br>
                    <div class="mx-2 pb-3">
                      <input type="text" id="matricola" name="matricola" value="<?php echo $utente["password"]; ?>" />
                    </div>
                  <?php endif; ?>
                  </form>
                <?php endif; ?>
              </div>
                
              
        </article>
        <article class="rounded mx-2">
            <?php if($_SESSION["agricoltore"] == 1){
                  require($templateParams["registrazione_agricoltore"]);
               }
            ?>
        </article>
        <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Informazioni di contatto</h3>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label px-2">Email:</label><br>
                <div class="mx-2 pb-3">
                  <input type="text" id="email" name="email" value="<?php echo $utente["email"]; ?>" />
                  </div>
                <label for="num_telefono" class="form-label px-2">Numero telefonico:</label><br>
                <div class="mx-2 pb-3">
                     <input type="text" id="num_telefono" name="num_telefono" value="<?php echo $utente["num_telefono"]; ?>" />
                  </div>
                
            </div>
        </article>
        <div class="pb-3 text-center">
        
        <input type="submit" name="submit" value="<?php echo $azione?>">

        <input type="hidden" name="action" value="<?php echo $azione?>"/>
        
       
  </section>
  <input type="hidden" name="oldimg" value="<?php echo $immagine?>" />
</form>
<?php
if(isset($_POST['submit'])){
  if(empty($_FILES["immagine"]["tmp_name"])){
      echo '<div class="alert alert-warning">Aggiungi un\'immagine!</div>';
  }
  else{
    $form_azione = "./salva_registrazione.php";
    require_once("./salva_registrazione.php");
  }
}
?>
