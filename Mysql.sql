
USE kanty_base;

/*BASE IZY*/
CREATE TABLE utilisateur(
    idutilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    photo VARCHAR(255),
    email VARCHAR(255) not null,
    motdepasse VARCHAR(255) not null,
    contact varchar(75) not null,
    adresse varchar(255) not null,
    estadmin INTEGER DEFAULT 0
);

insert into utilisateur (nom,prenom,photo,email,motdepasse,contact,adresse,estadmin) values ('Rasolofomanana','Kanty','avatar1.png','rasolofomananakanty@gmail.com','1234','0348764540','logt 894',1);
insert into utilisateur (nom,prenom,photo,email,motdepasse,contact,adresse,estadmin) values ('Fetra','Nantenaina','avatar1.png','fetra@gmail.com','1234','0348764540','logt 894',0);
insert into utilisateur (nom,prenom,photo,email,motdepasse,contact,adresse,estadmin) values ('Ravaka','Jessica','avatar1.png','ravaka@gmail.com','1234','0348764540','logt 894',0);

create table genre (
    idgenre integer primary key AUTO_INCREMENT,
    typegenre varchar(75)
);

insert into genre (typegenre) values ('Homme'),('Femme');

create table code(
    idcode integer primary key AUTO_INCREMENT,
    numerocode varchar(255),
    volacode float,
    etatcode int default 0
);

insert into code (numerocode,volacode) values 
('000 021 031',10000),('014 065 084',20000),('045 210 784',30000),('115 701 451',40000),
('278 692 245',50000),('024 536 111',30000),('345 786 000',10000),('468 929 314',60000),
('179 197 601',70000),('222 510 894',20000),('780 365 002',80000),('599 134 122',90000),
('001 002 003',100000),('004 111 544',150000),('134 785 315',60000);

create table compte(
    idcompte integer primary key AUTO_INCREMENT,
    idutilisateur int not null references utilisateur (idutilisateur),
    volautilisateur float default 0
);
create table validation(
    idvalidation integer primary key AUTO_INCREMENT,
    idclient int references utilisateur (idutilisateur),
    idadmin int references utilisateur (idutilisateur),
    idcode int references code (idcode),
    idcompte int references compte (idcompte)
);
create table objectif(
    idobjectif integer primary key AUTO_INCREMENT,
    typeobjectif varchar(255)
);
insert into objectif (typeobjectif) values ('Augmenter poids'),('Perdre poids'),('Mise en forme');

create table typeplat(
    idtypeplat integer primary key AUTO_INCREMENT,
    nomtypeplat varchar(75)
);
insert into typeplat(nomtypeplat) values ('Petit-dejeuner'),('Dejeuner'),('Diner'),('Dessert'),('Entree');

create table typesport(
    idtypesport integer primary key AUTO_INCREMENT,
    nomtypesport varchar(255)
);

insert into typesport (nomtypesport) values ('Prise de masse'),('Brules graisses'),('Atteindre son imc ideal');

create table regime(
    idregime integer primary key AUTO_INCREMENT,
    typeregime varchar(255),
    prixregime float,
    variationmasse float,
    sensvariation float,
    idobjectif int not null references objectif (idobjectif)
);

insert into regime (typeregime,prixregime,variationmasse,sensvariation,idobjectif) values ('Prise de masse',50000,100,1,1),('Regime mahia',75000,250,-1,2),('Regime antonony',60000,125,1,3),('Regime 1',30000,100,1,3),('Regime 2',45000,150,-1,3);

create table sport(
    idsport integer primary key AUTO_INCREMENT,
    idtypesport int references typesport (idtypesport),
    idgenre int not null references genre (idgenre),
    activite varchar(255),
    idregime int references regime (idregime)
);
insert into sport (idtypesport,idgenre,activite,idregime) values 
(1,2,'squats',2),(1,2,'leg press',2),(1,1,'traction',1),    
(2,1,'cardio',1),(2,2,'zumba',2),(1,2,'planche',2),
(3,1,'pompes',1),(3,2,'velo',2),(3,1,'abdo',1);

create table plat(
    idplat integer primary key AUTO_INCREMENT,
    idtypeplat int not null references typeplat (idtypeplat),   
    nomplat varchar(255),
    photoplat varchar(255),
    idregime int references regime (idregime),
    idobjectif int not null references objectif (idobjectif)
);


insert into plat (idtypeplat,nomplat,photoplat,idregime,idobjectif) values 
(1,'Croissant','',1,1),(1,'The','',2,2),(1,'Pain beurre','',1,1),(1,'Pain au chocolat','',1,1),
(2,'Hamburger','',1,1),(2,'Sandwich','',3,1),(2,'Crudite','',2,2),(2,'Salades de fruits','',2,2),
(3,'Soupe','',1,1),(3,'Yaourt','',4,3),(3,'Soupe','',1,1),(3,'Steak','',3,3),(3,'Blanc de poulet','',3,3),
(4,'Banane','',1,3),(4,'Fraise','',2,2),(4,'Papaye','',3,3),(4,'Glace','',1,1),(4,'Raisin sec','',5,3),
(5,'Foie gras','',1,1),(5,'Crepe','',3,1),(5,'Assiette legumes','',2,2),(5,'Raclette','',1,1);



create table profil(
    idprofil integer primary key AUTO_INCREMENT,
    idutilisateur int not null references utilisateur (idutilisateur),
    idobjectif int not null references objectif (idobjectif),
    idgenre int not null references genre (idgenre),
    taille float not null,
    poids float not null,
    imc float
);


create table detailregime(
    iddetailregime integer primary key AUTO_INCREMENT,
    idregime int references regime (idregime),
    idprofil integer not null references profil (idprofil)
);

