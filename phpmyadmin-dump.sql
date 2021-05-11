-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2021 at 08:56 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `email`) VALUES
(1, 'Eva', 'Olsson', 'eva@admin.se');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `password`) VALUES
(1, 'Robert Smith', 'robert@smith.se', ''),
(2, 'Olle Kalsson', 'olle@karlsson.se', ''),
(3, 'Anna Petersson', 'anna@petersson.se', ''),
(4, 'Helena Strand', 'helena@strand.se', ''),
(5, 'Kate Svensson', 'kate@svensson.se', ''),
(6, 'Bjorn Bjornsson', 'bjorn@bjornsson.se', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` varchar(1) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `description` text COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'no-image.png',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `description`, `image`, `price`) VALUES
(1, 'Vas, design Wilhelm Kåge', 'Vas, Gustavsberg, Argenta, stengods, grön glasyr, målad silverdekor av drake, GUSTAVSBERG KÅGE , höjd 21 cm.', 'vas.jpg', 5200),
(2, 'Skänk, Korea', 'Skuren dekor, sex lådor med dragringar i mässing. Bredd 141 cm, djup 55 cm, höjd 85 cm.', 'chest.jpeg', 8000),
(3, 'Fåtölj med fotpall, \"Ro\"', 'Jaime Hayon, fåtölj med fotpall, \"Ro\", Fritz Hansen, Danmark, 2018.\r\nMörk ylleklädsel. Lösa dynor. Ben av mörkbetsad ek.', 'ottoman.jpeg', 15000),
(4, 'Vas “Fauna ”, design Oiva Toikka', 'I grönt glas: skål. Diameter: 13 cm, höjd 12,5 cm', 'vas-fauna.jpeg', 5500),
(5, 'Matta “Frank Nr 3”', 'Ett för Josef Frank mycket serent mönster och färgschema har matta nr 3 fått. Med de mustiga färgerna för den tankarna till mossbeklädd mark och till de klassiska färgerna i orientmattor. 120x140 cm, ull.', 'matta-frank.jpeg', 43000),
(6, 'Paraplyställ Fornasetti', 'Ett dekorativt paraplyställ i lackerad plåt med Fornasettis karaktäristiska mönster Ombrelli e Bastoni. Den utsökta formen, färgerna och estetiken omvandlar med lätthet en regnig dag till en konstnärlig upplevelse. Samtliga Fornasettis kreationer, från möbler till inredningsdetaljer, tillverkas för hand i Italien.', 'paraplystall.jpeg', 13400),
(7, 'Pall “Famna”', 'Pall Famna 2020 är formgiven av den Stockholmsbaserade design- och arkitekturstudion TAF, grundad av Gabriella Gustafson och Mattias Ståhlbom. 75X75X40 CM, bok ben.', 'pall_fanna.jpeg', 16000),
(8, 'Nattlampa “Blombukett”', 'Bordslampa, \"nattlampa\", pâte-de-verre, Frankrike. En blombukett i rött, mörkgrönt och närmast svart glas, signerad i glasmassan G. ARGY-ROUSSEAU, höjd inklusive fattning i patinerad metall ca 13 cm.', 'nattlampa.jpeg', 16000),
(9, 'Tehuva “Baranquilla”', 'Svenskt Tenns tehuva med mönstret Baranquilla, dekorerar varje kök eller dukning. Den runda huvan håller tekannan, brödkorgen eller frukostäggen varma.\r\nI Josef Franks textil \"Baranquilla\" skapar fyra, kärleksfullt utformade lianstammar en vacker helhet fylld av prunkande frukter, blommor och blad. 26,5 cm, lin.', 'tehuva.jpeg', 600),
(10, 'Vaser och skålar, Berndt Friberg ', 'Vaser 3 st och skålar 2 st, Gustavsbergs studio, olika årtal.\r\nStengods, aniaraglasyr i olika turkosa nyanser, signerade Friberg, studiohanden samt olika årtal, höjd 5-18,5 cm.', 'vaser_och_skalar.jpeg', 6000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
