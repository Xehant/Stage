<?php 

include_once 'config.php';

include 'verif_login.php';
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


        <div class=from-group>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        

        <div class=from-group>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" class="form-control">
        </div>

        <div class=from-group>
          <button type="submit" name="logger">Se connecter</button>
        </div>
    </form>

<p>Pas encore inscrit? <a href="register.php">Inscrivez-vous</a></p>
</body>
</html>