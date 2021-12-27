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

INSERT INTO `utente` (`immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`, `CLIENTE`, `AGRICOLTORE`) VALUES 
('mario.png', '92746', 'mario@gmail.com', 'MarioRossi', 'mario_71', 'Mario', 'Rossi', NULL, ''),
('marta.jpeg', '92345', 'marta@gmail.com', 'MartaGioia', 'Marta_81', 'Marta', 'Creti', NULL, ''),
('gigi.jpeg', '92476', 'gigi@gmail.com', 'Gigiiii', 'Gigetto', 'Gigi', 'Carlino', NULL, '');