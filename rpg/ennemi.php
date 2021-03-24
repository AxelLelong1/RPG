<?php
/* CLASSE ENNEMI */
class ennemi{
    private $_nom;
    private $_hp;
    private $_lvl;
    private $_mana;
    private $_att_pts;
    private $_def_pts;
    private $_drop_g;
    private $_drop_xp;

    function __construct($nom,$hp,$mana,$att_pts,$def_pts,$min_drop_gold,$max_drop_gold,$min_drop_xp,$max_drop_xp){
        $this->_nom = $nom;
        $this->_hp = $hp;
        $this->_mana = $mana;
        $this->_att_pts = $att_pts;
        $this->_def_pts = $def_pts;
        $this->_min_drop_gold = $min_drop_gold;
        $this->_min_drop_gold = $max_drop_gold;
        $this->_min_drop_xp = $min_drop_xp;
        $this->_max_drop_xp = $max_drop_xp;
        
    }

    function attaquer($ennemi){
        $ennemi->hp -= ($this->att_pts);
    }

    // FONCTIONS
    // FONCTIONS "GET"
    public function getName(){
        return $this->_nom;
    }

    public function getHP(){
        return $this->_hp;
    }

    // FONCTIONS "SET"
    // Permetra de modifier si le joueur ce fait attaquer ou s il se soigne par exemple
     public function sethp($gain_hp){ 
        $this->_hp += $gain_hp;
    }

    public function setmana($gain_mana){
        $this-> $_mana += $gain_mana;
    }

    public function setatt_pts($gain_att_pts){
        $this-> $_att_pts += $gain_att_pts;
    }

    public function setdef_pts($gain_def_pts){
        $this-> $_def_pts += $gain_def_pts;
    }
}
?>