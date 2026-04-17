-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 17, 2026 at 12:41 PM
-- Server version: 8.4.8
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Gerechten`
--

CREATE TABLE `Gerechten` (
  `id` int NOT NULL,
  `foto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `naam` varchar(50) NOT NULL,
  `beschrijving` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Gerechten`
--

INSERT INTO `Gerechten` (`id`, `foto`, `naam`, `beschrijving`, `prijs`, `type`) VALUES
(1, 'Images-restaurant-gerechten\\Starters\\dim-sum-6-stuks.jpg', 'Dim Sum (6 stuks)', 'Gestoomde dumplings met dipsaus', 8.50, 'Starters'),
(2, 'Images-restaurant-gerechten\\Starters\\komkommersalade.jpg', 'Komkommersalade', 'Met sesamolie en verse knoflook', 5.50, 'Starters'),
(3, 'Images-restaurant-gerechten\\Starters\\lente-uitjeskoek.jpg', 'Lente uitjeskoek', 'Krokante pannenkoek met lente-uitjes', 5.00, 'Starters'),
(4, 'Images-restaurant-gerechten\\Starters\\loempias.jpg', 'Loempia (6 stuks)', 'Knapperige loempia met zoetzure saus', 9.00, 'Starters'),
(5, 'Images-restaurant-gerechten\\Starters\\wonton-soep.jpg', 'Wontonsoep', 'Zachte wontons in heldere bouillon', 7.00, 'Starters'),
(6, 'Images-restaurant-gerechten\\Starters\\zure-pikante-soep.jpg', 'Zure pikante soep', 'Klassieke soep met tofu en bamboescheuten', 7.50, 'Starters'),
(7, 'Images-restaurant-gerechten\\Hoofdgerechten\\bami-goreng.jpg', 'Bami Goreng', 'Gebakken noedels met groenten', 10.50, 'Hoofdgerechten'),
(8, 'Images-restaurant-gerechten\\Hoofdgerechten\\nasi-goreng.jpg', 'Nasi Goreng', 'Gebakken rijst met ei en groenten', 10.50, 'Hoofdgerechten'),
(9, 'Images-restaurant-gerechten\\Hoofdgerechten\\garnalen-oestersaus.jpg', 'Garnalen Oestersaus', 'Verse garnalen met peulvruchten', 14.95, 'Hoofdgerechten'),
(10, 'Images-restaurant-gerechten\\Hoofdgerechten\\peking-eend.jpg', 'Peking Eend', 'Krokante eend met pannenkoekjes', 18.50, 'Hoofdgerechten'),
(11, 'Images-restaurant-gerechten\\Hoofdgerechten\\kung-pao-kip.jpg', 'Kung Pao Kip', 'Pittige kip met pinda\'s en chilipepers', 13.50, 'Hoofdgerechten'),
(12, 'Images-restaurant-gerechten\\Hoofdgerechten\\zoetzuur-varkensvlees.jpg', 'Zoetzuur Varkensvlees', 'Knapperig varkensvlees met paprika', 13.00, 'Hoofdgerechten'),
(13, 'Images-restaurant-gerechten\\Hoofdgerechten\\char-siu.jpg', 'Char Siu', 'Gegrild Chinees BBQ-varkensvlees', 15.50, 'Hoofdgerechten'),
(14, 'Images-restaurant-gerechten\\Vegetarisch\\roerbakgroenten.jpg', 'Roerbakgroenten', 'Seizoensgroenten met teriyaki', 9.50, 'Vegetarisch'),
(15, 'Images-restaurant-gerechten\\Vegetarisch\\tofu-met-paddenstoelen.jpg', 'Tofu Met Paddenstoelen', 'Zijdezachte tofu in gembersaus', 11.00, 'Vegetarisch'),
(16, 'Images-restaurant-gerechten\\Vegetarisch\\mapo-tofu.jpg', 'Mapo Tofu', 'Pittige tofu in Sichuan pepersaus', 11.50, 'Vegetarisch'),
(17, 'Images-restaurant-gerechten\\Vegetarisch\\gestoomde-aubergine.jpg', 'Gestoomde Aubergine', 'Aubergine met knoflook en gember', 10.00, 'Vegetarisch'),
(18, 'Images-restaurant-gerechten\\Vegetarisch\\chinese-bloemkool.jpg', 'Chinese Bloemkool', 'Roerbak bloemkool met oestersaus', 10.50, 'Vegetarisch'),
(19, 'Images-restaurant-gerechten\\Dranken\\bubble-tea-taro.jpg', 'Bubble tea Taro', 'Zoet, romig met tapiocaparels', 5.50, 'Dranken'),
(20, 'Images-restaurant-gerechten\\Dranken\\bubble-tea-matcha.jpg', 'Bubble Tea Matcha', 'Romige matcha met tapiocaparels', 5.50, 'Dranken'),
(21, 'Images-restaurant-gerechten\\Dranken\\bubble-tea-aardbei.jpg', 'Bubble Tea Aardbei', 'Fruitig en fris met frambozenpearls', 5.50, 'Dranken'),
(22, 'Images-restaurant-gerechten\\Dranken\\bubble-tea-brown-sugar.jpg', 'Bubble Tea Brown Sugar', 'Melkthee met bruine suiker karamel', 6.00, 'Dranken'),
(23, 'Images-restaurant-gerechten\\Dranken\\groene-thee.jpg', 'Groene Thee', 'Traditionele Chinese groene thee', 3.00, 'Dranken'),
(24, 'Images-restaurant-gerechten\\Dranken\\jasmijn-thee.jpg', 'Jasmijn Thee', 'Licht geparfumeerde jasmijn groene thee', 3.00, 'Dranken'),
(25, 'Images-restaurant-gerechten\\Dranken\\oolong-thee.jpg', 'Oolong Thee', 'Halfgefermenteerde thee, nootachtig van smaak', 3.50, 'Dranken');

-- --------------------------------------------------------

--
-- Table structure for table `studenten`
--

CREATE TABLE `studenten` (
  `id` int NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `leeftijd` int NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `klas` varchar(5) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studenten`
