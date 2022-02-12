INSERT INTO `indirizzo` (`via`, `numero_civico`, `citta`, `cap`) VALUES 
('via dei Fiori', '45', 'Cesena', '47521'),
('via Canale', '9', 'Forlimpopoli', '40023'),
('via del Campo', '14', 'Cesena', '47521'),
('via dell''Università', '50', 'Cesena', '47521');

INSERT INTO `azienda` (`via`, `numero_civico`, `cap`, `nome_app`, `nome_azienda`, `email`, `descrizione_azienda`, `qualita`) VALUES 
('via dell\'Università', '50', '47521', 'Zuccampus', 'zuccampus.srl', 'zuccampus@gmail.com', 'Zuccampus è l\'app che cerchi per i tuoi ordini! ', 'Massima qualità!');

INSERT INTO `azienda_agricola` (`nome_azienda`, `via`, `numero_civico`, `cap`, `descrizione`) VALUES 
('La fattoria di Mario', 'via Canale', '9', '40023', 'Mario e la sua famiglia si prendono cura delle loro zucche da generazioni.\r\n\"Onestà e qualità sono le mie parole d''ordine!\" '),
('Gigi e le sue zucche', 'via dei Fiori', '45', '47521', 'Gigi ha un unico grande amore: le sue zucche!\r\n\Talmente grande che fa ingelosire la moglie, e tutti i vicini!\r\nNel gusto troverai la sua passione'),
('La gioia di Marta', 'via del Campo', '14', '47521', 'Marta cura le sue zucche come se fossero sue figlie!\r\nAssapora l''amore!');

INSERT INTO `utente` (`immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`,`CLIENTE`,`AGRICOLTORE`) VALUES 
('mario.png', '3333208475', 'mario@gmail.com', 'MarioRossi', 'mario_71', 'Mario', 'Rossi',0,1),
('marta.jpeg', '3457859375', 'marta@gmail.com', 'MartaGioia', 'Marta_81', 'Marta', 'Creti',0,1),
('gigi.jpeg', '3204558694', 'gigi@gmail.com', 'Gigiiii', 'Gigetto', 'Gigi', 'Carlino',0,1);

INSERT INTO `utente` (`immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`,`CLIENTE`,`AGRICOLTORE`) VALUES
('Alessia.jpg', '3903208899', 'alessia.gentili@studio.unibo.it', 'GentiAle', 'GentiAle', 'Alessia', 'Gentili',1,0),
('Federico.jpg', '3353217788', 'francesco.verdi@studio.unibo.it', 'Verdi', 'FraVe', 'Francesco', 'Verdi',1,0),
('ProfCarletti.jpg', '3313459090', 'f.carletti@unibo.it', 'ProfCarletti', 'SonoBello', 'Federico', 'Carletti',1,0);

INSERT INTO `cliente` (`username`, `matricola`) VALUES 
('GentiAle', '910004625'),
('Verdi', '890005787'),
('ProfCarletti', NULL);

INSERT INTO `carta_di_credito` (`cvv`, `nome`, `numero_carta`, `mese_scadenza`, `anno_scadenza`, `cognome`, `username`) VALUES 
('876', 'Alessia', '1234567890123456', '12', '22', 'Gentili', 'GentiAle'),
('345', 'Francesco', '987665432175663', '03', '23', 'Verdi', 'Verdi');

