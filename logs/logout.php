<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['customer_username'])) {
    // Détruit toutes les variables de session
    session_unset();

    // Détruit la session
    session_destroy();

    // Redirige vers la page d'accueil ou une autre page après la déconnexion
    header("Location: ../index.php");
    exit();
} else {
    // Redirige vers la page d'accueil si l'utilisateur n'est pas connecté
    header("Location: ../index.php");
    exit();
}
?>
