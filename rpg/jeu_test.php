<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

		<title>Mini-RPG</title>
	</head>

	<body>

    <?php   

        include("objet\heros.php");

        session_start();

        $_SESSION['id_pseudo'] = $_GET['link'];

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); // connexion à la bdd
        }
    
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
    
        // lancement de la requête
    
        $reponse = $bdd->query('SELECT *
                                FROM heros
                                WHERE id_heros = '.$_SESSION["id_pseudo"].'');
    

        $heros = new heros($reponse->fetch());

        echo "hydratation done";
        echo $heros->getName();
        echo " __ ", $heros->getHP(),;
        echo " __ ", $heros->getAttPts();

    ?>

    
    


    </body>
    
        
</html>