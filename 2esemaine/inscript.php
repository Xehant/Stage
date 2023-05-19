<?php
include_once 'config.php';

if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $bdd->prepare('SELECT Pseudo, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
      $row = $check->rowCount();
      $data = $check->fetch();
  
    if($row == 0){ 
        if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
            if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                    if($password === $password_retype){ // si les deux mdp saisis sont bon

                      
                        $password = sha1($_POST['password']);
                        $password_retype = sha1($_POST['password']);
                        
                        // On stock l'adresse IP
                        $data= array(':pseudo'=>$pseudo,':email'=> $email,':password'=> $password);
                        $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo,:email,:password)');
                        $insert->execute($data);
                        
                        // On redirige avec le message de succès
                        header('Location:inscription.php?reg_err=success');
                        die();
                    }else{ header('Location: inscription.php?reg_err=password'); die();}
                }else{ header('Location: inscription.php?reg_err=email'); die();}
            }else{ header('Location: inscription.php?reg_err=email_length'); die();}
        }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
    }else{ header('Location: inscription.php?reg_err=already'); die();}
}?>
<form action="inscript.php" method="post">
<h2 class="text-center">Inscription</h2>       
<div class="form-group">
    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
</div>
<div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
</div>
<div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
</div>
<div class="form-group">
    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
</div>   
</form> 