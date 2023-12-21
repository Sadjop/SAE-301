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
    <?php include 'element/head.php'; ?>
</head>

<body>
    <?php include 'element/navbar.php'; ?>

    <main class="main-content">
        <h1 class="title-don">
            Faire un don
        </h1>
        <main class="main-don">
            <img src="img/dons/chiendon.webp" alt="" class="img-don">
            <h2 class="h2-don">
                Soutenez Nos Amis à Quatre Pattes : Faites un Don à la SPA
            </h2>
            <p class="p-don">
                Chers amis des animaux, <br>
                Au cœur de notre mission à la Société Protectrice des Animaux (SPA), nous nous efforçons chaque jour de créer un
                monde où chaque créature à fourrure, à plumes ou à écailles peut connaître l'amour, la sécurité et le bonheur.
                Notre engagement envers le bien-être animal ne connaît aucune frontière, mais pour atteindre notre objectif,
                nous avons besoin de votre soutien précieux.
                Chaque don que nous recevons va directement aux soins, à la protection et à la recherche de foyers aimants pour
                nos amis les plus vulnérables. Ces animaux, souvent abandonnés ou maltraités, méritent une seconde chance, une
                vie d'amour et de confort. Votre contribution fait la différence, peu importe la taille du geste.

            </p>
            <h3 class="h3-don">
                Pourquoi donner à la SPA ?
            </h3>
            <p class="p-don">
                Chaque don que nous recevons va directement aux soins, à la protection et à la recherche de foyers aimants pour
                nos amis les plus vulnérables. Ces animaux, souvent abandonnés ou maltraités, méritent une seconde chance, une
                vie d'amour et de confort. Votre contribution fait la différence, peu importe la taille du geste.
            </p>
            <h3 class="h3-don">
                Comment votre don peut-il aider ?
            </h3>
            <p class="p-don">
                • Nourriture et soins médicaux : Votre don contribuera à assurer que chaque animal recueilli par la SPA reçoit
                une alimentation équilibrée et des soins vétérinaires adaptés à ses besoins. <br>
                •Hébergement et confort : Nous cherchons à offrir un refuge sûr et chaleureux à ceux qui ont été abandonnés, où
                ils peuvent se remettre de leurs expériences passées et reprendre confiance en l'humanité.<br>
                •Campagnes de sensibilisation : Nous utilisons également vos dons pour sensibiliser le public à la cause
                animale, éduquer sur la responsabilité des propriétaires d'animaux, et promouvoir l'adoption comme première
                option.<br>
            </p>
            <h3 class="h3-don">
                Comment faire un don ?
            </h3>
            <p class="p-don">
                Votre contribution, aussi petite soit-elle, peut changer la vie d'un animal. Cliquez sur le bouton "Faire un
                Don" ci-dessous et choisissez le montant qui résonne avec votre cœur. Chaque euro compte et rapproche un animal
                de son foyer pour la vie. <br>
                Avec gratitude, <br>
                L'équipe dévouée de la SPA
            </p>
            <button onclick="window.location.href='https://www.ledonenligne.fr/associations/spahauteloire'" class="button-don">Faire un Don</button>

        </main>

        <?php
        include 'element/footer.php';
        ?>

</body>

</html>