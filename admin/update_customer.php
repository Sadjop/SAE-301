<?php
include('../config/config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bdd = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $username, $password);
    $requeteUpdate = 'UPDATE customer SET 
                    customer_firstname = :firstname,
                    customer_lastname = :lastname,
                    customer_username = :username
                    WHERE id_customer = :customer_id';

    $statement = $bdd->prepare($requeteUpdate);
    $statement->bindParam(':firstname', $_POST['customer_firstname']);
    $statement->bindParam(':lastname', $_POST['customer_lastname']);
    $statement->bindParam(':username', $_POST['customer_username']);
    $statement->bindParam(':customer_id', $_POST['customer_id']);
    $statement->execute();
    
    header('Location: ../admin.php');
    exit();
}
