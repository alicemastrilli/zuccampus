<?php 
  $azione = $templateParams["azione"];
  $utente = $templateParams["utente"];
  $immagine = $templateParams["immagine"];
?>
<form method="post" enctype="multipart/form-data"> 
  <head>
        <link rel="stylesheet" type="text/css" href="./css/venditore.css" /> 
        <script src="js/jquery-3.4.1.min.js" ></script>

  </head>
  <script>
    $(document).ready(function(){
      $("#matricola, #matricola_label").hide();
    })
    function myFunction(){
      $("#matricola, #matricola_label").show();
    }
    function hide(){
      $("#matricola, #matricola_label").hide();

    }
  </script>
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
              <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."nome"?>
                </div>
              <?php endif;?>
            </div>
          <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
            <div class="mx-2 pb-3">
              <input type="text" id="cognome" name="cognome" value="<?php echo $utente["cognome"]; ?>" />
              <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."cognome"?>
                </div>
              <?php endif;?>
            </div>
          <label for="username" class="form-label px-2 ">Username:</label><br>
            <div class="mx-2 pb-3">
              <input type="text" id="username" name="username" value="<?php echo $utente["username"]; ?>" />
              <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."username"?>
                </div>
              <?php endif;?>
              <?php if(isset($templateParams["errUsername"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errUsername"]?>
                </div>
              <?php endif;?>
            </div>
          <label for="password" class="form-label px-2 ">Password:</label><br>
          <div class="mx-2 pb-3">
            <input type="text" id="password" name="password" value="<?php echo $utente["password"]; ?>" />
              <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."password"?>
                </div>
              <?php endif;?>
          </div>  
          <label for="password" class="form-label px-2 ">Inserisci nuovamente la password:</label><br>
          <div class="mx-2 pb-3">
            <input type="text" id="password" name="password" value="<?php echo $utente["password"]; ?>" />
              <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."password"?>
                </div>
              <?php endif;?>
          </div> 
            <?php if($_SESSION["agricoltore"] == 0): ?>
              <div class="mx-2 pb-3">
                <input type="radio" id="studente" name="tipo_cliente" value=studente onchange="myFunction()"/><label for="studente">Studente</label>
              </div>
              <div class="mx-2 pb-3">
                <input type="radio" id="professore" name="tipo_cliente" value=professore onchange="hide()"/><label for="Professore">Professore</label>
              </div>
              <div class="mx-2 pb-3">
                <input type="radio" id="altro" name="tipo_cliente" value=altro onchange="hide()"/><label for="altro">Altro</label>
              </div>
            <?php endif; ?>
            <?php if (!isUserLoggedIn()): ?>
            <label for="matricola" id="matricola_label" class="form-label px-2 ">Matricola:</label><br>
              <div class="mx-2 pb-3">
                <input type="text" id="matricola" name="matricola" value="<?php echo $utente["password"]; ?>" />
              </div>
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
            <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."email"?>
                </div>
            <?php endif;?>
          </div>
          <label for="num_telefono" class="form-label px-2">Numero telefonico:</label><br>
          <div class="mx-2 pb-3">
              <input type="text" id="num_telefono" name="num_telefono" value="<?php echo $utente["num_telefono"]; ?>" />
              <?php if(isset($templateParams["errore"])):?>
                <div class="alert alert-warning text-center">
                  <strong>Attenzione!</strong> <?php echo $templateParams["errore"]."numero di telefono"?>
                </div>
              <?php endif;?>
          </div>       
        </div>
      </article>
      <div class="pb-3 text-center">
        <input type="submit" name="submit" value="<?php echo $azione?>">
        <input type="hidden" name="action" value="<?php echo $azione?>"/>
      </div>
  </section>
  <input type="hidden" name="oldimg" value="<?php echo $immagine?>" />
</form>

