<?php
include('SessionManager.php');
SessionManager::startSession();

if (SessionManager::isSessionActive()) {
    $userId = SessionManager::getSessionInfo('user_id');
    echo "Utilisateur connecté avec l'ID : $userId";
} else {
    header('Location: login.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("element/head.php") ?>
</head>

<body>
    <?php
    include("element/navbar.php");
    ?>

    <main class="main-content">
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
            <div class="horizontal-bar"></div>
            <a href="<?php echo isset($_SESSION['customer_username']) ? '' : 'login.php'; ?>" class="bouton-payer">Payer</a>
        </div>
    </main>
</body>

</html>