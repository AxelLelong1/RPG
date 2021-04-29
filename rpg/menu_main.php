<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG</title>
	</head>

	<body>

    <?php

    // Recupere le(s) perso(s) suivant si le compte a des personnages  
    function recup_perso(){

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); // connexion à la bdd
        }
    
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
        
        // récup des perso
        $reponse = $bdd->query('SELECT heros.nom, heros.id_heros
        FROM heros
        INNER JOIN connexion
        ON heros.id_pseudo = connexion.id
        WHERE id_pseudo = '.$_SESSION["id"].'');

    
        echo "<table>";

        while($perso = $reponse->fetch()){

            //boucle pour tableau
            echo '</br><a class="lien" href="jeu.php?link='.$perso['id_heros'].'"> <input class="bouton" type="button" value='.$perso["nom"].'> </a>';
        }

        echo "</table>";

        //créer son perso
        echo '<a href="creation_perso.php"><input class="bouton" type="button" value="Créer votre perso"></a>';
        
    }


    session_start(); // LES SESSIONS ! (petit cours)


    // On vérifie si la session n'est pas nulle pour afficher les infromations du joueur 
    if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) && isset($_SESSION['id'])) { // Si la session est pas nulle...

        echo 'Bienvenue '.$_SESSION['pseudo']; // ... on peut voir nos infos (pseudo, mot de passe, l'id dans la base de données)
        

        echo "</br> Voici vos perso !";
        $_SESSION['first_run'] = 0;
        $_SESSION['ennemi'] = null;
        $_SESSION['heros'] = null;
        
        // Présentation des persos
        recup_perso(); // Fonction du desssus 
        echo '</br><a href="deco.php"><input class="bouton" type="button" value="Deconnexion"></a>';



    }

    else{ // sinon

        echo '<a class="lien" href="login_in.php"> <input class="bouton" type="button" value="Log In"> </a>' ; // On propose de le login 
        echo '<a class="lien" href="sign_in.php"> <input class="bouton" type="button" value="Sign In"> </a>' ; // et le sign_in 
    }

    
    ?>

	</body>

	
</html>