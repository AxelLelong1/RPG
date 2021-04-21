<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG-déco</title>
	</head>

	<body>

    <?php

    session_start(); // reprise de la session

    session_unset(); //efface les données

    session_destroy(); //fin de la session

    echo "Vous êtes bien déconnecté !";
    echo '</br><a href="menu_main.php"> <input class="bouton" type="button" value="Retour au menu principal"> </a>';

    ?>

	</body>

	
</html>