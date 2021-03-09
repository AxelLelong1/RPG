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
        $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); //co à la bdd
    }

    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $data = [ // récup des datas
        'pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp'],
    ];

    //préparation requête
    $sql = "INSERT INTO connexion(pseudo, mdp)
            VALUES (:pseudo ,MD5(:mdp))";

    //exécution requête
    $bdd->prepare($sql)->execute($data);
    header('Location: menu_main.php'); //redirection
}

function verification(){ //vérifie les doublons

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); //co à la bdd
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

    while ($pseudo = $reponse->fetch()) {
        
        if ($pseudo['pseudo'] == $_POST['pseudo']) {
            $here = TRUE;
        }

    }

    if ($here == TRUE){
        echo "<script> alert ('Veuillez réessayer, vous êtes déjà présent') </script>"; // erreur, on doit choisir un autre pseudo
    }
    else{
        sign_in(); //si pas d'erreur
    }
}


//vérif des datas
if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    verification();
}
?>

    <form method="post">
        <p>Votre Pseudo : <input type="text" name="pseudo" /></p>
        <p>Votre Mot_de_passe : <input type="text" name="mdp" /></p>
        <p><input type="submit" value="Sign In"></p>
    </form>


		
	</body>

	
</html>