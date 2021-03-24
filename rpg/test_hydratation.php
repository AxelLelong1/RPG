<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG</title>
	</head>

	<body>

    <?php

    session_start();
        $link = $_SERVER['REQUEST_URI'];
        echo($link);

        echo $_GET['link']; 
        $_SESSION['id_pseudo'] = $_GET['link'];
    ?>

	</body>

	
</html>