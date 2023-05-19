<?php
$servername = "localhost";
$username = "retro";
$password = "test";
$dbname = "webmasters";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT TitreProjet,User,Classement,BudjetProjet FROM Annuaire ";
$result=mysqli_query($conn,$sql);
$datas =array();
echo $result;
$num=mysqli_num_rows($result);
if($num>0){
    while($row =mysqli_fetch_assoc($result)){
        $datas[]=$row;
    }
}
print_r($datas)
?>