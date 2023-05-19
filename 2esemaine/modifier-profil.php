<?php

$bdd = new PDO ('mysql:host=localhost;dbname=webmasters;charset=utf8','retro','test');

// vérifie si le formulaire a été soumis
if(isset($_POST['update_pseudo'])){
    // récupère les valeurs entrées par l'utilisateur
    $newPseudo = htmlspecialchars($_POST['new_pseudo']);

    // vérifie si les champs ne sont pas vides
    if(!empty($newPseudo)){
        // prépare la requête pour mettre à jour le pseudonyme
        $updatePseudo = $bdd->prepare("UPDATE utilisateurs SET pseudo = ? WHERE id = ?");
        $updatePseudo->execute(array($newPseudo, $_SESSION['id']));

        // met à jour la session avec le nouveau pseudonyme
        $_SESSION['pseudo'] = $newPseudo;

        // redirige vers la page profil
        header("Location: profil.php?id=".$_SESSION['id']);
        exit;
    }
    else{
        // affiche un message d'erreur si les champs sont vides
        $erreur = "Veuillez entrer un pseudonyme valide";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le pseudonyme</title>
</head>
<body>
    <h2>Modifier le pseudonyme</h2>
    <br>

    <form action="" method="post">
        <input type="text" name="new_pseudo" placeholder="Nouveau pseudonyme">
        <input type="submit" name="update_pseudo" value="Mettre à jour">
    </form>

    <?php
    if(isset($erreur)){
        echo '<font color="red">'.$erreur."</font>";
    }
    ?>

</body>
</html>
