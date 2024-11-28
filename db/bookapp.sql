-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 31 oct. 2024 à 18:20
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
-- Base de données : `bookapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_authors`
--

CREATE TABLE `tbl_authors` (
  `id_author` int(11) NOT NULL,
  `names` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_authors`
--

INSERT INTO `tbl_authors` (`id_author`, `names`) VALUES
(4, 'MJ De Marco'),
(6, 'Ricardo KANIAMA');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `id_book` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `typeDoc` enum('Ouvrage','TFC','Memoire','Rapport de Stage','Projet Tututoré') DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `book_file` varchar(100) DEFAULT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `format` enum('ebook','paper') DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `nbr_page` int(11) DEFAULT NULL,
  `edition` varchar(100) DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `id_book_language` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `statut` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_books`
--

INSERT INTO `tbl_books` (`id_book`, `titre`, `typeDoc`, `isbn`, `book_file`, `descr`, `format`, `qty`, `nbr_page`, `edition`, `id_author`, `id_genre`, `id_book_language`, `publisher_id`, `created_at`, `statut`) VALUES
(2, 'La chevre de ma mere', 'Rapport de Stage', '2-3983-46789', 'Public/Uploads/', 'e4ryuhioertyuh ertyuio45rt6y7 g67yu8i9o67yu8 56t7y8u9i', 'paper', 1, 150, '2019', 6, 4, 3, 5, '2024-10-31 14:10:38', '0');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_books_language`
--

CREATE TABLE `tbl_books_language` (
  `id_book_language` int(11) NOT NULL,
  `names` varchar(20) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_books_language`
--

INSERT INTO `tbl_books_language` (`id_book_language`, `names`, `code`) VALUES
(2, 'Français', 'FR'),
(3, 'English', 'EN'),
(4, 'Kiswahili', 'SW'),
(6, 'KIBEMBE', 'KB'),
(7, 'KIRUNDI', 'KIR'),
(9, 'KINYARWANDA', 'RW'),
(10, 'KIZULU', 'ZL');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `classe_id` int(11) NOT NULL,
  `classe` varchar(100) DEFAULT NULL,
  `promotion` varchar(20) NOT NULL,
  `dep_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tbl_classes`
--

INSERT INTO `tbl_classes` (`classe_id`, `classe`, `promotion`, `dep_id`) VALUES
(1, 'BAC1', '', 6),
(2, 'BAC2', '', 6),
(4, 'LS', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_departements`
--

CREATE TABLE `tbl_departements` (
  `dep_id` int(11) NOT NULL,
  `dep` varchar(100) DEFAULT NULL,
  `fac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_departements`
--

INSERT INTO `tbl_departements` (`dep_id`, `dep`, `fac_id`) VALUES
(2, 'Reseautique', 2),
(3, 'Info Gestion', 2),
(6, 'DA', 1),
(8, 'GRH', 1),
(10, 'COMPTE', 1),
(12, 'Finances et Banques', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_doc_visits`
--

CREATE TABLE `tbl_doc_visits` (
  `doc_id` int(11) NOT NULL,
  `nbr_visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_doc_visits`
--

INSERT INTO `tbl_doc_visits` (`doc_id`, `nbr_visit`) VALUES
(1, 5),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_emprunts`
--

CREATE TABLE `tbl_emprunts` (
  `emprunt_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `date_emprunt` date DEFAULT NULL,
  `returned` enum('0','1') DEFAULT '0',
  `date_demande` timestamp NOT NULL DEFAULT current_timestamp(),
  `statut` enum('0','1','2') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_emprunts`
--

INSERT INTO `tbl_emprunts` (`emprunt_id`, `member_id`, `id_book`, `date_emprunt`, `returned`, `date_demande`, `statut`) VALUES
(1, 1, 2, '2024-10-21', '1', '2024-10-20 15:30:52', '2'),
(2, 1, 2, '2024-10-21', '1', '2024-10-21 15:35:48', '2'),
(3, 1, 5, '2024-10-31', '0', '2024-10-31 10:21:05', '2');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_faculties`
--

CREATE TABLE `tbl_faculties` (
  `fac_id` int(11) NOT NULL,
  `fac` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_faculties`
--

INSERT INTO `tbl_faculties` (`fac_id`, `fac`) VALUES
(1, 'Science Commerciale &amp; Administration'),
(2, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_genres`
--

CREATE TABLE `tbl_genres` (
  `id_genre` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_genres`
--

INSERT INTO `tbl_genres` (`id_genre`, `name`, `description`) VALUES
(4, 'Développement', ''),
(5, 'Roman', ''),
(7, 'Informatiques', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `agent` text NOT NULL,
  `host` varchar(200) NOT NULL,
  `descriptions` text NOT NULL,
  `action` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deconnect_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `ip`, `agent`, `host`, `descriptions`, `action`, `created_at`, `deconnect_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'adminest connecté avec succès.', '2024-10-21 14:24:37', '0000-00-00 00:00:00'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Librarian Login', 'Latifah est connecté avec succès.', '2024-10-21 14:29:44', '0000-00-00 00:00:00'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-21 15:16:11', '0000-00-00 00:00:00'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Librarian Login', 'Latifah est connecté avec succès.', '2024-10-21 15:17:49', '0000-00-00 00:00:00'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-21 15:19:48', '0000-00-00 00:00:00'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-21 15:19:52', '2024-10-21 17:19:52'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-21 15:20:21', '0000-00-00 00:00:00'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-21 15:34:01', '2024-10-21 17:34:01'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'SADICKY', 'Membre Login', 'SADICKY Dave SADICKY est connecté avec succès.', '2024-10-21 15:34:23', '0000-00-00 00:00:00'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-21 15:38:28', '2024-10-21 17:38:28'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Librarian Login', 'Latifah est connecté avec succès.', '2024-10-21 15:38:38', '0000-00-00 00:00:00'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-21 15:52:48', '0000-00-00 00:00:00'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-21 16:57:41', '2024-10-21 18:57:41'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'SADICKY', 'Librarian Login', 'Latifah est connecté avec succès.', '2024-10-21 16:57:49', '0000-00-00 00:00:00'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-28 18:17:06', '0000-00-00 00:00:00'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Qedir Sadicky Champion est deconnecté avec succès.', '2024-10-28 19:46:36', '2024-10-28 21:46:36'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Login', 'MATENGA DAVID SADIKI est connecté avec succès.', '2024-10-28 19:49:46', '0000-00-00 00:00:00'),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Librarian Login', 'Latifah est connecté avec succès.', '2024-10-28 19:50:26', '0000-00-00 00:00:00'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Librarian Logout', 'Latifah est deconnecté avec succès.', '2024-10-28 19:57:37', '2024-10-28 21:57:37'),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Logout', 'MATENGA DAVID SADIKI est deconnecté avec succès.', '2024-10-28 19:57:52', '2024-10-28 21:57:52'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Login', 'SADICKY Dave SADICKY est connecté avec succès.', '2024-10-28 20:12:13', '0000-00-00 00:00:00'),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-28 20:15:33', '0000-00-00 00:00:00'),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Logout', 'SADICKY Dave SADICKY est deconnecté avec succès.', '2024-10-28 20:20:57', '2024-10-28 22:20:57'),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'SGAC Login', 'Pacifique Nyabagaza est connecté avec succès.', '2024-10-28 20:21:06', '0000-00-00 00:00:00'),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'SGAC Logout', 'Pacifique Nyabagaza est deconnecté avec succès.', '2024-10-28 20:29:28', '2024-10-28 22:29:28'),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-28 20:34:09', '0000-00-00 00:00:00'),
