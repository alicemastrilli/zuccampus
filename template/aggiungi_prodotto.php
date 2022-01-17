<!DOCTYPE html>
<html lang="it">
    <head>
        
    </head>
    <section>
        <div class="row text-center">
            <h3 class=" px-2">Aggiungi un nuovo prodotto al tuo negozio</h3>
        </div>
        <div class="row text-center">
        <article class="rounded mx-2">
            <div class="col-12 p-3 text-center ">
                <!--correggere la tondita' della foto profilo di default-->
                <img src="./icons/utente_generico.jpg" alt="foto profilo default"/>
                <div class="pb-1 text-center">
                    <form  action="#" method="get">
                        <button class="rounded p-1" type="button" name="Inserisci imamgine prodotto" >Inserisci immagine prodotto</button>
                    </form>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <!--gestire per ogni input l'inserimento di una nuova riga nel database-->
                <label for="nome zucca" class="form-label px-2">Nome zucca:</label><br>
                <div class="mx-2 pb-3">
                   <input class="form-control" type="text" id="nome" name="nome zucca" placeholder="Inserisci nome zucca">
                </div>
                <!--Categoria far scegliere da una tendina-->
                <label for="categoria" class="form-label px-2 ">Categoria:</label><br>
                <div class="col-sm-0">
                    <form action="/action_page.php">
                    <select name="Tipo zucca" id="Tipo Zucca">
                     <option value="zucca_commestibile">Zucca commestibile</option>
                     <option value="zucca_ornamentale">Zucca ornamentale</option>
                    </select>
                    </form>
                </div>
                </div>
                <label for="descrizione_zucca" class="form-label px-2">Descrizione:</label><br>
                <div class="mx-2 pb-3">
                    <!--controllare il placeholder della textarea-->
                   <textarea class="form-control" rows="5" id="descrizione_zucca" 
                   name="descrizione_azienda_agricola" placeholder="Inserisci descrizione azienda agricola"> </textarea>
                </div>
              </div>
        </article>
        </div>
        
        <div class="pb-3 text-center">
        <form  action="#" method="get">
            <button class="rounded p-2" type="button" name="Salva" >Salva prodotto</button>
        </form>
        </div>
    </section>