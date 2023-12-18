-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 déc. 2023 à 11:33
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meal_pattes`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_cat`, `nom_cat`) VALUES
(1, 'Chien'),
(2, 'Chat');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `customer_lastname` varchar(255) DEFAULT NULL,
  `customer_firstname` varchar(255) DEFAULT NULL,
  `created_since` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customer_group`
--

CREATE TABLE `customer_group` (
  `id_customer` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `pet_name` varchar(255) DEFAULT NULL,
  `pet_date_of_birth` date DEFAULT NULL,
  `pet_sex` tinyint(1) DEFAULT NULL,
  `is_trial` tinyint(1) DEFAULT NULL,
  `is_adopted` tinyint(1) DEFAULT NULL,
  `adoption_date` date DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pet`
--

INSERT INTO `pet` (`id_pet`, `pet_name`, `pet_date_of_birth`, `pet_sex`, `is_trial`, `is_adopted`, `adoption_date`, `bio`, `id_cat`) VALUES
(2, 'Akaï', '2022-08-01', 0, 0, 0, NULL, 'Akaï est un chat résident à la Société Protectrice des Animaux (SPA). Ce félin, au pelage doux et roux, dégage une aura chaleureuse et pleine de vie. Akaï est un compagnon joueur et affectueux, prêt à partager des moments de tendresse avec une famille aimante. Doté d\'une personnalité unique, Akaï attend avec impatience de trouver un foyer aimant où il pourra apporter de la joie et recevoir l\'amour qu\'il mérite.', 2),
(3, 'Nala', '2021-05-01', 1, 0, 0, NULL, 'Nala, une charmante chatte résidant à la Société Protectrice des Animaux (SPA), captivera votre cœur avec son regard expressif et sa fourrure douce aux nuances variées. Élégante et pleine de grâce, Nala est une compagne douce et curieuse qui éveillera votre foyer de sa présence joyeuse. Cette féline en quête d\'affection cherche une famille attentionnée prête à partager des moments de complicité et de tendresse. Adopter Nala, c\'est offrir un foyer chaleureux à une amie fidèle qui saura illuminer votre quotidien de sa personnalité attachante.', 2),
(4, 'Punchy', '2023-01-01', 1, 0, 0, NULL, 'Punchy, un adorable chat pensionnaire à la Société Protectrice des Animaux (SPA), est un petit félin au charme irrésistible. Avec son pelage aux teintes vibrantes et son regard espiègle, Punchy incarne la vivacité et la joie de vivre. Ce compagnon plein d\'énergie est prêt à apporter une touche d\'animation et de dynamisme à votre foyer. Punchy recherche une famille pleine d\'amour et de jeux, prête à partager des moments de complicité avec ce chat vif et attachant. Adopter Punchy, c\'est accueillir un membre plein de vie dans votre foyer.', 2),
(5, 'Roméo', '2022-05-01', 1, 0, 0, NULL, 'Roméo, ce charmant chat résidant à la Société Protectrice des Animaux (SPA), est un véritable séducteur au pelage élégant et aux yeux doux empreints de douceur. Ce félin raffiné dégage une aura d\'affection et de tranquillité, faisant de lui le compagnon idéal pour une maison aimante. Roméo, avec sa personnalité câline et apaisante, aspire à partager sa tendresse avec une famille qui saura apprécier son calme et lui offrir l\'amour qu\'il mérite. Adopter Roméo, c\'est accueillir dans son foyer un compagnon fidèle prêt à égayer chaque jour de sa présence douce et réconfortante.', 2),
(6, 'Saphir', '2021-05-01', 0, 0, 0, NULL, 'Saphir, un élégant félin mâle, attend avec grâce à la Société Protectrice des Animaux (SPA) une famille aimante prête à partager son quotidien avec ce chat plein de charme. Son pelage d\'un bleu profond et ses yeux étincelants confèrent à Saphir une beauté exceptionnelle. Ce compagnon félin, doux et curieux, aspire à explorer un nouveau foyer et à établir des liens étroits avec ses futurs compagnons humains. Adopter Saphir, c\'est offrir à votre foyer la compagnie d\'un chat noble et affectueux, prêt à enrichir votre vie de sa présence raffinée et attachante.', 2),
(7, 'Saturnin', '2021-06-05', 0, 0, 0, NULL, 'Saturnin, un charmant chat mâle, attend patiemment à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Son nom évoque la douceur et la sérénité, une personnalité qui se reflète dans son regard curieux et ses mouvements gracieux. Saturnin, avec son pelage soyeux et sa présence calme, promet d\'apporter une touche de réconfort et de joie à la maison qui aura la chance de l\'accueillir. Adopter Saturnin, c\'est inviter dans votre vie un compagnon félin plein de charme et de douceur, prêt à partager des moments précieux et à égayer chaque jour.', 2),
(8, 'Themis', '2022-04-18', 0, 0, 0, NULL, 'Thémis, un élégant chat mâle, attend avec sérénité à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Son nom, inspiré de la déesse grecque de la justice, reflète la dignité et la grâce qui caractérisent ce félin. Thémis séduit par son pelage soyeux et son regard empreint de douceur. Ce compagnon félin, calme et observateur, aspire à partager sa compagnie avec une famille prête à offrir l\'affection et la sécurité qu\'il mérite. Adopter Thémis, c\'est accueillir dans votre vie un chat noble et attentif, prêt à enrichir votre quotidien de sa présence empreinte de charme et d\'harmonie.', 2),
(9, 'Yermolay', '2017-07-22', 1, 0, 0, NULL, 'Yermolay, une délicate chatte, attend avec grâce à la Société Protectrice des Animaux (SPA) en quête d\'un foyer aimant. Son nom unique évoque une personnalité douce et charmante, reflétant la beauté de cette féline. Avec son pelage délicat et son regard empreint de curiosité, Yermolay promet d\'apporter une touche de tendresse à la maison qui aura la chance de l\'accueillir. Cette compagne féline, douce et pleine de charme, cherche une famille prête à offrir amour et sécurité. Adopter Yermolay, c\'est inviter dans votre vie une compagne féline délicate et pleine de douceur, prête à partager des moments de bonheur et de complicité.', 2),
(10, 'Angie', '2017-11-30', 1, 0, 0, NULL, 'Angie, une douce femelle, attend avec impatience à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Son tempérament aimable et son énergie modérée font d\'elle une compagne idéale pour une famille attentionnée. Adopter Angie, c\'est accueillir une amie fidèle prête à partager de joyeux moments.', 1),
(11, 'Black', '2017-12-12', 0, 0, 0, NULL, 'Black, un mâle robuste et élégant, cherche un foyer chaleureux à la Société Protectrice des Animaux (SPA). Avec son pelage d\'ébène et son regard attentif, Black promet d\'apporter de la force et de la loyauté à sa future famille. Adopter Black, c\'est choisir un compagnon fidèle et plein de charme.', 1),
(12, 'Cortes', '2017-04-04', 0, 0, 0, NULL, 'Cortes, un mâle plein de vitalité, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver une famille dynamique. Son énergie débordante et sa joie de vivre en font le partenaire idéal pour des aventures et des moments de jeu. Adopter Cortes, c\'est inviter l\'excitation et la vitalité dans votre vie.', 1),
(13, 'Eclair', '2019-04-15', 1, 0, 0, NULL, 'Éclair, une femelle vive et pleine d\'énergie, cherche un foyer actif à la Société Protectrice des Animaux (SPA). Son nom reflète sa vivacité et son enthousiasme pour la vie. Adopter Éclair, c\'est accueillir une compagne pleine d\'énergie, prête à illuminer chaque journée de sa présence vibrante.', 1),
(14, 'Fender', '2021-10-01', 0, 0, 0, NULL, 'Fender, un mâle plein de charme, attend avec impatience à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son tempérament équilibré et son regard intelligent, Fender promet d\'apporter de la compagnie et de la loyauté à sa future famille. Adopter Fender, c\'est inviter dans votre vie un ami fidèle prêt à partager des moments de bonheur.', 1),
(15, 'Ibiza', '2013-05-01', 1, 0, 0, NULL, 'Ibiza, une charmante femelle, cherche un foyer accueillant à la Société Protectrice des Animaux (SPA). Son élégance et sa douceur en font une compagne idéale pour une famille aimante. Adopter Ibiza, c\'est choisir une amie pleine de grâce et prête à apporter de la chaleur à votre quotidien.', 1),
(16, 'Jordan', '2020-06-01', 0, 0, 0, NULL, 'Jordan, un mâle plein de caractère, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son charme unique et son regard expressif, Jordan promet d\'apporter de la joie et de la vivacité à sa future famille. Adopter Jordan, c\'est inviter dans votre vie un compagnon loyal, prêt à partager des moments de complicité et d\'aventures.', 1),
(17, 'Juju', '2012-08-01', 0, 0, 0, NULL, 'Juju, un mâle au tempérament unique, attend avec impatience à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son charisme particulier et son regard captivant, Juju promet d\'apporter une présence pleine de charme et de personnalité à sa future famille. Adopter Juju, c\'est choisir un compagnon plein de caractère, prêt à partager des moments spéciaux et à enrichir votre vie de sa présence attachante.', 1),
(18, 'Kogi', '2022-06-01', 0, 0, 0, NULL, 'Kogi, un mâle plein de vie, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son énergie contagieuse et son regard espiègle, Kogi promet d\'apporter de la joie et de l\'animation à sa future famille. Adopter Kogi, c\'est choisir un compagnon joueur et affectueux, prêt à partager des moments de bonheur et d\'aventures dans votre vie quotidienne.', 1),
(19, 'Milo', '2019-02-13', 0, 0, 0, NULL, 'Milo, un mâle chien-rmant, attend avec impatience à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son tempérament équilibré et son regard expressif, Milo promet d\'apporter de la compagnie et de la loyauté à sa future famille. Adopter Milo, cest choisir un ami fidèle prêt à partager des moments de bonheur.', 1),
(20, 'Moka', '2021-11-01', 0, 0, 0, NULL, 'Moka, un mâle plein de douceur, cherche un foyer accueillant à la Société Protectrice des Animaux (SPA). Son calme et son charme en font un compagnon idéal pour une famille aimante. Adopter Moka, c\'est choisir un ami plein de tendresse prêt à apporter de la chaleur à votre quotidien.', 1),
(21, 'Pepita', '2019-11-27', 1, 0, 0, NULL, 'Pépita, une charmante femelle, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Son élégance et sa douceur en font une compagne idéale pour une famille attentionnée. Adopter Pépita, c\'est choisir une amie pleine de grâce, prête à apporter de la joie et de l\'amour à votre vie quotidienne.\r\n\r\n', 1),
(22, 'Pouik', '2014-05-01', 0, 0, 0, NULL, 'Pouik, un mâle au nom espiègle, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son charme unique et son regard plein de malice, Pouik promet d\'apporter de la joie et de l\'animation à sa future famille. Adopter Pouik, c\'est choisir un compagnon plein de caractère, prêt à partager des moments ludiques et à égayer votre quotidien de sa présence espiègle.', 1),
(23, 'Rally', '2022-07-12', 0, 0, 0, NULL, 'Rally, un mâle au nom dynamique, attend avec impatience à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son énergie vive et son regard plein d\'enthousiasme, Rally promet d\'apporter de la vitalité et de l\'animation à sa future famille. Adopter Rally, c\'est choisir un compagnon plein de vie, prêt à partager des aventures et à apporter de la joie à votre quotidien.', 1),
(24, 'Ramses', '2016-05-01', 0, 0, 0, NULL, 'Ramses, un mâle majestueux, attend avec sérénité à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son charme noble et son regard attentif, Ramses promet d\'apporter de la grâce et de la loyauté à sa future famille. Adopter Ramses, c\'est choisir un compagnon plein de dignité, prêt à partager des moments calmes et à enrichir votre vie de sa présence noble et affectueuse.', 1),
(25, 'Romance', '2018-05-01', 1, 0, 0, NULL, 'Romance, une femelle au nom délicat, attend avec tendresse à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa grâce naturelle et son regard doux, Romance promet d\'apporter de l\'affection et de la douceur à sa future famille. Adopter Romance, c\'est choisir une compagne pleine de charme, prête à partager des moments tendres et à égayer votre quotidien de sa présence délicate.', 1),
(26, 'Romy', '2023-10-01', 1, 0, 0, NULL, 'Romy, une femelle au charme unique, attend avec douceur à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa personnalité délicate et son regard expressif, Romy promet d\'apporter de la tendresse et de la compagnie à sa future famille. Adopter Romy, c\'est choisir une compagne pleine de douceur, prête à partager des moments affectueux et à embellir votre quotidien de sa présence chaleureuse.', 1),
(27, 'Selfy', '0202-01-01', 1, 0, 0, NULL, 'Selfy, une femelle au nom captivant, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son charme unique et son regard expressif, Selfy promet d\'apporter de la joie et de la vivacité à sa future famille. Adopter Selfy, c\'est choisir une compagne pleine de personnalité, prête à partager des moments joyeux et à égayer votre quotidien de sa présence affectueuse.', 1),
(28, 'Sherkan', '2022-01-15', 0, 0, 0, NULL, 'Sherkan, un mâle au nom puissant, attend avec majesté à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa prestance et son regard fier, Sherkan promet d\'apporter de la noblesse et de la loyauté à sa future famille. Adopter Sherkan, c\'est choisir un compagnon plein de charisme, prêt à partager des moments calmes empreints de dignité et à enrichir votre vie de sa présence noble et affectueuse.', 1),
(29, 'Sharf', '2022-04-18', 0, 0, 0, NULL, 'Sharf, un mâle au nom fort et dynamique, attend avec détermination à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa présence robuste et son regard attentif, Sharf promet d\'apporter de la loyauté et de la vitalité à sa future famille. Adopter Sharf, c\'est choisir un compagnon plein de force et de caractère, prêt à partager des moments d\'aventure et à enrichir votre vie de sa présence puissante et attachante.', 1),
(30, 'Tag', '2021-10-01', 0, 0, 0, NULL, 'Tag, un mâle au nom vif et dynamique, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son énergie contagieuse et son regard espiègle, Tag promet d\'apporter de la vitalité et de la joie à sa future famille. Adopter Tag, c\'est choisir un compagnon plein de vivacité, prêt à partager des moments d\'aventure et à égayer votre quotidien de sa présence enjouée et attachante.', 1),
(31, 'Twister', '2019-07-09', 0, 0, 0, NULL, 'Twister, un mâle au nom dynamique, attend avec entrain à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son énergie tourbillonnante et son regard espiègle, Twister promet d\'apporter de la vitalité et de la joie à sa future famille. Adopter Twister, c\'est choisir un compagnon plein d\'entrain, prêt à partager des moments d\'aventure et à égayer votre quotidien de sa présence pleine de vie et attachante.', 1),
(32, 'Tyser', '2011-07-01', 0, 0, 0, NULL, 'Tyser, un mâle au nom distinctif, attend avec impatience à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa personnalité unique et son regard expressif, Tyser promet d\'apporter de la compagnie et de la loyauté à sa future famille. Adopter Tyser, c\'est choisir un compagnon plein de charme, prêt à partager des moments de complicité et à égayer votre quotidien de sa présence attachante.', 1),
(33, 'Ulk', '2022-07-14', 0, 0, 0, NULL, 'Ulk, un mâle au nom robuste, attend avec détermination à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa présence forte et son regard attentif, Ulk promet d\'apporter de la loyauté et de la force à sa future famille. Adopter Ulk, c\'est choisir un compagnon plein de caractère, prêt à partager des moments de complicité et à enrichir votre vie de sa présence puissante et attachante.', 1),
(34, 'Ulysse', '2021-03-01', 0, 0, 0, NULL, 'Ulysse, un mâle au nom empreint de caractère, attend avec grâce à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son charme unique et son regard expressif, Ulysse promet d\'apporter de la compagnie et de la loyauté à sa future famille. Adopter Ulysse, c\'est choisir un compagnon plein de charisme, prêt à partager des moments de complicité et à égayer votre quotidien de sa présence attachante.', 1),
(35, 'Uzi', '2022-01-01', 0, 0, 0, NULL, 'Uzi, un mâle au nom dynamique, attend avec entrain à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec son énergie contagieuse et son regard espiègle, Uzi promet d\'apporter de la vitalité et de la joie à sa future famille. Adopter Uzi, c\'est choisir un compagnon plein d\'entrain, prêt à partager des moments d\'aventure et à égayer votre quotidien de sa présence pleine de vie et attachante.', 1),
(36, 'Volt', '2021-10-01', 0, 0, 0, NULL, 'Volt, une femelle au nom énergique, attend avec enthousiasme à la Société Protectrice des Animaux (SPA) pour trouver un foyer aimant. Avec sa personnalité vive et son regard plein d\'éclat, Volt promet d\'apporter de la vitalité et de la joie à sa future famille. Adopter Volt, c\'est choisir une compagne pleine de dynamisme, prête à partager des moments d\'aventure et à égayer votre quotidien de sa présence énergique et attachante.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id_pic` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `id_pet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id_pic`, `path`, `id_pet`) VALUES
(3, 'img/chats/akai_chat/img_akai.jpg', 2),
(4, 'img/chats/nala_chat/img_nala.jpg', 3),
(5, 'img/chats/punchy_chat/img_punchy.jpg', 4),
(6, 'img/chats/romeo_chat/img_romeo.jpg', 5),
(7, 'img/chats/saphir_chat/img_saphir.jpg', 6),
(8, 'img/chats/saturnin_chat/img_saturnin.jpg', 7),
(9, 'img/chats/themis_chat/img_themis.jpg', 8),
(10, 'img/chats/yermolay_chat/img_yermolay.jpg', 9),
(11, 'img/chiens/milo_chien/img_milo.jpg', 19),
(12, 'img/chiens/angie_chien/img_angie.jpg', 10),
(13, 'img/chiens/black_chien/img_black.jpg', 11),
(14, 'img/chiens/cortes_chien/img_cortes.jpg', 12),
(15, 'img/chiens/eclair_chien/img_eclair.jpg', 13),
(16, 'img/chiens/fender_chien/img_fender.jpg', 14),
(17, 'img/chiens/ibiza_chien/img_ibiza.jpg', 15),
(18, 'img/chiens/jordan_chien/img_jordan.jpg', 16),
(19, 'img/chiens/juju_chien/img_juju.jpg', 17),
(20, 'img/chiens/kogi_chien/img_kogi.jpg', 18),
(21, 'img/chiens/moka_chien/img_moka.jpg', 20),
(22, 'img/chiens/pepita_chien/img_pepita.jpg', 21),
(23, 'img/chiens/pouik_chien/img_pouik.jpg', 22),
(24, 'img/chiens/rally_chien/img_rally.jpg', 23),
(25, 'img/chiens/romance_chien/img_romance.jpg', 25),
(26, 'img/chiens/ramses_chien/img_ramses.jpg', 24),
(27, 'img/chiens/rony_chien/img_rony.jpg', 26),
(28, 'img/chiens/selfy_chien/img_selfy.jpg', 27),
(29, 'img/chiens/sharf_chien/img_sharf.jpg', 29),
(30, 'img/chiens/sherkan_chien/img_sherkan.jpg', 28),
(31, 'img/chiens/tag_chien/img_tag.jpg', 30),
(32, 'img/chiens/twister_chien/img_twister.jpg', 31),
(33, 'img/chiens/tyser_chien/img_tyser.jpg', 32),
(34, 'img/chiens/ulk_chien/img_ulk.jpg', 33),
(35, 'img/chiens/ulysse_chien/img_ulysse.jpg', 34),
(36, 'img/chiens/uzi_chien/img_uzi.jpg', 35),
(37, 'img/chiens/volt_chien/img_volt.jpg', 36);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `duration` date DEFAULT NULL,
  `ticket_valid` int(11) DEFAULT NULL,
  `ticket_name` varchar(255) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Index pour la table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`id_customer`,`id_group`),
  ADD KEY `id_group` (`id_group`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Index pour la table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_pic`),
  ADD KEY `id_pet` (`id_pet`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_group` (`id_group`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id_pic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customer_group`
--
ALTER TABLE `customer_group`
  ADD CONSTRAINT `customer_group_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `customer_group_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);

--
-- Contraintes pour la table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
