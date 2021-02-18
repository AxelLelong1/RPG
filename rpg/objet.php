<?php
/* CONNECTION A LA BASE DE DONNEES */
$user = "root";
$pass = "";

/* Il faut mettre une variable permettant de récupérer du joueur, pour prendre les infos de son personnage*/

try{
  $dbh = new PDO('mysql:host=localhost; dbname=rpg', $user, $pass);
  echo "Connection réussie à la base de données RPG.";
  
  $reponse_heros = $dbh->query('SELECT heros.nom AS nom, heros.xp AS xp, heros.lvl AS lvl, heros.hp AS hp, heros.mana AS mana, heros.att_base AS attaque_de_base, heros.att_pts AS points_attaque, heros.def_base AS defense_de_base, heros.def_pts AS points_defense
                        FROM heros
                        WHERE id = 1;');
  $heros = $reponse_heros->fetch();

  $reponse_ennemi = $dbh->query('SELECT ennemi.nom AS nom, ennemi.hp AS hp, ennemi.mana AS mana, ennemi.att_pts AS points_attaque, ennemi.def_pts AS points_defense, ennemi.min_drop_gold AS min_drop_gold, ennemi.max_drop_gold AS max_drop_gold, ennemi.min_drop_xp AS min_drop_xp, ennemi.max_drop_xp AS max_drop_xp
                        FROM ennemi
                        WHERE id_ennemi = 1;');
  $ennemi = $reponse_ennemi->fetch();

/* ---------------- MAIN ---------------- */
    $p1 = new heros($heros['nom'], $heros['xp'],$heros['lvl'],$heros['hp'],$heros['mana'],$heros['attaque_de_base'],$heros['points_attaque'],$heros['defense_de_base'],$heros['points_defense']);
    $e1 = new ennemi($ennemi['nom'], $ennemi['hp'],$ennemi['mana'],$heros['att_pts'],$heros['def_pts'],$heros['min_drop_gold'],$heros['max_drop_gold'],$heros['min_drop_xp'],$heros['max_drop_xp']);

    /*$p1->attaquer($e1);*/


}catch(PDOException $e){
  echo "Erreur : ". $e->getMessage()."<br>";
};









/* CLASSE HEROS */
class heros{
    var $nom;
    var $xp;
    var $hp;
    var $lvl;
    var $mana;
    var $att_base ;
    var $att_pts;
    var $def_base;
    var $def_pts;
    var $arme_principale;

    function __construct($nom,$xp,$hp,$lvl,$mana,$att_base,$att_pts,$def_base,$def_pts){
        $this->nom = $nom;
        $this->xp = $xp;
        $this->hp = $hp;
        $this->lvl = $lvl;
        $this->mana = $mana;
        $this->att_base = $att_base;
        $this->att_pts = $att_pts;
        $this->def_base = $def_base;
        $this->def_pts = $def_pts;

    }

    function attaquer($ennemi){
        echo $this->nom."as attaqué !";
        $ennemi->hp -= ($this->att_base);
        echo $ennemi->hp;
    }

    function inventaire(){

    }

    function interaction(){
        
    }
}



/* CLASSE ENNEMI */
class ennemi{
    var $nom;
    var $hp;
    var $lvl;
    var $mana;
    var $att_pts;
    var $def_pts;
    var $drop_g;
    var $drop_xp;

    function __construct($nom,$hp,$mana,$mana,$att_pts,$def_pts,$min_drop_gold,$max_drop_gold,$min_drop_xp,$max_drop_xp,){
        $this->nom = $nom;
        $this->hp = $hp;
        $this->mana = $mana;
        $this->att_pts = $att_pts;
        $this->def_pts = $def_pts;
        $this->def_pts = $min_drop_gold;
        $this->def_pts = $def_pts;
        $this->def_pts = $def_pts;
        
    }

    function attaquer($ennemi){
        $ennemi->hp -= ($this->att_pts);
    }
}



/* CLASSE INVENTAIRE */
class inventaire{
    public $id_heros = 0/* Requête SQL */;

    function ajouter($objet){
        
    }
    
    function utiliser($objet){
        
    }

    function changer($objet, $joueur){
        
    }

    function lacher($objet){
        /* SET à NULL la case du tableau où l'objet est implanté */

    }
}



/* CLASSE OBJET */
class objet{ 
    public $nom = 'Potion'/* Requête SQL */,
            $statut = 'Soin'/* Requête SQL */;
}



/* CLASSE ARME */
class arme{ 
    public $nom = 'Epée'/* Requête SQL */,
            $att_pts = 10/* Requête SQL */;
}
?>