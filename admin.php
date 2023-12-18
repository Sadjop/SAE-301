<?php
include ('class/customer.php');

// Exemple d'utilisation
$customer_lastname = $_POST['customer_lastname'];
$customer_firstname = $_POST['customer_firstname'];
$username = $_POST['username'];
$password = $_POST['password'];

// Créer une instance de la classe Utilisateur
$nouvel_utilisateur = new customer($customer_lastname, $customer_firstname, $username, $password);

// Appeler la méthode inscrire pour ajouter l'utilisateur dans la base de données
$nouvel_utilisateur->inscrire($pdo);

// Récupérer l'id_client auto-incrémenté
$id_customer = $nouvel_utilisateur->getIdClient();

echo 'Inscription réussie! L\'utilisateur a l\'id_client : ' . $id_customer;


?>