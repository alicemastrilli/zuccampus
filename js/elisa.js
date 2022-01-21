function AggiornaProdottiVenditore(zucche) {
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

function generaRecensioni(recensioni) {
    let result = "";
    for (let i = 0; i < recensioni.length; i++) {
        let articolo = `
        <div class="row recensioni-da-eliminare">
            <div class="col sm-0">
                <div class="star-rating text-center" id="div-star">
                    for(let k=0; k < parseInt(${recensioni[i]["punteggio"]}); k++){
                        <img class="rounded" src="./icons/star.png" alt="" />
                    }
                </div>
                <p>${recensioni[i]["descrizione"]}</p>
                <p>${recensioni[i]["username"]}</p>
            </div>
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
                    <img src="./icons/${zucche[i]["immagine"]}" alt="" style="width: 200px;" />
                    <p>€ ${zucche[i]["prezzo"]}</p>
                    <form  action="info_prodotti.php?id=${zucche[i]["nome_zucca"]}" method="post">
                        <button class="acquista">Acquista</button>
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
        <div class="row" id="div1">
            <div class="col sm-0 text-center">
                <div class="text-center">
                    <a>${zucche[i]["descrizione_zucca"]}</a>
                </div>
                <p> €${zucche[i]["prezzo"]}</p>
                <p>${zucche[i]["peso"]} kg </p>
                <form>
                    <label for="quantity">Quantità:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="${zucche[i]["disponibilita"]}"><br><br>
                </form>
                <p>${zucche[i]["disponibilita"]} pezzi </p>
                <div class="text-center">
                    <button class="btn btn-primary">Aggiungi al carrello</button>
                </div>
            </div>
        </div> 
        `;
        result += articolo;
    }
    return result;
}

function ordinaPerPrezzo(tipo_ordine) {
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
            $("div#div1").html("");
            const main = $("main");
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
            let recensioni = generaRecensioni(response);
            $(".recensioni-da-eliminare").html("");
            const main = $("main");
            main.append(recensioni);
        }
    });
}