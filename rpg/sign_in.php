<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

        <title>Mini-RPG-MENU-TEST</title>
        
	</head>

	<body>

<?php

function sign_in(){

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); // connexion à la bdd
    }

    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $data = [ // récup des datas
        'pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp']
    ];

    //préparation requête
    $sql = "INSERT INTO connexion(pseudo, mdp)
            VALUES (:pseudo ,SHA1(:mdp))";

    //exécution requête
    $bdd->prepare($sql)->execute($data);
    header('Location: menu_main.php'); //redirection
}




function verification(){ //vérifie les doublons

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
                            WHERE pseudo ="'.$_POST['pseudo'].'"');
    
    //comparaison
    $here = FALSE;

    $pseudo = $reponse->fetch();

    if ($pseudo != FALSE) { #si le pseudo est faux (donc il n'y a rien)

        if (in_array($_POST['pseudo'], $pseudo, true) == true ) {
            $here = TRUE;
        }
    }
    else {
        $here = FALSE;
    }

    if ($here == TRUE){
        echo "<script> alert ('Veuillez réessayer un autre identifiant, celui-ci est dejà utilisé ...') </script>"; // Alerte que vous avez pris un identifiant déjà existant
    }
    else{
        sign_in(); // si erreur
    }
}




//vérif des datas
if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    verification();
}
?>

    <form method="post">
        <p class="text_formualire">Votre Pseudo : <input type="text" name="pseudo" /></p>
        <p class="text_formualire">Votre Mot de passe : <input type="password" name="mdp" /></p>
        <p><input class="bouton" type="submit" value="Sign In"></p>
    </form>
    <a href="menu_main.php"> <input class="bouton" type="button" value="Retour au menu principal"> </a>

		
	</body>

	
</html>