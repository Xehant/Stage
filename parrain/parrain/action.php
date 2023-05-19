<?php
include($_SERVER['DOCUMENT_ROOT'].'/system32/mysql/cours-webmasters/fr/connect-9.php');

// Nombre de résultats par page
$results_per_page = 10;

// Récupération de la requête de recherche
$ApplicationSearchSiteWebInternaute = addslashes(htmlspecialchars($_GET['RequeteSearchSiteWebInternaute']));

if (empty($ApplicationSearchSiteWebInternaute)) {
    echo "Merci de vérifier la saisie car tu n'as pas saisie de mot clé.";
} else {
    $MySQLConnectAppSearch = mysqli_connect($HostMySQL, $UserMySQL, $PassMySQL, $MySQL);

    if (!$MySQLConnectAppSearch) {
        die("Une erreur technique vient de survenir.");
    }

    // Compter le nombre de résultats
    $count_query = "SELECT COUNT(*) FROM SearchSiteWeb WHERE KeywordsSiteWeb LIKE '%$ApplicationSearchSiteWebInternaute%'";
    $count_result = mysqli_query($MySQLConnectAppSearch, $count_query);
    $total_results = mysqli_fetch_array($count_result)[0];

    // Calculer le nombre de pages
    $total_pages = ceil($total_results / $results_per_page);

    // Récupérer la page courante
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Vérifier que la page courante est bien un nombre entier
    if (!is_numeric($current_page)) {
        $current_page = 1;
    }

    // Vérifier que la page courante est bien dans les bornes de la pagination
    if ($current_page < 1 || $current_page > $total_pages) {
        $current_page = 1;
    }




// Afficher uniquement les  pages qui sont  actives 




if ( $seek_select= $mysqli->query("SELECT * FROM SearchSiteWeb WHERE KeywordsSiteWeb LIKE '%$ApplicationSearchSiteWebInternaute%'")){
    $seek_select->fetchAll(); 
    
}


    // Calculer l'offset pour la requête
    $offset = ($current_page - 1) * $results_per_page;

    // Récupération des résultats pour la page courante
    $query = "SELECT TitrePageWeb, UrlSiteWeb, DescriptionPageWeb FROM SearchSiteWeb WHERE KeywordsSiteWeb LIKE '%$ApplicationSearchSiteWebInternaute%' LIMIT $offset, $results_per_page";
    $result = mysqli_query($MySQLConnectAppSearch, $query);

    if (!$result) {
        die("Une erreur technique vient de survenir.");
    }

    $NombreResultatSearchSiteWeb = mysqli_num_rows($result);

    if ($NombreResultatSearchSiteWeb == 0) {
        echo "Aucun résultat trouvé pour la recherche : $ApplicationSearchSiteWebInternaute";
    } else {
        echo "<span>Il y a $total_results résultat(s) pour le(s) mot(s) clé(s) $ApplicationSearchSiteWebInternaute !</span><br>";
        while ($AffichageDataSearchMembre = mysqli_fetch_array($result)) {
            echo "<strong><a href='{$AffichageDataSearchMembre['UrlSiteWeb']}' target='_blank'>{$AffichageDataSearchMembre['TitrePageWeb']}</a></strong><br>";
            echo "<span>{$AffichageDataSearchMembre['DescriptionPageWeb']}</span><br>";
            echo "<span><strong><a href='{$AffichageDataSearchMembre['UrlSiteWeb']}' target='_blank'>{$AffichageDataSearchMembre['UrlSiteWeb']}</a></strong></span><br><br>";
        } 

        // Afficher les liens de pagination
        echo "<div class='pagination'>";

        // Lien vers la page précédente
        if ($current_page > 1) {
            echo "<a href='resultats.php?RequeteSearchSiteWebInternaute=$ApplicationSearchSiteWebInternaute&page=" . ($current_page - 1) . "'><<</a>";
        }

        // Boucle sur les pages à afficher
        for ($i = 1; $i <= $total_pages; $i++) {
            // Lien vers la page courante
            if ($i == $current_page) {
                echo "<a class='active'>$i</a>";
            } else {
                echo "<a href='resultats.php?RequeteSearchSiteWebInternaute=$ApplicationSearchSiteWebInternaute&page=$i'>$i</a>";
            }
        }

        // Lien vers la page suivante
        if ($current_page < $total_pages) {
            echo "<a href='resultats.php?RequeteSearchSiteWebInternaute=$ApplicationSearchSiteWebInternaute&page=" . ($current_page + 1) . "'>>></a>";
        }

        echo "</div>";

        // Fermer la connexion MySQL
        mysqli_close($MySQLConnectAppSearch);
    }
}
?>