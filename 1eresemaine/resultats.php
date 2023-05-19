
        <?php
include_once 'config.php';
            if(isset($_POST['Seek']))
            $seek = AddSlashes(htmlspecialchars($_POST['Seek']));
            if($mysqli -> connect_error) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
             }
            if ($result = $mysqli->prepare("SELECT * FROM SearchSiteWeb WHERE cle LIKE '%$seek%'"))
            {
                $result->execute();
                $num=$result->num_rows;
                if(!empty($seek))
                {
                    if($num>0){
                    echo"<span class='KlozaSeek_titre_sous'>
                    Il y a $num résultat(s) pour le(s) mot(s) clé(s) 
                    '$seek' !</span><br>";
                    }
                    else{
                        echo"<span class='KlozaSeek_titre_sous'>
                    Aucun résultat trouvé!</span><br>";
                    }

                while($aff=$result->fetch())
                {
                    echo"<a href=
                    '".$aff['UrlSiteWeb']."'
                    target='_blank'
                    class='KlozaSeek_sites_titre'>
                    '".$aff['TitrePageWeb']."'
                    </a><br>";
                
                    echo"<span class='KlozaSeek_sites_des'>
                    '".$aff['UrlSiteWeb']."'
                    </span><br>";
                
                    echo"<span class='KlozaSeek_sites_infos'>
                    Infos : 
                    '".$aff['DescriptionPageWeb']."'
                    </span><br><br>";
                }
            
        }
        else{
            echo'<span class="KlozaSeek_texte">Tu n\'as pas entré de mot clé.</span><br>';
        }
    }
?>