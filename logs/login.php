<?php
include('../config/config.php');

session_start();

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $customer_username = $_POST['customer_username'];
    $customer_password = $_POST['customer_password'];

    // Connexion à la base de données (place le code ici ou laisse-le tel quel)
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

    // Préparer la requête pour vérifier les informations de connexion
    $stmt = $pdo->prepare('SELECT * FROM customer WHERE customer_username = :customer_username');
    $stmt->bindParam(':customer_username', $customer_username);
    $stmt->execute();
    $customer = $stmt->fetch();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($customer && password_verify($customer_password, $customer['customer_password'])) {

        $id_customer = $customer['id_customer'];
        $is_admin = $customer['is_admin'];

        // Démarrer une session et stocker le nom d'utilisateur, l'id et l'attribut 'is_admin'
        $_SESSION['customer_username'] = $customer_username;
        $_SESSION['id_customer'] = $id_customer;
        $_SESSION['is_admin'] = $is_admin;

        // Message de débogage
        echo 'Connexion réussie. Redirection...';

        // Rediriger vers la page d'accueil ou une autre page sécurisée
        header('Location: ../index.php');
        exit;
    } else {
        // Afficher un message d'erreur si les informations de connexion sont incorrectes
        $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
    

}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>

    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="customer_username">Nom d'utilisateur:</label>
        <input type="text" id="customer_username" name="customer_username" required><br>

        <label for="customer_password">Mot de passe:</label>
        <input type="password" id="customer_password" name="customer_password" required><br>

        <button type="submit">Se connecter</button>
    </form>

    <a href="create.php">
        <button type="submit">Créer un compte</button>
    </a> 
    <br>
    <a href="../index.php">
        <button type="button">Retour à la page d'accueil</button>
    </a>
</body>

</html>