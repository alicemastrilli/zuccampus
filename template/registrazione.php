<!DOCTYPE html>
<html lang="it">
<?php 
$utente = $templateParams["utente"] ;
?>
<form action="salva_registrazione.php" method="POST" enctype="multipart/form-data">
  <head>
        <link rel="stylesheet" type="text/css" href="./css/venditore.css" /> 
  </head>
  <section>
    <div class="row">
      <div class="col-12 p-3 text-center ">
         <!--correggere la tondita' della foto profilo di default--> 
        <img src="./icons/utente_generico.jpg" class="round-circle max" 
        alt="foto profilo default"/>
        <div class="pb-1 text-center">
        <form  action="#" method="get">
            <button class="rounded p-1" type="button" name="Inserisci foto profilo" >Inserisci foto profilo</button>
        </form>
        </div>
      </div>
    </div>
    <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Informazioni di base</h3>
              <div class="mb-3 mt-3">
                <!--gestire per ogni input l'inserimento di una nuova riga nel database-->
                <!--inserire anche matricola facoltativa -->
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
                <div class="mx-2 pb-3">
                  <input type="checkbox" id="studente" name="studente" value=true/><label for="studente">Studente</label>
                </div>
                <div class="mx-2 pb-3">
                  <input type="checkbox" id="Professore" name="Professore" value=true/><label for="Professore">Professore</label>
                </div>
                <div class="mx-2 pb-3">
                  <input type="checkbox" id="altro" name="altro " value=true/><label for="altro">Altro</label>
                </div>
                <!--gestire la matricola solo se se studente e' checkatore  -->
                <label for="matricola" class="form-label px-2 ">Matricola:</label><br>
                <div class="mx-2 pb-3">
                  <input type="text" id="matricola" name="matricola" value="" />
                </div>
              </div>
        </article>
        <article class="rounded mx-2">
            <?php if($_GET["action"]==2){
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
        
          <input type="submit" name="submit" value="registrati" />
  
        </div>
       
  </section>

</form>