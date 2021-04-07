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
        $reponse = $bdd->query('SELECT heros.nom, id_heros
        FROM heros
        INNER JOIN connexion
        ON heros.id_pseudo = connexion.id
        WHERE id_pseudo = '.$_SESSION["id"].'');            

            echo "<table>";

            while($perso = $reponse->fetch()){

                //boucle pour tableau
                echo '<tr><td><a href="jeu_test.php?link='.urlencode($perso["id_heros"]).'">'.$perso["nom"].'</a></tr></td>';
            }

            echo "</table>";

            //créer son perso
            echo "</br> <a href='creation_perso.php'>Créer votre perso</a>";

        

    }


    session_start(); // LES SESSIONS ! (petit cours)


    // On vérifie si la session n'est pas nulle pour afficher les infromations du joueur 
    if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) && isset($_SESSION['id'])) { // Si la session est pas nulle...

        echo 'Votre login est '.$_SESSION['pseudo'].' et votre mot de passe est '.$_SESSION['mdp'].' et votre id est'.$_SESSION['id'].'.'; // ... on peut voir nos infos (pseudo, mot de passe, l'id dans la base de données)
        echo '<a href="Deco.php">Deconnexion</a>';

        echo "</br> voici vos perso !";
        
        // Présentation des persos
        recup_perso(); // Fonction du desssus 



    }

    else{ // sinon

        echo '<a class="lien" href="login_in.php"> <input class="bouton" type="button" value="Log In"> </a>' ; // On propose de le login 
        echo '<a class="lien" href="sign_in.php"> <input class="bouton" type="button" value="Sign In"> </a>' ; // et le sign_in 
    }   
    ?>

	</body>

	
</html>