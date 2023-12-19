<body>
    <!-- Navbar -->

    <nav class="side-nav">


        <div class="wrapper_nav">
            <a href="index.php" class="nav_link">
                <div class="logo">
                    <img src="img/sidebar/logo.png" alt="">
                </div>

            </a>

            <a href="index.php" class="nav-link">
                <div class="nav-bloc n-1">
                    <div class="nav-image-container">
                        <img src="img/sidebar/pictoaccueil.png" alt="">
                        <div class="image-title">Accueil</div>
                    </div>
                </div>
            </a>

            <a href="contact.html" class="nav-link">
                <div class="nav-bloc n-2">
                    <div class="nav-image-container">
                        <img src="img/sidebar/contact.png" alt="">
                        <div class="image-title">Contact</div>
                    </div>
                </div>
            </a>

            <a href="billeterie.html" class="nav-link">
                <div class="nav-bloc n-3">
                    <div class="nav-image-container">
                        <img src="img/sidebar/billeterie.png" alt="">
                        <div class="image-title">Billetterie</div>
                    </div>
                </div>
            </a>

            <a href="menu.php" class="nav-link">
                <div class="nav-bloc n-4">
                    <div class="nav-image-container">
                        <img src="img/sidebar/menu.png" alt="">
                        <div class="image-title">Menu</div>
                    </div>
                </div>
            </a>

            <a href="animaux.php" class="nav-link">
                <div class="nav-bloc n-5">
                    <div class="nav-image-container">
                        <img src="img/sidebar/animaux.png" alt="">
                        <div class="image-title">Animaux</div>
                    </div>
                </div>
            </a>

            <a href="dons.php" class="nav-link">
                <div class="nav-bloc n-6">
                    <div class="nav-image-container">
                        <img src="img/sidebar/don.png" alt="">
                        <div class="image-title">Dons</div>
                    </div>
                </div>
            </a>

            <a href="logs/login.php" class="nav-link">
                <div class="nav-bloc n-7">
                    <div class="nav-image-container">
                        <img src="img/sidebar/connexion.png" alt="">
                        <div class="image-title">Connexion</div>
                    </div>
                </div>
            </a>
            <?php
            if (isset($_SESSION['customer_username'])) {

                $isAdmin = ($customer_username === 'cacaboudin');

                echo '<a href="logs/logout.php" class="nav-link">
                        <div class="nav-bloc n-7">
                        <div class="nav-image-container">
                        <img src="img/sidebar/logout.png" alt="">
                        <div class="image-title">Déconnexion</div>
                        </div>
                        </div>
                        </a>';

                if ($isAdmin) {
                    echo '<a href="admin.php" class="nav-link">
                            <div class="nav-bloc n-7">
                            <div class="nav-image-container">
                            <img src="img/sidebar/admin.png" alt="">
                            <div class="image-title">Admin</div>
                            </div>
                            </div>
                            </a>';
                }
            }

            ?>

        </div>
    </nav>


</body>

</html>