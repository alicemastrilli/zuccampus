function aggiornaProdottiVenditore(zucche) {
    let result = "";

    for (let i = 0; i < zucche.length; i++) {
        let articolo = `
        <tr>                   
            <td class="col-9">
                <h3>${zucche[i]["nome_zucca"]}</h3>
                <h5>${zucche[i]["tipo"]}</h5>
                <p>Quantità disponibile:${zucche[i]["disponibilita"]}</p>
                <div class="row">
                    <div class="col-6 text-center">
                        <form  action="info_prodotto_venditore.php?id=${zucche[i]["nome_zucca"]}" method="post">
                            <button class="rounded">Visualizza Prodotto</button>
                        </form>
                    </div>
                    <div class="col-6 text-center">
                        <button class="rounded " type="button" onclick="deleteElement('<?php echo $prodotto["nome_azienda"]; ?>','<?php echo $prodotto["nome_zucca"]; ?>')">Elimina il Prodotto</button>                   
                    </div>
                </div>
            </td>
            <td class="col-3 p-2">
                <img class="float-end" src="./icons/${zucche[i]["immagine"]}" alt="" />
            </td>
        </tr>
        `;
        result += articolo;
    }
    return result;
}

function aggiorna_recensioni(recensioni) {
    let result = "";
    for (let i = 0; i < recensioni.length; i++) {
        let articolo = `
        <div class="row recensioni-da-eliminare">
            <div class="col sm-0">
                <p>${recensioni[i]["descrizione"]}</p>
                <p>${recensioni[i]["username"]}</p>
            </div>
            <p>Non ci sono recensioni</p>
        </div>
        <hr>
        `;
        result += articolo;
    }
    return result;
}

function generaZucche(zucche) {
    let result = "";

    for (let i = 0; i < zucche.length; i++) {
        let articolo = `
        <div class="row da-sostituire">
            <div class="col-sm-0">
                <div class="text-center">
                    <h2>${zucche[i]["nome_zucca"]}</h2>
                    <p>${zucche[i]["tipo"]}</p>
                    <img src="./icons/${zucche[i]["immagine"]}" width="200" alt="" />
                    <p>€ ${zucche[i]["prezzo"]}</p>
                    <form  action="info_prodotti.php" method="post">
                        <button class="acquista mb-2">Acquista</button>
                        <input type="hidden" name="nome_azienda" value="${zucche[i]["nome_azienda"]}">
                        <input type="hidden" name="nome_zucca" value="${zucche[i]["nome_zucca"]}">
                    </form>
                </div>
            </div>
        </div>
        `;
        result += articolo;
    }
    return result;
}

function generaZuccheProduttoreSelezionato(zucche) {
    let result = "";
    for (let i = 0; i < zucche.length; i++) {
        let articolo = `
        <div class="row da-sostituire" >
            <div class="col sm-0 text-center">
                <div class="text-center m-2">
                    <a>${zucche[i]["descrizione_zucca"]}</a>
                </div>
                <p>€${zucche[i]["prezzo"]}</p>
                <input type="hidden" name="prezzo" value="${zucche[i]["prezzo"]}">
                <p>${zucche[i]["peso"]} kg </p>
                <input type="hidden" name="peso" value="${zucche[i]["peso"]}">
                <label for="quantity">Quantità:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="${zucche[i]["disponibilita"]}"><br><br>
                <p>${zucche[i]["disponibilita"]} pezzi </p>
                <div class="text-center m-2">
                    <input type="submit" name="submit" class="aggiungi-al-carrello" value="Aggiungi al Carrello" />                
                </div>
            </div>
        </div> 
        `;
        result += articolo;
    }
    return result;
}

function ordinaPerPrezzo(tipo_ordine, isFarmer) {
    $.ajax({
        url: "ordina_elementi.php",
        data: "tipo_ordine=" + tipo_ordine,
        type: "get",
        success: function(response) {
            let zucche = generaZucche(response);
            $(".da-sostituire").html("");
            const main = $("main");
            main.append(zucche);
        }
    });
}

function ordina_categoria(tipo) {
    $.ajax({
        url: "filtra_categoria.php",
        data: "tipo=" + tipo,
        type: "get",
        success: function(response) {
            let zucche = generaZucche(response);
            $(".da-sostituire").html("");
            const main = $("main");
            main.append(zucche);
        }
    });
}

function filtra_prodotti_agricoltore(nome_azienda) {
    $.ajax({
        url: "ordina_prodotti_produttori.php",
        data: "nome_azienda=" + nome_azienda,
        type: "get",
        success: function(response) {
            let zucche = generaZucche(response);
            $(".da-sostituire").html("");
            const main = $("main");
            main.append(zucche);
        }
    });
}

function seleziona_fornitore(nome_azienda, nome_zucca) {
    $.ajax({
        url: "seleziona_prodotto_fornitore.php",
        data: 'nome_azienda=' + nome_azienda + '&nome_zucca=' + nome_zucca,
        type: "get",
        success: function(response) {
            let zucche = generaZuccheProduttoreSelezionato(response);
            $(".da-sostituire").html("");
            $(".recensioni-da-eliminare").html("");
            const main = $(".per-appendere");
            main.append(zucche);
        }
    });
}

function aggiorna_recensioni(nome_azienda, nome_zucca) {
    $.ajax({
        url: "seleziona_recensioni_prodotto.php",
        data: 'nome_azienda=' + nome_azienda + '&nome_zucca=' + nome_zucca,
        type: "get",
        success: function(response) {
            let recensioni = aggiorna_recensioni(response);
            $(".recensioni-da-eliminare").html("");
            const main = $(".appendino");
            main.append(recensioni);
        }
    });
}