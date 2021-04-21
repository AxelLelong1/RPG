<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

        <title>Mini-RPG-MENU-TEST</title>
        
	</head>

	<body>

<?php


function login(){ //fonction de login


    try{
        $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); // connexion à la bdd
    }

    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // lancement de la requête

    $reponse = $bdd->query('SELECT pseudo, mdp
                            FROM connexion
                            WHERE pseudo ="'.$_POST['pseudo'].'" AND mdp = SHA1("'.$_POST['mdp'].'")');



    //comparaison
    $here = FALSE; //est là ? (défault = Nope)

    $pseudo = $reponse->fetch(); // Récupère les valeurs de la bdd ligne par ligne

    ini_set('display_errors','off'); // Enlève l'erreur disant que "Les identifiants forcent avec la condition (ci-dessous)"

    if ($pseudo['pseudo'] == $_POST['pseudo'] && $pseudo['mdp'] == SHA1($_POST['mdp'])) {

        $here = TRUE; // oui, je suis là
    }


    

    if ($here == TRUE){

        session_start(); // création d'une session (permet de partager les données de page en page)
        $_SESSION['first_run'] = 0;
        $_SESSION['ennemi'] = null;

        $_SESSION['pseudo'] = $_POST['pseudo']; // nom du pseudo est gardé

		$_SESSION['mdp'] = $_POST['mdp']; // ainsi que le mot de passe

        //tentative de récup l'id du joueur

        $result = $bdd->query('SELECT id
                                FROM connexion
                                WHERE pseudo ="'.$_POST['pseudo'].'" AND mdp = SHA1("'.$_POST['mdp'].'")');

        while($row = $result->fetch()) {
            $id = $row["id"];
          }

        $_SESSION['id'] = $id;
        
        header('Location: menu_main.php'); // redirection
    }
    else{
        echo "<script> alert ('Veuillez réessayer') </script>"; // si erreur
    }
}

if (isset($_POST['pseudo']) && isset($_POST['mdp'])) { //vérif des datas
    login();
}

?>

    <form method="post">
        <p class="text_formualire">Votre Pseudo : <input type="text" name="pseudo" /></p>
        <p class="text_formualire">Votre Mot de passe : <input type="text" name="mdp" /></p>
        <p><input class="bouton" type="submit" value="Log In"></p>
    </form>
    <a href="menu_main.php"> <input class="bouton" type="button" value="Retour au menu principal"> </a>


		
	</body>

	
</html>