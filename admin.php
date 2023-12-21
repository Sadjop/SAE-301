<?php
include('config/config.php');
include('class/customer.php');

session_start();

$bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

$requete = 'SELECT *
FROM customer
ORDER BY customer.id_customer DESC';

$resultats = $bdd->query($requete);
if ($resultats && $resultats->rowCount() > 0) {
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
                    echo $customer['customer_firstname'] . ' ' . $customer['customer_lastname'] . ' Nom d\'utilisateur :' . $customer['customer_username'] . '
                    <button class="modifier-btn">Modifier</button>
                    <form class="modifier-form" action="admin/update_customer.php" method="POST" style="display: none;">
                        <input type="hidden" name="customer_id" value="' . $customer['id_customer'] . '">
                        <input type="text" name="customer_firstname" value="' . $customer['customer_firstname'] . '">
                        <input type="text" name="customer_lastname" value="' . $customer['customer_lastname'] . '">
                        <input type="text" name="customer_username" value="' . $customer['customer_username'] . '">
                        <button type="submit">Enregistrer</button>
                    </form>

                    <form action="admin/delete_customer.php" method="POST">
                        <input type="hidden" name="customer_id" value="' . $customer['id_customer'] . '">
                        <button type="submit">Supprimer</button>
                    </form><br>';
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