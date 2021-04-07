<?php
class heros{
    private $_nom;
    private $_xp;
    private $_hp;
    private $_lvl;
    private $_mana;
    private $_att_base;
    private $_att_pts;
    private $_def_base;
    private $_def_pts;
    private $_nombre_de_des;

    // Lors de la construction d'un perso les stats seront celles de base, le joueur ne pourra que choisir son pseudo 
    function __construct(array $donnees)
    {
    if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
          $this->hydrate($donnees);
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

    
    
    // FONCTIONS PERMETTANT DE MODIFIER LES DONNES DU JOUEUR 
    // FONCTIONS "GET"
    public function getName(){
        return $this->_nom;
    }

    public function getXP(){
        return $this->_xp;
    }

    public function getHP(){
        return $this->_hp;
    }

    public function getLVL(){
        return $this->_lvl;
    }

    public function getAttBase(){
        return $this->_att_base;
    }

    public function getAttPts(){
        return $this->_att_pts;
    }

    public function getDefBase(){
        return $this->_def_base;
    }

    public function getDefPts(){
        return $this->_def_pts;
    }
    
    // FONCTIONS "SET"
    public function setnom($nom){
        $this->_nom = $nom;
    }

    public function setxp($gain_xp){
        $this->_xp += $gain_xp;
    }

    // Permetra de modifier si le joueur ce fait attaquer ou s il se soigne par exemple
    public function sethp($gain_hp){ 
        $this->_hp += $gain_hp;
    }

    // Permettra d augmenter le niveau du joueur 
    public function setlvl(){ 
        if ($this->_xp >= 1000){
            // Augmente le niveau du personnage de 1
            $this->_lvl += 1;
            
            // Réinitialise les XP du personnage et garde le surplus s il en a
            $this->_xp -= 1000; 
        }
    }

    // Augmentera ou diminuera suivant le mana utiliser ou gagner
    public function setmana($gain_mana){ 
        $this->_mana += $gain_mana;
    }

    // Dépendra du niveau du personnage 
    public function setatt_base($gain_att){
        $this->_att_base += $gain_att;
    }

    // Dépendra suivant ce que l'arme apportera comme degats
    public function setatt_pts($gain_pts_att){ 
        $this->_att_pts = $this->getAttBase()+ $gain_pts_att;
    }

    // Dépendra du niveau du personnage 
    public function setdef_base($gain_def){ 
        $this->_def_base += $gain_def;
    }

    // Dépendra suivant ce que l'armure apportera comme defense
    public function setdef_pts($gain_pts_def){ 
        $this->_def_pts = $this->getDefBase() + $gain_pts_def;
    }


    
    
    // FONCRIONS DE BASE DU JOUEUR
    // Permet au joueur d'attaquer 
    function attaquer($ennemi){
        echo $this->_nom." as attaqué ".$ennemi->getName()."!";
        $ennemi->setHP(-($this->_att_base));
        echo $ennemi->getHP();
    }

    // Permet au joueur de dormir 
    function rompiche(){
        echo "En train de dormir";
    }

    // Permet au joueur d'interagir avec son inventaire
    function inventaire(){

    }

    // Permet au joueur d'interagir avec d'autre personne
    function interaction(){
        
    }
}



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
     public function setHP($gain_hp){ 
        $this->_hp += $gain_hp;
    }
}




// CLASSE INVENTAIRE 
class inventaire{
    private $id_heros = 0/* Requête SQL */;

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



// CLASSE OBJET 
class objet{ 
    public $nom = 'Potion'/* Requête SQL */,
            $statut = 'Soin'/* Requête SQL */;
}



// CLASSE ARME 
class arme{ 
    public $nom = 'Epée'/* Requête SQL */,
            $att_pts = 10/* Requête SQL */;
}
?>