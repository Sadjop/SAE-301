<?php
include('../config/config.php');
include('class/customer.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customer_id'];

    $bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);

    $requete = 'DELETE FROM customer WHERE id_customer = :customerId';
    $stmt = $bdd->prepare($requete);
    $stmt->bindParam(':customerId', $customerId);
    $stmt->execute();

    header('Location: ../admin.php');
    exit();
}
