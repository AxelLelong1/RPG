<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG</title>
	</head>

	<body>

    <?php

    function recup_perso(){

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); // connexion à la bdd
        }
    
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
        
        // récup des perso
        $reponse = $bdd->query('SELECT heros.nom
        FROM heros
        INNER JOIN connexion
        ON heros.id_pseudo = connexion.id
        WHERE id_pseudo = '.$_SESSION["id"].'');

        
            

            echo "<table>";

            while($perso = $reponse->fetch()){

                //boucle pour tableau
                echo '<tr><td>'.$perso["nom"].'</tr></td>';
            }

            echo "</table>";

            //créer son perso
            echo "</br> <a href='creation_perso.php'>Créer votre perso</a>";

        

    }

    session_start(); // LES SESSIONS ! (petit cours)

    if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) && isset($_SESSION['id'])) { // si la session est pas nulle  (l'id s'affiche pas)

        echo 'Votre login est '.$_SESSION['pseudo'].' et votre mot de passe est '.$_SESSION['mdp'].' et votre id est'.$_SESSION['id'].'.'; // on peut voir nos infos
        echo '<a href="Deco.php">Deconnexion</a>';

        echo "</br> voici vos perso !";
        //présentation des perso
        recup_perso();



    }

    else{ // sinon

        echo '<a href="login_in.php"> login </a>' ; // proposition de login / sign_in
        echo '<a href="sign_in.php"> sign_in </a>' ; // (les liens ne fonctionnent pas...)
    }   
    ?>

    
    


	</body>

	
</html>