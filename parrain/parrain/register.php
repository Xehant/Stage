<?php include_once 'config.php';
include 'action.php';
if(isset($_GET["p"])){
$cle = $_GET["p"];
$req =$db->query("SELECT * FROM parrain WHERE cle = '".$cle."'");
$result=$req->fetchAll();

foreach($result as $results){
    $nom_parrain=$results["nom"];
}
$champ ="<div class='form-group'><label>Parrain</label><input type='text 'class='form-control 'name='name' value='".$nom_parrain."' readonly></div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php if(isset($champ)): ?>
            <?= $champ;?>
            <?php endif;?>

        <div class=from-group>
            <label for="nom">Pseudo</label>
            <input type="text" name="nom" id="nom" class="form-control">
        </div>

        <div class=from-group>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        

        <div class=from-group>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" class="form-control">
        </div>

        <div class=from-group>
            <label for="rmdp">Confirmer mot de passe</label>
            <input type="password" name="rmdp" id="rmdp" class="form-control">
        </div>

        <div class=from-group>
          <button type="submit" name="inscrire">S'inscrire</button>
        </div>
    </form>
    <p>Déjà inscrit? <a href="login.php">connectez-vous</a></p>
</body>
</html>