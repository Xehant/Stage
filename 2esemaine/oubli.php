<?php
if(!empty($_POST) && !empty ($_POST['pseudo'])&& !empty($_POST['password'])){
    include_once 'config.php';
    $req =$pdo->{'SELECT * FROM utilisateurs WHERE email = ? AND confirmed_at IS NOT NULL '};
    $req->execute([ $_POST['email']]);
    $user = $req->fetch();
if($user){
    session_start();
    $reset_token = str_random(60);
    $pdo->prepare('UPDATE users SET reset_token=?, reset_at =NOW() WHERE id =?')->execute([$reset_token, $user->id]);
    $_SESSION['flash']['success'] = 'Les instructions du rappel de mot de passe vous ont été envoyés par mail\n\nlocalhost/stage/2esemaine/reset.php?user_id&token=$token';
header('Location : partenaire.php');
    //mail($_POST['email'], 'Réiniatilisation de votre compte', "Afin de valider votre compte de cliquer sur ce lien");
    header('Location: login.php');
    exit();
}else{
    $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrecte';
}
}
?>
<h1>Mot de passe oublié</h1>
<form action="" method="POST">

<div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" class="form-control">
</div>
<button type="submit" class="btn btn-primary"></button>
</form>