<?php
include('config/config.php');
include('class/customer.php');

// Initialiser les variables
$customer_lastname = $customer_firstname = $customer_username = $customer_password = $id_customer = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $customer_lastname = isset($_POST['customer_lastname']) ? $_POST['customer_lastname'] : '';
    $customer_firstname = isset($_POST['customer_firstname']) ? $_POST['customer_firstname'] : '';
    $customer_username = isset($_POST['username']) ? $_POST['username'] : '';
    $customer_password = isset($_POST['password']) ? $_POST['password'] : '';

    // Créer une instance de la classe Utilisateur
    $new_user = new customer($customer_lastname, $customer_firstname, $customer_username, $customer_password);

    // Appele la méthode inscrire pour ajouter l'utilisateur dans la base de données
    $new_user->inscrire($pdo);

    // Récupére l'id_client auto-incrémenté
    $id_customer = $new_user->getIdClient();

    // Ajoute les éléments dans la base de données
    $query = "INSERT INTO customer (customer_lastname, customer_firstname, customer_username, customer_password) VALUES ('$customer_lastname', '$customer_firstname', '$customer_username', '$customer_password')";
    $result = $pdo->query($query);

     // Vérifie si l'inscription a réussi
     if ($id_customer) {
        // Redirection vers la page login.php
        header("Location: login.php");
        exit(); 
    } else {
        echo 'Erreur lors de l\'inscription.';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Créer un compte</title>
</head>

<body>
    <h1>Créer un compte</h1>
    <form action="create.php" method="POST">
        <label for="customer_lastname">Nom :</label>
        <input type="text" name="customer_lastname" id="customer_lastname" required><br><br>

        <label for="customer_firstname">Prénom :</label>
        <input type="text" name="customer_firstname" id="customer_firstname" required><br><br>

        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Créer un compte">
    </form>
</body>

</html>