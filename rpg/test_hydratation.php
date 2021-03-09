<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG</title>
	</head>

	<body>

    <?php

    session_start();

        echo $_GET['link']; 
        $_SESSION['id_pseudo'] = $_GET['link'];
    ?>

	</body>

	
</html>