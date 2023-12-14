<?php
include_once("config/config.php");

$bdd = new PDO('mysql:host=' . $hote . ';port=' . $port . ';dbname=' . $nom_bd, $identifiant, $mot_de_passe, $options);

// Requête pour sélectionner tous les animaux et leurs photos associées, 
//triés par ID d'animaux de la plus récente à la plus ancienne
$requete = 'SELECT *
FROM pet
INNER JOIN picture
ON pet.id_pet = picture.id_pet
ORDER BY pet.id_pet DESC';

// Exécution de la requête et récupération des résultats sous forme d'un tableau associatif
$resultats = $bdd->query($requete);
// Vérification si des résultats ont été trouvés
if ($resultats && $resultats->rowCount() > 0) {
  // Si des résultats ont été trouvés, stockage des résultats dans un tableau associatif
  $tabpet = $resultats->fetchAll(PDO::FETCH_ASSOC);
}
$resultats->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Pattes</title>
</head>
<body>
    
<?php

foreach ($tabpet as $pet) {
    echo '<div class="pet">';
    echo '<h2>' . $pet['name'] . '</h2>';
    echo '<img src="' . $pet['path'] . '">';
    echo '<p>' . $pet['description'] . '</p>';
    echo '</div>';
}

?>

</body>
</html>