-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue Dec 21 15:18:04 2021 
-- * LUN file: C:\Users\alice\OneDrive\Desktop\progetto tec web\ZUCCAMPUS.lun 
-- * Schema: SCHEMA/1 
-- ********************************************* 


-- Database Section
-- ________________ 

CREATE SCHEMA IF NOT EXISTS `zuccampus` DEFAULT CHARACTER SET utf8 ;
USE `zuccampus` ;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table AGRICOLTORE (
     username varchar(30) not null,
     nome_azienda char(30) not null,
     constraint FKUTE_AGR_ID primary key (username),
     constraint FKpossedere_ID unique (nome_azienda));

create table AZIENDA (
     via char(20) not null,
     numero_civico numeric(3) not null,
     cap numeric(5) not null,
     nome_app char(15) not null,
     nome_azienda char(30) not null,
     email char(30) not null,
     descrizione_azienda char(150),
     qualita char(100),
     constraint ID_AZIENDA_ID primary key (nome_app),
     constraint FKsede_ID unique (via, numero_civico, cap));

create table AZIENDA_AGRICOLA (
     nome_azienda char(30) not null,
     via char(20) not null,
     numero_civico numeric(3) not null,
     cap numeric(5) not null,
     descrizione char(150),
     constraint ID_AZIENDA_AGRICOLA_ID primary key (nome_azienda),
     constraint FKrisiede_ID unique (via, numero_civico, cap));

create table CARTA_DI_CREDITO (
     cvv numeric(3) not null,
     nome char(10) not null,
     numero_carta numeric(16) not null,
     mese_scadenza numeric(2) not null,
     anno_scadenza numeric(4) not null,
     cognome char(20) not null,
     username varchar(30) not null,
     constraint ID_CARTA_DI_CREDITO_ID primary key (numero_carta));

create table CLIENTE (
     username varchar(30) not null,
     matricola numeric(10),
     constraint FKUTE_CLI_ID primary key (username));

create table comprende (
     username varchar(30) not null,
     data date not null,
     ora time(6) not null,
     nome_azienda char(30) not null,
     nome_zucca char(20) not null,
     quantita numeric(3) not null,
     constraint ID_comprende_ID primary key (nome_azienda, nome_zucca, username, data, ora));

create table INDIRIZZO (
     via char(20) not null,
     numero_civico numeric(3) not null,
     citta char(20) not null,
     cap numeric(5) not null,
     constraint ID_INDIRIZZO_ID primary key (via, numero_civico, cap));

create table link (
     nome_app char(15) not null,
     link char(30) not null,
     logo varchar(30),
     constraint ID_link_ID primary key (nome_app, link));

create table MESSAGGIO (
     username varchar(30) not null,
     testo char(250) not null,
     data date not null,
     ora time(6) not null,
     tag_letto char,
     constraint ID_MESSAGGIO_ID primary key (username, data, ora));

create table ORDINE (
     username varchar(30) not null,
     data_ordine date not null,
     ora time(6) not null,
     via char(20) not null,
     numero_civico numeric(3) not null,
     cap numeric(5) not null,
     constraint ID_ORDINE_ID primary key (username, data_ordine, ora));

create table RECENSIONE (
     idRecensione numeric(5) not null,
     descrizione char(250),
     punteggio numeric(5) not null,
     nome_azienda char(30) not null,
     nome_zucca char(20) not null,
     username varchar(30) not null,
     constraint ID_RECENSIONE_ID primary key (idRecensione));

create table UTENTE (
     immagine varchar(30),
     num_telefono numeric(14) not null,
     email char(30) not null,
     username varchar(30) not null,
     password varchar(15) not null,
     nome char(20) not null,
     cognome char(20) not null,
     CLIENTE varchar(30),
     AGRICOLTORE varchar(30),
     constraint ID_UTENTE_ID primary key (username));

create table ZUCCA (
     nome_azienda char(30) not null,
     nome_zucca char(20) not null,
     tipo char(25) not null,
     immagine varchar(30),
     prezzo numeric(3) not null,
     peso numeric(4) not null,
     disponibilita numeric(3) not null,
     descrizione_zucca char(250),
     constraint ID_ZUCCA_ID primary key (nome_azienda, nome_zucca));


-- Constraints Section
-- ___________________ 

