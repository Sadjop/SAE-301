<?php
include("config/config.php");

$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

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

session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['customer_username'])) {
  $customer_username = $_SESSION['customer_username'];
  echo "Utilisateur connecté : " . $customer_username;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include("element/head.php") ?>
</head>

<body class="body_accueil">

  <!-- Inclusion de la navbar -->
  <?php include("element/navbar.php") ?>


  <!-- Intro Heading -->
  <main class="main-content">
    <div class="images-chats">
      <img src="img/accueil/accueil.webp" alt="">
    </div>
    <div class="repas">
      <div class="repas-content">
        <img src="img/accueil/repas.webp" alt="">
      </div>
      <div>
        <h4>Bienvenue au Meal Pattes !</h4>
        <p>
          Ce site est dédié à l'événement caritatif organisé par la SPA Haute-Loire, qui se déroulera du 29 janvier 2024 au 30 janvier 2024 dans la salle Jeanne d'Arc au Puy-en-Velay. Découvrez notre restaurant éphémère avec sa carte alléchante. Cet événement a pour mission de récolter des fonds essentiels pour soutenir notre SPA et faciliter l'adoption des animaux qui méritent une seconde chance. En unissant les plaisirs d'une carte de qualité et la noble cause de venir en aide aux animaux sans foyer, nous créons une opportunité pour vous de contribuer à une cause qui nous tient à cœur.
        </p>

      </div>
    </div>
    <div class="menu-accueil">
      <img src="img/accueil/mockup_menu_accueil.webp" alt="" height="500vh">
      <a href="menu.php"><button type="button">Découvrir le menu</button></a>
    </div>

    <!-- Menu -->


    <!-- Affichage des animaux du plus récent au plus ancien : -->
    <h1>Quelques uns de nos compagnons !</h1>
    <?php


    $randomPets = array_rand($tabpet, 4);
    foreach ($randomPets as $index) {
      $pet = $tabpet[$index];
      echo '<div class="pet_card">';
      echo '<h2>' . $pet['pet_name'] . '</h2>';
      echo '<a href="animal.php?id=' . $pet['id_pet'] . '"><img src="' . $pet['path'] . '"></a>';
      echo '</div>';
    }
    ?>
    <div class="FAQ">
      <h1>Questions et réponses</h1><br><br>
      <br><br><br><br><br><br>
      <div class="divQ1">
        <div class="Q1">
          <h2>Puis-je ramener mon animal de compagnie à l’événement ?</h2>
          <p>Malheureusement, non car nous voulons éviter tout conflit entre les animaux sauf pour les chiens d’assistance qui sont bien sûr autorisés !</p>
        </div>

        <div class="vide">
        </div>

      </div>
      <br><br><br><br><br><br><br><br><br>

      <div class="divQ2">
        <div class="vide">
        </div>

        <div class="Q2">
          <h2>Je suis une personne à mobilité réduite, pourrais-je accéder à la salle ?</h2>
          <p>Oui, l’accès à la salle permet à tout public de participer à l’événement !</p>
        </div>


      </div>
      <br><br><br><br><br><br><br><br><br>

      <div class="divQ3">
        <div class="Q3">
          <h2>J’ai un régime spécial, est ce que le menu est adapté ?</h2>
          <p>La liste des allergènes est présente sur la page menu, mais vous pouvez effectuer une requête spéciale via la page contact.</p>
        </div>

        <div class="vide">
        </div>

      </div>
      <br><br><br><br><br><br><br><br><br>
    </div>
  </main>
  <?php include("element/footer.php") ?>

</body>

</html>