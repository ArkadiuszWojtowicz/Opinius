-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 12:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opinius`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id-item` int(6) NOT NULL,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `category` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nick` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `review` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id-item`, `name`, `category`, `nick`, `review`) VALUES
(112, 'SONY DSC-H300', 'Aparaty i kamery', 'janek123', 'Działa bardzo dobrze. Zdjęcia są wyraźne'),
(113, 'Huawei mate 20', 'Telefony i smartfony', 'mariusz', 'Telefon zepsuł się po trzech miesiącach użytkowania. Po serwisie pochodził tydzień i znów padł. Nic nie dały kolejne naprawy. Nie polecam'),
(114, 'Kamerka internetowa Media-Tech', 'Akcesoria', 'janek123', 'Kamerka nienajlepszej jakości'),
(115, 'Intel Core i3 5600k', 'Podzespoły', 'pawelek89', 'Stara generacja ale jara'),
(116, 'Laptop MSI GX70', 'Komputery i laptopy', 'michal90', 'Dobry do gier'),
(117, 'Mysz optyczna Logitech ES100C', 'Akcesoria', 'janek123', 'ok'),
(118, 'Laptop lenovo F6000X WIN10', 'Komputery i laptopy', 'Arek', 'Nice, dobry laptop'),
(119, 'Samsung N8000c', 'Telewizory', 'mariusz', 'Polecam!'),
(122, 'Samsung G7000', 'Telewizory', 'Arek', 'ok'),
(123, 'Panasnic Vientagge 9', 'Telewizory', 'michal90', 'Płynny obraz\r\nMinus za brak instrukcji'),
(133, 'MSI GeForce GTX1060', 'Podzespoły', 'agata7agata7', 'Nie mam zarzutów'),
(134, 'Logitech HD Pro Webcam C922', 'Urządzenia peryferyjne', 'agata7agata7', 'Kamerka internetowa warta swojej ceny'),
(135, 'Xiaomi redmi 5 Dual Sim', 'Telefony i smartfony', 'Bartosz1982', 'Wystrzałowy telefon. Polecam każdemu kto zastanawia się nad szybkim telefonem w przyzwoitej cenie'),
(140, 'Intel Core i5 8400 ', 'Podzespoły', 'piotraso', 'Szybki procesor. Jakość najlepsza w stosunku do ceny'),
(141, 'Samsung Galaxy II', 'Telefony i smartfony', 'marek123', 'Dobry telefon'),
(143, 'Aparat PANASONIC DC-FZ82EP-K', 'Aparaty i kamery', 'janek123', 'Polecam szczególnie doświadczonym użytkownikom. Obsługa nie jest prosta, przynajmniej taka moja opinia'),
(144, 'xiaomi redmi note 7 4/64GB', 'Telefony i smartfony', 'Krzysztof4', 'Telefon wart swojej ceny, bardzo wytrzymały ekran. Mimo że upadł już 2 razy, nie pojawiły się żadne rysy'),
(145, 'Laptop ASUS X540LA-XX1306T', 'Komputery i laptopy', 'michal90', 'Jak na razie chodzi bez zarzutu'),
(146, 'Drukarka CANON Pixma G3410', 'Urządzenia peryferyjne', 'marcinczapek', 'Druk nienajgorszy, ale ilość funkcji jest mocno ograniczona. Polecam tylko starszym osobom'),
(147, 'Myszka SteelSeries Rival 600 R', 'Urządzenia peryferyjne', 'tomaszek123', 'Polecam'),
(150, 'Aparat CANON EOS 4000D', 'Aparaty i kamery', 'Pati1980', 'Robi wyraźne zdjęcia, nawet wieczorną porą'),
(151, 'Huawei P30 Pro 8+256', 'Telefony i smartfony', 'natalka88', 'Najlepszy smartfon jaki miałam');

-- --------------------------------------------------------

--
-- Table structure for table `logged_in_users`
--

CREATE TABLE `logged_in_users` (
  `sessionId` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `firstName`, `surname`, `email`, `passwd`, `status`, `date`) VALUES
