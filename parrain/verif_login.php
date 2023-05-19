<?php
include_once 'config.php';

if(isset($_POST["logger"])){
    if(!empty($_POST["email"]) AND !empty($_POST["mdp"])){
$email=$_POST["email"];
$mdp=$_POST["mdp"];

$req=$db->prepare(" SELECT * FROM parrain WHERE email = ? AND mdp = ? ");
$verif=$req->execute(array($email, $mdp));

if( $result = $req->fetch() ){

    $_SESSION["auth"]=$result;
    $_SESSION["id"]=$result["id"];
    $_SESSION["cle"]=$result["cle"];
    
    header("Location: espace.php");

}else{
    echo '<div class="alert alert-danger">Le mots de passe ou email est incorrect</div>';
}

    }else{
        echo '<div class="alert alert-danger">Le mots de passe ou email est incorrect</div>';
    }
}
?>