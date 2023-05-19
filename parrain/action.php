<?php
if(isset($_POST['inscrire'])){

    if(isset($_GET["p"])){
        $cles=$_GET["p"];


    if(!empty($_POST['nom'])AND !empty($_POST['email'])AND !empty($_POST['mdp']) AND !empty($_POST['rmdp'])){
        $name=$_POST['nom'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $rmdp=$_POST['rmdp'];

        if($mdp==$rmdp){
$cle =rand(100,100000);
$mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);  
$insert=$db->prepare("INSERT INTO parrain(nom,email,mdp,cle)VALUES(?,?,?,?)");
$insert->execute(array($name,$email,$mdp,$cle));

$req =$db->query("SELECT * FROM parrain ORDER BY id ASC");
$result=$req->fetchAll();
foreach($result as $results){
    $idfilleul=$results['id'];
}

$insertfilleul=$db->prepare("INSERT INTO filleul (idparrain,idfilleul) VALUES (?,?)");
$insertfilleul->execute(array($cles,$idfilleul));

echo '<div class="alert alert-danger">Vous etes inscris et vous etes parrainé</div>';
        }else{
            echo '<div class="alert alert-danger">Les mots de passes ne correspondent pas</div>';
    
        }
    }else{
        echo '<div class="alert alert-danger">tous les champs sont obligatoires</div>';
    } 
   }else{
    if(!empty($_POST['nom'])AND !empty($_POST['email'])AND !empty($_POST['mdp']) AND !empty($_POST['rmdp'])){
        $name=$_POST['nom'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        $rmdp=$_POST['rmdp'];

        if($mdp==$rmdp){
$cle =rand(100,100000);
$mdp = password_hash($mdp, PASSWORD_BCRYPT, $options); 
$insert=$db->prepare("INSERT INTO parrain(nom,email,mdp,cle)VALUES(?,?,?,?)");
$insert->execute(array($name,$email,$mdp,$cle));
echo '<div class="alert alert-danger">Vous etes inscris et vous etes parrain</div>';
        }else{
            echo '<div class="alert alert-danger">Les mots de passes ne correspondent pas</div>';
    
        }
    }else{
        echo '<div class="alert alert-danger">tous les champs sont obligatoires</div>';
    } 
   }
}