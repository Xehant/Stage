<?php
session_start();

$host="localhost";
$dbname="parrain";
$user="retro";
$mdp="test";

try{
    $db = new PDO ('mysql:host='.$host.'; dbname='.$dbname,$user,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
}
catch (PDOexception $e){
    die("Erreur");
}
?>