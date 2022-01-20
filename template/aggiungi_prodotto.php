<form action="salva_prodotto.php" method="POST" enctype="multipart/form-data">
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
                        <button class="rounded p-1" type="button" name="Inserisci immgine prodotto" >Inserisci immagine prodotto</button>
                    </form>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <!--gestire per ogni input l'inserimento di una nuova riga nel database-->
                <!--Aggiungere il prezzo, il peso e la disponibilita' 
                    Caricare il nome dell'azienda da session-->
                <label for="nome_zucca">Nome zucca:</label>
                <input type="text" id="nome_zucca" name="nome_zucca" value="" />               
                <div class="col-sm-0">
                    <label for="tipo" class="form-label px-2 ">Tipo zucca:</label>
                   
                    <select name="tipo" id="tipo">
                     <option value="zucca_commestibile">Zucca commestibile</option>
                     <option value="zucca_ornamentale">Zucca ornamentale</option>
                    </select>
                    
                </div>
            </div>
            <label for="descrizione_zucca" class="form-label px-2">Descrizione:</label><br>
                <div class="mx-2 pb-3">
                    <!--controllare il placeholder della textarea-->
                   <textarea class="form-control" rows="5" id="descrizione_zucca" 
                   name="descrizione_zucca"> </textarea>
                </div>
              </div>
        </article>
        </div>
        
        <div class="pb-3 text-center">
            <input type="submit" name="submit" value="Salva prodotto" />
        </div>
    </section>
</form>