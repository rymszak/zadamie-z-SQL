-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 10, 2024 at 01:22 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serwis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `nazwisko` varchar(64) NOT NULL,
  `firma` varchar(128) NOT NULL,
  `ostatnie_logowanie` datetime DEFAULT NULL,
  `data_utworzenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `nazwisko`, `firma`, `ostatnie_logowanie`, `data_utworzenia`) VALUES
(1, 'kowalski', 'januszex', '2024-06-12 00:00:00', '2024-06-01'),
(2, 'Nowak', 'TechCorp', NULL, '2024-06-10'),
(4, 'Rymsza', 'Beta', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id_klienta` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konta`
--

INSERT INTO `konta` (`id_klienta`, `login`, `haslo`) VALUES
(1, 'jan@kowalski.gmail.com', 'kochamkotki123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id_zgloszenia` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `problem` enum('niedziałający_komputer','wyczyszczenie_monitora','problem_z_klawiaturą') NOT NULL,
  `komentarz` text DEFAULT NULL,
  `priorytet` int(11) NOT NULL,
  `data_zgloszenia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zgloszenia`
--

INSERT INTO `zgloszenia` (`id_zgloszenia`, `id_klienta`, `problem`, `komentarz`, `priorytet`, `data_zgloszenia`) VALUES
(3, 4, 'problem_z_klawiaturą', 'klawiatura przestała działać', 0, '2024-06-10 10:06:22'),
(4, 4, 'wyczyszczenie_monitora', 'monitor', 0, '2024-06-10 10:08:17'),
(5, 4, 'niedziałający_komputer', 'pc', 0, '2024-06-10 10:08:35'),
(6, 4, 'niedziałający_komputer', '', 1, '2024-06-10 10:09:22'),
(7, 4, 'problem_z_klawiaturą', '', 0, '2024-06-10 10:09:33'),
(8, 4, 'wyczyszczenie_monitora', '', 2, '2024-06-10 10:09:43'),
(9, 4, 'niedziałający_komputer', '', 0, '2024-06-10 10:19:54'),
(10, 4, 'problem_z_klawiaturą', 'klawiatura', 0, '2024-06-10 10:20:36'),
(11, 4, 'niedziałający_komputer', '', 1, '2024-06-10 10:26:58');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `haslo` (`haslo`),
  ADD KEY `id_klienta` (`id_klienta`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id_zgloszenia`),
  ADD KEY `id_klienta` (`id_klienta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id_zgloszenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `konta_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`);

--
-- Constraints for table `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
