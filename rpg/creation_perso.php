<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>

	<head>

        <title>Mini-RPG-CREAPERSO</title>
        
	</head>

	<body>

    <?php

    session_start(); // LES SESSIONS ! (petit cours)

    if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp']) && isset($_SESSION['id'])) {

        if (isset($_POST['nom']) && isset($_POST['hp']) && isset($_POST['mana']) && isset($_POST['att']) && isset($_POST['def']) ) {

            verif();
        }
    }

    function creer_perso(){

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=rpg', 'root', ''); //connexion à la bdd
        }
    
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        }

        //def des attributs qui seront ajouter

        $idpseudo = $_SESSION['id'];
        $nom = $_POST['nom'];
        $hp = $_POST['hp'];
        $mana = $_POST['mana'];
        $att_base = $_POST['att'];
        $def_base = $_POST['def'];
        $xp = 0;
        $lvl = 1;
        $att_pts = 0;
        $def_pts = 0;

        //requête

        $sql = "INSERT INTO heros(id_pseudo, nom, hp, mana, att_base, def_base, xp, lvl, att_pts, def_pts)
                VALUES('".$idpseudo."','".$nom."','".$hp."','".$mana."','".$att_base."','".$def_base."','".$xp."','".$lvl."','".$att_pts."','".$def_pts."')";


        //préparation puis execution (execution seule marche pas, obligation de préparer)
        $stmt = $bdd -> prepare($sql);
        $stmt->execute();

        $sql = "INSERT INTO inventaire(id_heros)
                    SELECT heros.id_heros
                    FROM heros
                    WHERE id_pseudo = ".$idpseudo." AND nom = '".$nom."'";
        
        $stmt = $bdd -> prepare($sql);
        $stmt->execute();
        
        header('Location:menu_main.php'); // redirection


    }

    function verif(){


        //vérification des 200 points attribuer
        if ($_POST['hp'] + $_POST['mana'] + $_POST['att'] + $_POST['def'] != 200){
            echo '<script>alert("vous avez 200 points à attribuer !")</script>';
        }
        else{

            creer_perso();
        }



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
        <p><input class="bouton"  type="submit" value="ok"></p>
    </form>

	</body>


	
</html>