<!DOCTYPE html>
<html class="desktop mbr-site-loaded"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Site made with Mobirise AI Website Builder v0.01, https://ai.mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise AI v0.01, ai.mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="https://ai.mobirise.com/assets/startm5/images/logo5.png?v=lq0b9jj6" type="image/x-icon">
  <meta name="description" content="Une association qui recycle des bijoux pour une bonne cause, découvrez comment vous pouvez contribuer!">

  <title>Recapiulatif</title>
  <link rel="stylesheet" href="css/mobirise2.css">
  <link rel="stylesheet" href="css/jarallax.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="css/style_002.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/css2.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;700&display=swap"></noscript>
  <link rel="preload" as="style" href="css/additional.css"><link rel="stylesheet" href="css/additional.css" type="text/css">

<style>:root{ --background: #FFF6EA; --dominant-color: #FFA62B; --primary-color: #489FB5; --secondary-color: #82C0CC; --success-color: #20AC6B; --danger-color: #AE1E2C; --warning-color: #CC9900; --info-color: #0AA3C2; --background-text: #000000; --dominant-text: #000000; --primary-text: #FFFFFF; --secondary-text: #000000; --success-text: #FFFFFF; --danger-text: #FFFFFF; --warning-text: #000000; --info-text: #FFFFFF;}</style>
<script type="text/javascript" id="www-widgetapi-script" src="js/www-widgetapi.js" async=""></script><script async="" src="iframe_api"></script></head>
<body><section id="top-1" style="display: none;"><a href="https://ai.mobirise.com/" class="animate__animated animate__delay-1s animate__fadeIn">Mobirise AI Website Builder</a> Mobirise AI Alpha v0.01 <a href="https://mobirise.com/builder/ai-website-builder.html" class="animate__animated animate__delay-1s animate__fadeIn">AI Website Builder</a></section>


<?php
$lname = htmlspecialchars(addslashes($_POST['nom']));
$fname = htmlspecialchars(addslashes($_POST['prenom']));
$id = htmlspecialchars(addslashes($_POST['pseudo']));
$mdp1 = htmlspecialchars(addslashes($_POST['mdp1']));
$mdp2 = htmlspecialchars(addslashes($_POST['mdp2']));
$mysqli = new mysqli('localhost', 'e22110817sql', 'GqEMe!!p', 'e22110817_db1');


//on vérifie si les champs ont été bien remplis
if($_POST["nom"]&&$_POST["prenom"]&&$_POST["pseudo"]&&$_POST["mdp1"]&&$_POST["mdp2"]){

if ($mysqli->connect_errno) {
    // Affichage d'un message d'erreur
    echo "Error: Problème de connexion à la BDD \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    // Arrêt du chargement de la page
    exit();
}
echo "Connexion BDD réussie !";

// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) {
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
    exit();
}


//on vérifie si le mot de passe a été bien saisie
if ($mdp1 == $mdp2) {
    $sql = "INSERT INTO t_compte_cpt VALUES('" . $id . "',MD5('" . $mdp1 . "'));";

    // Affichage de la requête constituée pour vérification
    echo ($sql);

    // Exécution de la requête d'ajout d'un compte dans la table des comptes
    $result3 = $mysqli->query($sql);

    if ($result3 == false) { // Erreur lors de l’exécution de la requête d'insertion du compte
        // La requête a échoué
        echo "Error: La requête a échoué \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";

        // Supprime le compte créé
        $sql_delete = "DELETE FROM t_compte_cpt WHERE cpt_pseudo = '" . $id . "'";
        $result_delete = $mysqli->query($sql_delete);

        // Vérifie si la suppression a réussi
        if ($result_delete === false) {
            echo "Erreur lors de la suppression du compte.";
        } else {
            echo "<br />";
            echo "Suppression réussie !" . "\n";
        }

        exit;
    } else {
        // L'insertion du compte a réussi, procéder à l'insertion du profil
        $sql_bis = "INSERT INTO t_profil_pfl VALUES('" . $lname . "','" . $fname . "','M','D',CURRENT_DATE(),'" . $id . "');";
        $result4 = $mysqli->query($sql_bis);

        if ($result4 == false) { // Erreur lors de l’exécution de la requête d'insertion du profil
            // La requête a échoué
            echo "Error: La requête a échoué \n";
            echo "Query: " . $sql_bis . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";

            // Supprime le compte créé
            $sql_delete = "DELETE FROM t_compte_cpt WHERE cpt_pseudo = '" . $id . "'";
            $result_delete = $mysqli->query($sql_delete);

            // Vérifie si la suppression a réussi
            if ($result_delete === false) {
                echo "Erreur lors de la suppression du compte.";
            } else {
                echo "<br />";
                echo "Suppression réussie !" . "\n";
            }

            exit;
        } else { // Insertion réussie
            echo "<br />";
            echo "Bonjour, " . htmlspecialchars(addslashes($_POST['pseudo'])) . ".";
            echo "<br />";
            //echo "MDP choisi : " . htmlspecialchars(addslashes($_POST['mdp1'])) . " !";
            //echo "<br />";
            echo "Insertion réussie" . "\n";
            echo "<br />";
        }
    }
} else { // Requête réussie
    echo "<br />";
    echo "Mot de passe non conforme !\n";
}
}else{
    $formulaire = "inscription.php";
    echo("Veuillez remplir tous les champs de saisie");
    echo "<br />";
    echo("<a href=".$formulaire."> Cliquez ici pour revenir au formulaire</a>");
}
// Ferme la connexion avec la base MariaDB
$mysqli->close();
?>
</body>
</html>