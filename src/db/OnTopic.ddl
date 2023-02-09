-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jan 18 16:44:05 2023 
-- * LUN file: C:\Users\fraca\Documents\Università\3º\Tecnologie Web\Progetto\TecnologieWeb.lun 
-- * Schema: SCHEMA_LOGICO_MAN/1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database ONTOPIC;
use ONTOPIC;


-- Tables Section
-- _____________ 

create table COMMENTO (
     id int not null auto_increment,
     DataOra timestamp default CURRENT_TIMESTAMP not null,
     Testo varchar(255),
     Immagine varchar(255),
     idUtente int not null,
     idPost int not null,
     constraint IDCOMMENTO primary key (id));

create table MI_PIACE (
     idPost int not null,
     idUtente int not null);

create table NOTIFICA (
     id int not null auto_increment,
     Tipo varchar(255) not null,
     Testo varchar(255) not null,
     idPost int,
     idUtenteInvio int not null,
     idUtenteRiceve int not null,
     constraint IDNOTIFICA primary key (id));

create table POST (
     id int not null auto_increment,
     DataOra timestamp default CURRENT_TIMESTAMP not null,
     Testo varchar(255),
     Immagine varchar(255),
     MiPiace int default 0 not null,
     Commenti int default 0 not null,
     Segnalazioni int default 0 not null,
     Abilitato boolean default true not null,
     idTema int not null,
     idUtente int not null,
     constraint IDPost primary key (id));

create table SEGUI (
     id int not null auto_increment,
     idSeguito int not null,
     idSeguace int not null,
     constraint IDSegui primary key (id));

create table TEMA (
     id int not null auto_increment,
     Data date not null,
     Nome varchar(255) not null,
     constraint IDTema primary key (id));

create table UTENTE (
     id int not null auto_increment,
     Nome varchar(255) not null,
     Cognome varchar(255) not null,
     Username varchar(255) not null,
     Email varchar(255) not null,
     Password varchar(255) not null,
     Sale varchar(255) not null,
     ImgProfilo varchar(255),
     constraint IDUser primary key (id),
     constraint IDUser_1 unique (Username));

CREATE TABLE login_attempts (
  user_id INT(11) NOT NULL,
  time VARCHAR(30) NOT NULL 
);


-- Constraints Section
-- ___________________ 

alter table COMMENTO add constraint FKCREAZIONE
     foreign key (idUtente)
     references UTENTE (id);

alter table COMMENTO add constraint FKidPost
     foreign key (idPost)
     references POST (id);

alter table MI_PIACE add constraint FKAL
     foreign key (idPost)
     references POST (id);

alter table MI_PIACE add constraint FKINSERIMENTO
     foreign key (idUtente)
     references UTENTE (id);

alter table NOTIFICA add constraint FKRELATIVA
     foreign key (idPost)
     references POST (id);

alter table NOTIFICA add constraint FKINVIO
     foreign key (idUtenteInvio)
     references UTENTE (id);

alter table NOTIFICA add constraint FKRICEZIONE
     foreign key (idUtenteRiceve)
     references UTENTE (id);

alter table POST add constraint FKAPPARTENENZA
     foreign key (idTema)
     references TEMA (id);

alter table POST add constraint FKPUBBLICAZIONE
     foreign key (idUtente)
     references UTENTE (id);

alter table Segui add constraint FKSEGUITI
     foreign key (idSeguito)
     references UTENTE (id);

alter table Segui add constraint FKSEGUACI
     foreign key (idSeguace)
     references UTENTE (id);


-- Index Section
-- _____________ 

