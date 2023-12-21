<?php
include("config/config.php");
session_start();

if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    echo "Utilisateur connecté : " . $customer_username;

    $stmt = $pdo->prepare("SELECT id_customer, customer_lastname FROM customer WHERE customer_username = :customer_username");
    $stmt->bindParam(':customer_username', $customer_username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id_customer = $result['id_customer'];
        $customer_lastname = $result['customer_lastname'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quantity0 = isset($_POST['quantity0']) ? (int)$_POST['quantity0'] : 0;
            $quantity1 = isset($_POST['quantity1']) ? (int)$_POST['quantity1'] : 0;
            $quantity2 = isset($_POST['quantity2']) ? (int)$_POST['quantity2'] : 0;

            $totalTickets = $quantity0 + $quantity1 + $quantity2;

            for ($i = 0; $i < $totalTickets; $i++) {
                
                if ($i < $quantity0) {
                   
                    $ticketDate = '2023-12-15';
                } elseif ($i < $quantity0 + $quantity1) {
                   
                    $ticketDate = '2023-12-16';
                } else {
                    
                    $ticketDate = '2023-12-17';
                }
            
                // Insérez le ticket avec la date appropriée
                $stmt = $pdo->prepare("INSERT INTO ticket (id_customer, ticket_name, ticket_valid) VALUES (:id_customer, :customer_lastname, :ticket_valid)");
                $stmt->bindParam(':id_customer', $id_customer);
                $stmt->bindParam(':customer_lastname', $customer_lastname);
                $stmt->bindParam(':ticket_valid', $ticketDate);
                $stmt->execute();
            }


            echo "Nombre total de tickets ajoutés : " . $totalTickets;
        }
    } else {
        echo "Erreur lors de la récupération des informations du client.";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("element/head.php") ?>
</head>

<body>
    <?php include("element/navbar.php"); ?>

    <main class="main-content">
        <form method="post" action="">
            <h1 class="tarif-titre">Tarifs</h1>
            <div class="tarif-container">
                <div class="tarif">
                    <h3 class="date">Ven 15/12/23</h3>
                    <h3 class="prix-ticket">14.99€</h3>
                    <input class="input-ticket" type="button" value="-" onclick="adjustTotal(0, -1)">
                    <span id="quantity0">0</span>
                    <input class="input-ticket" type="button" value="+" onclick="adjustTotal(0, 1)">
                </div>
                <div class="tarif">
                    <h3 class="date">Sam 16/12/23</h3>
                    <h3 class="prix-ticket">14.99€</h3>
                    <input class="input-ticket" type="button" value="-" onclick="adjustTotal(1, -1)">
                    <span id="quantity1">0</span>
                    <input class="input-ticket" type="button" value="+" onclick="adjustTotal(1, 1)">
                </div>
                <div class="tarif">
                    <h3 class="date">Dim 17/12/23</h3>
                    <h3 class="prix-ticket">14.99€</h3>
                    <input class="input-ticket" type="button" value="-" onclick="adjustTotal(2, -1)">
                    <span id="quantity2">0</span>
                    <input class="input-ticket" type="button" value="+" onclick="adjustTotal(2, 1)">
                </div>
            </div>
            <div class="zone-payement">
                <div class="Price">Total <span id="total">0.00</span>€</div>
                <input type="hidden" name="quantity0" id="hiddenQuantity0" value="0">
                <input type="hidden" name="quantity1" id="hiddenQuantity1" value="0">
                <input type="hidden" name="quantity2" id="hiddenQuantity2" value="0">
                <input type="hidden" name="totalQuantity" id="hiddenTotalQuantity" value="0">
                <div class="horizontal-bar"></div>
                <input type="submit" class="bouton-payer" value="Payer">
            </div>
        </form>
    </main>

    <script>
        var ticketPrice = 14.99;  // Remplacez la valeur par le prix réel du ticket

function adjustTotal(index, change) {
    var quantityElement = document.getElementById('quantity' + index);
    var hiddenQuantityElement = document.getElementById('hiddenQuantity' + index);

    // Parse the current quantity as an integer
    var currentQuantity = parseInt(quantityElement.innerHTML);

    // Update the current quantity with the change
    currentQuantity += change;

    // Ensure the quantity is not negative
    currentQuantity = Math.max(0, currentQuantity);

    // Update the quantity element and the hidden input value
    quantityElement.innerHTML = currentQuantity;
    hiddenQuantityElement.value = currentQuantity;

    // Update the total hidden input value
    var totalQuantity = (
        parseInt(document.getElementById('quantity0').innerHTML) +
        parseInt(document.getElementById('quantity1').innerHTML) +
        parseInt(document.getElementById('quantity2').innerHTML)
    );

    document.getElementById('hiddenTotalQuantity').value = totalQuantity;

    // Calculate and update the total
    var total = (totalQuantity * ticketPrice).toFixed(2);
    document.getElementById('total').innerHTML = total;
}
    </script>
</body>

</html>