<?php

class heros{
    private $_id;
    private $_nom;
    private $_xp;
    private $_hp;
    private $_lvl;
    private $_mana;
    private $_att_base;
    private $_att_pts;
    private $_def_base;
    private $_def_pts;
    private $_arme_principale;
    private $_des;
    private $_faces;
    private $_multiplicateur;

    // Lors de la construction d'un perso les stats seront celles de base, le joueur ne pourra que choisir son pseudo 
    function __construct(array $donnees)
    {
    if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
          $this->hydrate($donnees);
        } 
    
    $this->updateDice();
    

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
    public function getDice(){
        $this->updateDice();
        return $this->_des;
    }

    public function getFaces(){
        $this->updateDice();
        return $this->_faces;
    }

    public function getMult(){
        $this->updateDice();
        return $this->_multiplicateur;
    }

    public function getID(){
        return $this->_id;
    }

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

    public function setid_heros($id){
        $this->_id = $id;
    }

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

    public function updateDice(){
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); // connexion à la bdd
        }
        
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    
        $reponse = $bdd->query('SELECT *
                                FROM inventaire
                                WHERE id_heros = '.$this->getID().'');
    
        $inventaireStuff = ($reponse->fetch());
    
        $this->setDice($inventaireStuff['carte_des'],$inventaireStuff['carte_faces'],$inventaireStuff['carte_multiplicateur']);

    }

    public function setDice($nombre, $faces, $multiplicateur){

        $this->_des = (1+$nombre);
        $this->_faces = (50-$faces);
        $this->multiplicateur = ($multiplicateur);

    }


    
    
    // FONCRIONS DE BASE DU JOUEUR

    // Permet au joueur d'attaquer 

    function find_carte($chiffre){

        //calcul position image
        $ligne = 0;
        $colonne = 0;

        //le jeu étant un set de carte, on indique la carte a affiché par sa position

        if ($chiffre < 10){

            $colonne = $chiffre-1;

        }//si le chiffre est dans la première ligne, on a juste a trouvé sa colonne. il y a 10 cartes, il y a une position 0, les positions varient de 0->9

        else{//si la carte n'est pas dans la première ligne

            while ($chiffre-10 >= 0) {//tant qu'on peut retiré dix

                    $chiffre -= 10;
                    $ligne += 1;//on augmente la ligne

                if ($chiffre == 0){//si on atteint 0, c'est que la carte est un multiple de dix, or ils sont en bout de ligne

                    $colonne = 9;//on revient alors à la case précédente
                    $ligne -=1;
                }

                else{//si on est en dessous de 10, mais supérieur à 0, on associe le chiffre à la position (variant de 0->9)

                    $colonne = $chiffre-1;
                }
            
            }   
        }

        return $ligne.$colonne;
    }
    function attaquer($ennemi){

    $degats = 0;

    for ($i=0; $i < $this->getDice(); $i++) { 

    $chiffre = rand(1,$this->getFaces()); #sera le nombre 

        echo "chiffre tiré = ".$chiffre;

        $_SESSION['ligne']=$this->find_carte($chiffre)[0];
        $_SESSION['colonne']=$this->find_carte($chiffre)[1];

        ${'image'.$i} = "</br><img src='image_carte.php'/></br>"; //fais appel à la page image_carte
        echo ${'image'.$i};

        //ratio chiffre, dégats (plus on s'approche de 1, plus on fait mal, si = 1 -> coup critique (dégats *2 ?) )
        echo $this->_nom." as attaqué ".$ennemi->getName()."!";

        if ($chiffre == 1){

            $degats += $this->_att_base *2 ;

        }

        else{

        $pourcentage = 100 - 2 * $chiffre;

        $degats += $this->_att_base*($pourcentage/100); // addition des degats

        }
    
    }

        $ennemi->setHP(-($degats));
        echo "vous avez fait ".$degats; //affichage

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
?>