<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG</title>
	</head>

	<body>

    <?php

    function recup_perso(){


    }

    session_start(); // LES SESSIONS ! (petit cours)

    if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) && isset($_SESSION['id'])) { // si la session est pas nulle  (l'id s'affiche pas)

        echo 'Votre login est '.$_SESSION['pseudo'].' et votre mot de passe est '.$_SESSION['mdp'].' et votre id est'.$_SESSION['id'].'.'; // on peut voir nos infos
        echo '<a href="Deco.php">Deconnexion</a>';


    }

    else{ // sinon

        echo '<a href="login_in.php"> login </a>' ; // proposition de login / sign_in
        echo '<a href="sign_in.php"> sign_in </a>' ; // (les liens ne fonctionnent pas...)
    }   
    ?>

    
    


	</body>

	
</html>