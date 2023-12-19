<?php
include('config/config.php');
include('class/customer.php');

$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

// Requête pour sélectionner tous les animaux et leurs photos associées, 
//triés par ID d'animaux de la plus récente à la plus ancienne
$requete = 'SELECT *
FROM customer
ORDER BY customer.id_customer DESC';

// Exécution de la requête et récupération des résultats sous forme d'un tableau associatif
$resultats = $bdd->query($requete);
// Vérification si des résultats ont été trouvés
if ($resultats && $resultats->rowCount() > 0) {
    // Si des résultats ont été trouvés, stockage des résultats dans un tableau associatif
    $tabcustomer = $resultats->fetchAll(PDO::FETCH_ASSOC);
}
$resultats->closeCursor();

// Récupère le nombre de customers depuis la base de données
$numCustomers = customer::getNumberOfCustomers($pdo);
?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'element/head.php'; ?>
</head>

<body>
    <main class="main-content">
        <div class="titre-dashboard">
        <h1>Admin Dashboard</h1>
        </div>
        <div class="liste-customers">
        <p>Nombre de customers : <?php echo $numCustomers; ?><br><br></p>
        <p>Liste Customers: <br><br>
            <?php
            // $customers = customer::getAllCustomers($pdo);
            foreach ($tabcustomer as $customer) {
                echo $customer['customer_lastname'] . ' ' . $customer['customer_firstname'] . ' ' . $customer['customer_username'] . '<a href="customer.php"<button class="button">      Modifier</button></a><br> ';
            }
            ?></p>
        </div>
    </main>
</body>

</html>