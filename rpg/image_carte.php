<?php
//cette page renvoi UNIQUEMENT UNE IMAGE

    // header('Content-Type: image/jpeg'); //d'où le header(l'en-tête, ce sera la SEULE chose affichée si la page agis elle même)

    // l'image étant un set de carte complet de 50 cartes (je sais, ce n'est pas conventionel :D)
    

    // puis on copie en redimmensionnat l'image.
    // les valeurs vont dans cet ordre (image cible, image ressource, x début, y début, x arrivée, y arrivée, largeur début, hauteur début, larguer arrivée, hauteur arrivée)
    // comme on rogne, pas la peine de changer la largeur est l'hauteur
    
    header('Content-Type: image/jpeg'); //d'où le header(l'en-tête, ce sera la SEULE chose affichée si la page agis elle même)
    //pour comprendre par vous-même, changé $_SESSION['colonne'] par une valeur 0->9 et $_SESSION['ligne'] 0->4 puis allez sur localhost/"'dossier'"/image_carte.php)
    // un fond noir avec un carré apparait... c'est ce que renvoie la page, une unique image.

    $colonne = $_GET['colonne'];
    $ligne = $_GET['ligne'];

    //l'image étant un set de carte complet de 50 cartes (je sais, ce n'est pas conventionel :D)
    $img_p = imagecreatetruecolor(71, 96); //on créer un image vide de la taille d'une carte (les cartes sont de dimensions 71*96 pour le moment)
    $img = imagecreatefromjpeg("image/set_cartes.jpeg"); //on prend le set de carte comme image de reférence

    list($width, $height) = getimagesize("image/set_cartes.jpeg"); //on stock les dimensions

    //puis on copie en redimmensionnat l'image.
    //les valeurs vont dans cet ordre (image cible, image ressource, x début, y début, x arrivée, y arrivée, largeur début, hauteur début, larguer arrivée, hauteur arrivée)
    // comme on rogne, pas la peine de changer la largeur est l'hauteur
    imagecopyresampled($img_p, $img, 0, 0, 71*$colonne, 96*$ligne, $width, $height, $width, $height);

    imagejpeg($img_p, null, 100);


?>