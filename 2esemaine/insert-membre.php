<?php

$servername = "localhost";
$username = "retro";
$password = "test";
$dbname = "webmasters";
 $conn = new mysqli($servername, $username, $password, $dbname);
$data=array();

//$insert='INSERT INTO ajout (user,classement,tarifprojet) VALUES ("2","5","1")';
$check = $conn->query('SELECT * FROM annuaire ');
$confirm=$conn->query('SELECT * FROM utilisateurs WHERE annaire.ID=utilisateurs.ID');
$test=array();
$req=array('utilisateurs.ID'=>session_id());

$user_id = $req;
$_SESSION['user_id'] = $user_id;
if(!empty($confirm)){
  if ($check->num_rows>0 ){
      
    while($aff=$check->fetch_array())
    {

      $data[0]=$aff;
      foreach ($_POST as $key => $value) {
    $test[$key] = $value;

}

    foreach($data as $datas){
      if(isset($_POST['a'],$_POST['b'],$_POST['c']))
      array_push($datas,$test['a'],$test['b'],$test['c']);
      print_r($datas);
    }
   }
} 
}else{
  header("Location : connexion.php");
}
?>




<div class="form-popup" id="myForm">
  <form action="" class="form-container" name ="forminsert" method="POST">
    <h1>Partenaire</h1>

<label for="user"><b>Nom d'utilisateur</b></label>
<input type="text" placeholder="Entrer le nom d'utilisateur" name="a" required>

<label for="classement"><b>Classement</b></label>
<input type="text" placeholder="Entrer le classement" name="b" required>

<label for="tarifprojet"><b>Tarif</b></label>
<input type="text" placeholder="Entrer le tarif proposé" name="c" required>

<button type="submit" class="btn " name="forminsert">Ajouter</button>
<button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
  </form>
</div> 
<?php