INSERT INTO `zucca` (`nome_azienda`, `nome_zucca`, `tipo`, `immagine`, `prezzo`, `peso`, `disponibilita`, `descrizione_zucca`) VALUES 
('Gigi e le sue zucche', 'Zucca Delica', 'commestibile', 'zuccaDelica.png', '4.50', '1.5', '4', 'Zucca tondeggiante, con la buccia vedere scuro e la polpa arancione. Si caratterizza per un sapore dolciastro e la consistenza di una castagna cotta'),
('La fattoria di Mario', 'Zucca di Chioggia', 'commestibile', 'zuccaDiChioggia.png', '5.50', '3', '8', 'Inconfondibile per la sua scorza bitorzoluta, dal verde scuro al verde ramato e per la forma particolarmente schiacchiata. Ha una polpa molto saporita e adatta alla preparazione di gnocchi, ripieni e risotti'),
('La gioia di Marta', 'Zucca Delica', 'commestibile', 'zuccaDelica.png', '9.99', '1.5', '6', 'Zucca tondeggiante, con la buccia vedere scuro e la polpa arancione. Si caratterizza per un sapore dolciastro e la consistenza di una castagna cotta'),
('La gioia di Marta', 'Zucca Tonda Padana', 'commestibile', 'zuccatondapadana.png', '6.60', '4', '9', 'La si riconosce per le striature pronunciate, la forma tondeggiante ed il robusto peduncolo legnoso. La polpa è arancione e soda, adatta a ripieni e mostarde');

INSERT INTO `zucca` (`nome_azienda`, `nome_zucca`, `tipo`, `immagine`, `prezzo`, `peso`, `disponibilita`, `descrizione_zucca`) VALUES ('La fattoria di Mario', 'Zucca Cigno', 'ornamentale', 'zuccaCigno.jpg', '7', '1,5', '9', 'Ottima zucca per decorare e abbellire i vostri pranzi autunnali!');
INSERT INTO `zucca` (`nome_azienda`, `nome_zucca`, `tipo`, `immagine`, `prezzo`, `peso`, `disponibilita`, `descrizione_zucca`) VALUES ('Gigi e le sue zucche', 'Zucca Birillo', 'ornamentale', 'zuccaBirillo.jpg', '6.90', '2', '8', "Aggiungi un po\' di vibe autunnale alla tua casa con queste originali zucche!");
INSERT INTO `recensione` (`idRecensione`, `descrizione`, `punteggio`, `nome_azienda`, `nome_zucca`, `username`,`data`) VALUES 
(1, 'Buonissima!', '5', 'Gigi e le sue zucche', 'Zucca Delica', 'GentiAle', '2021-12-12'),
(2, 'Meglio mangiarla cotta!', '4', 'La fattoria di Mario', 'Zucca di Chioggia', 'Verdi','2022-01-14'),
(3, 'Molto buona! Complimenti Gigi, la passione che hai nei confronti delle zucche è insuperabile!',4,'Gigi e le sue zucche', 'Zucca Delica','GentiAle','2022-02-12'),
(4, 'Non sapevo proprio cosa regalare alla mia ragazza per San Valentino, poi ho scoperto Mario e la mia giornata è svoltata!',5,'La fattoria di Mario', 'Zucca di Chioggia','ProfCarletti','2022-02-12');


INSERT INTO `ordine` (`id_ordine`,`username`, `data_ordine`, `ora`, `via`, `numero_civico`, `cap`) VALUES 
(1,'GentiAle', '2021-12-01', '11:53:05.000000', 'via dell''Università', '50', '47521'),
(2,'Verdi', '2021-12-12', '12:37:28.000000', 'via dell''Università', '50', '47521'),
(3,'ProfCarletti', '2022-02-12', '13:56:28.000000', 'via dell''Università', '50', '47521'),
(4, 'Verdi', '2022-02-12', '14:56:24.000000', 'via dell''Università', '50', '47521'),
(6, 'GentiAle', '2022-01-19', '17:45:00', 'via dell''Università', '50', '47521'),
(7, 'GentiAle', '2022-01-17', '17:45:00', 'via dell''Università', '50', '47521'),
(8, 'Verdi','2022-02-12','15:01:32.000000','via dell''Università', '50', '47521');


INSERT INTO `link` (`nome_app`, `link`, `logo`) VALUES 
('ZUCCAMPUS', 'www.facebook.com/zuccampus', 'logofacebook.png'),
('ZUCCAMPUS', 'www.instagram.com/zuccampus', 'logoinstagram.png');

