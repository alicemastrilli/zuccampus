function generaZucche(zucche) {
    let result = "";

    for (let i = 0; i < zucche.length; i++) {
        let articolo = `
        <div class="row" id="div1">
            <div class="col-sm-0">
                <div class="text-center">
                    <h2>${zucche[i]["nome_zucca"]}</h2>
                    <p>${zucche[i]["tipo"]}</p>
                    <img src="./icons/${zucche[i]["immagine"]}" alt="" style="width: 200px;" />
                    <p>€ ${zucche[i]["prezzo"]}</p>
                    <form  action="info_prodotti.php?id=${zucche[i]["nome_zucca"]}" method="post">
                        <button class="rounded">Acquista</button>
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

function ordina(tipo_ordine) {
    $.ajax({
        url: "ordina_elementi.php",
        data: "tipo_ordine=" + tipo_ordine,
        type: "get",
        success: function(response) {
            let zucche = generaZucche(response);
            $("div#div1").html("");
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
            $("div#div1").html("");
            const main = $("main");
            main.append(zucche);
        }
    });
}

function ordina_prodotti(nome_azienda) {
    $.ajax({
        url: "ordina_prodotti_produttori.php",
        data: "nome_azienda=" + nome_azienda,
        type: "get",
        success: function(response) {
            let zucche = generaZucche(response);
            $("div#div1").html("");
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