<?php
$host = "localhost"; // Le modifier une fois que le site sera en ligne
$username = "root"; // Le modifier une fois que le site sera en ligne
$password = "root"; // Le modifier une fois que le site sera en ligne
$dbname = "meal_pattes";
$port = 3306; // Le modifier une fois que le site sera en ligne

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Path: config/config.php
    