<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

        <title>Mini-RPG-CREAPERSO</title>
        
	</head>

	<body>

    <?php

    function creer_perso(){

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); //connexion à la bdd
        }
    
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        }
    
        $req = $bdd->prepare("INSERT INTO heros(nom, hp, mana, att_base, def_base, xp, lvl, att_pts, def_pts)");
        $req->execute(array(

            'nom' => $_POST['nom'],
            'hp' => $_POST['hp'],
            'mana' => $_POST['mana'],
            'att_base' => $_POST['att'],
            'att_def' => $_POST['def'],
            'xp' => 0,
            'lvl' => 1,
            'att_pts' => 0,
            'def_pts' => 0

        )); //éxecution
        
        echo "Done";


    }

    function verif(){

        if ($_POST['hp'] + $_POST['mana'] + $_POST['att'] + $_POST['def'] != 200){
            echo '<script>alert("vous avez 200 points à attribuer !")</script>';
        }
        else{

            creer_perso();
        }



    }

    if (isset($_POST['nom']) && isset($_POST['hp']) && isset($_POST['mana']) && isset($_POST['att']) && isset($_POST['def']) ) {
        verif();
    }

    ?>

    <h1>Création de votre perso !</h1>

    <p>vous avez 200 points à attribuer !</p>

    <form method="post">
        <p>Son nom ? : <input type="text" name="nom" /></p>
        <p>Nombre de HP : <input type="number" name="hp" /></p>
        <p>Nombre de Mana : <input type="number" name="mana" /></p>
        <p>Points d'attaque : <input type="number" name="att" /></p>
        <p>Points de défense : <input type="number" name="def" /></p>
        <p><input type="submit" value="ok"></p>
    </form>

	</body>


	
</html>