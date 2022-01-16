INSERT INTO `indirizzo` (`via`, `numero_civico`, `citta`, `cap`) VALUES 
('via dei Fiori', '45', 'Cesena', '40013'),
('via Canale', '9', 'Forlimpopoli', '40023'),
('via del Campo', '14', 'Cesena', '40013'),
('via dell''Università', '50', 'Cesena', '40013');

INSERT INTO `azienda` (`via`, `numero_civico`, `cap`, `nome_app`, `nome_azienda`, `email`, `descrizione_azienda`, `qualita`) VALUES 
('via dell\'Università', '50', '40013', 'ZUCCAMPUS', 'zuccampus.srl', 'zuccampus@gmail.com', 'Zuccampus è l\'app che cerchi per i tuoi ordini! ', 'Massima qualità!');

INSERT INTO `azienda_agricola` (`nome_azienda`, `via`, `numero_civico`, `cap`, `descrizione`) VALUES 
('La fattoria di Mario', 'via Canale', '9', '40023', 'Mario e la sua famiglia si prendono cura delle loro zucche da generazioni.\r\n\"Onestà e qualità sono le mie parole d''ordine!\" '),
('Gigi e le sue zucche', 'via dei Fiori', '45', '40013', 'Gigi ha un unico grande amore: le sue zucche!\r\n\Talmente grande che fa ingelosire la moglie, e tutti i vicini!\r\nNel gusto troverai la sua passione'),
('La gioia di Marta', 'via del Campo', '14', '40013', 'Marta cura le sue zucche come se fossero sue figlie!\r\nAssapora l''amore!');

INSERT INTO `utente` (`immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`) VALUES 
('mario.png', '92746', 'mario@gmail.com', 'MarioRossi', 'mario_71', 'Mario', 'Rossi'),
('marta.jpeg', '92345', 'marta@gmail.com', 'MartaGioia', 'Marta_81', 'Marta', 'Creti'),
('gigi.jpeg', '92476', 'gigi@gmail.com', 'Gigiiii', 'Gigetto', 'Gigi', 'Carlino');

INSERT INTO `utente` (`immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`) VALUES
(NULL, '3395872', 'alessia.gentili@studio.unibo.it', 'GentiAle', 'GentiAle', 'Alessia', 'Gentili'),
('fotoprofilo.jpeg', '3357263485', 'francesco.verdi@studio.unibo.it', 'Verdi', 'FraVe', 'Francesco', 'Verdi'),
('', '3319558', 'f.carletti@unibo.it', 'ProfCarletti', 'SonoBello', 'Federico', 'Carletti');

INSERT INTO `cliente` (`username`, `matricola`) VALUES 
('GentiAle', '910004625'),
('Verdi', '890005787'),
('ProfCarletti', NULL);

INSERT INTO `carta_di_credito` (`cvv`, `nome`, `numero_carta`, `mese_scadenza`, `anno_scadenza`, `cognome`, `username`) VALUES 
('876', 'Alessia', '1234567890123456', '12', '22', 'Gentili', 'GentiAle'),
('345', 'Francesco', '987665432175663', '03', '23', 'Verdi', 'Verdi');

INSERT INTO `zucca` (`nome_azienda`, `nome_zucca`, `tipo`, `immagine`, `prezzo`, `peso`, `disponibilita`, `descrizione_zucca`) VALUES 
('Gigi e le sue zucche', 'Zucca Delica', 'commestibile', 'zuccadelica.jpeg', '4.50', '1.5', '4', 'Zucca tondeggiante, con la buccia vedere scuro e la polpa arancione. Si caratterizza per un sapore dolciastro e la consistenza di una castagna cotta'),
('La fattoria di Mario', 'Zucca di Chioggia', 'commestibile', 'zuccadichioggia.jpeg', '5.50', '3', '8', 'Inconfondibile per la sua scorza bitorzoluta, dal verde scuro al verde ramato e per la forma particolarmente schiacchiata. Ha una polpa molto saporita e adatta alla preparazione di gnocchi, ripieni e risotti'),
('La gioia di Marta', 'Zucca Tonda Padana', 'commestibile', 'zuccatondapadana.png', '6.60', '4', '9', 'La si riconosce per le striature pronunciate, la forma tondeggiante ed il robusto peduncolo legnoso. La polpa è arancione e soda, adatta a ripieni e mostarde');

INSERT INTO `recensione` (`idRecensione`, `descrizione`, `punteggio`, `nome_azienda`, `nome_zucca`, `username`) VALUES 
('12345', 'Buonissima!', '5', 'Gigi e le sue zucche', 'Zucca Delica', 'GentiAle'),
('98765', 'Meglio mangiarla cotta!', '4', 'La fattoria di Mario', 'Zucca di Chioggia', 'Verdi');

INSERT INTO `ordine` (`id_ordine`,`username`, `data_ordine`, `ora`, `via`, `numero_civico`, `cap`) VALUES 
(1,'GentiAle', '2021-12-01', '11:53:05.000000', 'via dell''Università', '50', '40013'),
(2,'Verdi', '2021-12-12', '12:37:28.000000', 'via dell''Università', '50', '40013'),
(3,'ProfCarletti', '2021-11-30', '17:28:32.000000', 'via dell''Università', '50', '40013'),
(4, 'GentiAle', '2022-01-11', '17:45:00', 'via dell''Università', '50', '40013'),
(5, 'ProfCarletti', '2022-01-16', '14:07', 'via Canale', '9', '40023');

INSERT INTO `link` (`nome_app`, `link`, `logo`) VALUES 
('ZUCCAMPUS', 'www.facebook.com/zuccampus', 'logofacebook.png'),
('ZUCCAMPUS', 'www.instagram.com/zuccampus', 'logoinstagram.png');

INSERT INTO `messaggio` (`username`, `testo`, `data`, `ora`, `tag_letto`) VALUES 
('GentiAle', 'Zucca consegnata', '2021-12-05', '11:10:30.000000', NULL),
('Verdi', 'Zucca in arrivo', '2021-12-15', '11:10:30.000000', NULL);

INSERT INTO `comprende` (`id_ordine`, `nome_azienda`, `nome_zucca`, `quantita`) VALUES 
(1, 'Gigi e le sue zucche', 'Zucca Delica', '2'),
(2, 'La fattoria di Mario', 'Zucca di Chioggia', '1'),
(3, 'La gioia di Marta', 'Zucca Tonda Padana', '3'),
(4, 'La fattoria di Mario', 'Zucca di Chioggia', '5'),
(5, 'La fattoria di Mario', 'Zucca di Chioggia', '2');

INSERT INTO `agricoltore` (`username`, `nome_azienda`) VALUES 
('MarioRossi', 'La fattoria di Mario'),
('MartaGioia', 'La gioia di Marta'),
('Gigiiii', 'Gigi e le sue zucche');
