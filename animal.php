<?php
include("config/config.php");
$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

session_start();

if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    $id_customer = $_SESSION['id_customer'];
    echo '<div id="welcome-message">Bonjour ' . $customer_username . '</div>';
} else {
    echo "Utilisateur non connecté";
}

$id = $_GET["id"];

$requete = 'SELECT *
FROM pet
INNER JOIN category 
ON pet.id_cat = category.id_cat
INNER JOIN picture
ON pet.id_pet = picture.id_pet
WHERE pet.id_pet=' . $id . '';


$resultats = $bdd->query($requete);
if ($resultats && $resultats->rowCount() > 0) {
    $tabpet = $resultats->fetch(PDO::FETCH_ASSOC);
}
$resultats->closeCursor();

$nom = $tabpet['pet_name'];
$naissance = $tabpet['pet_date_of_birth'];
$pet_sex = $tabpet['pet_sex'];
$essai = $tabpet['is_trial'];
$adoption = $tabpet['is_adopted'];
$bio = $tabpet['bio'];
$cat = $tabpet['nom_cat'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("element/head.php") ?>
</head>

<body>

    <!-- navbar -->
    <?php include("element/navbar.php") ?>

    <main class="main-content">

        <!-- Fil d'arianne  -->
        <div class="fil_arianne">
            <a href="index.php">Accueil</a> &gt;
            <a href="animaux.php">Nos compagnons</a> &gt;
            <span>
                <?php echo $nom ?>
            </span>
        </div>

        <div class="animal_container">

            <!-- Image -->
            <div class="animal_wrapper">
                <section class="animal_image">
                    <img src="<?php echo $tabpet['path'] ?>" alt="">
                </section>
            </div>


            <!-- Description -->
            <div class="animal_wrapper">
                <h1 class="animal_name">
                    <?php echo $nom ?>
                </h1>
                <?php echo $cat ?>
                <br><br>
                <section>
                    <p class="animal_bio">
                        <?php echo $bio ?>
                    </p>
                </section>
                <br>
                <section>
                    <p class="animal_sexe">
                        Sexe: <?php echo $pet_sex == 0 ? "Mâle" : "Femelle" ?>
                    </p>
                    <br>
                    <p class="animal_naissance">
                        Date de naissance: <?php echo $naissance ?>
                    </p>
                    <br>
                    <p class="animal_essai">
                        Est à l'essai: <?php echo $essai == 0 ? "Non" : "Oui"; ?>
                    </p>
                    <p class="animal_adoption">
                        Est adopté: <?php echo $adoption == 0 ? "Non" : "Oui"; ?>
                    </p>

                </section>



            </div>
        </div>
    </main>

    <?php include("element/footer.php") ?>

</body>

</html>