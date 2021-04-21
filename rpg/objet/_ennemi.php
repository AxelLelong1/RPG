<?php
/* CLASSE ENNEMI */
class ennemi{
    private $_nom;
    private $_hp;
    private $_lvl;
    private $_mana;
    private $_att_pts;
    private $_def_pts;
    private $_min_drop_G;
    private $_max_drop_G;
    private $_min_drop_XP;
    private $_max_drop_XP;
    private $_drop_G;
    private $_drop_XP;

    function __construct(array $donnees){
        if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
          $this->hydrate($donnees);
          $this->XP_G();
        }

    }

    function hydrate(array $infos){

        foreach ($infos as $clef => $donnee){
    
            $methode = 'set'.$clef;  // permet d'appeller un setteur de la clef (on pourra donc boucler avec les données)
    
            if (method_exists($this, $methode))
                    {
                        // On appelle le setter avec la données
                        $this->$methode($donnee); 
                    }
        }

    }

    function XP_G(){

        $this->setG($this->getminG(), $this->getmaxG());
        $this->setXP($this->getminXP(), $this->getmaxXP());

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

    public function getminG(){
        return $this->_min_drop_G;
    }

    public function getmaxG(){
        return $this->_max_drop_G;
    }

    public function getminXP(){
        return $this->_min_drop_XP;
    }

    public function getmaxXP(){
        return $this->_max_drop_XP;
    }

    public function getGoldDrop(){
        return $this->_drop_G;
    }

    public function getXpDrop(){
        return $this->_drop_XP;
    }

    // FONCTIONS "SET"
    // Permetra de modifier si le joueur ce fait attaquer ou s il se soigne par exemple
    public function setnom($nom){ 
        $this->_nom = $nom;
    }

    public function sethp($gain_hp){ 
        $this->_hp += $gain_hp;
    }

    public function setlvl(){ 
        if ($this->_xp >= 1000){
            // Augmente le niveau du personnage de 1
            $this->_lvl += 1;
            
            // Réinitialise les XP du personnage et garde le surplus s il en a
            $this->_xp -= 1000; 
        }
    }

    public function setmana($gain_mana){
        $this->_mana += $gain_mana;
    }

    public function setatt_pts($gain_att_pts){
        $this->_att_pts += $gain_att_pts;
    }

    public function setdef_pts($gain_def_pts){
        $this->_def_pts += $gain_def_pts;
    }

    public function setmin_drop_gold($min){
        $this->_min_drop_G= $min;
    }

    public function setmax_drop_gold($max){
        $this->_max_drop_G= $max;
    }

    public function setmin_drop_xp($min){
        $this->_min_drop_XP= $min;
    }

    public function setmax_drop_xp($max){
        $this->_max_drop_XP= $max;
    }

    public function setG($min, $max){
        $this->_drop_G= rand($min, $max);
    }

    public function setXP($min, $max){
        $this->_drop_XP= rand($min, $max);
    }
}
?>