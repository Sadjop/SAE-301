<?php
include("config/config.php");
session_start();
if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    $id_customer = $_SESSION['id_customer'];
    echo '<div id="welcome-message">Bonjour ' . $customer_username . '</div>';
  } else {
    echo "Utilisateur non connecté";
  }

$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

$requete = 'SELECT *
FROM pet
INNER JOIN picture
ON pet.id_pet = picture.id_pet
ORDER BY pet.id_pet DESC';

$resultats = $bdd->query($requete);
if ($resultats && $resultats->rowCount() > 0) {
    $tabpet = $resultats->fetchAll(PDO::FETCH_ASSOC);
}
$resultats->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("element/head.php") ?>
</head>

<body>
    <!-- Sidebar -->
    <?php include("element/navbar.php") ?>

    <main class="main-content">

        <!-- Fil d'arianne  -->
        <div class="fil_arianne">
            <a href="index.php">Accueil</a> &gt;
            <span>Nos compagnons</span>
        </div>

        <h1 class="h1_animaux">Nos petits compagnons !</h1>

        <!-- Affichage des animaux du plus récent au plus ancien : -->
        <div class="animaux">
        <?php

        foreach ($tabpet as $pet) {
            echo '<div class="pet_card">';
            echo '<h2>' . $pet['pet_name'] . '</h2>';
            echo '<a href="animal.php?id=' . $pet['id_pet'] . '"><img src="' . $pet['path'] . '" alt="photo de ' . $pet['pet_name'] . '"></a>';
            echo '<a href="animal.php?id=' . $pet['id_pet'] . '"><button>En savoir plus</button></a>';
            echo '</div>';
        }

        ?>
        </div>
    </main>

    <?php include("element/footer.php") ?>

</body>

</html>