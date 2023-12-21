<?php
include('config/config.php');
include('class/customer.php');

session_start();

$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

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


$requeteTicket = 'SELECT * 
FROM ticket 
INNER JOIN customer
ON ticket.id_customer = customer.id_customer
ORDER BY ticket.id_ticket DESC';

$resultatsTicket = $bdd->query($requeteTicket);

if ($resultatsTicket && $resultatsTicket->rowCount() > 0) {
    $tabTicket = $resultatsTicket->fetchAll(PDO::FETCH_ASSOC);
}
$resultatsTicket->closeCursor();

// Récupère le nombre de customers depuis la base de données
$numCustomers = customer::getNumberOfCustomers($pdo);

$totalTickets = count($tabTicket);
$totalSomme = $totalTickets * 14.99;
?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'element/head.php'; ?>
</head>

<body>
    <?php include 'element/navbar.php'; ?>
    <main class="main-content">
        <div class="titre-dashboard">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="liste-customers">
            <p>Nombre de customers : <?php echo $numCustomers ?><br><br></p>
            <p>Liste Customers: <br><br>
                <?php
                foreach ($tabcustomer as $customer) {
                    echo $customer['customer_firstname'] . ' ' . $customer['customer_lastname'] . ' Nom d\'utilisateur :' . $customer['customer_username'] . '<a href="customer.php"<button class="button">      Modifier</button></a><br> ';
                }
                ?><br></p>


            <p>Nombre de tickets vendus: <?php echo $totalTickets ?> <br><br> </p>
            <p>Liste Tickets: <br><br>
                <?php
                foreach ($tabTicket as $ticket) {
                    echo $ticket['customer_firstname'] . ' ' . $ticket['customer_lastname'] . ' ' . $ticket['ticket_valid'] . '<br>';
                }
                ?><br></p>
            <strong>Somme totale récoltée <?php echo $totalSomme ?> €</strong>

        </div>

        <div id="progressbar-container">
            <div id="progressbar"></div>
            <div id="progress-text"></div>
        </div>


        <script>
            var totalSomme = <?php echo json_encode($totalSomme); ?>;
        </script>
        <script src="script/script.js"></script>
    </main>


</body>

</html>