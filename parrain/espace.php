<?php 
include_once 'config.php';

if(isset($_SESSION["id"])){
   $id= $_SESSION["id"];
    $cles=$_SESSION["cle"];

    $req=$db->preapre("SELECT * FROM parrain WHERE id='".$id."'");
    $result->execute($req);
    foreach($result as $results){
$cle=$results['cle'];
$nom=$results['nom'];
    }
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
    <div class="container">
<h1>MON ESPACE </h1>
<?php $req=$db->prepare("SELECT * FROM parrain, filleul WHERE parrain.id=filleul.idfilleul AND idparrain='".$cle."'");
$req->execute();
?>
    <div class="card-body">

    <?php if(empty($req)){
?><p>Vous n'avez pas encore de filleul</p>
   <?php }else {

   ?>
<h2> Liste des parrainés</h2>
            <table class="table table-striped">
                <thead><th>N°</th>
                <th>Nom</th>
            <th>Email</th>
        </thead>
                <tbody>
                    <?php $i=1; ?>
<?php foreach($req as $result){
                echo"<td>'".$i++."';</td><br/>
                    <td>'".$result['nom']."';</td><br/>
                    <td>'".$result['email']."';?></td><br>";} ?>


                </tbody>
        </table>
         <?php } ?>
        </div>
        <div class="card-body">
<h2>Lien de parainage</h2>
<p class="card-text"><b>http://localhost/Stage/parrain/register.php?p= <?php  if(isset($cle)){
    echo $cle;
}     ?> </b></p>
<p><a href="" class="btn btn-primary">Je partage mon lien via facebook</a></p>
<p><a href="" class="btn btn-danger">Je partage mon lien via Google</a></p>

    
    </div>
</body>
</html>