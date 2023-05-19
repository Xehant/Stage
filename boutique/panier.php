
<?php

session_start();

include_once("fonctions-panier.php");
?>
<?php
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>';?>
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
        <form method="post" action="panier.php">
            <table class="redTable">
                <tr>
                    <td colspan="4">Votre panier</td>
                </tr>
                <tr>
                    <td>Libellé</td>
                    <td>Quantité</td>
                    <td>Prix €</td>
                    <td>Action</td>
                </tr>

                <?php
                 if (creationPanier())
                {
                     $nbArticles=count($_SESSION['panier']['libelleProduit']);
                    if ($nbArticles <= 0){
                    echo "<tr><td>Votre panier est vide </td></tr>";
                    } else
                    {
                        for ($i=0 ;$i < $nbArticles ; $i++)
                        {
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                            echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                            echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Supprimer</a></td>";
                            echo "</tr>";
                        }

                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "Total : ".MontantGlobal();
                        echo "</td></tr>";

                        echo "<tr><td colspan=\"4\">";
                        echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                        echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                        echo "</td></tr>";
                    }
                }
                ?>
            </table>      </form>

            <h2>Veuillez sélectionner votre méthode de payement</h2>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="BTG756T53M67G">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

  
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
            <script src="script.js"></script>   </body>
</html>