alter table AGRICOLTORE add constraint FKUTE_AGR_FK
     foreign key (`username`)
     references `zuccampus`.`UTENTE` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table AGRICOLTORE add constraint FKpossedere_FK
     foreign key (`nome_azienda`)
     references `zuccampus`.`AZIENDA_AGRICOLA` (`nome_azienda`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table AZIENDA add constraint FKsede_FK
     foreign key (`via`, `numero_civico`, `cap`)
     references `zuccampus`.`INDIRIZZO` (`via`, `numero_civico`, `cap`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;; 

alter table AZIENDA_AGRICOLA add constraint ID_AZIENDA_AGRICOLA_CHK
     check(exists(select * from AGRICOLTORE
                  where AGRICOLTORE.nome_azienda = nome_azienda)); 

alter table AZIENDA_AGRICOLA add constraint FKrisiede_FK
     foreign key (`via`, `numero_civico`, `cap`)
     references `zuccampus`.`INDIRIZZO` (`via`, `numero_civico`, `cap`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;;

alter table CARTA_DI_CREDITO add constraint FKpossiede_FK
     foreign key (`username`)
     references `zuccampus`.`UTENTE` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table CLIENTE add constraint FKUTE_CLI_FK
     foreign key (`username`)
     references `zuccampus`.`UTENTE` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table comprende add constraint FKcom_ZUC
     foreign key (`nome_azienda`, `nome_zucca`)
     references `zuccampus`.`ZUCCA` (`nome_azienda`, `nome_zucca`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table comprende add constraint FKcom_ORD_FK
     foreign key (`username`, `data`, `ora`)
     references `zuccampus`.`ORDINE` (`username`, `data_ordine`, `ora`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table INDIRIZZO add constraint ID_INDIRIZZO_CHK
     check(exists(select * from AZIENDA_AGRICOLA
                  where AZIENDA_AGRICOLA.via = via and AZIENDA_AGRICOLA.numero_civico = numero_civico and AZIENDA_AGRICOLA.cap = cap)); 

alter table INDIRIZZO add constraint ID_INDIRIZZO_CHK
     check(exists(select * from AZIENDA
                  where AZIENDA.via = via and AZIENDA.numero_civico = numero_civico and AZIENDA.cap = cap)); 


alter table link add constraint FKAZI_lin
     foreign key (`nome_app`)
     references `zuccampus`.`AZIENDA` (`nome_app`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table MESSAGGIO add constraint FKricevere
     foreign key (`username`)
     references `zuccampus`.`UTENTE` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table ORDINE add constraint FKritiro_FK
     foreign key (`via`, `numero_civico`, `cap`)
     references `zuccampus`.`INDIRIZZO` (`via`, `numero_civico`, `cap`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table ORDINE add constraint FKeffettua
     foreign key (`username`)
     references `zuccampus`.`CLIENTE` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table RECENSIONE add constraint FKvalutazione_FK
     foreign key (`nome_azienda`, `nome_zucca`)
     references `zuccampus`.`ZUCCA` (`nome_azienda`, `nome_zucca`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table RECENSIONE add constraint FKvaluta_FK
     foreign key (`username`)
     references `zuccampus`.`CLIENTE` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;

alter table UTENTE add constraint EXTONE_UTENTE
     check((CLIENTE is not null and AGRICOLTORE is null)
           or (CLIENTE is null and AGRICOLTORE is not null)); 

alter table ZUCCA add constraint FKvende
     foreign key (`nome_azienda`)
     references `zuccampus`.`AZIENDA_AGRICOLA` (`nome_azienda`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION;


-- Index Section
-- _____________ 

create unique index FKUTE_AGR_IND
     on AGRICOLTORE (username);

create unique index FKpossedere_IND
     on AGRICOLTORE (nome_azienda);

create unique index ID_AZIENDA_IND
     on AZIENDA (nome_app);

create unique index ID_AZIENDA_AGRICOLA_IND
     on AZIENDA_AGRICOLA (nome_azienda);

create unique index FKrisiede_IND
     on AZIENDA_AGRICOLA (via, numero_civico, cap);
create unique index FKsede_IND
     on AZIENDA (via, numero_civico, cap);

create unique index ID_CARTA_DI_CREDITO_IND
     on CARTA_DI_CREDITO (numero_carta);

create index FKpossiede_IND
     on CARTA_DI_CREDITO (username);

create unique index FKUTE_CLI_IND
     on CLIENTE (username);

create unique index ID_comprende_IND
     on comprende (nome_azienda, nome_zucca, username, data, ora);

create index FKcom_ORD_IND
     on comprende (username, data, ora);

create unique index ID_INDIRIZZO_IND
     on INDIRIZZO (via, numero_civico, cap);


create unique index ID_link_IND
     on link (nome_app, link);

create unique index ID_MESSAGGIO_IND
     on MESSAGGIO (username, data, ora);

create unique index ID_ORDINE_IND
     on ORDINE (username, data_ordine, ora);

create index FKritiro_IND
     on ORDINE (via, numero_civico, cap);

create unique index ID_RECENSIONE_IND
     on RECENSIONE (idRecensione);

create index FKvalutazione_IND
     on RECENSIONE (nome_azienda, nome_zucca);

create index FKvaluta_IND
     on RECENSIONE (username);

create unique index ID_UTENTE_IND
     on UTENTE (username);

create unique index ID_ZUCCA_IND
     on ZUCCA (nome_azienda, nome_zucca);