(27, 'Arek', 'Arkadiusz', 'Wójtowicz', 'arkadiuszwojtowicz1997@gmail.com', 'dcaf017d75a1559f86497c79115cb2c6f902a7aa', 2, '2019-01-22 00:04:04'),
(29, 'pawelek89', 'Paweł', 'Kasprzak', 'pawelek89@gmail.com', 'd4d3c3d02f56238c003e366075c2ea187c016816', 1, '2019-01-22 14:33:13'),
(30, 'michal90', 'Michał', 'Nowaniuk', 'malpka2@wp.pl', '26ccb44ff846c9f6cd21bc5beaa6708f83f1f159', 1, '2019-01-22 16:31:21'),
(31, 'janek123', 'Jan', 'Rydniak', 'janusz12@wp.pl', '907f991e48199535a65507e9ec3fa09a91803654', 1, '2019-01-23 13:17:19'),
(32, 'mariusz', 'Mariusz', 'Mielnik', 'mariusz@wp.pl', 'cd9255d31af4b120d706096ee8009ef61c1ec060', 1, '2019-01-24 05:15:22'),
(37, 'michal90sa1', 'Michał', 'Piłonek', 'michal90sa@wp.pl', '7a4efbad56dda33c6950fa32a1f212549ec0ab65', 1, '2019-02-02 04:12:15'),
(39, 'marcinczapek', 'Marcin', 'Zaleski', 'marcinczapek@wp.pl', '3fd37cc9559ba976242bd8b327265df5ce713f32', 1, '2019-02-02 23:09:06'),
(86, 'tomaszek123', 'Tomek', 'Miarka', 'tomaszek123@wp.pl', '0621836428cb910902a7b4739b01d93b83b2cb63', 1, '2019-02-03 02:47:44'),
(87, 'agata7agata7', 'Agata', 'Morniuk', 'agata7agata7@wp.pl', '0ef7dbc86403c0220dbde44457efe1e7793309f9', 1, '2019-02-03 14:57:19'),
(88, 'paczuk09', 'Patryk', 'Zabawczyk', 'paczuk09@wp.pl', 'c525c6839ece984cb2a5bb071d98ada5e54fd55e', 1, '2019-02-03 15:01:54'),
(89, 'Bartosz1982', 'Bartosz', 'Pokrzywa', 'Bartosz1982@gmail.com', '52ea0d67a072632d86e740edf21dda5de7b1c252', 1, '2019-02-06 19:30:12'),
(91, 'Krzysztof4', 'Krzysztof', 'Zuniak', 'Krzysztof4@wp.pl', '2e2a95614b95cc877f744d31f005429e0e3b18b8a', 1, '2019-02-17 13:29:04'),
(92, 'marek123', 'Marek', 'Marecki', 'marek123@wp.pl', '7aecbbe626499acb575298508732d2945bed5f55', 1, '2019-02-24 21:10:33'),
(93, 'olek1234', 'Aleksander', 'Zawadzki', 'olek1234@wp.pl', 'a813cd8ad1a6548f432c73d5ab8eacd79797643c', 1, '2019-02-25 09:33:12'),
(94, 'natalka88', 'Natalia', 'Burnik', 'natalka88@gmail.com', '894b80fcb7838bc5d5fde7f13ed6984b234502aa', 1, '2019-03-05 17:30:06'),
(95, 'Pati1980', 'Patrycja', 'Szymanek', 'Pati1980@gmail.com', 'a082e569cc5290b09a52c1fdc0a381119644b552', 1, '2019-03-17 12:07:13'),
(96, 'kacperMiela', 'Kacper', 'Mieliniczuk', 'kacperMiela@onet.pl', 'b7ac3ce8ae063ae29c50879020c96849a0bc1d04', 1, '2019-03-28 17:34:57'),
(97, 'natalia04', 'Natalia', 'Boniuszak', 'natalia04@onet.pl', '7020f0217537510038775398fceaef2b8605200f', 1, '2019-04-04 18:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id-item`);

--
-- Indexes for table `logged_in_users`
--
ALTER TABLE `logged_in_users`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id-item` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
