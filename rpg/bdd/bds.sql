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

-- 
--  TABLE HEROS    
--
 
CREATE TABLE IF NOT EXISTS`heros`(
    id_heros int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_pseudo int(11),
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
-- -----------------------------------------
--