(27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'akadearn.test', 'admin Logout', ' est deconnecté avec succès.', '2024-10-31 10:16:02', '2024-10-31 12:16:02'),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-31 10:16:09', '0000-00-00 00:00:00'),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'admin Logout', ' est deconnecté avec succès.', '2024-10-31 10:17:51', '2024-10-31 12:17:51'),
(30, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Librarian Login', 'Latifah est connecté avec succès.', '2024-10-31 10:17:58', '0000-00-00 00:00:00'),
(31, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Membre Login', 'SADICKY Dave SADICKY est connecté avec succès.', '2024-10-31 10:18:51', '0000-00-00 00:00:00'),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Membre Logout', 'SADICKY Dave SADICKY est deconnecté avec succès.', '2024-10-31 10:21:54', '2024-10-31 12:21:54'),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Membre Login', 'MATENGA DAVID SADIKI est connecté avec succès.', '2024-10-31 10:22:01', '0000-00-00 00:00:00'),
(34, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Membre Logout', 'MATENGA DAVID SADIKI est deconnecté avec succès.', '2024-10-31 10:34:51', '2024-10-31 12:34:51'),
(35, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Membre Login', 'SADICKY Dave SADICKY est connecté avec succès.', '2024-10-31 10:34:56', '0000-00-00 00:00:00'),
(36, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Qedir Sadicky Champion est deconnecté avec succès.', '2024-10-31 11:12:07', '2024-10-31 13:12:07'),
(37, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 11:20:41', '0000-00-00 00:00:00'),
(38, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-31 11:21:04', '2024-10-31 13:21:04'),
(39, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Login', 'MATENGA DAVID SADIKI est connecté avec succès.', '2024-10-31 11:21:09', '0000-00-00 00:00:00'),
(40, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Logout', 'MATENGA DAVID SADIKI est deconnecté avec succès.', '2024-10-31 11:22:28', '2024-10-31 13:22:28'),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 11:22:33', '0000-00-00 00:00:00'),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-31 11:38:17', '0000-00-00 00:00:00'),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-31 13:23:25', '0000-00-00 00:00:00'),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-31 13:31:26', '0000-00-00 00:00:00'),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', ' Logout', ' est deconnecté avec succès.', '2024-10-31 13:32:37', '2024-10-31 15:32:37'),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-31 13:59:12', '0000-00-00 00:00:00'),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', ' Logout', ' est deconnecté avec succès.', '2024-10-31 14:04:07', '2024-10-31 16:04:07'),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 14:04:12', '0000-00-00 00:00:00'),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 14:05:23', '0000-00-00 00:00:00'),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Qedir Sadicky Champion est deconnecté avec succès.', '2024-10-31 15:24:33', '2024-10-31 17:24:33'),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 15:50:33', '0000-00-00 00:00:00'),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-31 15:50:38', '2024-10-31 17:50:38'),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Qedir Sadicky Champion est connecté avec succès.', '2024-10-31 15:52:31', '0000-00-00 00:00:00'),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Qedir Sadicky Champion est deconnecté avec succès.', '2024-10-31 15:52:36', '2024-10-31 17:52:36'),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 15:54:26', '0000-00-00 00:00:00'),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Logout', 'Monga est deconnecté avec succès.', '2024-10-31 15:58:57', '2024-10-31 17:58:57'),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Login', 'SADICKY  Dave est connecté avec succès.', '2024-10-31 16:06:52', '0000-00-00 00:00:00'),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Membre Logout', 'SADICKY  Dave est deconnecté avec succès.', '2024-10-31 16:56:28', '2024-10-31 18:56:28'),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'SADICKY', 'Admin Login', 'Monga est connecté avec succès.', '2024-10-31 16:56:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id_member` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `postnom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `card_number` varchar(100) DEFAULT NULL,
  `type` enum('I','E') DEFAULT NULL,
  `provenance` varchar(100) DEFAULT NULL,
  `contact_autorite` varchar(100) DEFAULT NULL,
  `matricule` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `tel` varchar(50) NOT NULL,
  `code` varchar(150) NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `photo` varchar(150) NOT NULL,
  `statut` enum('0','1') NOT NULL,
  `classe_id` int(11) DEFAULT 0,
  `promotion` varchar(150) NOT NULL,
  `fonction` varchar(120) NOT NULL,
  `ville` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_members`
--

INSERT INTO `tbl_members` (`id_member`, `nom`, `postnom`, `prenom`, `sexe`, `card_number`, `type`, `provenance`, `contact_autorite`, `matricule`, `email`, `adresse`, `tel`, `code`, `verified_at`, `photo`, `statut`, `classe_id`, `promotion`, `fonction`, `ville`) VALUES
(1, 'SADICKY', 'Dave', 'SADICKY', 'M', 'ET2020060302653', 'I', '', '', 'M-731620', 'akadearn@gmail.com', 'Uvira, Nyamianda, Embouchure', '243979268522', '76784515', '2024-10-19 16:31:37', '', '1', 4, '', 'etudiant', ''),
(2, 'MATENGA', 'DAVID', 'SADIKI', 'M', '', 'E', 'ISDR Uvira', '+243979268522', 'M-974125', 'akadearnmatenga@gmail.com', 'Bwiza', '69124727', '19070763', '2024-10-28 21:48:47', '', '1', 0, '2020-2021', 'etudiant', 'Bujumbura'),
(4, 'SADICKY', '', 'Dave', 'M', 'B-ISC-680259', 'E', 'ISP', '+243979268522', '362650159', 'akadearn1@gmail.com', 'Bwiza', '69124727', '15259204', '2024-10-31 18:04:17', '', '1', 0, '2019-2020', 'etudiant', 'Bujumbura');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_plans`
--

