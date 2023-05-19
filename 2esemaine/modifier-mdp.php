<?php 
    $bdd = new PDO ('mysql:host=localhost;dbname=webmasters;charset=utf8','retro','test');


    if(isset($_POST['change_password'])){
        $email = htmlspecialchars($_POST['email']);
        $old_password = sha1($_POST['old_password']);
        $new_password = sha1($_POST['new_password']);

        if(!empty($email) AND !empty($old_password) AND !empty($new_password)){
            $requser=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=? AND password =?");
            $requser->execute(array( $email, $old_password));
            $userexist = $requser->rowCount();
            if($userexist ==1){
                $update = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE email = ?");
                $update->execute(array($new_password, $email));
                $success = "Votre mot de passe a été mis à jour avec succès";
            }
            else{
                $erreur = "L'email ou le mot de passe actuel est incorrect";
            }
        }
        else{
            $erreur = "Tous les champs doivent être complétés";
        }
    }
    
?>

  
     <h2 class="white" >Modifier le mot de passe</h2>  
     <br>

    <form action="" method="post">
        <input type="email" name="email" placeholder='Mail'>
        <input type="password" name="old_password" placeholder="Ancien mot de passe">
        <input type="password" name="new_password" placeholder="Nouveau mot de passe">
        <input type="submit" name="change_password" value="Modifier">
    </form>
<?php

if(isset($erreur)){
    echo '<font color="red">'.$erreur."</font>";
}

if(isset($success)){
    echo '<font color="green">'.$success."</font>";
}
?>

