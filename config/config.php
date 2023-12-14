<?php
$servername = "localhost"; // Le modifier une fois que le site sera en ligne
$username = "root"; // Le modifier une fois que le site sera en ligne
$password = ""; // Le modifier une fois que le site sera en ligne
$dbname = "meal_pattes";
$port = 3306; // Le modifier une fois que le site sera en ligne

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Path: config/config.php