--

INSERT INTO `studenten` (`id`, `voornaam`, `achternaam`, `leeftijd`, `woonplaats`, `klas`, `gender`, `email`, `created_at`) VALUES
(1, 'Liam', 'de Vries', 16, 'Amsterdam', '1A', 'Man', 'liam.de.vries@school.nl', '2026-03-10 12:15:01'),
(2, 'Sofia', 'Jansen', 15, 'Rotterdam', '1A', 'Vrouw', 'sofia.jansen@school.nl', '2026-03-10 12:15:01'),
(3, 'Noah', 'van den Berg', 17, 'Utrecht', '1B', 'Man', 'noah.van.den.berg@school.nl', '2026-03-10 12:15:01'),
(4, 'Amara', 'Bakker', 16, 'Den Haag', '1B', 'Vrouw', 'amara.bakker@school.nl', '2026-03-10 12:15:01'),
(5, 'Finn', 'Visser', 15, 'Eindhoven', '1C', 'Non-binair', 'finn.visser@school.nl', '2026-03-10 12:15:01'),
(6, 'Zara', 'Smit', 16, 'Tilburg', '1C', 'Vrouw', 'zara.smit@school.nl', '2026-03-10 12:15:01'),
(7, 'Jayden', 'Meijer', 17, 'Groningen', '1A', 'Man', 'jayden.meijer@school.nl', '2026-03-10 12:15:01'),
(8, 'Noor', 'de Boer', 15, 'Almere', '1A', 'Vrouw', 'noor.de.boer@school.nl', '2026-03-10 12:15:01'),
(9, 'Ravi', 'Mulder', 16, 'Breda', '1B', 'Man', 'ravi.mulder@school.nl', '2026-03-10 12:15:01'),
(10, 'Lena', 'de Groot', 17, 'Nijmegen', '1B', 'Vrouw', 'lena.de.groot@school.nl', '2026-03-10 12:15:01'),
(11, 'Sven', 'Bos', 15, 'Enschede', '1C', 'Man', 'sven.bos@school.nl', '2026-03-10 12:15:01'),
(12, 'Yasmine', 'Vos', 16, 'Haarlem', '1C', 'Vrouw', 'yasmine.vos@school.nl', '2026-03-10 12:15:01'),
(13, 'Daan', 'Peters', 17, 'Arnhem', '1A', 'Man', 'daan.peters@school.nl', '2026-03-10 12:15:01'),
(14, 'Imani', 'Hendriks', 15, 'Zaanstad', '1A', 'Vrouw', 'imani.hendriks@school.nl', '2026-03-10 12:15:01'),
(15, 'River', 'van Dijk', 16, 'Amersfoort', '1B', 'Non-binair', 'river.van.dijk@school.nl', '2026-03-10 12:15:01'),
(16, 'Fatima', 'Kuijpers', 17, 'Apeldoorn', '1B', 'Vrouw', 'fatima.kuijpers@school.nl', '2026-03-10 12:15:01'),
(17, 'Lukas', 'van der Berg', 15, 'Delft', '1C', 'Man', 'lukas.van.der.berg@school.nl', '2026-03-10 12:15:01'),
(18, 'Soraya', 'Vermeer', 16, 'Leiden', '1C', 'Vrouw', 'soraya.vermeer@school.nl', '2026-03-10 12:15:01'),
(19, 'Milan', 'Jonkers', 17, 'Dordrecht', '1A', 'Man', 'milan.jonkers@school.nl', '2026-03-10 12:15:01'),
(20, 'Blythe', 'Kramer', 15, 'Zoetermeer', '1A', 'Non-binair', 'blythe.kramer@school.nl', '2026-03-10 12:15:01'),
(21, 'Tariq', 'van Leeuwen', 16, 'Maastricht', '1B', 'Man', 'tariq.van.leeuwen@school.nl', '2026-03-10 12:15:01'),
(22, 'Eva', 'Willems', 17, 'Zwolle', '1B', 'Vrouw', 'eva.willems@school.nl', '2026-03-10 12:15:01'),
(23, 'Jesse', 'Jacobs', 15, 'Deventer', '1C', 'Man', 'jesse.jacobs@school.nl', '2026-03-10 12:15:01'),
(24, 'Priya', 'de Leeuw', 16, 'Den Bosch', '1C', 'Vrouw', 'priya.de.leeuw@school.nl', '2026-03-10 12:15:01'),
(25, 'Sam', 'van Beek', 17, 'Alkmaar', '1A', 'Genderfluid', 'sam.van.beek@school.nl', '2026-03-10 12:15:01'),
(26, 'Ines', 'Claes', 15, 'Heerlen', '1A', 'Vrouw', 'ines.claes@school.nl', '2026-03-10 12:15:01'),
(27, 'Hamza', 'Hermans', 16, 'Venlo', '1B', 'Man', 'hamza.hermans@school.nl', '2026-03-10 12:15:01'),
(28, 'Tess', 'van Ommen', 17, 'Westland', '1B', 'Vrouw', 'tess.van.ommen@school.nl', '2026-03-10 12:15:01'),
(29, 'Koen', 'de Ruiter', 15, 'Sittard', '1C', 'Man', 'koen.de.ruiter@school.nl', '2026-03-10 12:15:01'),
(30, 'Anaya', 'Brouwers', 16, 'Hilversum', '1C', 'Vrouw', 'anaya.brouwers@school.nl', '2026-03-10 12:15:01'),
(31, 'Mats', 'Dekker', 17, 'Emmen', '1A', 'Man', 'mats.dekker@school.nl', '2026-03-10 12:15:01'),
(32, 'Yuki', 'Bosman', 15, 'Helmond', '1A', 'Vrouw', 'yuki.bosman@school.nl', '2026-03-10 12:15:01'),
(33, 'Alex', 'Willems', 16, 'Roosendaal', '1B', 'Non-binair', 'alex.willems@school.nl', '2026-03-10 12:15:01'),
(34, 'Layla', 'Schouten', 17, 'Purmerend', '1B', 'Vrouw', 'layla.schouten@school.nl', '2026-03-10 12:15:01'),
(35, 'Tobias', 'van Rijn', 15, 'Spijkenisse', '1C', 'Man', 'tobias.van.rijn@school.nl', '2026-03-10 12:15:01'),
(36, 'Chiara', 'Smeets', 16, 'Leeuwarden', '1C', 'Vrouw', 'chiara.smeets@school.nl', '2026-03-10 12:15:01'),
(37, 'Omar', 'Berger', 17, 'Ede', '1A', 'Man', 'omar.berger@school.nl', '2026-03-10 12:15:01'),
(38, 'Fenna', 'Martens', 15, 'Hardenberg', '1A', 'Vrouw', 'fenna.martens@school.nl', '2026-03-10 12:15:01'),
(39, 'Sky', 'de Jong', 16, 'Veenendaal', '1B', 'Genderfluid', 'sky.de.jong@school.nl', '2026-03-10 12:15:01'),
(40, 'Aylin', 'Hoekstra', 17, 'Gouda', '1B', 'Vrouw', 'aylin.hoekstra@school.nl', '2026-03-10 12:15:01'),
(41, 'Lucas', 'van der Laan', 15, 'Alphen aan den Rijn', '1C', 'Man', 'lucas.van.der.laan@school.nl', '2026-03-10 12:15:01'),
(42, 'Nadia', 'Huisman', 16, 'Capelle aan den IJssel', '1C', 'Vrouw', 'nadia.huisman@school.nl', '2026-03-10 12:15:01'),
(43, 'Thijs', 'Vink', 17, 'Vlaardingen', '1A', 'Man', 'thijs.vink@school.nl', '2026-03-10 12:15:01'),
(44, 'Rania', 'de Waal', 15, 'Schiedam', '1A', 'Vrouw', 'rania.de.waal@school.nl', '2026-03-10 12:15:01'),
(45, 'Cas', 'van Vliet', 16, 'Nieuwegein', '1B', 'Non-binair', 'cas.van.vliet@school.nl', '2026-03-10 12:15:01'),
(46, 'Naomi', 'Baas', 17, 'Amersfoort', '1B', 'Vrouw', 'naomi.baas@school.nl', '2026-03-10 12:15:01'),
(47, 'Elias', 'Groen', 15, 'Hoorn', '1C', 'Man', 'elias.groen@school.nl', '2026-03-10 12:15:01'),
(48, 'Xena', 'Timmermans', 16, 'Bergen op Zoom', '1C', 'Vrouw', 'xena.timmermans@school.nl', '2026-03-10 12:15:01'),
(49, 'Bram', 'van der Meer', 17, 'Oss', '1A', 'Man', 'bram.van.der.meer@school.nl', '2026-03-10 12:15:01'),
(50, 'Selin', 'Geerts', 15, 'Weert', '1A', 'Vrouw', 'selin.geerts@school.nl', '2026-03-10 12:15:01'),
(51, 'Nino', 'van Dongen', 16, 'Middelburg', '1B', 'Man', 'nino.van.dongen@school.nl', '2026-03-10 12:15:01'),
(52, 'Fleur', 'Puts', 17, 'Venray', '1B', 'Vrouw', 'fleur.puts@school.nl', '2026-03-10 12:15:01'),
(53, 'Zion', 'Cuypers', 15, 'Roosendaal', '1C', 'Non-binair', 'zion.cuypers@school.nl', '2026-03-10 12:15:01'),
(54, 'Amber', 'van Santen', 16, 'Dordrecht', '1C', 'Vrouw', 'amber.van.santen@school.nl', '2026-03-10 12:15:01'),
(55, 'Pieter', 'Aarts', 17, 'Tilburg', '1A', 'Man', 'pieter.aarts@school.nl', '2026-03-10 12:15:01'),
(56, 'Hana', 'Linders', 15, 'Enschede', '1A', 'Vrouw', 'hana.linders@school.nl', '2026-03-10 12:15:01'),
(57, 'Quentin', 'Peeters', 16, 'Arnhem', '1B', 'Man', 'quentin.peeters@school.nl', '2026-03-10 12:15:01'),
(58, 'Zoe', 'Bongers', 17, 'Nijmegen', '1B', 'Vrouw', 'zoe.bongers@school.nl', '2026-03-10 12:15:01'),
(59, 'Erin', 'van Veen', 15, 'Utrecht', '1C', 'Genderfluid', 'erin.van.veen@school.nl', '2026-03-10 12:15:01'),
(60, 'Mariam', 'de Haas', 16, 'Den Haag', '1C', 'Vrouw', 'mariam.de.haas@school.nl', '2026-03-10 12:15:01'),
(61, 'Viktor', 'Nijs', 17, 'Leiden', '1A', 'Man', 'viktor.nijs@school.nl', '2026-03-10 12:15:01'),
(62, 'Lotte', 'Verheij', 15, 'Delft', '1A', 'Vrouw', 'lotte.verheij@school.nl', '2026-03-10 12:15:01'),
(63, 'Idris', 'van Pelt', 16, 'Amsterdam', '1B', 'Man', 'idris.van.pelt@school.nl', '2026-03-10 12:15:01'),
(64, 'Vera', 'Boomsma', 17, 'Rotterdam', '1B', 'Vrouw', 'vera.boomsma@school.nl', '2026-03-10 12:15:01'),
(65, 'Robin', 'de Haas', 15, 'Groningen', '1C', 'Non-binair', 'robin.de.haas@school.nl', '2026-03-10 12:15:01'),
(66, 'Ishaan', 'Niessen', 16, 'Breda', '1C', 'Man', 'ishaan.niessen@school.nl', '2026-03-10 12:15:01'),
(67, 'Manon', 'Vriens', 17, 'Eindhoven', '1A', 'Vrouw', 'manon.vriens@school.nl', '2026-03-10 12:15:01'),
(68, 'Sander', 'Heemskerk', 15, 'Maastricht', '1A', 'Man', 'sander.heemskerk@school.nl', '2026-03-10 12:15:01'),
(69, 'Aiyana', 'van der Wal', 16, 'Zwolle', '1B', 'Vrouw', 'aiyana.van.der.wal@school.nl', '2026-03-10 12:15:01'),
(70, 'Ruben', 'Post', 17, 'Deventer', '1B', 'Man', 'ruben.post@school.nl', '2026-03-10 12:15:01'),
(71, 'Quinn', 'Joosten', 15, 'Den Bosch', '1C', 'Non-binair', 'quinn.joosten@school.nl', '2026-03-10 12:15:01'),
(72, 'Daniyar', 'Koster', 16, 'Alkmaar', '1C', 'Man', 'daniyar.koster@school.nl', '2026-03-10 12:15:01'),
(73, 'Mila', 'Winters', 17, 'Haarlem', '1A', 'Vrouw', 'mila.winters@school.nl', '2026-03-10 12:15:01'),
(74, 'Floris', 'Kusters', 15, 'Zaanstad', '1A', 'Man', 'floris.kusters@school.nl', '2026-03-10 12:15:01'),
(75, 'Roxana', 'Lemmens', 16, 'Heerlen', '1B', 'Vrouw', 'roxana.lemmens@school.nl', '2026-03-10 12:15:01'),
(76, 'Ato', 'van den Brink', 17, 'Venlo', '1B', 'Man', 'ato.van.den.brink@school.nl', '2026-03-10 12:15:01'),
(77, 'Liselotte', 'Arts', 15, 'Hilversum', '1C', 'Vrouw', 'liselotte.arts@school.nl', '2026-03-10 12:15:01'),
(78, 'Emre', 'van Hal', 16, 'Emmen', '1C', 'Man', 'emre.van.hal@school.nl', '2026-03-10 12:15:01'),
(79, 'Nadine', 'Stam', 17, 'Helmond', '1A', 'Vrouw', 'nadine.stam@school.nl', '2026-03-10 12:15:01'),
(80, 'Wout', 'de Vos', 15, 'Spijkenisse', '1A', 'Man', 'wout.de.vos@school.nl', '2026-03-10 12:15:01'),
(81, 'Juno', 'Adriaans', 16, 'Purmerend', '1B', 'Genderfluid', 'juno.adriaans@school.nl', '2026-03-10 12:15:01'),
(82, 'Merel', 'van Gils', 17, 'Leeuwarden', '1B', 'Vrouw', 'merel.van.gils@school.nl', '2026-03-10 12:15:01'),
(83, 'Issa', 'Broers', 15, 'Veenendaal', '1C', 'Man', 'issa.broers@school.nl', '2026-03-10 12:15:01'),
(84, 'Hailey', 'van den Heuvel', 16, 'Gouda', '1C', 'Vrouw', 'hailey.van.den.heuvel@school.nl', '2026-03-10 12:15:01'),
(85, 'Sebastiaan', 'Franke', 17, 'Amersfoort', '1A', 'Man', 'sebastiaan.franke@school.nl', '2026-03-10 12:15:01'),
(86, 'Aicha', 'Wijnands', 15, 'Zoetermeer', '1A', 'Vrouw', 'aicha.wijnands@school.nl', '2026-03-10 12:15:01'),
(87, 'Lex', 'Pronk', 16, 'Apeldoorn', '1B', 'Non-binair', 'lex.pronk@school.nl', '2026-03-10 12:15:01'),
(88, 'Eline', 'van Staveren', 17, 'Ede', '1B', 'Vrouw', 'eline.van.staveren@school.nl', '2026-03-10 12:15:01'),
(89, 'Stef', 'Claassen', 15, 'Middelburg', '1C', 'Man', 'stef.claassen@school.nl', '2026-03-10 12:15:01'),
(90, 'Diarra', 'Otten', 16, 'Weert', '1C', 'Vrouw', 'diarra.otten@school.nl', '2026-03-10 12:15:01'),
(91, 'Hugo', 'Lindeman', 17, 'Hardenberg', '1A', 'Man', 'hugo.lindeman@school.nl', '2026-03-10 12:15:01'),
(92, 'Simone', 'van Zanten', 15, 'Bergen op Zoom', '1A', 'Vrouw', 'simone.van.zanten@school.nl', '2026-03-10 12:15:01'),
(93, 'Kieran', 'de Bruijn', 16, 'Vlaardingen', '1B', 'Man', 'kieran.de.bruijn@school.nl', '2026-03-10 12:15:01'),
(94, 'Fatoumata', 'Wolters', 17, 'Schiedam', '1B', 'Vrouw', 'fatoumata.wolters@school.nl', '2026-03-10 12:15:01'),
(95, 'Bo', 'Hopmans', 15, 'Oss', '1C', 'Non-binair', 'bo.hopmans@school.nl', '2026-03-10 12:15:01'),
(96, 'Yara', 'van Soest', 16, 'Capelle aan den IJssel', '1C', 'Vrouw', 'yara.van.soest@school.nl', '2026-03-10 12:15:01'),
(97, 'Timo', 'Janssen', 17, 'Nieuwegein', '1A', 'Man', 'timo.janssen@school.nl', '2026-03-10 12:15:01'),
(98, 'Esra', 'van Kampen', 15, 'Alphen aan den Rijn', '1A', 'Vrouw', 'esra.van.kampen@school.nl', '2026-03-10 12:15:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Gerechten`
--
ALTER TABLE `Gerechten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Gerechten`
--
ALTER TABLE `Gerechten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `studenten`
--
ALTER TABLE `studenten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