CREATE TABLE `tbl_plans` (
  `id_plan` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `frequence` enum('Semaine','Mois','Année','Illimité') DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_plans`
--

INSERT INTO `tbl_plans` (`id_plan`, `name`, `frequence`, `prix`, `description`) VALUES
(1, 'Basique', 'Semaine', 0, 'Offre Basique d&#039;une semaine à O$'),
(2, 'Offre Etudiant', 'Mois', 2, 'Offre pro pour les etudiants à 2$/Mois'),
(3, 'Offre M. Exterieure', 'Mois', 4, 'Offre Exterieur à 4$/Mois'),
(4, 'Offre Annuel', 'Année', 20, 'Offre Annuel pour à 20$/An'),
(5, 'Offre Illimité', 'Illimité', 300, 'Offre Illimité pour 300$');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_publishers`
--

CREATE TABLE `tbl_publishers` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lieu` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_publishers`
--

INSERT INTO `tbl_publishers` (`publisher_id`, `name`, `lieu`) VALUES
(5, 'Edition de l&#039;Aube', 'Paris, France');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_retour`
--

CREATE TABLE `tbl_retour` (
  `retour_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `date_retour` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_retour`
--

INSERT INTO `tbl_retour` (`retour_id`, `member_id`, `id_book`, `date_retour`) VALUES
(1, 1, 2, '2024-10-20 15:31:11'),
(2, 1, 2, '2024-10-21 15:38:54');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_subscriptions`
--

CREATE TABLE `tbl_subscriptions` (
  `id_subscription` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `debut` varchar(50) DEFAULT NULL,
  `fin` varchar(50) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_subscriptions`
--

INSERT INTO `tbl_subscriptions` (`id_subscription`, `id_member`, `id_plan`, `debut`, `fin`, `status`) VALUES
(1, 1, 1, '1729348315', '1729953115', '1'),
(2, 2, 1, '1730144956', '1730749756', '1'),
(3, 4, 1, '1730390789', '1730995589', '1');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role` enum('Admin','Librarian','SGAC','Membre') NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `noms` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `statut` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `role`, `password`, `noms`, `email`, `tel`, `statut`) VALUES
(1, 'admin', 'Admin', '$2y$10$8n4rDPXmmrCIgp8r/i2KaOWlVgJ9VsWHrrBeoeUuxzJGvx48s01p.', 'Monga', 'mongabook@gmail.com', '', '1'),
(2, 'sadicky', 'Admin', '$2y$10$Ebz.iSNoTMWHsEEdAm/LkO2vLmE4lOz6vWwDkhTgWKQ/Vbb/ftmtu', 'Qedir Sadicky Champion', 'qschampion@gmail.com', '69124727', '1'),
(18, 'M-310672', 'Membre', '$2y$10$LfvSPfu0iP2SRCn6Kl.IL.MHcEHS.8o9eaTRlr4APVkX2xR/bwAQy', 'Muzoni sic aust', 'bet@gmail.com', '0987654356', '1'),
(19, 'M-962438', 'Membre', '$2y$10$T/06mxuv5uiLZSStzAI0eu50Onw6xhzF8NvW1Mr1Dh7Z9cIn2DsFm', 'sis vero vevo', 'ki@gmail.com', '098765453', '1'),
(20, 'M-731620', 'Membre', '$2y$10$5qIfCO84LHOamx.b4RbpRemR6/wrxkxxpjNuOxLh1.26F2gW7ohlK', 'SADICKY Dave SADICKY', 'akadearn@gmail.com', '243979268522', '1'),
(21, 'latifa', 'Librarian', '$2y$10$qMjQyPpYWKewmx8RussRnOLM6hTBMM6juT/EOHlGETcaLlhKauaIm', 'Latifah', 'latifah@gmail.com', '69124727', '1'),
(22, 'pacifique', 'SGAC', '$2y$10$NJ2kXQscxwPfM7OdY3adA.IKSxcUOY9xQgQE9dTrUN1UkxT3LR1Sm', 'Pacifique Nyabagaza', 'Pacifiquenyabagaza@gmail.com', '69124727', '0'),
(23, 'M-974125', 'Membre', '$2y$10$wRDk0t96mRl5lIRc0vHCLOUeoeKz/A3VJMz9zy/WWPfMlNBP0rBe.', 'MATENGA DAVID SADIKI', 'akadearnmatenga@gmail.com', '69124727', '1'),
(25, 'B-ISC-680259', 'Membre', '$2y$10$R.N.HChdsiIhSE5b1pF3weP0C2VF.JJaBQvc46IP7AfiL2i1D9Sza', 'SADICKY  Dave', 'akadearn1@gmail.com', '69124727', '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  ADD PRIMARY KEY (`id_author`);

--
-- Index pour la table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`id_book`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Index pour la table `tbl_books_language`
--
ALTER TABLE `tbl_books_language`
  ADD PRIMARY KEY (`id_book_language`);

--
-- Index pour la table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`classe_id`);

--
-- Index pour la table `tbl_departements`
--
ALTER TABLE `tbl_departements`
  ADD PRIMARY KEY (`dep_id`);

--
-- Index pour la table `tbl_doc_visits`
--
ALTER TABLE `tbl_doc_visits`
  ADD PRIMARY KEY (`doc_id`);

--
-- Index pour la table `tbl_emprunts`
--
ALTER TABLE `tbl_emprunts`
  ADD PRIMARY KEY (`emprunt_id`);

--
-- Index pour la table `tbl_faculties`
--
ALTER TABLE `tbl_faculties`
  ADD PRIMARY KEY (`fac_id`);

--
-- Index pour la table `tbl_genres`
--
ALTER TABLE `tbl_genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Index pour la table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id_member`);

--
-- Index pour la table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  ADD PRIMARY KEY (`id_plan`);

--
-- Index pour la table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Index pour la table `tbl_retour`
--
ALTER TABLE `tbl_retour`
  ADD PRIMARY KEY (`retour_id`);

--
-- Index pour la table `tbl_subscriptions`
--
ALTER TABLE `tbl_subscriptions`
  ADD PRIMARY KEY (`id_subscription`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_books_language`
--
ALTER TABLE `tbl_books_language`
  MODIFY `id_book_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `classe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_departements`
--
ALTER TABLE `tbl_departements`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tbl_emprunts`
--
ALTER TABLE `tbl_emprunts`
  MODIFY `emprunt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_faculties`
--
ALTER TABLE `tbl_faculties`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_genres`
--
ALTER TABLE `tbl_genres`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbl_plans`
--
ALTER TABLE `tbl_plans`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tbl_retour`
--
ALTER TABLE `tbl_retour`
  MODIFY `retour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_subscriptions`
--
ALTER TABLE `tbl_subscriptions`
  MODIFY `id_subscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
