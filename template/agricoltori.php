<article>
        <table class="table table-striped">
            <tbody>
                <?php foreach($templateParams["aziende_agricole"] as $azienda):?>
                <tr>
                <td class="col-9">
                    <h3><?php echo $azienda["nome_azienda"]; ?> </h3>
                    <h5>di <?php echo $azienda["nome"]; ?> <?php echo $azienda["cognome"]; ?></h5>
                    <p><?php echo $azienda["descrizione"]; ?></p>
                    <div class="row">
                        <div class="col-6 text-center"> 
                            <button class="rounded" type="button">
                            <a class=" text-decoration-none text-dark" href="#">Scopri i prodotti</a>
                            </button>
                        </div>
                        <div class="col-6 text-center">
                            <button class="rounded " type="button">
                            <a class=" text-decoration-none text-dark" href="#">Scopri il venditore</a>
                            </button>
                            </div>
                    </div>
                </td>
                <td class="col-3 p-2">
                    <img class="float-end" src="../icons/mario.jpg" alt="">
                </td>
                </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </article>