<!DOCTYPE html>
<html lang="it">
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
                <label for="nome" class="form-label px-2">Nome:</label><br>
                <div class="mx-2 pb-3">
                   <input class="form-control" type="text" id="nome" name="nome" placeholder="Inserisci nome">
                </div>
                <label for="cognome" class="form-label px-2 ">Cognome:</label><br>
                <div class="mx-2 pb-3">
                   <input class="form-control" type="text" id="cognome" name="cognome" placeholder="Inserisci cognome">
                </div>
                <!--gestire l'azienda agricola solo se e' un agricoltore-->
                <label for="azienda_agricola" class="form-label px-2">Azienda agricola:</label><br>
                <div class="mx-2 pb-3">
                   <input class="form-control" type="text" class="form-control " id="azienda_agricola" 
                    name="azienda_agricola" placeholder="Inserisci il nome della tua azienda agricola">
                </div>
                <label for="descrizione_azienda_agricola" class="form-label px-2">Descrizione Azienda agricola:</label><br>
                <div class="mx-2 pb-3">
                   <textarea class="form-control" rows="5" id="descrizione_azienda_agricola" 
                   name="descrizione_azienda_agricola" placeholder="Inserisci descrizione azienda agricola"> </textarea>
                </div>
              </div>
        </article>
        <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Indirizzo dell'azienda agricola</h3>
            <div class="mb-3 mt-3">
                <label for="indirizzo" class="form-label px-2">Indirizzo:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="indirizzo"  name="indirizzo" placeholder="Inserisci indirizzo">
                </div>
                <label for="città" class="form-label px-2">Città:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="text" class="form-control " id="città" name="città" placeholder="Inserisci citta'">
                </div>
                <label for="cap" class="form-label px-2">Cap:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="form-control " id="cap"  name="cap"  placeholder="Inserisci cap'">
                </div>
              </div>
        </article>
        <article class="rounded mx-2">
            <h3 class="pt-2 px-2">Informazioni di contatto</h3>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label px-2">Email:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="email" class="form-control " id="email"  name="email"  placeholder="Inserisci email">
                </div>
                <label for="num_telefono" class="form-label px-2">Numero telefonico:</label><br>
                <div class="mx-2 pb-3">
                   <input  type="number" class="form-control " id="num_telefono" name="numero_telefono"  placeholder="Inserisci numero di telefono">
                </div>
                
              </div>
        </article>
        <div class="pb-3 text-center">
        <form  action="#" method="get">
            <button class="rounded p-2" type="button" name="Submit" >Registrati</button>
        </form>
        </div>
    </section>