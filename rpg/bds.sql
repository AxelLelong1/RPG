SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
-- 
--  TABLE CONNEXION    
--
 
CREATE TABLE IF NOT EXISTS`connexion`(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255),
    mdp VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO connexion(pseudo,mdp)
VALUES ('MJ',MD5('mdp'));


-- 
--  TABLE HEROS    
--
 
CREATE TABLE IF NOT EXISTS`heros`(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255),
    xp int(11),
    lvl int(11),
    hp int(11),
    mana int(11),
    att_base int(11),
    att_pts int(11),
    def_base int(11),
    def_pts int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Insertion des données dans la base
--
INSERT INTO heros(nom,xp,lvl,hp,mana,att_base,att_pts,def_base,def_pts)
VALUES ('MJ',0,1,100,50,50,0,50,0);


 
 
 
--
-- -----------------------------------------
-- 
 
-- 
--  TABLE OBJETS    
--
 
CREATE TABLE IF NOT EXISTS `objets`(
    id_objet int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255),
    id_statut int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Insertion des données dans la base
--



 
 
 
--
-- -----------------------------------------
-- 
 
-- 
--  TABLE STATUTS    
--
 
CREATE TABLE IF NOT EXISTS `statuts`(
    id_statut int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255),
    effet VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Insertion des données dans la base
--



 
 
 
--
-- -----------------------------------------
-- 
 
-- 
--  TABLE ARMES    
--
 
CREATE TABLE IF NOT EXISTS `armes`(
    id_arme int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    att_pts int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Insertion des données dans la base
--
 
-- 
--  TABLE INVENTAIRE    
--
 
CREATE TABLE IF NOT EXISTS `inventaire`(
    id_heros int(11) PRIMARY KEY NOT NULL,
    id_objet1 int(11),
    id_objet2 int(11),
    id_objet3 int(11),
    id_objet4 int(11),
    id_objet5 int(11),
    id_objet6 int(11),
    id_objet7 int(11),
    id_objet8 int(11),
    id_objet9 int(11),
    id_objet10 int(11),
    id_arme1 int(11),
    id_arme2 int(11),
    id_arme3 int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Insertion des données dans la base
--
INSERT INTO inventaire(id_heros,id_objet1,id_objet2,id_objet3,id_objet4,id_objet5,id_objet6,id_objet7,id_objet8,id_objet9,id_objet10 ,id_arme1,id_arme2,id_arme3)
VALUES (1,1,2,3,4,5,6,7,8,9,10,30,27,18);



 
 
 
--
-- -----------------------------------------
-- 
 
-- 
--  TABLE ENNEMI    
--
 
CREATE TABLE IF NOT EXISTS `ennemi`(
    id_ennemi int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255),
    hp int(11),
    mana int(11),
    att_pts int(11),
    def_pts int(11),
    min_drop_gold int(11),
    max_drop_gold int(11),
    min_drop_xp int(11),
    max_drop_xp int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
--
-- Insertion des données dans la base
--



 
 
 
--
-- -----------------------------------------
--