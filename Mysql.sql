CREATE DATABASE projet48h;
USE projet48h;

CREATE TABLE utilisateur(
    idutilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    photo VARCHAR(255),
    email VARCHAR(255),
    motdepasse VARCHAR(255),
    estadmin INTEGER DEFAULT 0
);

insert into utilisateur (nom,prenom,photo,email,motdepasse,estadmin) values ('Rasolofomanana','Kanty','avatar1.png','rasolofomananakanty@gmail.com','1234',1);