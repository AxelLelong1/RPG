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

    echo "vous êtes bien déconnecté !";
    echo "<a href='menu_main.php'> Retour au menu </a>";

    ?>

	</body>

	
</html>