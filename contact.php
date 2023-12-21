<?php session_start(); 
if (isset($_SESSION['customer_username'])) {
    $customer_username = $_SESSION['customer_username'];
    $id_customer = $_SESSION['id_customer'];
    echo '<div id="welcome-message">Bonjour ' . $customer_username . '</div>';
  } else {
    echo "Utilisateur non connecté";
  }
  ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">


    
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        
    <title>Page contact</title>

</head>

<body>
    <?php include("element/navbar.php") ?>
    <main class="main-contact">
        <div class="img-background-contact">
        </div>

        <h1>Contact</h1>
        <div class="headerContact">
            <img src="img/contact/logo_spa.png" alt="data 1">

            <p>La SPA de la Haute-Loire</br>
                Tél : 04.71.02.65.50</br>
                Adresse : ZA Plaine de Bleu Impasse du refuge, 43000 Polignac</p>
        </div>

        <div id="map"></div>

        <form class="form-contact" action="contact.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" required>

            <select id="country" name="country" required>
                <option value="" disabled selected>Choisissez</option>
                <option value="france">France</option>
                <option value="usa">États-Unis</option>
                <option value="canada">Canada</option>
            </select>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit">Envoyer</button>
        </form>

    </main>
    <?php include("element/footer.php") ?>

    <script>
        function initMap() {
            var map = L.map('map').setView([45.0451978, 3.8811041], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            return map;
        }

        function loadGPSData(map) {
            var coordinates = [
                { lat: 45.0451978, lng: 3.8811041 },
            ];

            var markers = L.layerGroup(coordinates.map(coord => {
                var marker = L.marker([coord.lat, coord.lng]);

                marker.bindPopup('Mealpattes');

                marker.on('click', function () {
                    map.setView(marker.getLatLng(), 13);
                });

                return marker;
            }));
            markers.addTo(map);
        }
        var map = initMap();
        loadGPSData(map);

    </script>

</body>

</html>