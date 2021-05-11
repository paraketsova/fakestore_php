-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 11, 2021 at 09:43 AM
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
(1, 'VAS, DESIGN WILHELM KÅGE', 'Vas, Gustavsberg, Argenta, stengods, grön glasyr, målad silverdekor av drake, GUSTAVSBERG KÅGE , höjd 21 cm.', 'vas.jpg', 5200),
(2, 'SKÄNK, KOREA ', 'Skuren dekor, sex lådor med dragringar i mässing. Bredd 141 cm, djup 55 cm, höjd 85 cm.', 'chest.jpeg', 8000),
(3, 'FÅTÖLJ \"RO\" ', 'Jaime Hayon, fåtölj med fotpall, \"Ro\", Fritz Hansen, Danmark, 2018.\r\nMörk ylleklädsel. Lösa dynor. Ben av mörkbetsad ek.', 'ottoman.jpeg', 15000),
(4, 'VAS \"FAUNA\" ', 'I grönt glas: skål, design Oiva Toikka. Diameter: 13 cm, höjd 12,5 cm', 'vas-fauna.jpeg', 5500),
(5, 'MATTA \"FRANK NR 3\" ', 'Ett för Josef Frank mycket serent mönster och färgschema har matta nr 3 fått. Med de mustiga färgerna för den tankarna till mossbeklädd mark och till de klassiska färgerna i orientmattor. 120x140 cm, ull.', 'matta-frank.jpeg', 43000),
(6, 'PARAPLYSTÄLL FORNASETTI ', 'Ett dekorativt paraplyställ i lackerad plåt med Fornasettis karaktäristiska mönster Ombrelli e Bastoni. Den utsökta formen, färgerna och estetiken omvandlar med lätthet en regnig dag till en konstnärlig upplevelse. Samtliga Fornasettis kreationer, från möbler till inredningsdetaljer, tillverkas för hand i Italien.', 'paraplystall.jpeg', 13400),
(7, 'PALL \"FAMNA\" ', 'Pall Famna 2020 är formgiven av den Stockholmsbaserade design- och arkitekturstudion TAF, grundad av Gabriella Gustafson och Mattias Ståhlbom. 75X75X40 CM, bok ben.', 'pall_fanna.jpeg', 16000),
(8, 'NATTLAMPA \"BLOMBUKETT\" ', 'Bordslampa, \"nattlampa\", pâte-de-verre, Frankrike. En blombukett i rött, mörkgrönt och närmast svart glas, signerad i glasmassan G. ARGY-ROUSSEAU, höjd inklusive fattning i patinerad metall ca 13 cm.', 'nattlampa.jpeg', 16000),
(9, 'TEHUVA \"BARANGUILLA\" ', 'Svenskt Tenns tehuva med mönstret Baranquilla, dekorerar varje kök eller dukning. Den runda huvan håller tekannan, brödkorgen eller frukostäggen varma.\r\nI Josef Franks textil \"Baranquilla\" skapar fyra, kärleksfullt utformade lianstammar en vacker helhet fylld av prunkande frukter, blommor och blad. 26,5 cm, lin.', 'tehuva.jpeg', 600),
(10, 'VASER BERNDT FRIBERG ', 'Vaser 3 st och skålar 2 st, Gustavsbergs studio, olika årtal.\r\nStengods, aniaraglasyr i olika turkosa nyanser, signerade Friberg, studiohanden samt olika årtal, höjd 5-18,5 cm.', 'vaser_och_skalar.jpeg', 6000),
(11, 'PLINTH LOW ROSE MARBLE', 'Plinth är en serie soff- och sidobord formgivna av Norm Architects för Menu. Borden är kvadratiska eller rektangulera, bestående av raka linjer och plana ytor – materialet, förstklassig marmor, tillför ett levande och böljande element till det annars återhållsamma formspråket. Dess arkitektoniska design, som kombinerar geometrisk precision och exakthet med organisk textur, bidrar med en exklusiv och sofistikerad känsla till det moderna hemmet. Plinth består av bord i tre storlekar; Tall, Low och Cubic, som alla finns i flera olika utföranden bestående av vackraste marmor, där de naturliga skiftningarna mellan varje enskild pjäs ger varje bord en unik personlighet och elegans.\r\n', 'menu.jpg', 19295),
(12, 'VISCONTEA WHITE', 'Viscontea White, taklampa formgiven av Achille och Pier Giacomo Castiglioni för Flos. Lampan består av en vit pulverlackad inre stålstruktur, belagd med en unik kokongliknande harts.\r\n', 'viscontea.jpg', 17595),
(13, 'KIZU TABLE LAMP SMALL GREY', 'Kizu Table Lamp är en serie bordslampor formgiven av Lars Tornøe för New Works och består av två motsatta geometriska former i marmor och akrylglas. Vid en första anblick ser det ut som kupan balanserar på foten vilket ger bordslampan Kizu ett intressant skulpturalt uttryck. \r\n', 'kizu.jpg', 3095),
(14, 'LITTLE PETRA VB1 WALNUT SHEEPSKIN SAHARA', 'Little Petra VB1 Walnut är en fåtölj från &Tradition, formgiven av Viggo Boesen. Viggo Boesen var en av de ledande formgivarna inom funkisstilen och han debuterade med Little Petra på en möbelutställning i Köpenhamn 1938. Little Petra är en charmig liten fåtölj som passar in alla olika typer av miljöer och interiörer. ', 'little_petra.jpg', 47495),
(15, 'WOOD BASKET EMMA NATUREL 2\r\n', 'Förvara dina vedträn i den eleganta Wood Basket Emma från Eldvarm. Vedkorgen är tillverkad av lackerad metall med detaljer i mässing och vackert Tärnsjöläder. Välj mellan flera olika utföranden.', 'wood_basket.jpg', 5420),
(16, 'AK 2730 SIDEBOARD', 'AK 2730 är ett sideboard formgivet av Nissen & Gehl för Naver. AK 2730 har bakom dess skjutbara jalusidörrar två skåp och tre utdragbara lådor, vilket gör detta sideboard till en mycket vacker möbel med stor hänsyn till både design och smart förvaring. Tillverkat av massivt trä, detaljer och underrede i rostfritt stål och toppskiva av Corian®, som med sin slitstarka yta skyddar träet från repor, fläckar och slitage. Finns tillgänglig i flera utföranden med valbara ytbehandlingar.\r\n', 'ak_2730.jpg', 35365),
(17, 'AK 1330 SKRIVBORD\r\n', 'AK 1330 är ett modernistiskt skrivbord formgivet av Nissen och Gehl för danska Naver. Formgivningen är elegant utformad med följsamma linjer och vackra detaljer – ett hantverk av främsta kvalitet med hänsyn till design och funktion. Tillverkat av massivt trä och rostfritt stål med toppskiva av Corian®, som med sin slitstarka yta skyddar skrivbordet från repor, fläckar och slitage. Finns tillgänglig i flera utföranden med valbara ytbehandlingar.\r\n', 'ak_1330.jpg', 31125),
(18, 'LITTLE PETRA VB2 WALNUT SHEEPSKIN MOONLIGHT', 'Little Petra VB2 Walnut är en 2-sitssoffa från &Tradition, formgiven av Viggo Boesen. Viggo Boesen var en av de ledande formgivarna inom funkisstilen och han debuterade med fåtöljen Little Petra på en möbelutställning i Köpenhamn 1938. 2020 lanserar &Tradition Little Petra VB2 – en 2-sitssoffa som har samma charm och komfort som fåtöljen fast nu med plats för fler. Finns i flera olika utföranden.', 'little_petra_vb2.jpg', 64795),
(19, 'CH24 Y-STOLEN VALNÖT/ SNÖRE NATUR OLJAD', 'CH24 designades av Hans J. Wegner 1949 och har tillverkats utan avbrott sedan 1950. Designklassikern CH24, även kallad Y-stolen eller Wishbone Chair, är en sann ikon bland stolar och hett eftertraktad bland samlare världen över. Den behagliga formen ger en hög bekvämlighet och god rörelseförmåga. Stolen är tillverkad av massivt trä med sits av vaxat papperssnöre. Finns i ett stort antal olika utföranden.', 'valnot_olja.jpg', 12880),
(20, 'EPIC DINING TABLE 130 CM WHITE TRAVERTINE', 'Epic är en serie soff- och matbord formgivna av GamFratesi för Gubi. Formspråket är skulpturalt och rustikt och den runda toppskivan står i direkt kontrast mot den kantiga basen – tydligt inspirerat av kolonnerna i antikens Grekland och romersk arkitektur. Alla bord är tillverkade i travertin, en typ av kalksten, som med sina vackra ådringar och naturliga struktur ger ett organiskt och levande intryck. Borden tillverkas i Italien och eftersom de är gjorda i ett naturmaterial är varje bord unikt och skillnader mellan exemplaren bidrar till varje enskild pjäs personliga utseende. Utöver detta matbord ingår i Epic-serien en rad olika soffbord i varierande utföranden och storlekar.', 'gubi_epic.jpg', 43845);

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