INSERT INTO `messaggio` (`id_messaggio`,`username`, `testo`, `data`, `ora`,`link`, `tag_letto`) VALUES 
(1,'ProfCarletti', 'Gentile ProfCarletti il suo ordine è andato a buon fine.', '2022-02-06', '13:22:30.000000','', 1),
(2,'Gigiiii', 'Gentile agricoltore, la sua Zucca Birillo è in esaurimento! ', '2022-02-12', '13:56:00.00000','', 0),
(3,'Gigiiii', 'La sua azienda agricola ha ricevuto un nuovo ordine da parte di: ProfCarletti', '2022-02-12', '13:56:28.00000','ordine.php?id=3', 0),
(4,'Gigiiii', "L'ordine di ProfCarletti arriverà in giornata!", '2022-02-15', '13:56:28.00000','ordine.php?id=3', 0),
(5,'ProfCarletti', "Gentile ProfCarletti il suo ordine arriverà in giornata", '2022-02-15', '13:56:28.00000','ordine.php?id=3', 0),
(6,'MarioRossi', "La sua azienda agricola ha ricevuto un nuovo ordine da parte di: Verdi", '2022-02-12', '14:56:24.000000','ordine.php?id=4', 0),
(7,'Verdi', "Gentile Verdi il suo ordine è andato a buon fine.", '2022-02-12', '14:56:24.000000','ordine.php?id=4', 0),
(8,'MarioRossi', "L'ordine di Verdi arriverà in giornata!", '2022-02-15', '14:56:24.000000','ordine.php?id=4', 0),
(9,'Verdi', "Gentile Verdi il suo ordine arriverà in giornata.", '2022-02-15', '14:56:24.000000','ordine.php?id=4', 0),
(10, 'MarioRossi',"Gentile agricoltore, la sua Zucca Cigno è in esaurimento!", '2022-02-12','15:01:00.000000','',0 ),
(11, 'MarioRossi',"La sua azienda agricola ha ricevuto un nuovo ordine da parte di: Verdi", '2022-02-12','15:01:32.000000','ordine.php?id=8',0 ),
(12, 'Verdi',"Gentile Verdi il suo ordine è andato a buon fine.", '2022-02-12','15:01:32.000000','ordine.php?id=8',0 ),
(13, 'MarioRossi',"L'ordine di Verdi arriverà in giornata!", '2022-02-15','15:01:32.000000','ordine.php?id=8',0 ),
(14, 'Verdi',"Gentile Verdi il suo ordine arriverà in giornata", '2022-02-15','15:01:32.000000','ordine.php?id=8',0 ),
(15, 'Gigiiii','Il cliente GentiAle ha lasciato una nuova recensione!','2022-02-12','15:37:00.000000', 'lista_recensioni.php',0 ),
(16, 'GentiAle', 'Gentile GentiAle la sua recensione è stata salvata!','2022-02-12','15:37:00.000000','lista_recensioni.php',0 ),
(17, 'MarioRossi','Il cliente ProfCarletti ha lasciato una nuova recensione!','2022-02-12','15:50:00.000000', 'lista_recensioni.php',0 ),
(18, 'ProfCarletti', 'Gentile ProfCarletti, la sua recensione è stata salvata!','2022-02-12','15:50:00.000000','lista_recensioni.php',0 );






INSERT INTO `comprende` (`id_ordine`, `nome_azienda`, `nome_zucca`, `quantita`) VALUES 
(1, 'Gigi e le sue zucche', 'Zucca Delica', '2'),
(2, 'La fattoria di Mario', 'Zucca di Chioggia', '1'),
(3, 'Gigi e le sue zucche', 'Zucca Birillo', '7'),
(4, 'La fattoria di Mario', 'Zucca Cigno', '2'),
(5, 'La fattoria di Mario', 'Zucca di Chioggia', '2'),
(6, 'La fattoria di Mario', 'Zucca di Chioggia', '5'),
(7, 'La fattoria di Mario', 'Zucca di Chioggia', '5'),
(8, 'La fattoria di Mario', 'Zucca Cigno', '1');
    
INSERT INTO `agricoltore` (`username`, `nome_azienda`) VALUES 
('MarioRossi', 'La fattoria di Mario'),
('MartaGioia', 'La gioia di Marta'),
('Gigiiii', 'Gigi e le sue zucche');
