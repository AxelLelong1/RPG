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

    $data = [ //récup des données
        'pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp'],
    ];

    // lancement de la requête
    $reponse = $bdd->query('SELECT pseudo, mdp
                            FROM connexion');
    
    //comparaison
    $here = FALSE; //est là ? (défault = Nope)
    while ($pseudo = $reponse->fetch()) {
        
        if ($pseudo['pseudo'] == $_POST['pseudo'] && $pseudo['mdp'] == MD5($_POST['mdp'])) {

            $here = TRUE; // oui, je suis là

            
        }

    }

    if ($here == TRUE){

        session_start(); // création d'une session (permet de partager les données de page en page)

        $_SESSION['pseudo'] = $_POST['pseudo']; // nom du pseudo est gardé

		$_SESSION['mdp'] = $_POST['mdp']; // ainsi que le mot de passe

        //tentative de récup l'id du joueur
        $sql = 'SELECT id
        FROM connexion
        WHERE pseudo = "$_POST["pseudo"]" AND mdp = "MD5($_POST["mdp"])" ';

        // gros fail
        $result = $bdd->query($sql);

        while($row = $result->fetch()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
          }

        echo $id;

        $_SESSION['id'] = $id; //récup if == fail
        
        //header('Location: menu_main.php'); // redirection
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
        <p>Votre Pseudo : <input type="text" name="pseudo" /></p>
        <p>Votre Mot_de_passe : <input type="text" name="mdp" /></p>
        <p><input type="submit" value="Login In"></p>
    </form>


		
	</body>

	
</html>