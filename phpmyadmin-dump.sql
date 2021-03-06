-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 28, 2021 at 10:14 AM
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
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'admin@admin.se');

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
(1, 'Robert Smith', 'robert@smith.se', '4ffe35db90d94c6041fb8ddf7b44df29'),
(2, 'Olle Kalsson', 'olle@karlsson.se', 'a0281f055d79f8510ae12b5de6d48806'),
(3, 'Anna Petersson', 'anna@petersson.se', '97a9d330e236c8d067f01da1894a5438'),
(4, 'Helena Strand', 'helena@strand.se', '8f5696351d40139b803a68a8cef76cea'),
(5, 'Kate Svensson', 'kate@svensson.se', 'a6cb3dfcedc2356766917ede95a12a23'),
(6, 'Bjorn Bjornsson', 'bjorn@bjornsson.se', '4547f455d8e15fc105802a5967e09001');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `products` json DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_sum` int(100) NOT NULL,
  `order_status` varchar(11) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'mottagen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `products`, `order_date`, `order_sum`, `order_status`) VALUES
(16, 2, '[{\"image\": \"vas.jpg\", \"price\": \"5200\", \"title\": \"VAS, DESIGN WILHELM K??GE\", \"quantity\": \"1\", \"product_id\": \"1\"}, {\"image\": \"chest.jpeg\", \"price\": \"8000\", \"title\": \"SK??NK, KOREA\", \"quantity\": \"2\", \"product_id\": \"2\"}, {\"image\": \"vas-fauna.jpeg\", \"price\": \"5500\", \"title\": \"VAS\", \"quantity\": \"1\", \"product_id\": \"4\"}]', '2021-05-24 21:08:38', 26700, 'mottagen'),
(17, 2, '[{\"image\": \"chest.jpeg\", \"price\": \"8000\", \"title\": \"SK??NK, KOREA\", \"quantity\": \"1\", \"product_id\": \"2\"}]', '2021-05-24 21:10:11', 8000, 'mottagen'),
(18, 2, '[{\"image\": \"vas.jpg\", \"price\": \"5200\", \"title\": \"VAS, DESIGN WILHELM K??GE\", \"quantity\": \"1\", \"product_id\": \"1\"}, {\"image\": \"ottoman.jpeg\", \"price\": \"15000\", \"title\": \"F??T??LJ\", \"quantity\": \"1\", \"product_id\": \"3\"}]', '2021-05-24 21:12:29', 20200, 'mottagen'),
(19, 2, '[{\"image\": \"vas.jpg\", \"price\": \"5200\", \"title\": \"VAS, DESIGN WILHELM K??GE\", \"quantity\": \"1\", \"product_id\": \"1\"}, {\"image\": \"tehuva.jpeg\", \"price\": \"600\", \"title\": \"TEHUVA\", \"quantity\": \"1\", \"product_id\": \"9\"}, {\"image\": \"chest.jpeg\", \"price\": \"8000\", \"title\": \"SK??NK, KOREA\", \"quantity\": \"2\", \"product_id\": \"2\"}]', '2021-05-24 21:15:48', 21800, 'mottagen'),
(20, 2, '[{\"image\": \"vas-fauna.jpeg\", \"price\": \"5500\", \"title\": \"VAS\", \"quantity\": \"1\", \"product_id\": \"4\"}, {\"image\": \"matta-frank.jpeg\", \"price\": \"43000\", \"title\": \"MATTA\", \"quantity\": \"1\", \"product_id\": \"5\"}, {\"image\": \"nattlampa.jpeg\", \"price\": \"16000\", \"title\": \"NATTLAMPA\", \"quantity\": \"3\", \"product_id\": \"8\"}]', '2021-05-24 21:16:55', 96500, 'mottagen'),
(21, 2, '[{\"image\": \"chest.jpeg\", \"price\": \"8000\", \"title\": \"SK??NK, KOREA\", \"quantity\": \"1\", \"product_id\": \"2\"}]', '2021-05-24 21:27:10', 8000, 'skickad'),
(22, 1, '[{\"image\": \"klocka.jpeg\", \"price\": \"6100\", \"title\": \"QLOCKTWO TOUCH BORDSKLOCKA M. ALARM\", \"quantity\": \"1\", \"product_id\": \"28\"}, {\"image\": \"paraplystall.jpeg\", \"price\": \"13400\", \"title\": \"PARAPLYST??LL FORNASETTI\", \"quantity\": \"1\", \"product_id\": \"6\"}]', '2021-05-24 22:09:20', 19500, 'mottagen'),
(23, 1, '[{\"image\": \"little_petra.jpg\", \"price\": \"47495\", \"title\": \"LITTLE PETRA VB1 WALNUT SHEEPSKIN SAHARA\", \"quantity\": \"1\", \"product_id\": \"14\"}]', '2021-05-24 22:11:34', 47495, 'mottagen'),
(24, 1, '[{\"image\": \"matta-frank.jpeg\", \"price\": \"43000\", \"title\": \"MATTA\", \"quantity\": \"1\", \"product_id\": \"5\"}]', '2021-05-24 22:18:07', 43000, 'mottagen');

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
(1, 'VAS, DESIGN WILHELM K??GE', 'Vas, Gustavsberg, Argenta, stengods, gr??n glasyr, m??lad silverdekor av drake, GUSTAVSBERG K??GE , h??jd 21 cm.', 'vas.jpg', 5200),
(2, 'SK??NK, KOREA ', 'Skuren dekor, sex l??dor med dragringar i m??ssing. Bredd 141 cm, djup 55 cm, h??jd 85 cm.', 'chest.jpeg', 8000),
(3, 'F??T??LJ \"RO\" ', 'Jaime Hayon, f??t??lj med fotpall, \"Ro\", Fritz Hansen, Danmark, 2018.\r\nM??rk yllekl??dsel. L??sa dynor. Ben av m??rkbetsad ek.', 'ottoman.jpeg', 15000),
(4, 'VAS \"FAUNA\" ', 'I gr??nt glas: sk??l, design Oiva Toikka. Diameter: 13 cm, h??jd 12,5 cm', 'vas-fauna.jpeg', 5500),
(5, 'MATTA \"FRANK NR 3\" ', 'Ett f??r Josef Frank mycket serent m??nster och f??rgschema har matta nr 3 f??tt. Med de mustiga f??rgerna f??r den tankarna till mossbekl??dd mark och till de klassiska f??rgerna i orientmattor. 120x140 cm, ull.', 'matta-frank.jpeg', 43000),
(6, 'PARAPLYST??LL FORNASETTI ', 'Ett dekorativt paraplyst??ll i lackerad pl??t med Fornasettis karakt??ristiska m??nster Ombrelli e Bastoni. Den uts??kta formen, f??rgerna och estetiken omvandlar med l??tthet en regnig dag till en konstn??rlig upplevelse. Samtliga Fornasettis kreationer, fr??n m??bler till inredningsdetaljer, tillverkas f??r hand i Italien.', 'paraplystall.jpeg', 13400),
(7, 'PALL \"FAMNA\" ', 'Pall Famna 2020 ??r formgiven av??den Stockholmsbaserade design- och arkitekturstudion TAF, grundad av Gabriella Gustafson och Mattias St??hlbom. 75X75X40 CM, bok ben.', 'pall_fanna.jpeg', 16000),
(8, 'NATTLAMPA \"BLOMBUKETT\" ', 'Bordslampa, \"nattlampa\", p??te-de-verre, Frankrike. En blombukett i r??tt, m??rkgr??nt och n??rmast svart glas, signerad i glasmassan G. ARGY-ROUSSEAU, h??jd inklusive fattning i patinerad metall ca 13 cm.', 'nattlampa.jpeg', 16000),
(9, 'TEHUVA \"BARANGUILLA\" ', 'Svenskt Tenns tehuva med m??nstret Baranquilla, dekorerar varje k??k eller dukning. Den runda huvan h??ller tekannan, br??dkorgen eller frukost??ggen varma.\r\nI Josef Franks textil \"Baranquilla\" skapar fyra, k??rleksfullt utformade lianstammar en vacker helhet fylld av prunkande frukter, blommor och blad.??26,5 cm, lin.', 'tehuva.jpeg', 600),
(10, 'VASER BERNDT FRIBERG ', 'Vaser 3 st och sk??lar 2 st, Gustavsbergs studio, olika ??rtal.\r\nStengods, aniaraglasyr i olika turkosa nyanser, signerade Friberg, studiohanden samt olika ??rtal, h??jd 5-18,5 cm.', 'vaser_och_skalar.jpeg', 6000),
(11, 'PLINTH LOW ROSE MARBLE', 'Plinth ??r en serie soff- och sidobord formgivna av Norm Architects f??r Menu. Borden ??r kvadratiska eller rektangulera, best??ende av raka linjer och plana ytor ??? materialet, f??rstklassig marmor, tillf??r ett levande och b??ljande element till det annars ??terh??llsamma formspr??ket. Dess arkitektoniska design, som kombinerar geometrisk precision och exakthet med organisk textur, bidrar med en exklusiv och sofistikerad k??nsla till det moderna hemmet. Plinth best??r av bord i tre storlekar; Tall, Low och Cubic, som alla finns i flera olika utf??randen best??ende av vackraste marmor, d??r de naturliga skiftningarna mellan varje enskild pj??s ger varje bord en unik personlighet och elegans.\r\n', 'menu.jpg', 19295),
(12, 'VISCONTEA WHITE', 'Viscontea White, taklampa formgiven av Achille och Pier Giacomo Castiglioni f??r Flos. Lampan best??r av en vit pulverlackad inre st??lstruktur, belagd med en unik kokongliknande harts.\r\n', 'viscontea.jpg', 17595),
(13, 'KIZU TABLE LAMP SMALL GREY', 'Kizu Table Lamp ??r en serie bordslampor formgiven av Lars Torn??e f??r New Works och best??r av tv?? motsatta geometriska former i marmor och akrylglas. Vid en f??rsta anblick ser det ut som kupan balanserar p?? foten vilket ger bordslampan Kizu ett intressant skulpturalt uttryck. \r\n', 'kizu.jpg', 3095),
(14, 'LITTLE PETRA VB1 WALNUT SHEEPSKIN SAHARA', 'Little Petra VB1 Walnut ??r en f??t??lj fr??n &Tradition, formgiven av Viggo Boesen. Viggo Boesen var en av de ledande formgivarna inom funkisstilen och han debuterade med Little Petra p?? en m??belutst??llning i K??penhamn 1938. Little Petra ??r en charmig liten f??t??lj som passar in alla olika typer av milj??er och interi??rer. ', 'little_petra.jpg', 47495),
(15, 'WOOD BASKET EMMA NATUREL 2\r\n', 'F??rvara dina vedtr??n i den eleganta Wood Basket Emma fr??n Eldvarm. Vedkorgen ??r tillverkad av lackerad metall med detaljer i m??ssing och vackert T??rnsj??l??der. V??lj mellan flera olika utf??randen.', 'wood_basket.jpg', 5420),
(16, 'AK 2730 SIDEBOARD', 'AK 2730 ??r ett sideboard formgivet av Nissen & Gehl f??r Naver. AK 2730 har bakom dess skjutbara jalusid??rrar tv?? sk??p och tre utdragbara l??dor, vilket g??r detta sideboard till en mycket vacker m??bel med stor h??nsyn till b??de design och smart f??rvaring. Tillverkat av massivt tr??, detaljer och underrede i rostfritt st??l och toppskiva av Corian??, som med sin slitstarka yta skyddar tr??et fr??n repor, fl??ckar och slitage. Finns tillg??nglig i flera utf??randen med valbara ytbehandlingar.\r\n', 'ak_2730.jpg', 35365),
(17, 'AK 1330 SKRIVBORD\r\n', 'AK 1330 ??r ett modernistiskt skrivbord formgivet av Nissen och Gehl f??r danska Naver. Formgivningen ??r elegant utformad med f??ljsamma linjer och vackra detaljer ??? ett hantverk av fr??msta kvalitet med h??nsyn till design och funktion. Tillverkat av massivt tr?? och rostfritt st??l med toppskiva av Corian??, som med sin slitstarka yta skyddar skrivbordet fr??n repor, fl??ckar och slitage. Finns tillg??nglig i flera utf??randen med valbara ytbehandlingar.\r\n', 'ak_1330.jpg', 31125),
(18, 'LITTLE PETRA VB2 WALNUT SHEEPSKIN MOONLIGHT', 'Little Petra VB2 Walnut ??r en 2-sitssoffa fr??n &Tradition, formgiven av Viggo Boesen. Viggo Boesen var en av de ledande formgivarna inom funkisstilen och han debuterade med f??t??ljen Little Petra p?? en m??belutst??llning i K??penhamn 1938. 2020 lanserar &Tradition Little Petra VB2 ??? en 2-sitssoffa som har samma charm och komfort som f??t??ljen fast nu med plats f??r fler. Finns i flera olika utf??randen.', 'little_petra_vb2.jpg', 64795),
(19, 'CH24 Y-STOLEN VALN??T/ SN??RE NATUR OLJAD', 'CH24 designades av Hans J. Wegner 1949 och har tillverkats utan avbrott sedan 1950. Designklassikern CH24, ??ven kallad Y-stolen eller Wishbone Chair, ??r en sann ikon bland stolar och hett eftertraktad bland samlare v??rlden ??ver. Den behagliga formen ger en h??g bekv??mlighet och god r??relsef??rm??ga. Stolen ??r tillverkad av massivt tr?? med sits av vaxat papperssn??re. Finns i ett stort antal olika utf??randen.', 'valnot_olja.jpg', 12880),
(20, 'EPIC DINING TABLE 130 CM WHITE TRAVERTINE', 'Epic ??r en serie soff- och matbord formgivna av GamFratesi f??r Gubi. Formspr??ket ??r skulpturalt och rustikt och den runda toppskivan st??r i direkt kontrast mot den kantiga basen ??? tydligt inspirerat av kolonnerna i antikens Grekland och romersk arkitektur. Alla bord ??r tillverkade i travertin, en typ av kalksten, som med sina vackra ??dringar och naturliga struktur ger ett organiskt och levande intryck. Borden tillverkas i Italien och eftersom de ??r gjorda i ett naturmaterial ??r varje bord unikt och skillnader mellan exemplaren bidrar till varje enskild pj??s personliga utseende. Ut??ver detta matbord ing??r i Epic-serien en rad olika soffbord i varierande utf??randen och storlekar.', 'gubi_epic.jpg', 43845),
(21, 'PIRKKA STOL', 'Varum??rke: Artek\r\nI Pirkka-kollektionen fr??n Artek kombinerar Ilmari Tapiovaara klassisk finsk, rustik formgivningen med den sm??ckra m??belstilen som var s?? typisk f??r 50-talet. Pirkka blev fort en succ?? och v??xte till en av Finlands mest omtyckta m??belserier. De sm??ckra m??blerna passade perfekt in i de sm?? efterkrigshemmen och i stugorna. M??blerna, tillverkade av massivt tr?? och monterade utan skruvar, ??r ??ven f??rv??nansv??rt l??tta.\r\nPirkkaserien finns som stol, bord, b??nk och pallar i flera olika utf??randen och storlekar.??', 'pirkka_stol.jpeg', 7185),
(22, 'MIRROR SPEGEL', 'Varum??rke: Swedese\r\nMirror ??r en spegel i ekfan??r formgiven av Front f??r Swedese. Front fick i uppdrag att skapa n??got vackert och anv??ndbart av spillbitar fr??n Swedeses produktion i Vaggeryd. ??verblivet material fr??n tillverkningen av den klassiska Laminof??t??ljen resulterade i spegeln Mirror, som har blivit bel??nad med Born Classic award f??r sin potential att kunna bli en klassiker i framtiden.', 'spegel1.jpeg', 10815),
(23, 'AK 2560 SOFFBORD', 'Varum??rke: naver collection\r\nAK 2560, ??ven kallat Strawberry, ??r ett soffbord formgivet av Nissen och Gehl f??r Naver. Formspr??ket ??r n??tt och elegant, smakfullt och sofistikerat, och finns i flera olika utf??randen. Bordets h??jd ??r valbart och finns tillg??ngliga i tre h??jder ??? 40, 46 eller 51 cm och benen finns tillg??ngliga i samma tr??slag som bordsskivan eller i svartbets, med st??lfoder eller rent tr??ben. Att bordet kan tillverkas med valbar benh??jd m??jligg??r skapandet av ett smakfullt och personligt soffbord som med f??rdel kan placeras i grupper om tv?? eller flera.', 'soffbord.jpeg', 7488),
(24, 'M RACK SMALL EK BOKHYLLA', 'Varum??rke: ETHNICRAFT\r\nM Rack ??r en ??ppen bokhylla i massiv ek eller teak fr??n Ethnicraft. Den innovativa placeringen av hyllplanen bidrar med dynamik till rummet. M Rack fungerar perfekt som rumsavdelare eftersom den kan anv??ndas fr??n b??da h??ll. Finns i tv?? storlekar.??', 'bokhylla.jpeg', 10800),
(25, 'LA CHAISE LOUNGESTOL', 'Varum??rke: Vitra\r\nN??r Charles och Ray Eames skapade loungestolen La Chaise, f??r en t??vling anordnad av Museum of Modern Art i New York, inspirerades de av Gaston Lachaises skulptur \"Floating Figure\". La Chaise inbjuder till flera olika avslappnande sittpositioner och har sedan l??nge etablerat sig som en av de verkliga ikonerna inom organisk design.', 'vitra_loungestol.jpeg', 88900),
(26, 'MY SECRET PLACE BORDSLAMPA', 'Varum??rke: SELETTI\r\nMy Secret Place????r en bordslampa fr??n Seletti, formgiven av Marcantonio. Uttrycket ??r lekfullt och dr??mskt med en stege som leder upp till en hemlig plats ??? den lysande m??nen. Bordslampan ??r tillverkad av resin och blir ett dekorativt inslag i ditt hem samtidigt som den skildrar en historia. Marcantonio ??r v??lk??nd f??r sina livfulla kreationer d??r fantasi, humor och ironi kombineras p?? ett konstn??rligt s??tt.', 'luna_bordslampa.jpeg', 2089),
(27, 'JURASSIC LAMP REX BORDSLAMPA', 'Varum??rke: SELETTI\r\nJurassic Lamp Rex ??r en innovativ bordslampa formgiven av Marcantonio f??r italienska Seletti. P?? tyrannosaurusens rygg sitter sju LED-lampor som ger ett mjukt och behagligt sken. Tyrannosaurusen, ??ven kallad T-Rex, levde f??r 70-65 miljoner ??r sedan och anses ha varit en av de st??rsta k??tt??tande dinosaurerna. Lampan Jurassic Lamp Rex har en 2,5 meter l??ng sladd och ??r tillverkad i resin.', 'dinosaur_lamp.jpeg', 2180),
(28, 'QLOCKTWO TOUCH BORDSKLOCKA M. ALARM', 'Varum??rke: QLOCKTWO\r\nQlocktwo Touch ??r en bordsklocka formgiven av Biegert & Funk. Med hj??lp av 110 bokst??ver som lyses upp av lika m??nga LED-lampor visar Qlocktwo vad klockan ??r p?? ett okonventionellt och sp??nnande s??tt. Tillsammans bildar de upplysta bokst??verna ???Klockan ??r ?????? och var femte minut sl??r klockan om. F??r att indikera minuterna mellan femminutersintervallerna finns fyra ljuspunkter i vardera av klockans h??rn. Fronten h??lls p?? plats med hj??lp av magneter och g??r l??tt att byta ut om man ??nskar ??ndra utseende eller f??rg. Qlocktwo Touch har en smidig alarmfunktion med snooze samt flera andra touchfunktioner som underl??ttar din vardag. Qlocktwo finns att f?? med front p?? upp till 20 olika spr??k, men som standard levereras Qlocktwo med front p?? svenska.', 'klocka.jpeg', 6100),
(49, 'Test2', 'hgkfgjlkhjgfjkhdgjhjkterklghhfhhhhhjhjgljfhgdhgjhhggdhghgrhgdhfgh', 'no-image.png', 28283),
(50, 'Test3', 'ngngthjthjtj', 'no-image.png', 2342),
(51, 'New test', 'lalala', 'no-image.png', 2222222);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `customer_id` (`customer_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`) USING BTREE,
  ADD KEY `customer_id` (`customer_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

