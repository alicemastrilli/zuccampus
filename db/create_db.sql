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
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `zuccampus` DEFAULT CHARACTER SET utf8 ;
USE `zuccampus` ;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 


create table if not exists `zuccampus`.`indirizzo` (
     `via` char(20) not null,
     `numero_civico` numeric(3) not null,
     `citta` char(20) not null,
     `cap` numeric(5) not null,
     constraint ID_INDIRIZZO_ID primary key (via, numero_civico, cap));

create table if not exists `zuccampus`.`azienda` (
     `via` char(20) not null,
     `numero_civico` numeric(3) not null,
     `cap` numeric(5) not null,
     `nome_app` char(15) not null,
     `nome_azienda` char(30) not null,
     `email` char(40) not null,
     `descrizione_azienda` char(150),
     `qualita` char(100),
    constraint ID_AZIENDA_ID primary key (nome_app),
     constraint `FKsede_ID`
     foreign key (`via`, `numero_civico`, `cap`)
     references `zuccampus`.`indirizzo` (`via`, `numero_civico`, `cap`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION);

create table if not exists `zuccampus`.`azienda_agricola` (
     `nome_azienda` char(30) not null,
     `via` char(20) not null,
     `numero_civico` numeric(3) not null,
     `cap` numeric(5) not null,
     `descrizione` char(150),
      constraint ID_AZIENDA_AGRICOLA_ID primary key (nome_azienda),
     constraint `FKrisiede_FK`
     foreign key (`via`, `numero_civico`, `cap`)
     references `zuccampus`.`indirizzo` (`via`, `numero_civico`, `cap`)
     ON DELETE CASCADE
    ON UPDATE CASCADE)
     ENGINE = InnoDB;

create table if not exists `zuccampus`.`utente` (
     `immagine` varchar(50),
     `num_telefono` numeric(14) not null,
     `email` char(40) not null,
     `username` varchar(30) not null,
     `password` varchar(15) not null,
     `nome` char(20) not null,
     `cognome` char(20) not null,
     `CLIENTE` int(1),
     `AGRICOLTORE` int(1),
       constraint ID_UTENTE_ID primary key (username))
     ENGINE = InnoDB;

create table if not exists `zuccampus`.`carta_di_credito` (
     `cvv` numeric(3) not null,
     `nome` char(10) not null,
     `numero_carta` numeric(16) not null,
     `mese_scadenza` numeric(2) not null,
     `anno_scadenza` numeric(4) not null,
     `cognome` char(20) not null,
     `username` varchar(30) not null,
     constraint ID_CARTA_DI_CREDITO_ID primary key (numero_carta),
      constraint `FKpossiede_FK`
       foreign key (`username`)
     references `zuccampus`.`utente` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION)

     ENGINE = InnoDB;

create table if not exists `zuccampus`.`cliente` (
     `username` varchar(30) not null,
     `matricola` numeric(10),
      constraint FKUTE_CLI_ID primary key (username),
     constraint `FKUTE_CLI_ID`
     foreign key (`username`)
     references `zuccampus`.`utente` (`username`)
     ON DELETE CASCADE
    ON UPDATE CASCADE)
    ENGINE = InnoDB;

create table if not exists `zuccampus`.`ordine` (
     `id_ordine` INT NOT NULL AUTO_INCREMENT,
     `username` varchar(30) not null,
     `data_ordine` date not null,
     `ora` time(6) not null,
     `via` char(20) not null,
     `numero_civico` numeric(3) not null,
     `cap` numeric(5) not null,
     primary key (`id_ordine`),
     constraint `FKritiro_FK`
     foreign key (`via`, `numero_civico`, `cap`)
     references `zuccampus`.`indirizzo` (`via`, `numero_civico`, `cap`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    constraint `FKeffettua`
     foreign key (`username`)
     references `zuccampus`.`cliente` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION)
     ENGINE = InnoDB;

create table if not exists `zuccampus`.`zucca` (
     `nome_azienda` char(30) not null,
     `nome_zucca` char(20) not null,
     `tipo` char(25) not null,
     `immagine` varchar(30),
     `prezzo` decimal(3,2) not null,
     `peso` decimal(3,2) not null,
     `disponibilita` numeric(3) not null,
     `descrizione_zucca` char(250),
  constraint ID_ZUCCA_ID primary key (nome_azienda, nome_zucca),
     constraint `FKvende`
     foreign key (`nome_azienda`)
     references `zuccampus`.`AZIENDA_AGRICOLA` (`nome_azienda`)
     ON DELETE CASCADE
    ON UPDATE CASCADE)
    ENGINE = InnoDB;
    
create table if not exists `zuccampus`.`comprende` (
     `id_ordine`INT NOT NULL,
     `nome_azienda` char(30) not null,
     `nome_zucca` char(20) not null,
     `quantita` numeric(3) not null,
     
      
     constraint `FKcom_ZUC`
     foreign key (`nome_azienda`, `nome_zucca`)
     references `zuccampus`.`zucca` (`nome_azienda`, `nome_zucca`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


create table if not exists `zuccampus`.`link` (
     `nome_app` char(15) not null,
     `link` char(30) not null,
     `logo` varchar(30),
     constraint ID_link_ID primary key (nome_app, link),
     constraint `FKAZI_lin`
     foreign key (`nome_app`)
     references `zuccampus`.`azienda` (`nome_app`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;

create table if not exists `zuccampus`.`messaggio` (
     `id_messaggio` INT NOT NULL AUTO_INCREMENT,
     `username` varchar(30) not null,
     `testo` char(250) not null,
     `data` date not null,
     `ora` time(6) not null,
     `link` char(250) not null,
     `tag_letto` int(1),
     constraint ID_MESSAGGIO_ID primary key (`id_messaggio`),
     constraint `FKricevere`
     foreign key (`username`)
     references `zuccampus`.`utente` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION)
     ENGINE = InnoDB;
     

create table if not exists `zuccampus`.`recensione` (
     `idRecensione` INT NOT NULL AUTO_INCREMENT,
     `descrizione` char(250),
     `punteggio` numeric(5) not null,
     `nome_azienda` char(30) not null,
     `nome_zucca` char(20) not null,
     `username` varchar(30) not null,
     `data` date not null,
  constraint ID_RECENSIONE_ID primary key (idRecensione),
      constraint `FKvalutazione_FK`
     foreign key (`nome_azienda`, `nome_zucca`)
     references `zuccampus`.`zucca` (`nome_azienda`, `nome_zucca`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION,
      constraint `FKvaluta_FK`
     foreign key (`username`)
     references `zuccampus`.`cliente` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION)
     ENGINE = InnoDB;


create table if not exists `zuccampus`.`agricoltore` (
     `username` varchar(30) not null,
     `nome_azienda` char(30) not null,
      constraint `FKUTE_AGR_ID` primary key (`username`),
      constraint `FKpossedere_ID`
      foreign key (`username`)
     references `zuccampus`.`utente` (`username`)
     ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    constraint `FKUTE_AGR_FK`
    foreign key (`nome_azienda`)
     references `zuccampus`.`azienda_agricola` (`nome_azienda`)
     ON DELETE CASCADE
    ON UPDATE CASCADE);
   


create unique index `FKUTE_AGR_IND`
     on `zuccampus`.`agricoltore` (`username`);

create unique index `FKpossedere_IND`
     on `zuccampus`.`agricoltore` (`nome_azienda`);


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



create index FKcom_ORD_IND
     on comprende (id_ordine);

create unique index ID_INDIRIZZO_IND
     on INDIRIZZO (via, numero_civico, cap);


create unique index ID_link_IND
     on link (nome_app, link);

create unique index ID_MESSAGGIO_IND
     on MESSAGGIO (id_messaggio);

create unique index ID_ORDINE_IND
     on ORDINE (id_ordine);

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
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
