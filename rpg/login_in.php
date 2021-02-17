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
        $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', '');
    }

    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    $data = [
        'pseudo' => $_POST['pseudo'],
        'mdp' => $_POST['mdp'],
    ];

    $reponse = $bdd->query('SELECT pseudo, mdp
                            FROM connexion');
    
    while ($pseudo = $reponse->fetch()) {
        
        if ($pseudo['pseudo'] == $_POST['pseudo'] && $pseudo['mdp'] == MD5($_POST['mdp'])) {
            echo "vous êtes présent";
        }

    }
}

if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    sign_in();
}

?>

    <form method="post">
        <p>Votre Pseudo : <input type="text" name="pseudo" /></p>
        <p>Votre Mot_de_passe : <input type="text" name="mdp" /></p>
        <p><input type="submit" value="Login In"></p>
    </form>


		
	</body>

	
</html>