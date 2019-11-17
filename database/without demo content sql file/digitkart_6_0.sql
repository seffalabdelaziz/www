-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 11:00 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitkart_6_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `avig_language`
--

CREATE TABLE `avig_language` (
  `id` int(11) NOT NULL,
  `lang_name` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `lang_flag` varchar(200) NOT NULL,
  `lang_default` int(50) NOT NULL,
  `lang_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avig_language`
--

INSERT INTO `avig_language` (`id`, `lang_name`, `lang_code`, `lang_flag`, `lang_default`, `lang_status`) VALUES
(2, 'English', 'en', '1546674637.png', 1, 1),
(6, 'Arabic', 'ar', '1546674664.png', 0, 1),
(9, 'Spanish', 'es', '1546675049.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `avig_translate`
--

CREATE TABLE `avig_translate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `parent` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avig_translate`
--

INSERT INTO `avig_translate` (`id`, `name`, `token`, `lang_code`, `parent`) VALUES
(1, 'High Quality Items', '5c3300f115110', 'en', 0),
(2, 'سلع ذات جودة عالية', '5c3300f115110', 'ar', 1),
(3, 'Artículos de alta calidad', '5c3300f115110', 'es', 1),
(4, 'Item made by professionals with 15 years of work experience.', '5c3301538f892', 'en', 0),
(5, 'البند الذي أدلى به من قبل المتخصصين مع 15 عاما من الخبرة في العمل.', '5c3301538f892', 'ar', 4),
(6, 'Artículo realizado por profesionales con 15 años de experiencia laboral.', '5c3301538f892', 'es', 4),
(7, '24/7 Customer Services', '5c330192e32f1', 'en', 0),
(8, 'خدمات العملاء 24/7', '5c330192e32f1', 'ar', 7),
(9, 'Servicio al cliente 24/7', '5c330192e32f1', 'es', 7),
(10, 'Our Customer Services Managers will always help you.', '5c3301c538fce', 'en', 0),
(11, 'سيساعدك مديرو خدمة العملاء لدينا دائمًا.', '5c3301c538fce', 'ar', 10),
(12, 'Nuestros gerentes de servicio al cliente siempre te ayudarán.', '5c3301c538fce', 'es', 10),
(13, '100% Satisfaction', '5c3301f8ef1b6', 'en', 0),
(14, 'الرضا 100 ٪', '5c3301f8ef1b6', 'ar', 13),
(15, '100% de satisfacción', '5c3301f8ef1b6', 'es', 13),
(16, 'In case you are not satisfied with the purchased item, we will change it.', '5c33022d8a08e', 'en', 0),
(17, 'في حالة عدم رضائك عن السلعة المشتراة ، فإننا سوف يغيرها.', '5c33022d8a08e', 'ar', 16),
(18, 'En caso de que no esté satisfecho con el artículo comprado, nosotros lo cambiará', '5c33022d8a08e', 'es', 16),
(19, 'Money Back guarantee', '5c3302604bffc', 'en', 0),
(20, 'ضمان استعادة الاموال', '5c3302604bffc', 'ar', 19),
(21, 'Garantía de reembolso', '5c3302604bffc', 'es', 19),
(22, 'In case you change your mind you will get a refund in 30 days.', '5c33029389048', 'en', 0),
(23, 'في حالة تغيير رأيك ، ستحصل على رد في 30 يومًا.', '5c33029389048', 'ar', 22),
(24, 'En caso de que cambie de opinión, recibirá un reembolso en 30 días.', '5c33029389048', 'es', 22),
(25, 'DigitKart', '5c35d94c549f5', 'en', 0),
(26, 'DigitKart', '5c35d94c549f5', 'ar', 25),
(27, 'DigitKart', '5c35d94c549f5', 'es', 25),
(28, '© 2019. All Rights Reserved. Designed by Avigher', '5c35db036ec60', 'en', 0),
(29, '© 2019. جميع الحقوق محفوظة. صممه Avigher', '5c35db036ec60', 'ar', 28),
(30, '© 2019. Todos los derechos reservados. Diseñado por Avigher', '5c35db036ec60', 'es', 28),
(31, '98554+ ITEMS FOR SALE', '5c35dc09630cf', 'en', 0),
(32, '98554+ البنود للبيع', '5c35dc09630cf', 'ar', 31),
(33, '98554+ PRODUCTOS EN VENTA', '5c35dc09630cf', 'es', 31),
(34, 'Best Premium PSD, HTML, Wordpress Themes, PHP Scripts & Others Graphics', '5c35dd15c73bf', 'en', 0),
(35, 'أفضل قسط PSD ، HTML ، وورد المواضيع ، مخطوطات PHP ورسومات أخرى', '5c35dd15c73bf', 'ar', 34),
(36, 'Mejor PSD Premium, HTML, Temas de WordPress, Scripts PHP y otros gráficos', '5c35dd15c73bf', 'es', 34),
(37, 'Want more script,themes & templates? Subscribe to our mailing list to receive an update when new items arrive!', '5c35ddda905d6', 'en', 0),
(38, 'هل تريد المزيد من البرامج النصية والمظاهر والقوالب؟ اشترك في قائمتنا البريدية للحصول على تحديث عند وصول مواد جديدة!', '5c35ddda905d6', 'ar', 37),
(39, '¿Quieres más guiones, temas y plantillas? Suscríbase a nuestra lista de correo para recibir una actualización cuando lleguen nuevos artículos.', '5c35ddda905d6', 'es', 37),
(40, 'Home', '5c35e769d1011', 'en', 0),
(41, 'الصفحة الرئيسية', '5c35e769d1011', 'ar', 40),
(42, 'Casa', '5c35e769d1011', 'es', 40),
(43, 'Search your Items', '5c35e902e32af', 'en', 0),
(44, 'ابحث عن العناصر الخاصة بك', '5c35e902e32af', 'ar', 43),
(45, 'Busca tus artículos', '5c35e902e32af', 'es', 43),
(46, 'Search', '5c35e92d8b626', 'en', 0),
(47, 'بحث', '5c35e92d8b626', 'ar', 46),
(48, 'Buscar', '5c35e92d8b626', 'es', 46),
(49, 'Featured Items', '5c35e9a3b5515', 'en', 0),
(50, 'السلع المعروضة', '5c35e9a3b5515', 'ar', 49),
(51, 'Elementos destacados', '5c35e9a3b5515', 'es', 49),
(52, 'View All Featured Items', '5c35e9cf30613', 'en', 0),
(53, 'عرض جميع العناصر المميزة', '5c35e9cf30613', 'ar', 52),
(54, 'Ver todos los artículos destacados', '5c35e9cf30613', 'es', 52),
(55, 'Latest Items', '5c35e9efcf09e', 'en', 0),
(56, 'أحدث العناصر', '5c35e9efcf09e', 'ar', 55),
(57, 'Últimos artículos', '5c35e9efcf09e', 'es', 55),
(58, 'All prices are in', '5c35ea286daf4', 'en', 0),
(59, 'جميع الأسعار في', '5c35ea286daf4', 'ar', 58),
(60, 'Todos los precios estan en', '5c35ea286daf4', 'es', 58),
(61, 'by', '5c35ea46a1604', 'en', 0),
(62, 'بواسطة', '5c35ea46a1604', 'ar', 61),
(63, 'por', '5c35ea46a1604', 'es', 61),
(64, 'Free Items', '5c35ea8d69f7c', 'en', 0),
(65, 'العناصر المجانية', '5c35ea8d69f7c', 'ar', 64),
(66, 'Artículos gratis', '5c35ea8d69f7c', 'es', 64),
(67, 'View All Free Items', '5c35eadf313f8', 'en', 0),
(68, 'عرض جميع العناصر المجانية', '5c35eadf313f8', 'ar', 67),
(69, 'Ver todos los artículos gratis', '5c35eadf313f8', 'es', 67),
(70, 'CUSTOMER FEEDBACK', '5c35eb0ac418e', 'en', 0),
(71, 'ردود فعل العملاء', '5c35eb0ac418e', 'ar', 70),
(72, 'COMENTARIOS DE LOS CLIENTES', '5c35eb0ac418e', 'es', 70),
(73, 'LATEST BLOG', '5c35eb552e035', 'en', 0),
(74, 'آخر مدونة', '5c35eb552e035', 'ar', 73),
(75, 'ÚLTIMO BLOG', '5c35eb552e035', 'es', 73),
(76, 'Read More..', '5c35eb8641bdc', 'en', 0),
(77, 'قراءة المزيد..', '5c35eb8641bdc', 'ar', 76),
(78, 'Lee mas..', '5c35eb8641bdc', 'es', 76),
(79, '404 Page not found!', '5c35f0a35c529', 'en', 0),
(80, '404 صفحة غير موجود!', '5c35f0a35c529', 'ar', 79),
(81, '¡404 Pagina no encontrada!', '5c35f0a35c529', 'es', 79),
(82, 'The requested page was not found', '5c35f1010b1c6', 'en', 0),
(83, 'الصفحة المطلوبة غير متواجدة', '5c35f1010b1c6', 'ar', 82),
(84, 'La página solicitada no fue encontrada', '5c35f1010b1c6', 'es', 82),
(85, 'Add Item', '5c35f1a43f31e', 'en', 0),
(86, 'اضافة عنصر', '5c35f1a43f31e', 'ar', 85),
(87, 'Añadir artículo', '5c35f1a43f31e', 'es', 85),
(88, 'Title', '5c35f1e18b7d8', 'en', 0),
(89, 'عنوان', '5c35f1e18b7d8', 'ar', 88),
(90, 'Título', '5c35f1e18b7d8', 'es', 88),
(91, 'Description', '5c35f20e7951a', 'en', 0),
(92, 'وصف', '5c35f20e7951a', 'ar', 91),
(93, 'Descripción', '5c35f20e7951a', 'es', 91),
(94, 'Download For Free File?', '5c35f23650208', 'en', 0),
(95, 'تحميل ملف مجاني؟', '5c35f23650208', 'ar', 94),
(96, 'Descargar para Free File?', '5c35f23650208', 'es', 94),
(97, 'Select', '5c35f25659da1', 'en', 0),
(98, 'تحديد', '5c35f25659da1', 'ar', 97),
(99, 'Seleccionar', '5c35f25659da1', 'es', 97),
(100, 'Yes', '5c35f282b6063', 'en', 0),
(101, 'نعم فعلا', '5c35f282b6063', 'ar', 100),
(102, 'Sí', '5c35f282b6063', 'es', 100),
(103, 'No', '5c35f2930d100', 'en', 0),
(104, 'لا', '5c35f2930d100', 'ar', 103),
(105, 'No', '5c35f2930d100', 'es', 103),
(106, 'Regular Price (Six Month)', '5c35f2cba9dc0', 'en', 0),
(107, 'السعر العادي (ستة أشهر)', '5c35f2cba9dc0', 'ar', 106),
(108, 'Precio regular (seis meses)', '5c35f2cba9dc0', 'es', 106),
(109, 'Regular Price (One Year)', '5c35f30f99795', 'en', 0),
(110, 'السعر العادي (سنة واحدة)', '5c35f30f99795', 'ar', 109),
(111, 'Precio regular (un año)', '5c35f30f99795', 'es', 109),
(112, 'Extended Price (Six Month)', '5c35f33741a60', 'en', 0),
(113, 'السعر الموسع (ستة أشهر)', '5c35f33741a60', 'ar', 112),
(114, 'Precio extendido (seis meses)', '5c35f33741a60', 'es', 112),
(115, 'Extended Price (One Year)', '5c35f358d2a62', 'en', 0),
(116, 'السعر الموسع (سنة واحدة)', '5c35f358d2a62', 'ar', 115),
(117, 'Precio extendido (un año)', '5c35f358d2a62', 'es', 115),
(118, 'High Resolution', '5c35f37ff2338', 'en', 0),
(119, 'عالية الدقة', '5c35f37ff2338', 'ar', 118),
(120, 'Alta resolución', '5c35f37ff2338', 'es', 118),
(121, 'Compatible Browsers', '5c35faf514ae0', 'en', 0),
(122, 'المتصفحات المتوافقة', '5c35faf514ae0', 'ar', 121),
(123, 'Navegadores compatibles', '5c35faf514ae0', 'es', 121),
(124, 'IE6', '5c35fb4c215eb', 'en', 0),
(125, 'IE6', '5c35fb4c215eb', 'ar', 124),
(126, 'IE6', '5c35fb4c215eb', 'es', 124),
(127, 'IE7', '5c35fb5af01ec', 'en', 0),
(128, 'IE7', '5c35fb5af01ec', 'ar', 127),
(129, 'IE7', '5c35fb5af01ec', 'es', 127),
(130, 'IE8', '5c35fb72a2536', 'en', 0),
(131, 'IE8', '5c35fb72a2536', 'ar', 130),
(132, 'IE8', '5c35fb72a2536', 'es', 130),
(133, 'IE9', '5c35fb9c3d581', 'en', 0),
(134, 'IE9', '5c35fb9c3d581', 'ar', 133),
(135, 'IE9', '5c35fb9c3d581', 'es', 133),
(136, 'IE10', '5c35fbc2c7557', 'en', 0),
(137, 'IE10', '5c35fbc2c7557', 'ar', 136),
(138, 'IE10', '5c35fbc2c7557', 'es', 136),
(139, 'IE11', '5c35fc0ad7b89', 'en', 0),
(140, 'IE11', '5c35fc0ad7b89', 'ar', 139),
(141, 'IE11', '5c35fc0ad7b89', 'es', 139),
(142, 'Firefox', '5c35fc15bb4ef', 'en', 0),
(143, 'ثعلب النار', '5c35fc15bb4ef', 'ar', 142),
(144, 'Firefox', '5c35fc15bb4ef', 'es', 142),
(145, 'Safari', '5c35fc2b8663d', 'en', 0),
(146, 'رحلات السفاري', '5c35fc2b8663d', 'ar', 145),
(147, 'Safari', '5c35fc2b8663d', 'es', 145),
(148, 'Opera', '5c35fc3e77849', 'en', 0),
(149, 'دار الأوبرا', '5c35fc3e77849', 'ar', 148),
(150, 'Ópera', '5c35fc3e77849', 'es', 148),
(151, 'Chrome', '5c35fc51aeb7c', 'en', 0),
(152, 'كروم', '5c35fc51aeb7c', 'ar', 151),
(153, 'Cromo', '5c35fc51aeb7c', 'es', 151),
(154, 'Edge', '5c35fc63d1652', 'en', 0),
(155, 'حافة', '5c35fc63d1652', 'ar', 154),
(156, 'Borde', '5c35fc63d1652', 'es', 154),
(157, 'Files Included', '5c35fcf29c751', 'en', 0),
(158, 'وشملت الملفات', '5c35fcf29c751', 'ar', 157),
(159, 'Archivos incluidos', '5c35fcf29c751', 'es', 157),
(160, '( separated by commas. e.g. html,css,php,javascript,... )', '5c35fd20e7911', 'en', 0),
(161, '(مفصولة بفواصل. على سبيل المثال ، html و css و php و javascript و ...)', '5c35fd20e7911', 'ar', 160),
(162, '(separados por comas, por ejemplo, html, css, php, javascript, ...)', '5c35fd20e7911', 'es', 160),
(163, 'Demo Url', '5c35fd4ec3190', 'en', 0),
(164, 'عنوان العرض التوضيحي', '5c35fd4ec3190', 'ar', 163),
(165, 'URL de demostración', '5c35fd4ec3190', 'es', 163),
(166, 'Support Item?', '5c35fd70785f7', 'en', 0),
(167, 'دعم البند؟', '5c35fd70785f7', 'ar', 166),
(168, 'Artículo de soporte?', '5c35fd70785f7', 'es', 166),
(169, 'Future Update?', '5c35fdcf49d86', 'en', 0),
(170, 'تحديث المستقبل؟', '5c35fdcf49d86', 'ar', 169),
(171, 'Actualización futura?', '5c35fdcf49d86', 'es', 169),
(172, 'Download Limit', '5c35fe133b2b4', 'en', 0),
(173, 'حد التحميل', '5c35fe133b2b4', 'ar', 172),
(174, 'Límite de descarga', '5c35fe133b2b4', 'es', 172),
(175, '( Leave empty is unlimited downloads )', '5c35fe34a691c', 'en', 0),
(176, '(اترك المساحة الفارغة غير محدودة)', '5c35fe34a691c', 'ar', 175),
(177, '(Deje vacío las descargas ilimitadas)', '5c35fe34a691c', 'es', 175),
(178, 'Category', '5c35fe555b57a', 'en', 0),
(179, 'الفئة', '5c35fe555b57a', 'ar', 178),
(180, 'Categoría', '5c35fe555b57a', 'es', 178),
(181, 'Software Framework', '5c35fe76c9eac', 'en', 0),
(182, 'برنامج البرمجيات', '5c35fe76c9eac', 'ar', 181),
(183, 'Marco de software', '5c35fe76c9eac', 'es', 181),
(184, 'Thumbnail Image', '5c35fe9b382f6', 'en', 0),
(185, 'صورة مصغرة', '5c35fe9b382f6', 'ar', 184),
(186, 'Imagen en miniatura', '5c35fe9b382f6', 'es', 184),
(187, 'Upload Banner Image', '5c35febf90185', 'en', 0),
(188, 'تحميل صورة بانر', '5c35febf90185', 'ar', 187),
(189, 'Subir imagen de banner', '5c35febf90185', 'es', 187),
(190, 'Preview Screenshots (multiple images)', '5c35fee1505b7', 'en', 0),
(191, 'معاينة لقطات الشاشة (صور متعددة)', '5c35fee1505b7', 'ar', 190),
(192, 'Vista previa de capturas de pantalla (imágenes múltiples)', '5c35fee1505b7', 'es', 190),
(193, 'Upload File', '5c35ff020d2ff', 'en', 0),
(194, 'رفع ملف', '5c35ff020d2ff', 'ar', 193),
(195, 'Subir archivo', '5c35ff020d2ff', 'es', 193),
(196, '( ZIP - format only )', '5c35ff2162578', 'en', 0),
(197, '(بتنسيق ZIP فقط)', '5c35ff2162578', 'ar', 196),
(198, '(ZIP - solo formato)', '5c35ff2162578', 'es', 196),
(199, 'Optional Video Preview', '5c35ff43b0b3b', 'en', 0),
(200, 'معاينة الفيديو الاختياري', '5c35ff43b0b3b', 'ar', 199),
(201, 'Vista previa de vídeo opcional', '5c35ff43b0b3b', 'es', 199),
(202, '( MP4 - format only )', '5c35ff625a75c', 'en', 0),
(203, '(MP4 - التنسيق فقط)', '5c35ff625a75c', 'ar', 202),
(204, '(MP4 - solo formato)', '5c35ff625a75c', 'es', 202),
(205, 'Tags', '5c35ff873bb99', 'en', 0),
(206, 'الكلمات', '5c35ff873bb99', 'ar', 205),
(207, 'Etiquetas', '5c35ff873bb99', 'es', 205),
(208, '( separated by commas. e.g. php script,html template,css menu,.... )', '5c35ffb79bdc1', 'en', 0),
(209, '(مفصولة بفواصل. على سبيل المثال ، php script ، أو html ، أو قائمة css ، أو ....)', '5c35ffb79bdc1', 'ar', 208),
(210, '(separados por comas, por ejemplo, script php, plantilla html, menú css, ...)', '5c35ffb79bdc1', 'es', 208),
(211, 'Back', '5c35ffd3d5238', 'en', 0),
(212, 'الى الخلف', '5c35ffd3d5238', 'ar', 211),
(213, 'Espalda', '5c35ffd3d5238', 'es', 211),
(214, 'Submit', '5c35fff38b9b5', 'en', 0),
(215, 'خضع', '5c35fff38b9b5', 'ar', 214),
(216, 'Enviar', '5c35fff38b9b5', 'es', 214),
(217, 'All Items', '5c3606e554d78', 'en', 0),
(218, 'كل الاشياء', '5c3606e554d78', 'ar', 217),
(219, 'Todos los artículos', '5c3606e554d78', 'es', 217),
(220, 'FREE FILE', '5c36076d019ca', 'en', 0),
(221, 'ملف مجاني', '5c36076d019ca', 'ar', 220),
(222, 'ARCHIVO GRATIS', '5c36076d019ca', 'es', 220),
(223, 'View Details', '5c360794bf9ee', 'en', 0),
(224, 'عرض التفاصيل', '5c360794bf9ee', 'ar', 223),
(225, 'Ver detalles', '5c360794bf9ee', 'es', 223),
(226, 'Blog', '5c3608290248b', 'en', 0),
(227, 'مدونة', '5c3608290248b', 'ar', 226),
(228, 'Blog', '5c3608290248b', 'es', 226),
(229, 'Popular Post', '5c3608be1efa5', 'en', 0),
(230, 'منشور مشهور', '5c3608be1efa5', 'ar', 229),
(231, 'Publicación popular', '5c3608be1efa5', 'es', 229),
(232, 'Read More', '5c36091103921', 'en', 0),
(233, 'قراءة المزيد', '5c36091103921', 'ar', 232),
(234, 'Lee mas', '5c36091103921', 'es', 232),
(235, 'Comment', '5c36092e4b835', 'en', 0),
(236, 'تعليق', '5c36092e4b835', 'ar', 235),
(237, 'Comentario', '5c36092e4b835', 'es', 235),
(238, 'Share on', '5c36098d06476', 'en', 0),
(239, 'مشاركه فى', '5c36098d06476', 'ar', 238),
(240, 'Compartir en', '5c36098d06476', 'es', 238),
(241, 'Leave a Reply', '5c3609d2cc467', 'en', 0),
(242, 'اترك رد', '5c3609d2cc467', 'ar', 241),
(243, 'Deja una respuesta', '5c3609d2cc467', 'es', 241),
(244, 'Name', '5c3609f4baaec', 'en', 0),
(245, 'اسم', '5c3609f4baaec', 'ar', 244),
(246, 'Nombre', '5c3609f4baaec', 'es', 244),
(247, 'Email', '5c360a12548e8', 'en', 0),
(248, 'البريد الإلكتروني', '5c360a12548e8', 'ar', 247),
(249, 'Email', '5c360a12548e8', 'es', 247),
(250, 'Message', '5c360a2f29421', 'en', 0),
(251, 'رسالة', '5c360a2f29421', 'ar', 250),
(252, 'Mensaje', '5c360a2f29421', 'es', 250),
(253, 'Send', '5c360a66c5cbf', 'en', 0),
(254, 'إرسال', '5c360a66c5cbf', 'ar', 253),
(255, 'Enviar', '5c360a66c5cbf', 'es', 253),
(256, 'View Comment', '5c360a8e2fb64', 'en', 0),
(257, 'اعرض التعليق', '5c360a8e2fb64', 'ar', 256),
(258, 'Ver comentario', '5c360a8e2fb64', 'es', 256),
(259, 'You must be', '5c360ab584bbe', 'en', 0),
(260, 'يجب ان تكون', '5c360ab584bbe', 'ar', 259),
(261, 'Usted debe ser', '5c360ab584bbe', 'es', 259),
(262, 'logged', '5c360ad2669ea', 'en', 0),
(263, 'تسجيل الدخول', '5c360ad2669ea', 'ar', 262),
(264, 'registrado', '5c360ad2669ea', 'es', 262),
(265, 'in to post a comment.', '5c360af33ecb8', 'en', 0),
(266, 'في لنشر تعليق.', '5c360af33ecb8', 'ar', 265),
(267, 'en para publicar un comentario.', '5c360af33ecb8', 'es', 265),
(268, 'Payment Transaction Cancel', '5c36f91352f72', 'en', 0),
(269, 'معاملة الدفع إلغاء', '5c36f91352f72', 'ar', 268),
(270, 'Transacción de pago Cancelar', '5c36f91352f72', 'es', 268),
(271, 'Your payment transaction has been canceled', '5c36f944c27ef', 'en', 0),
(272, 'تم إلغاء معاملة الدفع الخاصة بك.', '5c36f944c27ef', 'ar', 271),
(273, 'Su transacción de pago ha sido cancelada.', '5c36f944c27ef', 'es', 271),
(274, 'Your Cart', '5c36f98ec7310', 'en', 0),
(275, 'عربتك', '5c36f98ec7310', 'ar', 274),
(276, 'Su carrito', '5c36f98ec7310', 'es', 274),
(277, 'item', '5c36f9cbc4de9', 'en', 0),
(278, 'بند', '5c36f9cbc4de9', 'ar', 277),
(279, 'ít', '5c36f9cbc4de9', 'es', 277),
(280, 'License', '5c36f9ee8275b', 'en', 0),
(281, 'رخصة', '5c36f9ee8275b', 'ar', 280),
(282, 'Licencia', '5c36f9ee8275b', 'es', 280),
(283, 'price', '5c36fa14df47e', 'en', 0),
(284, 'السعر', '5c36fa14df47e', 'ar', 283),
(285, 'precio', '5c36fa14df47e', 'es', 283),
(286, 'Total Price', '5c36fa28d2dd3', 'en', 0),
(287, 'السعر الكلي', '5c36fa28d2dd3', 'ar', 286),
(288, 'precio total', '5c36fa28d2dd3', 'es', 286),
(289, 'remove', '5c36fa3b6d12a', 'en', 0),
(290, 'إزالة', '5c36fa3b6d12a', 'ar', 289),
(291, 'retirar', '5c36fa3b6d12a', 'es', 289),
(292, 'Regular License<br/>(6 months support)', '5c36faed82d8c', 'en', 0),
(293, 'الرخصة العادية <br/> (دعم لمدة 6 أشهر)', '5c36faed82d8c', 'ar', 292),
(294, 'Licencia regular <br/> (6 meses de soporte)', '5c36faed82d8c', 'es', 292),
(295, 'Regular License<br/>(1 year support)', '5c36fb0448922', 'en', 0),
(296, 'الرخصة العادية <br/> (دعم لمدة عام واحد)', '5c36fb0448922', 'ar', 295),
(297, 'Licencia regular <br/> (1 año de soporte)', '5c36fb0448922', 'es', 295),
(298, 'Extended License<br/>(6 months support)', '5c36fb1963f72', 'en', 0),
(299, 'تمديد الترخيص <br/> (دعم لمدة 6 أشهر)', '5c36fb1963f72', 'ar', 298),
(300, 'Licencia extendida <br/> (6 meses de soporte)', '5c36fb1963f72', 'es', 298),
(301, 'Extended License<br/>(1 year support)', '5c36fb2ce65d7', 'en', 0),
(302, 'تمديد الترخيص <br/> (دعم لمدة عام واحد)', '5c36fb2ce65d7', 'ar', 301),
(303, 'Licencia extendida <br/> (1 año de soporte)', '5c36fb2ce65d7', 'es', 301),
(304, 'Are you sure you want to delete?', '5c36fb94180ab', 'en', 0),
(305, 'هل أنت متأكد أنك تريد حذف؟', '5c36fb94180ab', 'ar', 304),
(306, '¿Estas seguro que quieres borrarlo?', '5c36fb94180ab', 'es', 304),
(307, 'Continue Shopping', '5c36fbb61075a', 'en', 0),
(308, 'مواصلة التسوق', '5c36fbb61075a', 'ar', 307),
(309, 'Seguir comprando', '5c36fbb61075a', 'es', 307),
(310, 'cart total', '5c36fbf3cf438', 'en', 0),
(311, 'مواصلة التسوق', '5c36fbf3cf438', 'ar', 310),
(312, 'carrito total', '5c36fbf3cf438', 'es', 310),
(313, 'Subtotal', '5c36fc384cdf4', 'en', 0),
(314, 'حاصل الجمع', '5c36fc384cdf4', 'ar', 313),
(315, 'Total parcial', '5c36fc384cdf4', 'es', 313),
(316, 'Total', '5c36fc4becd08', 'en', 0),
(317, 'مجموع', '5c36fc4becd08', 'ar', 316),
(318, 'Total', '5c36fc4becd08', 'es', 316),
(319, 'proceed to checkout', '5c36fc6000c42', 'en', 0),
(320, 'باشرالخروج من الفندق', '5c36fc6000c42', 'ar', 319),
(321, 'pasar por la caja', '5c36fc6000c42', 'es', 319),
(322, 'Your cart is empty', '5c36fc9c676aa', 'en', 0),
(323, 'عربة التسوق فارغة', '5c36fc9c676aa', 'ar', 322),
(324, 'Tu carrito esta vacío', '5c36fc9c676aa', 'es', 322),
(325, 'Checkout', '5c36fd17e8953', 'en', 0),
(326, 'الدفع', '5c36fd17e8953', 'ar', 325),
(327, 'Revisa', '5c36fd17e8953', 'es', 325),
(328, 'Your details', '5c36fd8126fbd', 'en', 0),
(329, 'تفاصيلك', '5c36fd8126fbd', 'ar', 328),
(330, 'Tus detalles', '5c36fd8126fbd', 'es', 328),
(331, 'First Name', '5c36fda93d45a', 'en', 0),
(332, 'الاسم الاول', '5c36fda93d45a', 'ar', 331),
(333, 'Nombre de pila', '5c36fda93d45a', 'es', 331),
(334, 'Last Name', '5c36fdda71f61', 'en', 0),
(335, 'الكنية', '5c36fdda71f61', 'ar', 334),
(336, 'Apellido', '5c36fdda71f61', 'es', 334),
(337, 'Company Name', '5c36fdfe18dbf', 'en', 0),
(338, 'اسم الشركة', '5c36fdfe18dbf', 'ar', 337),
(339, 'nombre de empresa', '5c36fdfe18dbf', 'es', 337),
(340, 'Phone', '5c36fe53c9d66', 'en', 0),
(341, 'هاتف', '5c36fe53c9d66', 'ar', 340),
(342, 'Teléfono', '5c36fe53c9d66', 'es', 340),
(343, 'Address', '5c36fe72ee67c', 'en', 0),
(344, 'عنوان', '5c36fe72ee67c', 'ar', 343),
(345, 'Dirección', '5c36fe72ee67c', 'es', 343),
(346, 'Town/City', '5c36fe8f56b3b', 'en', 0),
(347, 'المدينة / المدينة', '5c36fe8f56b3b', 'ar', 346),
(348, 'Pueblo / ciudad', '5c36fe8f56b3b', 'es', 346),
(349, 'State', '5c36feb065cfe', 'en', 0),
(350, 'حالة', '5c36feb065cfe', 'ar', 349),
(351, 'Estado', '5c36feb065cfe', 'es', 349),
(352, 'Postcode/zip', '5c36fecdb0eda', 'en', 0),
(353, 'الرمز البريدي / الرمز البريدي', '5c36fecdb0eda', 'ar', 352),
(354, 'Código postal', '5c36fecdb0eda', 'es', 352),
(355, 'Country', '5c36feeb2dfe0', 'en', 0),
(356, 'بلد', '5c36feeb2dfe0', 'ar', 355),
(357, 'País', '5c36feeb2dfe0', 'es', 355),
(358, 'Select Country', '5c36ff076f158', 'en', 0),
(359, 'حدد الدولة', '5c36ff076f158', 'ar', 358),
(360, 'Seleccionar país', '5c36ff076f158', 'es', 358),
(361, 'shipping details', '5c36ff425933a', 'en', 0),
(362, 'تفاصيل الشحن', '5c36ff425933a', 'ar', 361),
(363, 'detalles de envío', '5c36ff425933a', 'es', 361),
(364, 'Ship to a different address', '5c36ff646e2f7', 'en', 0),
(365, 'السفينة الى عنوان مختلف', '5c36ff646e2f7', 'ar', 364),
(366, 'Envia a una direccion diferente', '5c36ff646e2f7', 'es', 364),
(367, 'Order Notes', '5c36ffff995e3', 'en', 0),
(368, 'ترتيب ملاحظات', '5c36ffff995e3', 'ar', 367),
(369, 'pedidos', '5c36ffff995e3', 'es', 367),
(370, 'Your order', '5c370022a5168', 'en', 0),
(371, 'طلبك', '5c370022a5168', 'ar', 370),
(372, 'Su pedido', '5c370022a5168', 'es', 370),
(373, 'Select a Payment Method', '5c370959884bb', 'en', 0),
(374, 'اختر طريقة الدفع', '5c370959884bb', 'ar', 373),
(375, 'Seleccione un método de pago', '5c370959884bb', 'es', 373),
(376, 'I have read all', '5c37097dac336', 'en', 0),
(377, 'لقد قرأت كل شيء', '5c37097dac336', 'ar', 376),
(378, 'He leído todo', '5c37097dac336', 'es', 376),
(379, 'terms &amp; conditions', '5c37099ee9364', 'en', 0),
(380, 'الشروط & أمبير ؛ الظروف', '5c37099ee9364', 'ar', 379),
(381, 'términos & amp; condiciones', '5c37099ee9364', 'es', 379),
(382, 'Place Order', '5c3709c1c31fd', 'en', 0),
(383, 'مكان الامر', '5c3709c1c31fd', 'ar', 382),
(384, 'realizar pedido', '5c3709c1c31fd', 'es', 382),
(385, 'Thank You', '5c370bebb8cb2', 'en', 0),
(386, 'شكرا جزيلا', '5c370bebb8cb2', 'ar', 385),
(387, 'Gracias', '5c370bebb8cb2', 'es', 385),
(388, 'Your email confirmation successful. Please', '5c370c30e381e', 'en', 0),
(389, 'تأكيد البريد الإلكتروني الخاص بك ناجح. رجاء', '5c370c30e381e', 'ar', 388),
(390, 'Su confirmación de correo electrónico exitosa. Por favor', '5c370c30e381e', 'es', 388),
(391, 'login', '5c370c50117e3', 'en', 0),
(392, 'تسجيل الدخول', '5c370c50117e3', 'ar', 391),
(393, 'iniciar sesión', '5c370c50117e3', 'es', 391),
(394, 'here', '5c370c6d1d5f9', 'en', 0),
(395, 'هنا', '5c370c6d1d5f9', 'ar', 394),
(396, 'aquí', '5c370c6d1d5f9', 'es', 394),
(397, 'Our Address', '5c370ce683692', 'en', 0),
(398, 'عنواننا', '5c370ce683692', 'ar', 397),
(399, 'Nuestra dirección', '5c370ce683692', 'es', 397),
(400, 'Contact Number', '5c370d41dcd23', 'en', 0),
(401, 'رقم الاتصال', '5c370d41dcd23', 'ar', 400),
(402, 'Número de contacto', '5c370d41dcd23', 'es', 400),
(403, 'Email Address', '5c370db171fb0', 'en', 0),
(404, 'عنوان بريد الكتروني', '5c370db171fb0', 'ar', 403),
(405, 'Dirección de correo electrónico', '5c370db171fb0', 'es', 403),
(406, 'Feel Free to Contact Me', '5c370dd673f65', 'en', 0),
(407, 'لا تتردد في الاتصال بي', '5c370dd673f65', 'ar', 406),
(408, 'No dude en ponerse en contacto conmigo', '5c370dd673f65', 'es', 406),
(409, 'Whats your name', '5c370df758586', 'en', 0),
(410, 'ما هو اسمك', '5c370df758586', 'ar', 409),
(411, 'Cuál es tu nombre', '5c370df758586', 'es', 409),
(412, 'Whats your email', '5c370e176b1a9', 'en', 0),
(413, 'ما هو بريدك الإلكتروني', '5c370e176b1a9', 'ar', 412),
(414, 'Cuál es tu correo electrónico', '5c370e176b1a9', 'es', 412),
(415, 'Phone No', '5c370e34e97e1', 'en', 0),
(416, 'رقم الهاتف', '5c370e34e97e1', 'ar', 415),
(417, 'Telefono no', '5c370e34e97e1', 'es', 415),
(418, 'Whats in your mind', '5c370e52933c9', 'en', 0),
(419, 'بماذا تفكر', '5c370e52933c9', 'ar', 418),
(420, 'Que estás pensando', '5c370e52933c9', 'es', 418),
(421, 'Send Mail', '5c370e7a010ef', 'en', 0),
(422, 'ارسل بريد', '5c370e7a010ef', 'ar', 421),
(423, 'Enviar correo', '5c370e7a010ef', 'es', 421),
(424, 'My Dashboard', '5c370f489246f', 'en', 0),
(425, 'لوحة المعلومات الخاصة بي', '5c370f489246f', 'ar', 424),
(426, 'Mi tablero', '5c370f489246f', 'es', 424),
(427, 'Username', '5c37277267bc7', 'en', 0),
(428, 'اسم المستخدم', '5c37277267bc7', 'ar', 427),
(429, 'Nombre de usuario', '5c37277267bc7', 'es', 427),
(430, 'E-Mail Address', '5c3727ef0948f', 'en', 0),
(431, 'عنوان بريد الكتروني', '5c3727ef0948f', 'ar', 430),
(432, 'Dirección de correo electrónico', '5c3727ef0948f', 'es', 430),
(433, 'Password', '5c372801aed43', 'en', 0),
(434, 'كلمه السر', '5c372801aed43', 'ar', 433),
(435, 'Contraseña', '5c372801aed43', 'es', 433),
(436, 'Gender', '5c372828d2c6a', 'en', 0),
(437, 'جنس', '5c372828d2c6a', 'ar', 436),
(438, 'Género', '5c372828d2c6a', 'es', 436),
(439, 'Profile Photo', '5c37283c57835', 'en', 0),
(440, 'الصورة الشخصية', '5c37283c57835', 'ar', 439),
(441, 'Foto de perfil', '5c37283c57835', 'es', 439),
(442, 'Send a notification to buyers when item update is approved', '5c3728526fbf5', 'en', 0),
(443, 'إرسال إشعار للمشترين عند الموافقة على تحديث العنصر', '5c3728526fbf5', 'ar', 442),
(444, 'Enviar una notificación a los compradores cuando se apruebe la actualización del artículo', '5c3728526fbf5', 'es', 442),
(445, 'Profile Banner', '5c3728f51f02d', 'en', 0),
(446, 'الملف الشخصي بانر', '5c3728f51f02d', 'ar', 445),
(447, 'Perfil de banner', '5c3728f51f02d', 'es', 445),
(448, 'About', '5c37292ea0f70', 'en', 0),
(449, 'حول', '5c37292ea0f70', 'ar', 448),
(450, 'Acerca de', '5c37292ea0f70', 'es', 448),
(451, 'Profile Page Email & Phone No', '5c37294fc35cf', 'en', 0),
(452, 'الصفحة الشخصية البريد الإلكتروني والهاتف رقم', '5c37294fc35cf', 'ar', 451),
(453, 'Página de perfil Correo electrónico y teléfono No', '5c37294fc35cf', 'es', 451),
(454, 'ON', '5c3729710853c', 'en', 0),
(455, 'على', '5c3729710853c', 'ar', 454),
(456, 'EN', '5c3729710853c', 'es', 454),
(457, 'OFF', '5c3729830cf93', 'en', 0),
(458, 'إيقاف', '5c3729830cf93', 'ar', 457),
(459, 'APAGADO', '5c3729830cf93', 'es', 457),
(460, 'Your Referral Url', '5c3729ae7e5f9', 'en', 0),
(461, 'عنوان الإحالة الخاص بك', '5c3729ae7e5f9', 'ar', 460),
(462, 'Tu URL de referencia', '5c3729ae7e5f9', 'es', 460),
(463, 'Update', '5c3729d09ca29', 'en', 0),
(464, 'تحديث', '5c3729d09ca29', 'ar', 463),
(465, 'Actualizar', '5c3729d09ca29', 'es', 463),
(466, 'Edit Item', '5c372ac019369', 'en', 0),
(467, 'تعديل عنصر', '5c372ac019369', 'ar', 466),
(468, 'Editar elemento', '5c372ac019369', 'es', 466),
(469, 'Payment Success', '5c3731336484b', 'en', 0),
(470, 'الدفع الناجح', '5c3731336484b', 'ar', 469),
(471, 'pago exitoso', '5c3731336484b', 'es', 469),
(472, 'Your payment has been successful.', '5c37316d24621', 'en', 0),
(473, 'لقد تمت عملية الدفع بنجاح.', '5c37316d24621', 'ar', 472),
(474, 'Su pago ha sido exitoso.', '5c37316d24621', 'es', 472),
(475, 'Payment ID', '5c37318aa1cb9', 'en', 0),
(476, 'معرف الدفع', '5c37318aa1cb9', 'ar', 475),
(477, 'ID de pago', '5c37318aa1cb9', 'es', 475),
(478, 'Featured Item', '5c37326f7cb52', 'en', 0),
(479, 'البند المميز', '5c37326f7cb52', 'ar', 478),
(480, 'Artículo destacado', '5c37326f7cb52', 'es', 478),
(481, 'Duration', '5c3732bc11dde', 'en', 0),
(482, 'المدة الزمنية', '5c3732bc11dde', 'ar', 481),
(483, 'Duración', '5c3732bc11dde', 'es', 481),
(484, 'days', '5c373308f3cb5', 'en', 0),
(485, 'أيام', '5c373308f3cb5', 'ar', 484),
(486, 'dias', '5c373308f3cb5', 'es', 484),
(487, 'Payment Confirmation', '5c37355db60f1', 'en', 0),
(488, 'تأكيد الدفعة', '5c37355db60f1', 'ar', 487),
(489, 'Confirmación de pago', '5c37355db60f1', 'es', 487),
(490, 'support', '5c373635ab671', 'en', 0),
(491, 'الدعم', '5c373635ab671', 'ar', 490),
(492, 'apoyo', '5c373635ab671', 'es', 490),
(493, 'FOLLOW US', '5c37366599077', 'en', 0),
(494, 'تابعنا', '5c37366599077', 'ar', 493),
(495, 'SÍGUENOS', '5c37366599077', 'es', 493),
(496, 'Newsletter', '5c3736903509b', 'en', 0),
(497, 'النشرة الإخبارية', '5c3736903509b', 'ar', 496),
(498, 'Hoja informativa', '5c3736903509b', 'es', 496),
(499, 'subscribe', '5c3736c24e26c', 'en', 0),
(500, 'الاشتراك', '5c3736c24e26c', 'ar', 499),
(501, 'suscribir', '5c3736c24e26c', 'es', 499),
(502, 'Community members', '5c3736e51831a', 'en', 0),
(503, 'اعضاء المجتمع', '5c3736e51831a', 'ar', 502),
(504, 'Miembros de la comunidad', '5c3736e51831a', 'es', 502),
(505, 'Forgot Password?', '5c373820626bc', 'en', 0),
(506, 'هل نسيت كلمة المرور؟', '5c373820626bc', 'ar', 505),
(507, '¿Se te olvidó tu contraseña?', '5c373820626bc', 'es', 505),
(508, 'Send Password Reset Link', '5c37387676aa8', 'en', 0),
(509, 'إرسال رابط إعادة تعيين كلمة المرور', '5c37387676aa8', 'ar', 508),
(510, 'Enviar contraseña Restablecer enlace', '5c37387676aa8', 'es', 508),
(511, 'go to cart', '5c373bad3b5ab', 'en', 0),
(512, 'اذهب الى السلة', '5c373bad3b5ab', 'ar', 511),
(513, 'ir al carrito', '5c373bad3b5ab', 'es', 511),
(514, 'Earnings', '5c373ddf31611', 'en', 0),
(515, 'أرباح', '5c373ddf31611', 'ar', 514),
(516, 'Ganancias', '5c373ddf31611', 'es', 514),
(517, 'My Profile', '5c373e1438b62', 'en', 0),
(518, 'ملفي', '5c373e1438b62', 'ar', 517),
(519, 'Mi perfil', '5c373e1438b62', 'es', 517),
(520, 'Logout', '5c373e3283d77', 'en', 0),
(521, 'الخروج', '5c373e3283d77', 'ar', 520),
(522, 'Cerrar sesión', '5c373e3283d77', 'es', 520),
(523, 'My Items', '5c373e589cc9b', 'en', 0),
(524, 'أشيائي', '5c373e589cc9b', 'ar', 523),
(525, 'Mis cosas', '5c373e589cc9b', 'es', 523),
(526, 'My Shopping', '5c373e7561600', 'en', 0),
(527, 'تسوقي', '5c373e7561600', 'ar', 526),
(528, 'Mi compra', '5c373e7561600', 'es', 526),
(529, 'My Orders', '5c3740f324365', 'en', 0),
(530, 'طلباتي', '5c3740f324365', 'ar', 529),
(531, 'Mis ordenes', '5c3740f324365', 'es', 529),
(532, 'My Earnings', '5c3741105d815', 'en', 0),
(533, 'أجوري', '5c3741105d815', 'ar', 532),
(534, 'Mis Ganancias', '5c3741105d815', 'es', 532),
(535, 'Sign In', '5c3741415ac57', 'en', 0),
(536, 'تسجيل الدخول', '5c3741415ac57', 'ar', 535),
(537, 'Registrarse', '5c3741415ac57', 'es', 535),
(538, 'Pages', '5c3741ba52f06', 'en', 0),
(539, 'صفحات', '5c3741ba52f06', 'ar', 538),
(540, 'Páginas', '5c3741ba52f06', 'es', 538),
(541, 'Live Preview', '5c3745babea64', 'en', 0),
(542, 'معاينة حية', '5c3745babea64', 'ar', 541),
(543, 'Vista previa en vivo', '5c3745babea64', 'es', 541),
(544, 'Screenshots', '5c37460637f5f', 'en', 0),
(545, 'لقطات', '5c37460637f5f', 'ar', 544),
(546, 'Capturas de pantalla', '5c37460637f5f', 'es', 544),
(547, 'Item Details', '5c374633bd68c', 'en', 0),
(548, 'تفاصيل العنصر', '5c374633bd68c', 'ar', 547),
(549, 'detalles del artículo', '5c374633bd68c', 'es', 547),
(550, 'Reviews', '5c3746c066819', 'en', 0),
(551, 'التعليقات', '5c3746c066819', 'ar', 550),
(552, 'Opiniones', '5c3746c066819', 'es', 550),
(553, 'Comments', '5c3746df50f71', 'en', 0),
(554, 'تعليقات', '5c3746df50f71', 'ar', 553),
(555, 'Comentarios', '5c3746df50f71', 'es', 553),
(556, 'Author', '5c37472254d4a', 'en', 0),
(557, 'مؤلف', '5c37472254d4a', 'ar', 556),
(558, 'Autor', '5c37472254d4a', 'es', 556),
(559, 'Expired', '5c37475083214', 'en', 0),
(560, 'منتهية الصلاحية', '5c37475083214', 'ar', 559),
(561, 'Muerto', '5c37475083214', 'es', 559),
(562, 'reply', '5c3747aae31e6', 'en', 0),
(563, 'الرد', '5c3747aae31e6', 'ar', 562),
(564, 'respuesta', '5c3747aae31e6', 'es', 562),
(565, 'Post Comment', '5c374804502c7', 'en', 0),
(566, 'أضف تعليقا', '5c374804502c7', 'ar', 565),
(567, 'publicar comentario', '5c374804502c7', 'es', 565),
(568, 'Need Support?', '5c3748398894c', 'en', 0),
(569, 'بحاجة إلى دعم؟', '5c3748398894c', 'ar', 568),
(570, '¿Necesita ayuda?', '5c3748398894c', 'es', 568),
(571, 'not support', '5c3748644221f', 'en', 0),
(572, 'لا تدعم', '5c3748644221f', 'ar', 571),
(573, 'no apoyo', '5c3748644221f', 'es', 571),
(574, 'sign', '5c374887356fe', 'en', 0),
(575, 'إشارة', '5c374887356fe', 'ar', 574),
(576, 'firmar', '5c374887356fe', 'es', 574),
(577, 'in to contact this author.', '5c3748a575561', 'en', 0),
(578, 'في الاتصال بهذا المؤلف.', '5c3748a575561', 'ar', 577),
(579, 'en ponerse en contacto con este autor.', '5c3748a575561', 'es', 577),
(580, 'Send Message', '5c3748d08c662', 'en', 0),
(581, 'ارسل رسالة', '5c3748d08c662', 'ar', 580),
(582, 'Enviar mensaje', '5c3748d08c662', 'es', 580),
(583, 'This item is one of the', '5c3748f34bf14', 'en', 0),
(584, 'هذا البند هو واحد من', '5c3748f34bf14', 'ar', 583),
(585, 'Este artículo es uno de los', '5c3748f34bf14', 'es', 583),
(586, 'free files', '5c37491157593', 'en', 0),
(587, 'ملفات مجانية', '5c37491157593', 'ar', 586),
(588, 'archivos gratis', '5c37491157593', 'es', 586),
(589, 'You are able to download this item for free for a limited time. Updates and support are only available if you purchase this item.', '5c37492f7c257', 'en', 0),
(590, 'يمكنك تنزيل هذا العنصر مجانًا لفترة محدودة. التحديثات والدعم متاحة فقط في حالة شراء هذا العنصر.', '5c37492f7c257', 'ar', 589),
(591, 'Puedes descargar este artículo gratis por un tiempo limitado. Las actualizaciones y el soporte solo están disponibles si compras este artículo.', '5c37492f7c257', 'es', 589),
(592, 'Download this file for free', '5c3749508c3bb', 'en', 0),
(593, 'قم بتنزيل هذا الملف مجانًا', '5c3749508c3bb', 'ar', 592),
(594, 'Descarga este archivo gratis', '5c3749508c3bb', 'es', 592),
(595, 'Quality checked by', '5c374988acc15', 'en', 0),
(596, 'فحص الجودة من قبل', '5c374988acc15', 'ar', 595),
(597, 'Calidad verificada por', '5c374988acc15', 'es', 595),
(598, 'Future updates', '5c3749a3b1487', 'en', 0),
(599, 'التحديثات المستقبلية', '5c3749a3b1487', 'ar', 598),
(600, 'Actualizaciones futuras', '5c3749a3b1487', 'es', 598),
(601, '6 Month support & update', '5c3749bf27ba0', 'en', 0),
(602, 'دعم 6 أشهر والتحديث', '5c3749bf27ba0', 'ar', 601),
(603, '6 meses de soporte y actualización', '5c3749bf27ba0', 'es', 601),
(604, 'Regular support to 6 months', '5c3749e3133b6', 'en', 0),
(605, 'دعم منتظم لمدة 6 أشهر', '5c3749e3133b6', 'ar', 604),
(606, 'Soporte regular a 6 meses.', '5c3749e3133b6', 'es', 604),
(607, 'Regular support to 12 months', '5c374a0b8e5b3', 'en', 0),
(608, 'دعم منتظم لمدة 12 شهرًا', '5c374a0b8e5b3', 'ar', 607),
(609, 'Soporte regular a 12 meses.', '5c374a0b8e5b3', 'es', 607),
(610, 'Extend support to 6 months', '5c374a303a26c', 'en', 0),
(611, 'تمديد الدعم لمدة 6 أشهر', '5c374a303a26c', 'ar', 610),
(612, 'Extender el soporte a 6 meses.', '5c374a303a26c', 'es', 610),
(613, 'Extend support to 12 months', '5c374a4e22e32', 'en', 0),
(614, 'تمديد الدعم لمدة 12 شهرا', '5c374a4e22e32', 'ar', 613),
(615, 'Extender el soporte a 12 meses.', '5c374a4e22e32', 'es', 613),
(616, 'What does support include?', '5c374a6c95539', 'en', 0),
(617, 'ماذا يشمل الدعم؟', '5c374a6c95539', 'ar', 616),
(618, '¿Qué incluye el soporte?', '5c374a6c95539', 'es', 616),
(619, 'EDIT', '5c374a930360d', 'en', 0),
(620, 'تصحيح', '5c374a930360d', 'ar', 619),
(621, 'EDITAR', '5c374a930360d', 'es', 619),
(622, 'BUY NOW', '5c374ab467b2c', 'en', 0),
(623, 'اشتري الآن', '5c374ab467b2c', 'ar', 622),
(624, 'COMPRA AHORA', '5c374ab467b2c', 'es', 622),
(625, 'Sales', '5c374aff3ec04', 'en', 0),
(626, 'مبيعات', '5c374aff3ec04', 'ar', 625),
(627, 'Ventas', '5c374aff3ec04', 'es', 625),
(628, 'Sale', '5c374b20b65c0', 'en', 0),
(629, 'تخفيض السعر', '5c374b20b65c0', 'ar', 628),
(630, 'Venta', '5c374b20b65c0', 'es', 628),
(631, 'item rating', '5c374b5586c1c', 'en', 0),
(632, 'تصنيف البند', '5c374b5586c1c', 'ar', 631),
(633, 'valoración de artículo', '5c374b5586c1c', 'es', 631),
(634, 'item information', '5c374b720aa4a', 'en', 0),
(635, 'معلومات البند', '5c374b720aa4a', 'ar', 634),
(636, 'Información del artículo', '5c374b720aa4a', 'es', 634),
(637, 'Item released', '5c374b8e39e96', 'en', 0),
(638, 'البند صدر', '5c374b8e39e96', 'ar', 637),
(639, 'Artículo publicado', '5c374b8e39e96', 'es', 637),
(640, 'Last update', '5c374ba99655c', 'en', 0),
(641, 'اخر تحديث', '5c374ba99655c', 'ar', 640),
(642, 'Última actualización', '5c374ba99655c', 'es', 640),
(643, 'Related Items', '5c374c33c6a6d', 'en', 0),
(644, 'الأصناف المتعلقة', '5c374c33c6a6d', 'ar', 643),
(645, 'Artículos relacionados', '5c374c33c6a6d', 'es', 643),
(646, 'My Comments', '5c3750ba781ad', 'en', 0),
(647, 'تعليقاتي', '5c3750ba781ad', 'ar', 646),
(648, 'Mis comentarios', '5c3750ba781ad', 'es', 646),
(649, 'comments found !!!', '5c3750e39482d', 'en', 0),
(650, 'وجدت تعليقات!', '5c3750e39482d', 'ar', 649),
(651, 'comentarios encontrados !!!', '5c3750e39482d', 'es', 649),
(652, 'Back To Dashboard', '5c3750ffe9612', 'en', 0),
(653, 'العودة إلى لوحة القيادة', '5c3750ffe9612', 'ar', 652),
(654, 'Volver al tablero de instrumentos', '5c3750ffe9612', 'es', 652),
(655, 'SNo', '5c37511ceb016', 'en', 0),
(656, 'سنو', '5c37511ceb016', 'ar', 655),
(657, 'SNo', '5c37511ceb016', 'es', 655),
(658, 'Type', '5c375140a10a7', 'en', 0),
(659, 'نوع', '5c375140a10a7', 'ar', 658),
(660, 'Tipo', '5c375140a10a7', 'es', 658),
(661, 'Your Comment', '5c37515d23b4d', 'en', 0),
(662, 'تعليقك', '5c37515d23b4d', 'ar', 661),
(663, 'Tu comentario', '5c37515d23b4d', 'es', 661),
(664, 'Status', '5c375178834db', 'en', 0),
(665, 'الحالة', '5c375178834db', 'ar', 664),
(666, 'Estado', '5c375178834db', 'es', 664),
(667, 'Action', '5c37519ac7e5c', 'en', 0),
(668, 'عمل', '5c37519ac7e5c', 'ar', 667),
(669, 'Acción', '5c37519ac7e5c', 'es', 667),
(670, 'Approved', '5c3751be9dac5', 'en', 0),
(671, 'وافق', '5c3751be9dac5', 'ar', 670),
(672, 'Aprobado', '5c3751be9dac5', 'es', 670),
(673, 'Unapproved', '5c3751e14ecfd', 'en', 0),
(674, 'غير موافق عليها', '5c3751e14ecfd', 'ar', 673),
(675, 'No aprobado', '5c3751e14ecfd', 'es', 673),
(676, 'My total referral earning', '5c37552fe398c', 'en', 0),
(677, 'مجموع بلدي الإحالة الكسب', '5c37552fe398c', 'ar', 676),
(678, 'Mi total ganancia de referencia', '5c37552fe398c', 'es', 676),
(679, 'Minimum Withdraw Amount', '5c37554f0abf0', 'en', 0),
(680, 'الحد الأدنى لسحب المبلغ', '5c37554f0abf0', 'ar', 679),
(681, 'Cantidad mínima de retiro', '5c37554f0abf0', 'es', 679),
(682, 'Available Balance', '5c37556e8929a', 'en', 0),
(683, 'الرصيد المتوفر', '5c37556e8929a', 'ar', 682),
(684, 'Saldo disponible', '5c37556e8929a', 'es', 682),
(685, 'Cleared funds available for withdrawal', '5c37558972585', 'en', 0),
(686, 'الأموال المسحوبة المتاحة للانسحاب', '5c37558972585', 'ar', 685),
(687, 'Fondos compensados ​​disponibles para retiro', '5c37558972585', 'es', 685),
(688, 'Withdraw Amount', '5c3755a5b9c8f', 'en', 0),
(689, 'سحب المبلغ', '5c3755a5b9c8f', 'ar', 688),
(690, 'Retirar cantidad', '5c3755a5b9c8f', 'es', 688),
(691, 'Withdraw Option', '5c3755c54603b', 'en', 0),
(692, 'خيار السحب', '5c3755c54603b', 'ar', 691),
(693, 'Opción de retiro', '5c3755c54603b', 'es', 691),
(694, 'Enter Paytm Number', '5c3755eecd1db', 'en', 0),
(695, 'أدخل رقم Paytm', '5c3755eecd1db', 'ar', 694),
(696, 'Ingrese el número de Paytm', '5c3755eecd1db', 'es', 694),
(697, 'Enter Paypal ID', '5c37560c90fc1', 'en', 0),
(698, 'أدخل معرف باي بال', '5c37560c90fc1', 'ar', 697),
(699, 'Ingrese ID de Paypal', '5c37560c90fc1', 'es', 697),
(700, 'Enter Stripe Email ID', '5c37562af38dc', 'en', 0),
(701, 'أدخل معرف البريد الإلكتروني المخطط', '5c37562af38dc', 'ar', 700),
(702, 'Ingrese ID de correo electrónico de banda', '5c37562af38dc', 'es', 700),
(703, 'Bank Account No', '5c3756447eb90', 'en', 0),
(704, 'رقم الحساب المصرفي', '5c3756447eb90', 'ar', 703),
(705, 'Número de Cuenta Bancaria', '5c3756447eb90', 'es', 703),
(706, 'Bank Name and Address', '5c3756504e0f3', 'en', 0),
(707, 'اسم البنك وعنوانه', '5c3756504e0f3', 'ar', 706),
(708, 'Nombre y dirección del banco', '5c3756504e0f3', 'es', 706),
(709, 'IFSC Code', '5c37566186b24', 'en', 0),
(710, 'رمز IFSC', '5c37566186b24', 'ar', 709),
(711, 'Código IFSC', '5c37566186b24', 'es', 709),
(712, 'Withdrawal Details', '5c3756d319afb', 'en', 0),
(713, 'تفاصيل السحب', '5c3756d319afb', 'ar', 712),
(714, 'Detalles de Retiro', '5c3756d319afb', 'es', 712),
(715, 'Amount', '5c375777c2007', 'en', 0),
(716, 'كمية', '5c375777c2007', 'ar', 715),
(717, 'Cantidad', '5c375777c2007', 'es', 715),
(718, 'Payment Type', '5c375798030ba', 'en', 0),
(719, 'نوع الدفع', '5c375798030ba', 'ar', 718),
(720, 'Tipo de pago', '5c375798030ba', 'es', 718),
(721, 'Paypal Id', '5c3757b4013d3', 'en', 0),
(722, 'Paypal Id', '5c3757b4013d3', 'ar', 721),
(723, 'Identificación de Paypal', '5c3757b4013d3', 'es', 721),
(724, 'Stripe Id', '5c3757d1569c2', 'en', 0),
(725, 'معرف الشريط', '5c3757d1569c2', 'ar', 724),
(726, 'Identificación de la raya', '5c3757d1569c2', 'es', 724),
(727, 'Paytm No', '5c3757f1bd9a0', 'en', 0),
(728, 'Paytm No', '5c3757f1bd9a0', 'ar', 727),
(729, 'Paytm No', '5c3757f1bd9a0', 'es', 727),
(730, 'Bank Info', '5c3758389af25', 'en', 0),
(731, 'معلومات البنك', '5c3758389af25', 'ar', 730),
(732, 'Información del banco', '5c3758389af25', 'es', 730),
(733, 'Id', '5c3840841bf7f', 'en', 0),
(734, 'هوية شخصية', '5c3840841bf7f', 'ar', 733),
(735, 'Carné de identidad', '5c3840841bf7f', 'es', 733),
(736, 'Item Name', '5c3840aee2520', 'en', 0),
(737, 'اسم العنصر', '5c3840aee2520', 'ar', 736),
(738, 'Nombre del árticulo', '5c3840aee2520', 'es', 736),
(739, 'Regular Price', '5c3840c7076b2', 'en', 0),
(740, 'سعر عادي', '5c3840c7076b2', 'ar', 739),
(741, 'Precio regular', '5c3840c7076b2', 'es', 739),
(742, 'Featured?', '5c3840de5bba9', 'en', 0),
(743, 'متميز؟', '5c3840de5bba9', 'ar', 742),
(744, 'Destacado?', '5c3840de5bba9', 'es', 742),
(745, '(6 months)', '5c38414fd9566', 'en', 0),
(746, '(6 اشهر)', '5c38414fd9566', 'ar', 745),
(747, '(6 meses)', '5c38414fd9566', 'es', 745),
(748, 'Make Featured', '5c38417a7a793', 'en', 0),
(749, 'جعل متميز', '5c38417a7a793', 'ar', 748),
(750, 'Hacer Destacado', '5c38417a7a793', 'es', 748),
(751, 'Featured', '5c38419fe91aa', 'en', 0),
(752, 'متميز', '5c38419fe91aa', 'ar', 751),
(753, 'Destacados', '5c38419fe91aa', 'es', 751),
(754, 'Waiting for approval', '5c3841c02b1fc', 'en', 0),
(755, 'بانتظار الموافقة', '5c3841c02b1fc', 'ar', 754),
(756, 'A la espera de la aprobación', '5c3841c02b1fc', 'es', 754),
(757, 'Buyer Name', '5c384306832d7', 'en', 0),
(758, 'اسم المشتري', '5c384306832d7', 'ar', 757),
(759, 'Nombre del comprador', '5c384306832d7', 'es', 757),
(760, 'Purchased Date', '5c384338111f8', 'en', 0),
(761, 'تاريخ الشراء', '5c384338111f8', 'ar', 760),
(762, 'Fecha de compra', '5c384338111f8', 'es', 760),
(763, 'Expiry Date', '5c384351e5278', 'en', 0),
(764, 'تاريخ الانتهاء', '5c384351e5278', 'ar', 763),
(765, 'Fecha de caducidad', '5c384351e5278', 'es', 763),
(766, 'View More', '5c384395731b7', 'en', 0),
(767, 'عرض المزيد', '5c384395731b7', 'ar', 766),
(768, 'Ver más', '5c384395731b7', 'es', 766),
(769, 'Support License', '5c384599ac1ed', 'en', 0),
(770, 'رخصة دعم', '5c384599ac1ed', 'ar', 769),
(771, 'Licencia de soporte', '5c384599ac1ed', 'es', 769),
(772, 'Cancellation & Refund', '5c3845c032d50', 'en', 0),
(773, 'إلغاء واسترداد', '5c3845c032d50', 'ar', 772),
(774, 'Cancelación y Reembolso', '5c3845c032d50', 'es', 772),
(775, 'Rate & Review', '5c3845decb5bf', 'en', 0),
(776, 'مراجعة معدل', '5c3845decb5bf', 'ar', 775),
(777, 'Revisión de tasas', '5c3845decb5bf', 'es', 775),
(778, 'Waiting for admin response', '5c3846600d836', 'en', 0),
(779, 'في انتظار رد المشرف', '5c3846600d836', 'ar', 778),
(780, 'Esperando la respuesta del administrador', '5c3846600d836', 'es', 778),
(781, 'Click to refund request', '5c38468798fb6', 'en', 0),
(782, 'انقر لاسترداد الطلب', '5c38468798fb6', 'ar', 781),
(783, 'Haga clic para solicitar un reembolso', '5c38468798fb6', 'es', 781),
(784, 'Subject', '5c3846e0cdbdd', 'en', 0),
(785, 'موضوع', '5c3846e0cdbdd', 'ar', 784),
(786, 'Tema', '5c3846e0cdbdd', 'es', 784),
(787, 'Rating & Review', '5c38482266526', 'en', 0),
(788, 'التقييم والاستعراض', '5c38482266526', 'ar', 787),
(789, 'Calificación y revisión', '5c38482266526', 'es', 787),
(790, 'Rating', '5c38484b1940d', 'en', 0),
(791, 'تقييم', '5c38484b1940d', 'ar', 790),
(792, 'Clasificación', '5c38484b1940d', 'es', 790),
(793, 'Write a Review', '5c384877e2901', 'en', 0),
(794, 'أكتب مراجعة', '5c384877e2901', 'ar', 793),
(795, 'Escribe una reseña', '5c384877e2901', 'es', 793),
(796, 'Total Amount', '5c38497ec8efd', 'en', 0),
(797, 'المبلغ الإجمالي', '5c38497ec8efd', 'ar', 796),
(798, 'Cantidad total', '5c38497ec8efd', 'es', 796),
(799, 'Paytm Indian Rupees Only Supported', '5c3849acc33b3', 'en', 0),
(800, 'Paytm الهندي روبية المدعومة فقط', '5c3849acc33b3', 'ar', 799),
(801, 'Rupias indias de Paytm solo compatibles', '5c3849acc33b3', 'es', 799),
(802, 'Razorpay Indian Rupees Only Supported', '5c3849d21c071', 'en', 0),
(803, 'Razorpay Indian Rupees مدعومة فقط', '5c3849d21c071', 'ar', 802),
(804, 'Razorpay las rupias indias son compatibles solamente', '5c3849d21c071', 'es', 802),
(805, 'Your payment has been successful. Thank You!', '5c384a69437df', 'en', 0),
(806, 'لقد تمت عملية الدفع بنجاح. شكرا جزيلا!', '5c384a69437df', 'ar', 805),
(807, 'Su pago ha sido exitoso. ¡Gracias!', '5c384a69437df', 'es', 805),
(808, 'Remove Frame', '5c384b98133af', 'en', 0),
(809, 'إزالة الإطار', '5c384b98133af', 'ar', 808),
(810, 'Quitar marco', '5c384b98133af', 'es', 808),
(811, 'Reset Password', '5c384c67e46e7', 'en', 0),
(812, 'إعادة ضبط كلمة المرور', '5c384c67e46e7', 'ar', 811),
(813, 'Restablecer la contraseña', '5c384c67e46e7', 'es', 811),
(814, 'Change Password', '5c384ca3ea271', 'en', 0),
(815, 'غير كلمة السر', '5c384ca3ea271', 'ar', 814),
(816, 'Cambia la contraseña', '5c384ca3ea271', 'es', 814),
(817, 'new items', '5c384d2a73ab6', 'en', 0),
(818, 'عناصر جديدة', '5c384d2a73ab6', 'ar', 817),
(819, 'Nuevos objetos', '5c384d2a73ab6', 'es', 817),
(820, 'popular items', '5c384d4a5a7af', 'en', 0),
(821, 'العناصر الشعبية', '5c384d4a5a7af', 'ar', 820),
(822, 'artículos populares', '5c384d4a5a7af', 'es', 820),
(823, 'sort by', '5c384d6b96454', 'en', 0),
(824, 'ترتيب حسب', '5c384d6b96454', 'ar', 823),
(825, 'ordenar por', '5c384d6b96454', 'es', 823),
(826, 'Default', '5c384d91e2bbc', 'en', 0),
(827, 'افتراضي', '5c384d91e2bbc', 'ar', 826),
(828, 'Defecto', '5c384d91e2bbc', 'es', 826),
(829, 'Price: low to high', '5c384daf9294d', 'en', 0),
(830, 'السعر من الارخص للاعلى', '5c384daf9294d', 'ar', 829),
(831, 'Precios de barato a caro', '5c384daf9294d', 'es', 829),
(832, 'Price: high to low', '5c384dcba7f83', 'en', 0),
(833, 'السعر الاعلى الى الادنى', '5c384dcba7f83', 'ar', 832),
(834, 'Precio: alto a bajo', '5c384dcba7f83', 'es', 832),
(835, 'Price range', '5c384df37adf1', 'en', 0),
(836, 'نطاق السعر', '5c384df37adf1', 'ar', 835),
(837, 'Rango de precios', '5c384df37adf1', 'es', 835),
(838, 'categories', '5c384e1d69257', 'en', 0),
(839, 'الاقسام', '5c384e1d69257', 'ar', 838),
(840, 'categorías', '5c384e1d69257', 'es', 838),
(841, 'Star Rating', '5c384ec8c5239', 'en', 0),
(842, 'تصنيف النجوم', '5c384ec8c5239', 'ar', 841),
(843, 'Calificación de estrellas', '5c384ec8c5239', 'es', 841),
(844, 'All', '5c384ee529877', 'en', 0),
(845, 'الكل', '5c384ee529877', 'ar', 844),
(846, 'Todos', '5c384ee529877', 'es', 844),
(847, 'Stars', '5c384f02b170a', 'en', 0),
(848, 'نجوم', '5c384f02b170a', 'ar', 847),
(849, 'Estrellas', '5c384f02b170a', 'es', 847),
(850, 'Star', '5c384f31eabd7', 'en', 0),
(851, 'نجمة', '5c384f31eabd7', 'ar', 850),
(852, 'Estrella', '5c384f31eabd7', 'es', 850),
(853, 'Tagged With', '5c3851be9abe2', 'en', 0),
(854, 'الموسومة ب', '5c3851be9abe2', 'ar', 853),
(855, 'Etiquetado con', '5c3851be9abe2', 'es', 853),
(856, 'Oops Error', '5c3852c2050b6', 'en', 0),
(857, 'عفوا خطأ', '5c3852c2050b6', 'ar', 856),
(858, 'Vaya error', '5c3852c2050b6', 'es', 856),
(859, 'Items', '5c385dee56cd9', 'en', 0),
(860, 'العناصر', '5c385dee56cd9', 'ar', 859),
(861, 'Artículos', '5c385dee56cd9', 'es', 859),
(862, 'Contact Vendor', '5c385e0e62b9a', 'en', 0),
(863, 'اتصل بالمورد', '5c385e0e62b9a', 'ar', 862),
(864, 'Contactar con el vendedor', '5c385e0e62b9a', 'es', 862),
(865, 'Contact Information', '5c385e4e9fae5', 'en', 0),
(866, 'معلومات للتواصل', '5c385e4e9fae5', 'ar', 865),
(867, 'Información del contacto', '5c385e4e9fae5', 'es', 865),
(868, 'View Order', '5c385ef8bfd78', 'en', 0),
(869, 'مشاهدة الطلب', '5c385ef8bfd78', 'ar', 868),
(870, 'Ver pedido', '5c385ef8bfd78', 'es', 868),
(871, 'Order Details', '5c385f31e9a7e', 'en', 0),
(872, 'تفاصيل الطلب', '5c385f31e9a7e', 'ar', 871),
(873, 'Detalles del pedido', '5c385f31e9a7e', 'es', 871),
(874, 'Purchase Id', '5c385f5506d9c', 'en', 0),
(875, 'رقم الشراء', '5c385f5506d9c', 'ar', 874),
(876, 'ID de compra', '5c385f5506d9c', 'es', 874),
(877, 'Payment Status', '5c38601711dc7', 'en', 0),
(878, 'حالة السداد', '5c38601711dc7', 'ar', 877),
(879, 'Estado de pago', '5c38601711dc7', 'es', 877),
(880, 'Payment Approval Status', '5c386035d9059', 'en', 0),
(881, 'حالة الموافقة على الدفع', '5c386035d9059', 'ar', 880),
(882, 'Estado de aprobación de pago', '5c386035d9059', 'es', 880),
(883, 'Buyer Details', '5c38605e688d0', 'en', 0),
(884, 'تفاصيل المشتري', '5c38605e688d0', 'ar', 883),
(885, 'Detalles del comprador', '5c38605e688d0', 'es', 883),
(886, 'City', '5c3860ceb4180', 'en', 0),
(887, 'مدينة', '5c3860ceb4180', 'ar', 886),
(888, 'Ciudad', '5c3860ceb4180', 'es', 886),
(889, 'Other Details', '5c386116c0161', 'en', 0),
(890, 'تفاصيل أخرى', '5c386116c0161', 'ar', 889),
(891, 'Otros detalles', '5c386116c0161', 'es', 889),
(892, 'Other Notes', '5c38613624462', 'en', 0),
(893, 'الملاحظات الأخرى', '5c38613624462', 'ar', 892),
(894, 'Otras notas', '5c38613624462', 'es', 892),
(895, 'BACK TO MY ORDERS', '5c3861591c762', 'en', 0),
(896, 'العودة لأمراتي', '5c3861591c762', 'ar', 895),
(897, 'De vuelta a mis ordenes', '5c3861591c762', 'es', 895),
(898, 'View Shopping Details', '5c3861aa928af', 'en', 0),
(899, 'عرض تفاصيل التسوق', '5c3861aa928af', 'ar', 898),
(900, 'Ver detalles de compras', '5c3861aa928af', 'es', 898),
(901, 'Shopping Details', '5c3861f6e0834', 'en', 0),
(902, 'تفاصيل التسوق', '5c3861f6e0834', 'ar', 901),
(903, 'Detalles de compras', '5c3861f6e0834', 'es', 901),
(904, 'vendor details', '5c3862cb8ffc8', 'en', 0),
(905, 'تفاصيل البائع', '5c3862cb8ffc8', 'ar', 904),
(906, 'detalles del vendedor', '5c3862cb8ffc8', 'es', 904),
(907, 'Download File', '5c3863c14a2ce', 'en', 0),
(908, 'تحميل الملف', '5c3863c14a2ce', 'ar', 907),
(909, 'Descargar archivo', '5c3863c14a2ce', 'es', 907),
(910, 'Click to Download', '5c3863e23bfcb', 'en', 0),
(911, 'اضغط للتحميل', '5c3863e23bfcb', 'ar', 910),
(912, 'Haga clic para descargar', '5c3863e23bfcb', 'es', 910),
(913, 'BACK TO MY SHOPPING', '5c38640272a2e', 'en', 0),
(914, 'العودة إلى التسوق الخاص بي', '5c38640272a2e', 'ar', 913),
(915, 'VOLVER A MI COMPRAS', '5c38640272a2e', 'es', 913),
(916, 'Please confirm email verification to login', '5c386745cda5a', 'en', 0),
(917, 'يرجى تأكيد التحقق من البريد الإلكتروني لتسجيل الدخول', '5c386745cda5a', 'ar', 916),
(918, 'Por favor confirme la verificación de correo electrónico para iniciar sesión', '5c386745cda5a', 'es', 916),
(919, 'Resend Email', '5c3867684e716', 'en', 0),
(920, 'إعادة إرسال البريد الإلكتروني', '5c3867684e716', 'ar', 919),
(921, 'Reenviar email', '5c3867684e716', 'es', 919),
(922, 'Username / Email', '5c38679e0e7f0', 'en', 0),
(923, 'اسم المستخدم / البريد الإلكتروني', '5c38679e0e7f0', 'ar', 922),
(924, 'Nombre de usuario / correo electrónico', '5c38679e0e7f0', 'es', 922),
(925, 'New here? Create an account', '5c3867d290615', 'en', 0),
(926, 'جديد هنا؟ انشئ حساب', '5c3867d290615', 'ar', 925),
(927, '¿Nuevo aquí? Crea una cuenta', '5c3867d290615', 'es', 925),
(928, 'Sign Up', '5c3868324a2ef', 'en', 0),
(929, 'سجل', '5c3868324a2ef', 'ar', 928),
(930, 'Regístrate', '5c3868324a2ef', 'es', 928),
(931, 'Already a registered?', '5c38688d6de14', 'en', 0),
(932, 'مسجل بالفعل؟', '5c38688d6de14', 'ar', 931),
(933, '¿Ya estás registrado?', '5c38688d6de14', 'es', 931),
(934, 'Confirm Password', '5c3868dab739a', 'en', 0),
(935, 'تأكيد كلمة المرور', '5c3868dab739a', 'ar', 934),
(936, 'Confirmar contraseña', '5c3868dab739a', 'es', 934),
(937, 'Male', '5c38691726ce1', 'en', 0),
(938, 'الذكر', '5c38691726ce1', 'ar', 937),
(939, 'Masculino', '5c38691726ce1', 'es', 937),
(940, 'Female', '5c38693340968', 'en', 0),
(941, 'إناثا', '5c38693340968', 'ar', 940),
(942, 'Hembra', '5c38693340968', 'es', 940),
(943, 'Create Account', '5c3869581372a', 'en', 0),
(944, 'إنشاء حساب', '5c3869581372a', 'ar', 943);
INSERT INTO `avig_translate` (`id`, `name`, `token`, `lang_code`, `parent`) VALUES
(945, 'Crear una cuenta', '5c3869581372a', 'es', 943),
(946, 'Slug', '5c3b049d25f2c', 'en', 0),
(947, 'سبيكة', '5c3b049d25f2c', 'ar', 946),
(948, 'Babosa', '5c3b049d25f2c', 'es', 946),
(949, 'Your Email Address', '5c3c400e4fcc6', 'en', 0),
(950, 'عنوان بريدك الإلكتروني', '5c3c400e4fcc6', 'ar', 949),
(951, 'Tu correo electrónico', '5c3c400e4fcc6', 'es', 949),
(952, 'Searching kyeword here', '5c3c59656851f', 'en', 0),
(953, 'البحث kyeword هنا', '5c3c59656851f', 'ar', 952),
(954, 'Buscando kyeword aquí', '5c3c59656851f', 'es', 952),
(955, 'From', '5c3c5e302c8be', 'en', 0),
(956, 'من عند', '5c3c5e302c8be', 'ar', 955),
(957, 'Desde', '5c3c5e302c8be', 'es', 955),
(958, 'Pay Now', '5c3c7666e05e1', 'en', 0),
(959, 'ادفع الآن', '5c3c7666e05e1', 'ar', 958),
(960, 'Pague ahora', '5c3c7666e05e1', 'es', 958),
(961, 'Thanks for your comment! Once admin will be approved. To view the your comment on post', '5c3ed96380017', 'en', 0),
(962, 'شكرا على تعليقك! بمجرد الموافقة على المشرف. لعرض تعليقك على المشاركة', '5c3ed96380017', 'ar', 961),
(963, '¡Gracias por tu comentario! Una vez que el administrador será aprobado. Para ver tu comentario en la publicación.', '5c3ed96380017', 'es', 961),
(964, 'Thank you for contact us', '5c3edad6e794b', 'en', 0),
(965, 'شكرا على اتصالك بنا', '5c3edad6e794b', 'ar', 964),
(966, 'Gracias por contactarnos', '5c3edad6e794b', 'es', 964),
(967, 'Account has been updated', '5c3edb7436d27', 'en', 0),
(968, 'تم تحديث الحساب', '5c3edb7436d27', 'ar', 967),
(969, 'Cuenta ha sido actualizada', '5c3edb7436d27', 'es', 967),
(970, 'Please check minimum withdraw amount and available balance', '5c3edbf5d4266', 'en', 0),
(971, 'يرجى التحقق من الحد الأدنى للسحب والرصيد المتاح', '5c3edbf5d4266', 'ar', 970),
(972, 'Por favor verifique el monto mínimo de retiro y el saldo disponible.', '5c3edbf5d4266', 'es', 970),
(973, 'Your withdraw request has been sent', '5c3edc4a50075', 'en', 0),
(974, 'تم إرسال طلب السحب الخاص بك', '5c3edc4a50075', 'ar', 973),
(975, 'Su solicitud de retirada ha sido enviada.', '5c3edc4a50075', 'es', 973),
(976, 'Your withdraw amount is high. Please check available balance', '5c3edc7571588', 'en', 0),
(977, 'مبلغ السحب الخاص بك مرتفع. يرجى التحقق من الرصيد المتاح', '5c3edc7571588', 'ar', 976),
(978, 'Su cantidad retirada es alta. Por favor verifique el saldo disponible.', '5c3edc7571588', 'es', 976),
(979, 'We can\'t find a user with that email address.', '5c3edd0e11d21', 'en', 0),
(980, 'لا يمكننا العثور على مستخدم لديه عنوان البريد الإلكتروني هذا.', '5c3edd0e11d21', 'ar', 979),
(981, 'No podemos encontrar un usuario con esa dirección de correo electrónico.', '5c3edd0e11d21', 'es', 979),
(982, 'We have e-mailed your password reset link!', '5c3edd52dfdc2', 'en', 0),
(983, 'لقد أرسلنا عبر البريد الإلكتروني رابط إعادة تعيين كلمة المرور الخاص بك!', '5c3edd52dfdc2', 'ar', 982),
(984, '¡Hemos enviado por correo electrónico el enlace para restablecer su contraseña!', '5c3edd52dfdc2', 'es', 982),
(985, 'Email Confirmation for Registration', '5c3ede141115a', 'en', 0),
(986, 'تأكيد البريد الإلكتروني للتسجيل', '5c3ede141115a', 'ar', 985),
(987, 'Confirmación de correo electrónico para el registro', '5c3ede141115a', 'es', 985),
(988, 'We sent you an activation code. Check your email and click on the link to verify.', '5c3ede3e6ac99', 'en', 0),
(989, 'لقد أرسلنا لك رمز التفعيل. تحقق من بريدك الإلكتروني وانقر على الرابط للتحقق.', '5c3ede3e6ac99', 'ar', 988),
(990, 'Te enviamos un código de activación. Revise su correo electrónico y haga clic en el enlace para verificar.', '5c3ede3e6ac99', 'es', 988),
(991, 'Invalid input fields. Please try again', '5c3ede68d9f9e', 'en', 0),
(992, 'حقول الإدخال غير صالحة. حاول مرة اخرى', '5c3ede68d9f9e', 'ar', 991),
(993, 'Campos de entrada no válidos. Inténtalo de nuevo', '5c3ede68d9f9e', 'es', 991),
(994, 'Newsletter Subscribe', '5c3edec35d04d', 'en', 0),
(995, 'إشتراك النشرة الأخبارية', '5c3edec35d04d', 'ar', 994),
(996, 'Subscripción de correspondencia', '5c3edec35d04d', 'es', 994),
(997, 'This email address already subscribed', '5c3edef7f230e', 'en', 0),
(998, 'عنوان البريد الإلكتروني هذا مشترك بالفعل', '5c3edef7f230e', 'ar', 997),
(999, 'Esta dirección de correo electrónico ya está suscrita.', '5c3edef7f230e', 'es', 997),
(1000, 'You have successfully subscribed to the newsletter. You will receive a confirmation email in few minutes.', '5c3edf29552a5', 'en', 0),
(1001, 'لقد تم بنجاح اشتراكك في النشرة الإخبارية. سوف تتلقى رسالة تأكيد بالبريد الإلكتروني في بضع دقائق.', '5c3edf29552a5', 'ar', 1000),
(1002, 'Te has suscrito al boletín con éxito. Recibirás un correo electrónico de confirmación en pocos minutos.', '5c3edf29552a5', 'es', 1000),
(1003, 'Your subscription has been confirmed! Thank you!', '5c3edf9e349e2', 'en', 0),
(1004, 'لقد تم تأكيد اشتراكك! شكرا لكم!', '5c3edf9e349e2', 'ar', 1003),
(1005, 'Su suscripción ha sido confirmada! ¡Gracias!', '5c3edf9e349e2', 'es', 1003),
(1006, 'Cancellation & Refund Request', '5c3ee04877b15', 'en', 0),
(1007, 'طلب إلغاء واسترداد', '5c3ee04877b15', 'ar', 1006),
(1008, 'Cancelación y solicitud de reembolso', '5c3ee04877b15', 'es', 1006),
(1009, 'Your cancellation & refund request has been sent', '5c3ee085c5358', 'en', 0),
(1010, 'لقد تم إرسال طلب الإلغاء والاسترداد', '5c3ee085c5358', 'ar', 1009),
(1011, 'Su solicitud de cancelación y reembolso ha sido enviada', '5c3ee085c5358', 'es', 1009),
(1012, 'Your request already sent. Please wait admin will send the confirmation', '5c3ee0b2abb68', 'en', 0),
(1013, 'تم إرسال طلبك بالفعل. يرجى الانتظار المشرف سوف يرسل تأكيدا', '5c3ee0b2abb68', 'ar', 1012),
(1014, 'Su solicitud ya enviada. Por favor espere el administrador le enviará la confirmación.', '5c3ee0b2abb68', 'es', 1012),
(1015, 'New comment received', '5c3ee1140e230', 'en', 0),
(1016, 'تلقي تعليق جديد', '5c3ee1140e230', 'ar', 1015),
(1017, 'Nuevo comentario recibido', '5c3ee1140e230', 'es', 1015),
(1018, 'Contact Support', '5c3ee174915e2', 'en', 0),
(1019, 'اتصل بالدعم', '5c3ee174915e2', 'ar', 1018),
(1020, 'Soporte de contacto', '5c3ee174915e2', 'es', 1018),
(1021, 'Your message sent successfully', '5c3ee19e287ac', 'en', 0),
(1022, 'تم إرسال رسالتك بنجاح', '5c3ee19e287ac', 'ar', 1021),
(1023, 'Tu mensaje enviado exitosamente', '5c3ee19e287ac', 'es', 1021),
(1024, 'Your rating & review has been updated', '5c3ee1e90e6cf', 'en', 0),
(1025, 'تم تحديث تقييمك ومراجعتك', '5c3ee1e90e6cf', 'ar', 1024),
(1026, 'Su calificación y revisión ha sido actualizada', '5c3ee1e90e6cf', 'es', 1024),
(1027, 'Sorry! Already liked this item', '5c3ee2447a25d', 'en', 0),
(1028, 'آسف! بالفعل أحب هذا البند', '5c3ee2447a25d', 'ar', 1027),
(1029, '¡Lo siento! Ya me ha gustado este artículo', '5c3ee2447a25d', 'es', 1027),
(1030, 'Featured Payment Received', '5c3ee29837b0a', 'en', 0),
(1031, 'دفع المميز وردت', '5c3ee29837b0a', 'ar', 1030),
(1032, 'Pago destacado recibido', '5c3ee29837b0a', 'es', 1030),
(1033, 'Your download limit ended', '5c3ee2eae8dee', 'en', 0),
(1034, 'انتهى حد التنزيل الخاص بك', '5c3ee2eae8dee', 'ar', 1033),
(1035, 'Su límite de descarga terminó', '5c3ee2eae8dee', 'es', 1033),
(1036, 'Item has been created. Once item has been approved. You will received the confirmation.', '5c3ee36a5ccde', 'en', 0),
(1037, 'تم إنشاء البند. بمجرد الموافقة على البند. سوف تتلقى التأكيد.', '5c3ee36a5ccde', 'ar', 1036),
(1038, 'El artículo ha sido creado. Una vez que el artículo ha sido aprobado. Usted recibirá la confirmación.', '5c3ee36a5ccde', 'es', 1036),
(1039, 'Item has been created.', '5c3ee3938df6b', 'en', 0),
(1040, 'تم إنشاء البند.', '5c3ee3938df6b', 'ar', 1039),
(1041, 'El artículo ha sido creado.', '5c3ee3938df6b', 'es', 1039),
(1042, 'File not found (404 error)', '5c3ee3e6a806c', 'en', 0),
(1043, 'الملف غير موجود (404 خطأ)', '5c3ee3e6a806c', 'ar', 1042),
(1044, 'Archivo no encontrado (error 404)', '5c3ee3e6a806c', 'es', 1042),
(1045, 'Your purchased item updates released', '5c3ee46055bdb', 'en', 0),
(1046, 'تحديثات البند الخاص بك تم شراؤها', '5c3ee46055bdb', 'ar', 1045),
(1047, 'Sus actualizaciones de artículos comprados en libertad', '5c3ee46055bdb', 'es', 1045),
(1048, 'Item has been updated. Once item has been approved. You will received the confirmation.', '5c3ee49c57ccb', 'en', 0),
(1049, 'تم تحديث البند. بمجرد الموافقة على البند. سوف تتلقى التأكيد.', '5c3ee49c57ccb', 'ar', 1048),
(1050, 'El artículo ha sido actualizado. Una vez que el artículo ha sido aprobado. Usted recibirá la confirmación.', '5c3ee49c57ccb', 'es', 1048),
(1051, 'Item has been updated.', '5c3ee4ca6ee78', 'en', 0),
(1052, 'تم تحديث البند.', '5c3ee4ca6ee78', 'ar', 1051),
(1053, 'El artículo ha sido actualizado.', '5c3ee4ca6ee78', 'es', 1051),
(1054, 'Contact Us', '5c3ee56b04810', 'en', 0),
(1055, 'اتصل بنا', '5c3ee56b04810', 'ar', 1054),
(1056, 'Contáctenos', '5c3ee56b04810', 'es', 1054),
(1057, 'Sorry Your message already sent', '5c3ee5b1aa0aa', 'en', 0),
(1058, 'عذرًا ، لقد تم إرسال رسالتك بالفعل', '5c3ee5b1aa0aa', 'ar', 1057),
(1059, 'Lo sentimos Tu mensaje ya ha sido enviado', '5c3ee5b1aa0aa', 'es', 1057),
(1060, 'Payment received on your wallet', '5c3ee6b61bed1', 'en', 0),
(1061, 'الدفعة المستلمة على محفظتك', '5c3ee6b61bed1', 'ar', 1060),
(1062, 'Pago recibido en su billetera', '5c3ee6b61bed1', 'es', 1060),
(1063, 'Payment Received', '5c3ee7061a9a1', 'en', 0),
(1064, 'الدفعة المستلمة', '5c3ee7061a9a1', 'ar', 1063),
(1065, 'Pago recibido', '5c3ee7061a9a1', 'es', 1063),
(1066, 'We have e-mailed your password details', '5c3ee8f25ccd5', 'en', 0),
(1067, 'لقد أرسلنا عبر البريد الإلكتروني تفاصيل كلمة المرور الخاصة بك', '5c3ee8f25ccd5', 'ar', 1066),
(1068, 'Hemos enviado por correo electrónico los detalles de su contraseña', '5c3ee8f25ccd5', 'es', 1066),
(1069, 'Oops! Invalid Details', '5c3ee9227798d', 'en', 0),
(1070, 'وجه الفتاة! تفاصيل غير صالحة', '5c3ee9227798d', 'ar', 1069),
(1071, 'Ups! Detalles inválidos', '5c3ee9227798d', 'es', 1069),
(1072, 'Comment Received', '5c3ef67740f66', 'en', 0),
(1073, 'تعليق مستلم', '5c3ef67740f66', 'ar', 1072),
(1074, 'Comentario recibido', '5c3ef67740f66', 'es', 1072),
(1075, 'Withdrawal Request', '5c3ef6f56a07f', 'en', 0),
(1076, 'طلب سحب', '5c3ef6f56a07f', 'ar', 1075),
(1077, 'Solicitud de Retiro', '5c3ef6f56a07f', 'es', 1075),
(1078, 'Card Number', '5c4044801fae1', 'en', 0),
(1079, 'رقم البطاقة', '5c4044801fae1', 'ar', 1078),
(1080, 'Número de tarjeta', '5c4044801fae1', 'es', 1078),
(1081, 'Expiration Month (MM)', '5c4044a28c123', 'en', 0),
(1082, 'شهر انتهاء الصلاحية (MM)', '5c4044a28c123', 'ar', 1081),
(1083, 'Mes de vencimiento (MM)', '5c4044a28c123', 'es', 1081),
(1084, 'Expiration Year (YYYY)', '5c4044be573c8', 'en', 0),
(1085, 'سنة انتهاء الصلاحية (سنة)', '5c4044be573c8', 'ar', 1084),
(1086, 'Año de vencimiento (YYYY)', '5c4044be573c8', 'es', 1084),
(1087, 'CVC', '5c4044d707fdb', 'en', 0),
(1088, 'CVC', '5c4044d707fdb', 'ar', 1087),
(1089, 'CVC', '5c4044d707fdb', 'es', 1087),
(1090, 'example link', '5c442613466f1', 'en', 0),
(1091, 'enlace de ejemplo', '5c442613466f1', 'es', 1090),
(1092, 'Report', '5c58199fc3b23', 'en', 0),
(1093, 'أبلغ عن', '5c58199fc3b23', 'ar', 1092),
(1094, 'Informe', '5c58199fc3b23', 'es', 1092),
(1095, 'Report Category', '5c581b30a085b', 'en', 0),
(1096, 'فئة التقرير', '5c581b30a085b', 'ar', 1095),
(1097, 'Categoría de informe', '5c581b30a085b', 'es', 1095),
(1098, 'Report This Item', '5c581c4c5467d', 'en', 0),
(1099, 'تقرير هذا البند', '5c581c4c5467d', 'ar', 1098),
(1100, 'Reportar este artículo', '5c581c4c5467d', 'es', 1098),
(1101, 'Copyright and trademark', '5c581d0dcefb1', 'en', 0),
(1102, 'حقوق النشر والعلامات التجارية', '5c581d0dcefb1', 'ar', 1101),
(1103, 'Copyright y marca registrada', '5c581d0dcefb1', 'es', 1101),
(1104, 'Listing practices', '5c581d21b234a', 'en', 0),
(1105, 'الممارسات الإدراج', '5c581d21b234a', 'ar', 1104),
(1106, 'Listado de prácticas', '5c581d21b234a', 'es', 1104),
(1107, 'Prohibited and restricted items', '5c581d3a9d503', 'en', 0),
(1108, 'المواد المحظورة والمقيدة', '5c581d3a9d503', 'ar', 1107),
(1109, 'Artículos prohibidos y restringidos', '5c581d3a9d503', 'es', 1107),
(1110, 'Reason for Report', '5c5823ceeb46c', 'en', 0),
(1111, 'سبب التقرير', '5c5823ceeb46c', 'ar', 1110),
(1112, 'Razón para el informe', '5c5823ceeb46c', 'es', 1110),
(1113, 'Send Report', '5c58252dd1e72', 'en', 0),
(1114, 'إرسال تقرير', '5c58252dd1e72', 'ar', 1113),
(1115, 'Enviar reporte', '5c58252dd1e72', 'es', 1113),
(1116, 'Sorry! your report already sent', '5c58282d3755d', 'en', 0),
(1117, 'آسف! أرسل تقريرك بالفعل', '5c58282d3755d', 'ar', 1116),
(1118, '¡Lo siento! tu informe ya enviado', '5c58282d3755d', 'es', 1116),
(1119, 'Please', '5c582d5b5bad1', 'en', 0),
(1120, 'رجاء', '5c582d5b5bad1', 'ar', 1119),
(1121, 'Por favor', '5c582d5b5bad1', 'es', 1119),
(1122, 'in to report this item.', '5c582df8b2d59', 'en', 0),
(1123, 'في الإبلاغ عن هذا العنصر.', '5c582df8b2d59', 'ar', 1122),
(1124, 'en para reportar este artículo.', '5c582df8b2d59', 'es', 1122),
(1125, 'Your report has been sent. Thank You', '5c582ef457221', 'en', 0),
(1126, 'لقد تم إرسال تقريرك شكرا جزيلا', '5c582ef457221', 'ar', 1125),
(1127, 'Tu reporte ha sido enviado. Gracias', '5c582ef457221', 'es', 1125),
(1128, 'Not Supported', '5c593a614b7a8', 'en', 0),
(1129, 'غير مدعوم', '5c593a614b7a8', 'ar', 1128),
(1130, 'No soportado', '5c593a614b7a8', 'es', 1128),
(1131, 'Show country on your profile and badges', '5c5adece1498a', 'en', 0),
(1132, 'عرض البلد على ملفك الشخصي وشاراتك', '5c5adece1498a', 'ar', 1131),
(1133, 'Mostrar país en tu perfil y distintivos.', '5c5adece1498a', 'es', 1131),
(1134, 'Located In', '5c5ae7a794aaf', 'en', 0),
(1135, 'يقع في', '5c5ae7a794aaf', 'ar', 1134),
(1136, 'Situado en', '5c5ae7a794aaf', 'es', 1134),
(1137, 'Member since', '5c5ae8fea4335', 'en', 0),
(1138, 'عضو منذ', '5c5ae8fea4335', 'ar', 1137),
(1139, 'Miembro desde', '5c5ae8fea4335', 'es', 1137),
(1140, 'Year of Membership', '5c5bd31392b2e', 'en', 0),
(1141, 'سنة العضوية', '5c5bd31392b2e', 'ar', 1140),
(1142, 'Año de membresía', '5c5bd31392b2e', 'es', 1140),
(1143, 'Years of Membership', '5c5bd3597ac5c', 'en', 0),
(1144, 'سنوات العضوية', '5c5bd3597ac5c', 'ar', 1143),
(1145, 'Años de Membresía', '5c5bd3597ac5c', 'es', 1143),
(1146, 'Exclusive Author', '5c5bfd5ae0b21', 'en', 0),
(1147, 'المؤلف الحصري', '5c5bfd5ae0b21', 'ar', 1146),
(1148, 'Autor exclusivo', '5c5bfd5ae0b21', 'es', 1146),
(1149, 'Trendsetter', '5c5c0dd5676d6', 'en', 0),
(1150, 'في المجال الإعلامي', '5c5c0dd5676d6', 'ar', 1149),
(1151, 'Creador de tendencias', '5c5c0dd5676d6', 'es', 1149),
(1152, 'Power Elite Author', '5c5c187b931c6', 'en', 0),
(1153, 'قوة النخبة المؤلف', '5c5c187b931c6', 'ar', 1152),
(1154, 'Power Elite Author', '5c5c187b931c6', 'es', 1152),
(1155, 'Author Level', '5c5c2674b2fee', 'en', 0),
(1156, 'مستوى المؤلف', '5c5c2674b2fee', 'ar', 1155),
(1157, 'Nivel de Autor', '5c5c2674b2fee', 'es', 1155),
(1158, 'has sold', '5c5c2ac6b63bb', 'en', 0),
(1159, 'قد باع', '5c5c2ac6b63bb', 'ar', 1158),
(1160, 'ha vendido', '5c5c2ac6b63bb', 'es', 1158),
(1161, 'Has collected', '5c5d1f45210d5', 'en', 0),
(1162, 'لقد جمعت', '5c5d1f45210d5', 'ar', 1161),
(1163, 'Ha recogido', '5c5d1f45210d5', 'es', 1161),
(1164, 'Had an item featured', '5c5d2d47086b3', 'en', 0),
(1165, 'كان هناك عنصر مميز', '5c5d2d47086b3', 'ar', 1164),
(1166, 'Tenía un artículo destacado', '5c5d2d47086b3', 'es', 1164),
(1167, 'This item was featured', '5c5d2e188896b', 'en', 0),
(1168, 'وكان هذا البند المميز', '5c5d2e188896b', 'ar', 1167),
(1169, 'Este artículo fue presentado', '5c5d2e188896b', 'es', 1167),
(1170, 'Referral Level', '5c5d47d8a265a', 'en', 0),
(1171, 'مستوى الإحالة', '5c5d47d8a265a', 'ar', 1170),
(1172, 'Nivel de referencia', '5c5d47d8a265a', 'es', 1170),
(1173, 'Has referred', '5c5d483061f2c', 'en', 0),
(1174, 'وقد أشار', '5c5d483061f2c', 'ar', 1173),
(1175, 'Ha referido', '5c5d483061f2c', 'es', 1173),
(1176, 'members', '5c5d4895d8cc1', 'en', 0),
(1177, 'أفراد', '5c5d4895d8cc1', 'ar', 1176),
(1178, 'miembros', '5c5d4895d8cc1', 'es', 1176);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cat_type` varchar(50) NOT NULL,
  `display_menu` int(50) NOT NULL,
  `delete_status` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `parent` int(100) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `post_slug`, `image`, `cat_type`, `display_menu`, `delete_status`, `token`, `lang_code`, `parent`, `status`) VALUES
(24, 'PHP Scripts', 'php-scripts', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(25, 'Wordpress', 'wordpress', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(26, 'eCommerce', 'ecommerce', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(27, 'JavaScript', 'javascript', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(28, 'CSS', 'css', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(29, 'Mobile', 'mobile', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(30, 'HTML5', 'html', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(31, 'Plugins', 'plugins', '', 'default', 1, 'deleted', '', 'en', 0, 0),
(41, 'Laravel', 'laravel', '', 'framework', 1, 'deleted', '', 'en', 0, 0),
(42, 'CakePHP', 'cakephp', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(43, 'CodeIgniter', 'codeigniter', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(44, 'Kohana', 'kohana', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(45, 'Lithium', 'lithium', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(46, 'Solar', 'solar', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(47, 'Symfony', 'symfony', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(48, 'Yii', 'yii', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(49, 'Zend', 'zend', '', 'framework', 0, 'deleted', '', 'en', 0, 0),
(50, 'الإضافات', 'plugins', '', 'default', 1, 'deleted', '5c38972b9420d', 'ar', 31, 0),
(51, 'Complementos', 'plugins', '', 'default', 1, 'deleted', '5c38972b9420d', 'es', 31, 0),
(52, 'HTML5', 'html', '', 'default', 1, 'deleted', '5c389854e9174', 'ar', 30, 0),
(53, 'HTML5', 'html', '', 'default', 1, 'deleted', '5c389854e9174', 'es', 30, 0),
(54, 'التليفون المحمول', 'mobile', '', 'default', 1, 'deleted', '5c389869c5015', 'ar', 29, 0),
(55, 'Móvil', 'mobile', '', 'default', 1, 'deleted', '5c389869c5015', 'es', 29, 0),
(56, 'CSS', 'css', '', 'default', 1, 'deleted', '5c38987cdfa3a', 'ar', 28, 0),
(57, 'CSS', 'css', '', 'default', 1, 'deleted', '5c38987cdfa3a', 'es', 28, 0),
(58, 'جافا سكريبت', 'javascript', '', 'default', 1, 'deleted', '5c38988ca1d8e', 'ar', 27, 0),
(59, 'JavaScript', 'javascript', '', 'default', 1, 'deleted', '5c38988ca1d8e', 'es', 27, 0),
(60, 'التجارة الإلكترونية', 'ecommerce', '', 'default', 1, 'deleted', '5c3898a672d83', 'ar', 26, 0),
(61, 'eCommerce', 'ecommerce', '', 'default', 1, 'deleted', '5c3898a672d83', 'es', 26, 0),
(62, 'وورد', 'wordpress', '', 'default', 1, 'deleted', '5c3898bbbd5c5', 'ar', 25, 0),
(63, 'WordPress', 'wordpress', '', 'default', 1, 'deleted', '5c3898bbbd5c5', 'es', 25, 0),
(64, 'مخطوطات PHP', 'php-scripts', '', 'default', 1, 'deleted', '5c3898d0cb152', 'ar', 24, 0),
(65, 'Scripts PHP', 'php-scripts', '', 'default', 1, 'deleted', '5c3898d0cb152', 'es', 24, 0),
(66, '', 'zend', '', 'framework', 0, 'deleted', '5c5adbb5afcaa', 'ar', 49, 0),
(67, '', 'zend', '', 'framework', 0, 'deleted', '5c5adbb5afcaa', 'es', 49, 0),
(68, '', 'yii', '', 'framework', 0, 'deleted', '5c5adc5838b91', 'ar', 48, 0),
(69, '', 'yii', '', 'framework', 0, 'deleted', '5c5adc5838b91', 'es', 48, 0),
(70, '', 'symfony', '', 'framework', 0, 'deleted', '5c5adc635ef6f', 'ar', 47, 0),
(71, '', 'symfony', '', 'framework', 0, 'deleted', '5c5adc635ef6f', 'es', 47, 0),
(72, '', 'solar', '', 'framework', 0, 'deleted', '5c5adc6e3dab4', 'ar', 46, 0),
(73, '', 'solar', '', 'framework', 0, 'deleted', '5c5adc6e3dab4', 'es', 46, 0),
(74, '', 'lithium', '', 'framework', 0, 'deleted', '5c5adc7ae1aa1', 'ar', 45, 0),
(75, '', 'lithium', '', 'framework', 0, 'deleted', '5c5adc7ae1aa1', 'es', 45, 0),
(76, '', 'kohana', '', 'framework', 0, 'deleted', '5c5adc868f4ec', 'ar', 44, 0),
(77, '', 'kohana', '', 'framework', 0, 'deleted', '5c5adc868f4ec', 'es', 44, 0),
(78, '', 'codeigniter', '', 'framework', 0, 'deleted', '5c5adc9234295', 'ar', 43, 0),
(79, '', 'codeigniter', '', 'framework', 0, 'deleted', '5c5adc9234295', 'es', 43, 0),
(80, '', 'cakephp', '', 'framework', 0, 'deleted', '5c5adc9def94e', 'ar', 42, 0),
(81, '', 'cakephp', '', 'framework', 0, 'deleted', '5c5adc9def94e', 'es', 42, 0),
(82, '', 'laravel', '', 'framework', 1, 'deleted', '5c5adcaa25d8f', 'ar', 41, 0),
(83, '', 'laravel', '', 'framework', 1, 'deleted', '5c5adcaa25d8f', 'es', 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(200) NOT NULL,
  `cont_email` varchar(200) NOT NULL,
  `cont_phone` varchar(200) NOT NULL,
  `cont_date` varchar(200) NOT NULL,
  `cont_message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(500) NOT NULL,
  `country_badges` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_badges`) VALUES
(7, 'Afghanistan', '1549374193.png'),
(8, 'Albania', '1549374204.png'),
(9, 'Algeria', '1549374239.png'),
(10, 'Andorra', '1549374295.png'),
(11, 'Angola', '1549374310.png'),
(12, 'Antigua and Barbuda', '1549374328.png'),
(13, 'Argentina', '1549374340.png'),
(14, 'Armenia', '1549374353.png'),
(15, 'Australia', '1549374369.png'),
(16, 'Austria', '1549374381.png'),
(17, 'Azerbaijan', '1549374395.png'),
(18, 'Bahamas', '1549374408.png'),
(19, 'Bahrain', '1549374422.png'),
(20, 'Bangladesh', '1549374438.png'),
(21, 'Barbados', '1549374451.png'),
(22, 'Belarus', '1549374465.png'),
(23, 'Belgium', '1549374478.png'),
(24, 'Belize', '1549374490.png'),
(25, 'Benin', '1549374503.png'),
(26, 'Bhutan', '1549374515.png'),
(27, 'Bolivia', '1549374529.png'),
(28, 'Bosnia and Herzegovina', '1549374542.png'),
(29, 'Botswana', '1549374556.png'),
(30, 'Brazil', '1549374569.png'),
(31, 'Brunei', '1549374582.png'),
(32, 'Bulgaria', '1549374595.png'),
(33, 'Burkina Faso', '1549374612.png'),
(34, 'Burundi', '1549375117.png'),
(35, 'Cabo Verde', '1549433498.png'),
(36, 'Cambodia', '1549433513.png'),
(37, 'Cameroon', '1549433526.png'),
(38, 'Canada', '1549433544.png'),
(39, 'Central African Republic', '1549433559.png'),
(40, 'Chad', '1549433594.png'),
(41, 'Chile', '1549433608.png'),
(42, 'China', '1549433620.png'),
(43, 'Colombia', '1549433632.png'),
(44, 'Comoros', '1549433644.png'),
(45, 'Democratic Republic of the Congo', '1549433663.png'),
(46, 'Republic of the Congo', '1549433677.png'),
(47, 'Costa Rica', '1549433691.png'),
(48, 'Cote d\'Ivoire', '1549433704.png'),
(49, 'Croatia', '1549433718.png'),
(50, 'Cuba', '1549433732.png'),
(51, 'Cyprus', '1549433744.png'),
(52, 'Czech Republic', '1549433757.png'),
(53, 'Denmark', '1549433770.png'),
(54, 'Djibouti', '1549433783.png'),
(55, 'Dominica', '1549433795.png'),
(56, 'Dominican Republic', '1549433807.png'),
(57, 'Ecuador', '1549433821.png'),
(58, 'Egypt', '1549433840.png'),
(59, 'El Salvador', '1549433856.png'),
(60, 'Equatorial Guinea', '1549433868.png'),
(61, 'Eritrea', '1549433892.png'),
(62, 'Estonia', '1549433907.png'),
(63, 'Eswatini (formerly Swaziland)', '1549433923.png'),
(64, 'Ethiopia', '1549433935.png'),
(65, 'Fiji', '1549433948.png'),
(66, 'Finland', '1549433961.png'),
(67, 'France', '1549433981.png'),
(68, 'Gabon', '1549433995.png'),
(69, 'Gambia', '1549434007.png'),
(70, 'Georgia', '1549434018.png'),
(71, 'Germany', '1549434030.png'),
(72, 'Ghana', '1549434043.png'),
(73, 'Greece', '1549434056.png'),
(74, 'Grenada', '1549434069.png'),
(75, 'Guatemala', '1549434082.png'),
(76, 'Guinea', '1549434100.png'),
(77, 'Guinea-Bissau', '1549434113.png'),
(78, 'Guyana', '1549434127.png'),
(79, 'Haiti', '1549434140.png'),
(80, 'Honduras', '1549434152.png'),
(81, 'Hungary', '1549434164.png'),
(82, 'Iceland', '1549434178.png'),
(83, 'India', '1549434191.png'),
(84, 'Indonesia', '1549434203.png'),
(85, 'Iran', '1549434217.png'),
(86, 'Iraq', '1549434230.png'),
(87, 'Ireland', '1549434244.png'),
(88, 'Israel', '1549434256.png'),
(89, 'Italy', '1549434269.png'),
(90, 'Jamaica', '1549434282.png'),
(91, 'Japan', '1549434296.png'),
(92, 'Jordan', '1549434309.png'),
(93, 'Kazakhstan', '1549434323.png'),
(94, 'Kenya', '1549434335.png'),
(95, 'Kiribati', '1549434351.png'),
(96, 'Kosovo', '1549434371.png'),
(97, 'Kuwait', '1549434382.png'),
(98, 'Kyrgyzstan', '1549434396.png'),
(99, 'Laos', '1549434419.png'),
(100, 'Latvia', '1549434431.png'),
(101, 'Lebanon', '1549434461.png'),
(102, 'Lesotho', '1549434474.png'),
(103, 'Liberia', '1549434487.png'),
(104, 'Libya', '1549434499.png'),
(105, 'Liechtenstein', '1549434511.png'),
(106, 'Lithuania', '1549434523.png'),
(107, 'Luxembourg', '1549434536.png'),
(108, 'Macedonia (FYROM)', '1549434557.png'),
(109, 'Madagascar', '1549434569.png'),
(110, 'Malawi', '1549434586.png'),
(111, 'Malaysia', '1549434598.png'),
(112, 'Maldives', '1549434612.png'),
(113, 'Mali', '1549434625.png'),
(114, 'Malta', '1549434637.png'),
(115, 'Marshall Islands', '1549434650.png'),
(116, 'Mauritania', '1549434664.png'),
(117, 'Mauritius', '1549434676.png'),
(118, 'Mexico', '1549434688.png'),
(119, 'Micronesia', '1549434701.png'),
(120, 'Moldova', '1549434729.png'),
(121, 'Monaco', '1549434751.png'),
(122, 'Mongolia', '1549434762.png'),
(123, 'Montenegro', '1549434776.png'),
(124, 'Morocco', '1549434788.png'),
(125, 'Mozambique', '1549434801.png'),
(126, 'Myanmar (formerly Burma)', '1549434818.png'),
(127, 'Namibia', '1549434832.png'),
(128, 'Nauru', '1549434845.png'),
(129, 'Nepal', '1549434857.png'),
(130, 'Netherlands', '1549434870.png'),
(131, 'New Zealand', '1549434882.png'),
(132, 'Nicaragua', '1549434895.png'),
(133, 'Niger', '1549434907.png'),
(134, 'Nigeria', '1549434922.png'),
(135, 'North Korea', '1549434939.png'),
(136, 'Norway', '1549434951.png'),
(137, 'Oman', '1549434966.png'),
(138, 'Pakistan', '1549434978.png'),
(139, 'Palau', '1549434990.png'),
(140, 'Palestine', '1549435002.png'),
(141, 'Panama', '1549435016.png'),
(142, 'Papua New Guinea', '1549435046.png'),
(143, 'Paraguay', '1549435063.png'),
(144, 'Peru', '1549435085.png'),
(145, 'Philippines', '1549435101.png'),
(146, 'Poland', '1549435113.png'),
(147, 'Portugal', '1549435125.png'),
(148, 'Qatar', '1549435138.png'),
(149, 'Romania', '1549435151.png'),
(150, 'Russia', '1549435163.png'),
(151, 'Rwanda', '1549435175.png'),
(152, 'Saint Kitts and Nevis', '1549435188.png'),
(153, 'Saint Lucia', '1549435200.png'),
(154, 'Saint Vincent and the Grenadines', '1549435213.png'),
(155, 'Samoa', '1549435271.png'),
(156, 'San Marino', '1549435299.png'),
(157, 'Sao Tome and Principe', '1549435317.png'),
(158, 'Saudi Arabia', '1549435331.png'),
(159, 'Senegal', '1549435382.png'),
(160, 'Serbia', '1549435395.png'),
(161, 'Seychelles', '1549435408.png'),
(162, 'Sierra Leone', '1549435419.png'),
(163, 'Singapore', '1549435430.png'),
(164, 'Slovakia', '1549435445.png'),
(165, 'Slovenia', '1549435458.png'),
(166, 'Solomon Islands', '1549435469.png'),
(167, 'Somalia', '1549435480.png'),
(168, 'South Africa', '1549435491.png'),
(169, 'South Korea', '1549435501.png'),
(170, 'South Sudan', '1549435513.png'),
(171, 'Spain', '1549435530.png'),
(172, 'Sri Lanka', '1549435541.png'),
(173, 'Sudan', '1549435552.png'),
(174, 'Suriname', '1549435564.png'),
(175, 'Sweden', '1549435581.png'),
(176, 'Switzerland', '1549435598.png'),
(177, 'Syria', '1549435609.png'),
(178, 'Taiwan', '1549435622.png'),
(179, 'Tajikistan', '1549435634.png'),
(180, 'Tanzania', '1549435647.png'),
(181, 'Thailand', '1549435658.png'),
(182, 'Timor-Leste', '1549435682.png'),
(183, 'Togo', '1549435694.png'),
(184, 'Tonga', '1549435706.png'),
(185, 'Trinidad and Tobago', '1549435721.png'),
(186, 'Tunisia', '1549435733.png'),
(187, 'Turkey', '1549435746.png'),
(188, 'Turkmenistan', '1549435758.png'),
(189, 'Tuvalu', '1549435769.png'),
(190, 'Uganda', '1549435782.png'),
(191, 'Ukraine', '1549435794.png'),
(192, 'United Arab Emirates', '1549435806.png'),
(193, 'United Kingdom', '1549435818.png'),
(194, 'United States of America', '1549435831.png'),
(195, 'Uruguay', '1549435843.png'),
(196, 'Uzbekistan', '1549435855.png'),
(197, 'Vanuatu', '1549435869.png'),
(198, 'Vatican City (Holy See)', '1549435881.png'),
(199, 'Venezuela', '1549435893.png'),
(200, 'Vietnam', '1549435904.png'),
(201, 'Yemen', '1549435918.png'),
(202, 'Zambia', '1549435930.png'),
(203, 'Zimbabwe', '1549435943.png');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`) VALUES
(8, 'USD'),
(9, 'CZK'),
(10, 'DKK'),
(11, 'HKD'),
(12, 'HUF'),
(13, 'ILS'),
(14, 'JPY'),
(15, 'MXN'),
(16, 'NZD'),
(17, 'NOK'),
(18, 'PHP'),
(19, 'PLN'),
(20, 'SGD'),
(21, 'SEK'),
(22, 'CHF'),
(23, 'THB'),
(24, 'AUD'),
(25, 'CAD'),
(26, 'EUR'),
(27, 'GBP'),
(28, 'AFN'),
(29, 'DZD'),
(30, 'AOA'),
(31, 'XCD'),
(32, 'ARS'),
(33, 'AMD'),
(34, 'AWG'),
(35, 'SHP'),
(36, 'AZN'),
(37, 'BSD'),
(38, 'BHD'),
(39, 'BDT'),
(40, 'INR');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `activated` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `page_desc` text NOT NULL,
  `photo` varchar(500) NOT NULL,
  `menu_position` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `parent` int(100) NOT NULL,
  `menu_order` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `post_slug`, `page_desc`, `photo`, `menu_position`, `token`, `lang_code`, `parent`, `menu_order`) VALUES
(1, 'About Us', 'about-us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. &lt;br&gt;&lt;br&gt;\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;br&gt;&lt;br&gt;\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '1513402127.jpeg', 'main-menu', '', 'en', 0, 1),
(4, 'Contact Us', 'contact-us', 'If you already know about the activities and our reputation, please contact us', '', 'main-menu', '', 'en', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `post_desc` longtext NOT NULL,
  `post_tags` text NOT NULL,
  `post_type` varchar(50) NOT NULL,
  `post_seat_space` int(200) NOT NULL,
  `post_parent` int(100) NOT NULL,
  `post_comment_type` varchar(100) NOT NULL,
  `post_media_type` varchar(50) NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `post_start_date` datetime NOT NULL,
  `post_end_date` datetime NOT NULL,
  `post_location` text NOT NULL,
  `post_phone` varchar(200) NOT NULL,
  `post_website` varchar(200) NOT NULL,
  `post_email` varchar(200) NOT NULL,
  `post_user_id` int(200) NOT NULL,
  `post_audio` varchar(200) NOT NULL,
  `post_video` varchar(200) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_staff_type` varchar(50) NOT NULL,
  `post_facebook` varchar(200) NOT NULL,
  `post_twitter` varchar(200) NOT NULL,
  `post_gplus` varchar(200) NOT NULL,
  `post_youtube` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `parent` int(100) NOT NULL,
  `post_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(11) NOT NULL,
  `item_token` varchar(1000) NOT NULL,
  `user_id` int(200) NOT NULL,
  `item_title` varchar(1000) NOT NULL,
  `item_slug` varchar(500) NOT NULL,
  `item_desc` text NOT NULL,
  `regular_price_six_month` float NOT NULL,
  `regular_price_one_year` float NOT NULL,
  `extended_price_six_month` float NOT NULL,
  `extended_price_one_year` float NOT NULL,
  `high_resolution` varchar(50) NOT NULL,
  `compatible_browser` varchar(500) NOT NULL,
  `file_included` varchar(500) NOT NULL,
  `demo_url` varchar(500) NOT NULL,
  `support_item` varchar(50) NOT NULL,
  `future_update` varchar(50) NOT NULL,
  `unlimited_download` varchar(50) NOT NULL,
  `category` varchar(500) NOT NULL,
  `framework_category` varchar(1000) NOT NULL,
  `first_update` date NOT NULL,
  `last_update` date NOT NULL,
  `sales` int(200) NOT NULL,
  `item_thumbnail` varchar(200) NOT NULL,
  `preview_image` varchar(200) NOT NULL,
  `main_file` varchar(200) NOT NULL,
  `item_tags` varchar(1000) NOT NULL,
  `item_featured` int(50) NOT NULL,
  `featured_startdate` date NOT NULL,
  `featured_enddate` date NOT NULL,
  `featured_days` int(50) NOT NULL,
  `featured_price` float NOT NULL,
  `featured_payment_type` varchar(50) NOT NULL,
  `featured_payment_status` varchar(100) NOT NULL,
  `featured_payment_key` varchar(500) NOT NULL,
  `downloaded` int(200) NOT NULL,
  `liked` int(200) NOT NULL,
  `delete_status` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `parent` int(100) NOT NULL,
  `item_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_token`, `user_id`, `item_title`, `item_slug`, `item_desc`, `regular_price_six_month`, `regular_price_one_year`, `extended_price_six_month`, `extended_price_one_year`, `high_resolution`, `compatible_browser`, `file_included`, `demo_url`, `support_item`, `future_update`, `unlimited_download`, `category`, `framework_category`, `first_update`, `last_update`, `sales`, `item_thumbnail`, `preview_image`, `main_file`, `item_tags`, `item_featured`, `featured_startdate`, `featured_enddate`, `featured_days`, `featured_price`, `featured_payment_type`, `featured_payment_status`, `featured_payment_key`, `downloaded`, `liked`, `delete_status`, `token`, `lang_code`, `parent`, `item_status`) VALUES
(1, '5b5911bc1f3b9', 3, 'Php Form script', 'php-form-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 12, 16, 18, 25, 'Yes', 'IE8,Safari,Opera,Chrome,Edge', 'html,js,css,psd', 'http://www.test.com', 'Yes', 'Yes', '10', '45_subcat,26_cat,49_subcat,47_subcat', '', '2018-07-26', '2019-01-24', 0, '153649140578.jpg', '1532832302.jpg', '154263568712.Lighthouse.zip', 'html,css,responsive', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '77E77110PW5845053', 0, 0, 'deleted', '', 'en', 0, 1),
(2, '5b5918604f64b', 3, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 33, 33, 33, 3333, 'Yes', 'IE9', 'dsafdsa', 'dfsafdsa', 'Yes', 'No', '3', '27_cat,54_subcat,56_subcat', '', '2018-07-26', '2018-07-26', 0, '', '1532565675.png', '1532565675.html.zip', 'ddfsadfsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 0),
(3, '5b5d2b5a07c0d', 3, 'Subscription script', 'subscription-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 20, 40, 80, 120, 'Yes', 'IE6,IE7,IE8,Firefox,Safari,Opera,Chrome,Edge', 'php,html,css', 'https://avigher.com/support', 'Yes', 'Yes', '', '50_subcat', '', '2018-07-29', '2019-01-24', 0, '153649138278.jpg', '1532832757.jpg', '1532832757.Woocommerce-Subscriptions.zip', 'wordpress,html,woocommerce', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '8VN308783E9555742', 1, 0, 'deleted', '', 'en', 0, 1),
(4, '5b5e4c50b03e2', 3, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 32, 3233, 3333, 3333, 'No', 'IE7', 'dsa', '', 'No', 'Yes', '', '28_cat,26_cat', '', '2018-07-29', '2018-07-29', 0, '', '1532906646.png', '1532906646.1511485852.zip', 'dfsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 0),
(5, '5b5e4c966d3f4', 3, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 3232, 3232, 32232, 32323200, 'No', 'IE6', 'dsfafdsa', '', 'Yes', 'No', '33', '26_cat,49_subcat', '', '2018-07-29', '2018-07-29', 0, '', '1532906702.png', '1532906702.1511485852.zip', 'dsafdsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 0),
(6, '5b5e4d36dbdf9', 3, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 23, 323, 3232, 323232, 'Yes', 'IE6,IE8', 'dsfafdas', '', 'No', 'Yes', '3', '46_subcat,49_subcat', '', '2018-07-29', '2018-07-29', 0, '', '1532906856.png', '1532906856.1511485852.zip', 'dsfafdsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 0),
(7, '5b5fb2df121ea', 7, 'Slider responsive theme', 'slider-responsive-theme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 36, 45, 55, 80, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Opera,Chrome', 'HTML,CSS', 'http://fluxkart.com/fluxkart', 'Yes', 'Yes', '', '28_cat,44_subcat,51_subcat', '', '2018-07-31', '2019-02-05', 0, '153649326478.jpg', '1532998533.jpg', '1532998533.1511485852.zip', 'html,css,template', 0, '2018-11-20', '2019-11-20', 365, 10, 'paypal', 'paid', 'tok_1CtmBWA4i5sXvQrkCaxy5Q7I', 0, 0, 'deleted', '', 'en', 0, 1),
(8, '5b5fb4a04a25e', 7, 'Woocommerce digital download plugin', 'woocommerce-digital-download-plugin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 20, 40, 60, 80, 'Yes', 'IE7,IE8,IE9,IE11,Firefox,Safari,Chrome', 'HTML,CSS,PSD', '#', 'No', 'Yes', '20', '28_cat,30_cat,51_subcat', '', '2018-07-31', '2019-01-14', 0, '153649304778.jpg', '1532998913.jpg', '1532998913.1511485852.zip', 'css,html', 1, '2019-01-14', '2020-01-14', 365, 10, 'stripe', 'paid', 'tok_1DsUneA4i5sXvQrkcmiAku9L', 0, 0, 'deleted', '', 'en', 0, 1),
(9, '5b5fb556f0907', 7, 'Charity Donation PHP Script', 'charity-donation-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 25, 35, 45, 70, 'No', 'IE7,IE8,Firefox,Safari,Opera,Edge', 'html,css,php,javascript', '#', 'Yes', 'No', '5', '28_cat,51_subcat,27_cat,24_cat', '', '2018-07-31', '2019-01-14', 0, '153649269478.jpg', '1532999130.jpg', '1532999130.1511485852.zip', 'charity,donation,php script', 1, '2019-01-14', '2020-01-14', 365, 10, 'razorpay', 'paid', 'pay_BjwJ9b4Gio7xs0', 3, 0, 'deleted', '', 'en', 0, 1),
(10, '5b5fc0b88007e', 7, 'Fitness html5 template', 'fitness-html-template', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 25, 50, 75, 100, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Opera,Chrome', 'html,css', '#', 'Yes', 'No', '', '28_cat,45_subcat,46_subcat,30_cat,53_subcat,51_subcat', '', '2018-07-31', '2019-01-14', 0, '153649256778.jpg', '1533002007.jpg', '1533002007.1511485852.zip', 'html,css,js,ajax', 1, '2019-01-14', '2020-01-14', 365, 10, 'razorpay', 'paid', 'pay_BjwLBjp9XmubFy', 4, 1, 'deleted', '', 'en', 0, 1),
(11, '5b60f98b3fa86', 7, 'CSS Theme', 'css-theme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis&nbsp;&lt;br&gt;', 50, 80, 120, 200, 'Yes', 'IE7,IE8,IE9,IE10,IE11,Opera,Chrome,Edge', 'html,css,php,javascript,ajax,jquery,psd', '#', 'No', 'No', '20', '28_cat,44_subcat,26_cat,30_cat,51_subcat,24_cat,60_subcat', '', '2018-08-01', '2019-01-14', 0, '153649253978.jpg', '1533082147.jpg', '1533082147.1511485852.zip', 'ecommerce template,ecommerce php script,shopping cart script', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '7SL05503X3730061C', 0, 1, 'deleted', '', 'en', 0, 1),
(12, '5b610fdcae85b', 7, 'Stuff HTML5 template', 'stuff-html-template', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis n', 25, 50, 70, 100, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Chrome', 'html5,css,php', '#', 'Yes', 'Yes', '5', '28_cat,30_cat,51_subcat,27_cat,24_cat,64_subcat', '', '2018-08-01', '2019-01-14', 0, '153649249878.jpg', '1533087842.jpg', '1533087842.1511485852.zip', 'html,css,php', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '20R55130N9783341G', 12, 0, 'deleted', '', 'en', 0, 1),
(13, '5b6ba8d24cc55', 3, 'Woocommerce php script', 'woocommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 50, 80, 120, 150, 'Yes', 'IE7,IE8,IE9,Safari,Opera,Chrome', 'html,css', 'http://fluxkart.com/digitkart', 'Yes', 'No', '', '26_cat,50_subcat', '', '2018-08-09', '2019-01-24', 0, '153649132978.jpg', '1533782571.jpg', '1533782571.simplePagination.js-master.zip', 'wordpress,woocommerce,html', 1, '2019-01-14', '2020-01-14', 365, 10, 'stripe', 'paid', 'tok_1DsUhqA4i5sXvQrkQ1P6c6n7', 0, 1, 'deleted', '', 'en', 0, 1),
(14, '5b8a643395f7f', 8, 'Education CSS Templete', 'education-css-templete', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 130, 260, 300, 450, 'Yes', 'IE9,IE10,IE11,Firefox,Safari,Opera,Edge', 'html,css,javascript,jquery,ajax', 'http://fluxkart.com/digitkart', 'No', 'No', '', '28_cat,30_cat,27_cat', '', '2018-09-01', '2019-01-24', 0, '153649362378.jpg', '1535796886.jpg', '1535796886.philosophy-free-lifestyle-blog-website-template.zip', 'html,css,javascript', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '25K471048N0328447', 0, 0, 'deleted', '', 'en', 0, 1),
(15, '5b8a935549efd', 8, 'Html Landing page', 'html-landing-page', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 100, 120, 150, 175, 'No', 'Firefox,Safari,Opera', 'HTML,CSS', 'http://fluxkart.com/digitkart', 'Yes', 'Yes', '', '28_cat,30_cat', '', '2018-09-01', '2019-01-24', 0, '153649360578.jpg', '1535808602.jpg', '1535808602.appy-free-template.zip', 'CSS,HTML', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '0S5427889C1789748', 0, 0, 'deleted', '', 'en', 0, 1),
(18, '5b94fb3394e15', 3, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 32, 33, 323, 3233, 'Yes', 'IE8,IE9,IE10', 'HTML', '#', 'No', 'No', '', '28_cat,46_subcat,26_cat', '', '2018-09-09', '2018-09-09', 0, '153649042978.jpg', '153649031824.jpg', '153649031812.test.zip', 'dfsafdsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(19, '5b95088d7e4ba', 8, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 3, 32, 32, 23, 'No', 'IE8,IE9', 'DSA', '#', 'No', 'No', '', '28_cat,26_cat', '', '2018-09-09', '2018-09-09', 0, '153649377078.png', '153649377024.png', '153649377012.test.zip', 'DFSA', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(20, '5b9508f658f0f', 8, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 33, 3, 78, 99, 'Yes', 'IE7', 'DFS', '#', 'No', 'No', '', '27_cat,57_subcat', '', '2018-09-09', '2018-09-09', 0, '153649407478.png', '153649407424.png', '153649407412.test.zip', 'DFSADSFA', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(21, '5bc6ecf4464c6', 7, 'Ecommerce php script', 'ecommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc<font color=', 3, 33, 223, 2221, 'No', 'IE8,IE9', 'html', '#', 'No', 'No', '', '28_cat,46_subcat,49_subcat', '', '2018-10-17', '2018-10-17', 0, '153976352278.jpg', '153976352224.jpg', '153976352212.Lighthouse.zip', 'tee', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(22, '5bde8565d491f', 7, 'gdd', 'gdd', 'sample &lt;span style=&quot;background-color: rgb(0, 102, 0);&quot;&gt;dfsafasfds&lt;/span&gt;a{}}()&lt;font color=&quot;#ffffff&quot;&gt;) &lt;span style=&quot;background-color: rgb(204, 0, 0);&quot;&gt;dfdasfas&lt;/span&gt;&lt;/font&gt;', 3, 0, 0, 0, 'No', 'IE8', 'html', '#', 'No', 'No', '', '28_cat,44_subcat', '', '2018-11-04', '2018-11-04', 0, '154130999678.jpg', '154130999624.jpg', '154130999612.Lighthouse.zip', '', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(23, '5bdea886a5fa0', 7, 'sample', 'sample', 'fdsa', 32, 0, 0, 0, 'No', 'IE7', 'html', '#', 'No', 'No', '', '45_subcat', '', '2018-11-04', '2018-11-04', 0, '154131890078.jpg', '154131890024.jpg', '154131890012.Lighthouse.zip', '', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(24, '5bdeaa375bb25', 7, 'edsfa', 'edsfa', 'fdsafdas', 45, 3, 32, 323, 'No', 'IE7', 'html', '#', 'No', 'No', '', '45_subcat', '', '2018-11-04', '2018-11-04', 0, '154131926978.jpg', '154131926924.jpg', '154131926912.Chrysanthemum.zip', 'tess,ewn', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(26, '5bf3dc4001975', 7, 'TEST ITEM', 'test-item', 'test', 33, 3, 23, 32, 'No', 'IE7,IE9', 'test', '#', 'No', 'No', '', '26_cat,47_subcat', '41_cat,86_subcat,87_subcat,88_subcat', '2018-11-20', '2018-11-20', 0, '154270840778.jpeg', '154270840724.jpg', '154270840712.Chrysanthemum.zip', '', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(27, '5c02605acb0b8', 7, 'WELCOME POST', 'welcome-post', 'TESTER', 0, 0, 0, 0, 'Yes', 'IE9,IE10', 'html,css,js,psd', '#', 'No', 'No', '2', '30_cat,53_subcat', '41_cat', '2018-12-01', '2018-12-01', 0, '154365969178.jpeg', '154365969124.jpeg', '154365969112.Lighthouse.zip', 'HTML,CSS', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(28, '5c0267f98c710', 7, 'SAMPLE ITEM', 'sample-item', 'TEST CDDS', 2, 0, 0, 0, 'Yes', 'IE7,IE9,IE10', 'html,css,js,psd', '#', 'No', 'Yes', '', '26_cat,49_subcat,47_subcat', '43_cat,44_cat', '2018-12-01', '2018-12-01', 0, '154366165378.jpeg', '154366165324.jpeg', '154366165312.Lighthouse.zip', 'CSS,HTML', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(29, '5c2cb693dfdcd', 8, 'PayzaKart Multivendor Product Marketplace', 'payzakart-multivendor-product-marketplace', '&lt;div&gt;&lt;b&gt;PayzaKart&lt;/b&gt; is a fully responsive products marketplace. its suitable for all product marketplace. PayzaKart is a multivendor laravel script, Built with Laravel and Bootstrap (HTML5 &amp; CSS3). PayzaKart has all the functionality a needs &ndash; like my shop, my shopping, my balance, my dashboard, my profile, my orders&hellip;ect. It is packed with lots of features.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;h2&gt;Features&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;Fully Responsive&lt;/li&gt;&lt;li&gt;Dynamic pages&lt;/li&gt;&lt;li&gt;Dynamic primary, secondary &amp; button color changes&lt;/li&gt;&lt;li&gt;Multi-Language Add / Edit / Delete Integrated&lt;/li&gt;&lt;li&gt;3 Languages include (Arabic, Portuguese, Spanish)&lt;/li&gt;&lt;li&gt;RTL Support&lt;/li&gt;&lt;li&gt;Ckeditor text editor added&lt;/li&gt;&lt;li&gt;Social login Integrated such as facebook, google plus&lt;/li&gt;&lt;li&gt;Clean and Modern Design&lt;/li&gt;&lt;li&gt;Built with Laravel Framework, PHP/MySQL &amp; HTML5/CSS3&lt;/li&gt;&lt;li&gt;Build on Bootstrap 3&lt;/li&gt;&lt;li&gt;PayPal,Stripe,Cash on delivery,PayHere,Razorpay,Paytm Payment Gateway Integrated&lt;/li&gt;&lt;li&gt;Pay to wallet balance&lt;/li&gt;&lt;li&gt;Registration email confirmation&lt;/li&gt;&lt;li&gt;Multi Vendor Support&lt;/li&gt;&lt;li&gt;Font Awesome Icon Integration&lt;/li&gt;&lt;li&gt;Custom Mp3,Image Size &amp; Type Changes&lt;/li&gt;&lt;li&gt;Google Map Integration&lt;/li&gt;&lt;li&gt;Powerful Admin Panel&lt;/li&gt;&lt;li&gt;Login and Registration&lt;/li&gt;&lt;li&gt;Product types are physical, digital and external integrated&lt;/li&gt;&lt;li&gt;Dispute refund payment system&lt;/li&gt;&lt;li&gt;Compare Product&lt;/li&gt;&lt;li&gt;Search Product&lt;/li&gt;&lt;li&gt;Homebanner &amp; Box content Dynamically&lt;/li&gt;&lt;li&gt;Forgot Password&lt;/li&gt;&lt;li&gt;Blog &amp; Buyer Reviews&lt;/li&gt;&lt;li&gt;Print option integrated on my shopping &amp; my orders pages&lt;/li&gt;&lt;li&gt;Social Media Icons&lt;/li&gt;&lt;li&gt;Manage My Order,My shopping,My balance,My Shop,My Attributes&lt;/li&gt;&lt;li&gt;Rate &amp; Review a purchase products&lt;/li&gt;&lt;li&gt;Import / Export product csv,xls,xlsx&lt;/li&gt;&lt;li&gt;Admin commission system&lt;/li&gt;&lt;li&gt;Shipping system on every vendor&lt;/li&gt;&lt;li&gt;SEO optimized&lt;/li&gt;&lt;li&gt;Comments&lt;/li&gt;&lt;li&gt;Ajax pagination&lt;/li&gt;&lt;li&gt;Dynamic banners &amp; slideshow&lt;/li&gt;&lt;li&gt;Contact Form&lt;/li&gt;&lt;li&gt;Google Adsense integrated&lt;/li&gt;&lt;li&gt;Email Notifications&lt;/li&gt;&lt;li&gt;Search filter by category,price,attributes type and values&lt;/li&gt;&lt;li&gt;Vendor contact form&lt;/li&gt;&lt;li&gt;Vendor rating and reviews integrated&lt;/li&gt;&lt;li&gt;Wishlist&lt;/li&gt;&lt;li&gt;Widget management&lt;/li&gt;&lt;li&gt;Admin approved/unapproved payment,product,withdraw,users,attributes&hellip;ect&lt;/li&gt;&lt;li&gt;Google recaptcha Integrated&lt;/li&gt;&lt;li&gt;Tags on blog,products&lt;/li&gt;&lt;li&gt;Processing fee,shipping charge and commission Integrated&lt;/li&gt;&lt;li&gt;Jquery carousel Integrated&lt;/li&gt;&lt;li&gt;Back to Top Scroller Integrated&lt;/li&gt;&lt;li&gt;and more&hellip;.&lt;/li&gt;&lt;/ul&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;h2&gt;Online Demo&lt;/h2&gt;&lt;div&gt;&lt;b&gt;Front:&lt;/b&gt;&lt;br&gt;&lt;a data-cke-saved-href=&quot;http://fluxkart.com/payzakart&quot; href=&quot;http://fluxkart.com/payzakart&quot;&gt;http://fluxkart.com/payzakart&lt;/a&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;Vendor:&lt;/b&gt;&lt;br&gt;&lt;a data-cke-saved-href=&quot;http://fluxkart.com/payzakart/login&quot; href=&quot;http://fluxkart.com/payzakart/login&quot;&gt;http://fluxkart.com/payzakart/login&lt;/a&gt;&lt;br&gt;Email: &lt;a data-cke-saved-href=&quot;mailto:robert@sample.com&quot; href=&quot;mailto:robert@sample.com&quot;&gt;robert@sample.com&lt;/a&gt; Password: 123456&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;Customer:&lt;/b&gt;&lt;br&gt;&lt;a data-cke-saved-href=&quot;http://fluxkart.com/payzakart/login&quot; href=&quot;http://fluxkart.com/payzakart/login&quot;&gt;http://fluxkart.com/payzakart/login&lt;/a&gt;&lt;br&gt;Email: mortin Password: 123456&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;Admin:&lt;/b&gt;&lt;br&gt;&lt;a data-cke-saved-href=&quot;http://fluxkart.com/payzakart/login&quot; href=&quot;http://fluxkart.com/payzakart/login&quot;&gt;http://fluxkart.com/payzakart/login&lt;/a&gt;&lt;br&gt;Email: admin Password: admin&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;h2&gt;System requirements&lt;/h2&gt;&lt;pre&gt;PHP 7.0 or greater &lt;/pre&gt;&lt;br&gt;&lt;h2&gt;Laravel Version&lt;/h2&gt;&lt;pre&gt;Laravel 5.5.43 &lt;/pre&gt;&lt;br&gt;&lt;h2&gt;Version history&lt;/h2&gt;&lt;pre&gt;Version 1.0 - initial version launched&lt;/pre&gt;&lt;br&gt;&lt;h2&gt;Sources and Credits&lt;/h2&gt;&lt;ul&gt;&lt;li&gt;Laravel&lt;/li&gt;&lt;li&gt;Bootstrap 3&lt;/li&gt;&lt;li&gt;Google Fonts&lt;/li&gt;&lt;li&gt;Paypal&lt;/li&gt;&lt;li&gt;Stripe&lt;/li&gt;&lt;li&gt;PayHere&lt;/li&gt;&lt;li&gt;Razorpay&lt;/li&gt;&lt;li&gt;Paytm&lt;/li&gt;&lt;/ul&gt;', 49, 0, 0, 0, 'No', 'IE11,Firefox,Safari,Opera,Chrome,Edge', 'html,css,javascript,jquery,php,mysql', 'http://fluxkart.com/payzakart', 'Yes', 'Yes', '', '28_cat,30_cat,27_cat,24_cat', '', '2019-01-02', '2019-01-24', 0, '154643465578.jpg', '154643465524.jpg', '154643465512.Lighthouse.zip', 'payzakart,avigher payzakart,laravel payzakart,multivendor product marketplace', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '7VJ30586BW505860U', 0, 0, 'deleted', '', 'en', 0, 1),
(30, '5c2e059fd8b2c', 8, 'dfsafd sara 8832432 )324_32((032432) sdfs 999', 'dfsafd-sara-sdfs', 'fdafsda', 34, 32, 55, 77, 'No', 'IE10', 'hh', '#', 'No', 'No', '', '28_cat', '', '2019-01-03', '2019-01-03', 0, '154652006078.jpg', '154652006024.jpg', '154652006012.Lighthouse.zip', 'fdsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(31, '5c2e06bfb624d', 8, 'dfsafd sara 8832432 )324_32((032432) sdfs 999 77777777', 'dfsafd-sara-sdfs', 'dfsa', 44, 55, 66, 89, 'No', 'IE7', 'gg', '#', 'No', 'No', '', '28_cat', '', '2019-01-03', '2019-01-03', 0, '154652031478.jpg', '154652031424.jpg', '154652031412.Lighthouse.zip', 'dfsa', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '', '', 0, 1),
(32, '5c3b0a045844e', 20, 'sample title', 'sample-title', 'sample titlesample titlesample titlesample titlesample title&amp;nbsp;&amp;nbsp;sample titlesample titlesample title', 34, 65, 88, 100, 'No', 'IE9,IE10', 'html', '#', 'No', 'No', '', '28_cat,46_subcat,26_cat', '', '2019-01-13', '2019-01-13', 0, '154737365678.jpg', '154737365624.jpg', '154737365612.Lighthouse.zip', 'html,css', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c3b0a045844e', 'en', 0, 1),
(33, '5c3b0a045844e', 20, '????? ??????', 'sample-title', 'عنوان العينةعنوان العينةعنوان العينةعنوان العينةعنوان العينة', 34, 65, 88, 100, 'No', 'IE9,IE10', 'html', '#', 'No', 'No', '', '28_cat,46_subcat,26_cat', '', '2019-01-13', '2019-01-13', 0, '154737365678.jpg', '154737365624.jpg', '154737365612.Lighthouse.zip', 'html,css', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c3b0a045844e', 'ar', 32, 1),
(34, '5c3b0a045844e', 20, 'título de la muestra', 'sample-title', 't&iacute;tulo de la muestrat&iacute;tulo de la muestrat&iacute;tulo de la muestrat&iacute;tulo de la muestra', 34, 65, 88, 100, 'No', 'IE9,IE10', 'html', '#', 'No', 'No', '', '28_cat,46_subcat,26_cat', '', '2019-01-13', '2019-01-13', 0, '154737365678.jpg', '154737365624.jpg', '154737365612.Lighthouse.zip', 'html,css', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c3b0a045844e', 'es', 32, 1),
(35, '5c3b0c5a74a41', 20, 'again', 'عنوان-العينة', 'againagainagainagain', 332, 3232, 3232, 32432, 'No', 'IE7', 'html', '#', 'No', 'No', '', '45_subcat,50_subcat,49_subcat', '', '2019-01-13', '2019-01-14', 0, '154737400278.jpg', '154737400224.jpg', '154737400212.Lighthouse.zip', 'test', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c3b0c5a74a41', 'en', 0, 1),
(40, '5c3b0c5a74a41', 20, 'عنوان العينة', 'عنوان-العينة', 'عنوان العينةعنوان العينةعنوان العينة', 332, 3232, 3232, 32432, 'No', 'IE7', 'html', '#', 'No', 'No', '', '45_subcat,50_subcat,49_subcat', '', '0000-00-00', '2019-01-14', 0, '154737400278.jpg', '154737400224.jpg', '154737400212.Lighthouse.zip', 'test', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c3b0c5a74a41', 'ar', 35, 1),
(41, '5c3b0c5a74a41', 20, 'título de la muestratítulo de la muestra', 'عنوان-العينة', 't&iacute;tulo de la muestrat&iacute;tulo de la muestrat&iacute;tulo de la muestra', 332, 3232, 3232, 32432, 'No', 'IE7', 'html', '#', 'No', 'No', '', '45_subcat,50_subcat,49_subcat', '', '0000-00-00', '2019-01-14', 0, '154737400278.jpg', '154737400224.jpg', '154737400212.Lighthouse.zip', 'test', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c3b0c5a74a41', 'es', 35, 1),
(42, '5c2cb693dfdcd', 8, 'PayzaKart سوق المنتجات المتعددة', 'payzakart-multivendor-product-marketplace', '&lt;div&gt;PayzaKart هو سوق منتجات تستجيب بشكل كامل. انها مناسبة لجميع سوق المنتجات. PayzaKart هو برنامج لورافيل متعدد اللغات ، تم تصميمه باستخدام Laravel و Bootstrap (HTML5 و CSS3). PayzaKart لديه كل الوظائف التي تحتاج إليها - مثل متجري ، تسوقي ، رصيدي ، لوحة المعلومات الخاصة بي ، ملفي الشخصي ، أوامري ... إلخ. معبأة مع الكثير من الميزات.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;المميزات&lt;/div&gt;&lt;div&gt;استجابة كاملة&lt;/div&gt;&lt;div&gt;الصفحات الديناميكية&lt;/div&gt;&lt;div&gt;تغييرات أساسية ديناميكية وثانوية وزر&lt;/div&gt;&lt;div&gt;متعدد اللغات إضافة / تحرير / حذف المتكاملة&lt;/div&gt;&lt;div&gt;3 لغات تشمل (العربية ، البرتغالية ، الإسبانية)&lt;/div&gt;&lt;div&gt;دعم RTL&lt;/div&gt;&lt;div&gt;وأضاف محرر نص Ckeditor&lt;/div&gt;&lt;div&gt;تسجيل الدخول الاجتماعي المتكامل مثل facebook و google plus&lt;/div&gt;&lt;div&gt;نظيفة وحديثة التصميم&lt;/div&gt;&lt;div&gt;بنيت مع Laravel Framework ، PHP / MySQL و HTML5 / CSS3&lt;/div&gt;&lt;div&gt;بناء على Bootstrap 3&lt;/div&gt;&lt;div&gt;PayPal، Stripe، الدفع عند التسليم، PayHere، Razorpay، Paytm Payment Gateway Integrated&lt;/div&gt;&lt;div&gt;دفع لتوازن المحفظة&lt;/div&gt;&lt;div&gt;تأكيد البريد الإلكتروني للتسجيل&lt;/div&gt;&lt;div&gt;دعم مورّد متعدد&lt;/div&gt;&lt;div&gt;دمج أيقونة رهيبة الخط&lt;/div&gt;&lt;div&gt;MP3 مخصص ، حجم الصورة ونوع التغييرات&lt;/div&gt;&lt;div&gt;جوجل خريطة التكامل&lt;/div&gt;&lt;div&gt;لوحة تحكم قوية&lt;/div&gt;&lt;div&gt;تسجيل الدخول والتسجيل&lt;/div&gt;&lt;div&gt;أنواع المنتجات مادية و رقمية و خارجية متكاملة&lt;/div&gt;&lt;div&gt;نظام دفع استرداد النقود&lt;/div&gt;&lt;div&gt;مقارنة المنتج&lt;/div&gt;&lt;div&gt;البحث عن المنتج&lt;/div&gt;&lt;div&gt;Homebanner &amp; Box content حيويًا&lt;/div&gt;&lt;div&gt;هل نسيت كلمة المرور&lt;/div&gt;&lt;div&gt;بلوق ومشتري الاستعراضات&lt;/div&gt;&lt;div&gt;تم دمج خيار الطباعة في صفحة التسوق وصفحات طلبي&lt;/div&gt;&lt;div&gt;أيقونات وسائل الاعلام الاجتماعية&lt;/div&gt;&lt;div&gt;إدارة طلبي ، التسوق الخاص بي ، رصيدي ، متجري ، صفاتي&lt;/div&gt;&lt;div&gt;تقييم ومراجعة منتجات الشراء&lt;/div&gt;&lt;div&gt;استيراد / تصدير المنتج csv و xls و xlsx&lt;/div&gt;&lt;div&gt;نظام لجنة الادارية&lt;/div&gt;&lt;div&gt;نظام الشحن على كل بائع&lt;/div&gt;&lt;div&gt;تحسين محركات البحث&lt;/div&gt;&lt;div&gt;تعليقات&lt;/div&gt;&lt;div&gt;ترقيم صفحات Ajax&lt;/div&gt;&lt;div&gt;لافتات ديناميكية وعرض الشرائح&lt;/div&gt;&lt;div&gt;نموذج الاتصال&lt;/div&gt;&lt;div&gt;جوجل ادسنس متكاملة&lt;/div&gt;&lt;div&gt;اشعارات البريد الالكتروني&lt;/div&gt;&lt;div&gt;تصفية البحث حسب الفئة والسعر ونوع السمات والقيم&lt;/div&gt;&lt;div&gt;نموذج اتصال البائع&lt;/div&gt;&lt;div&gt;تصنيف الموردين والمراجعات المتكاملة&lt;/div&gt;&lt;div&gt;الأماني&lt;/div&gt;&lt;div&gt;إدارة القطعة&lt;/div&gt;&lt;div&gt;وافق المشرف / لم تتم الموافقة على الدفع ، والمنتج ، والسحب ، والمستخدمين ، وسمات ... إلخ&lt;/div&gt;&lt;div&gt;جوجل recaptcha المتكاملة&lt;/div&gt;&lt;div&gt;العلامات على بلوق ، والمنتجات&lt;/div&gt;&lt;div&gt;رسوم المعالجة ورسوم الشحن وعمولة متكاملة&lt;/div&gt;&lt;div&gt;Jquery carousel Integrated&lt;/div&gt;&lt;div&gt;العودة إلى الأعلى Scroller Integrated&lt;/div&gt;&lt;div&gt;و اكثر&hellip;.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;عرض على الانترنت&lt;/div&gt;&lt;div&gt;أمامي:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;بائع:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart/login&lt;/div&gt;&lt;div&gt;البريد الإلكتروني: robert@sample.com كلمة المرور: 123456&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;العملاء:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart/login&lt;/div&gt;&lt;div&gt;البريد الإلكتروني: mortin كلمة المرور: 123456&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;مشرف:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart/login&lt;/div&gt;&lt;div&gt;البريد الإلكتروني: مشرف كلمة المرور: المشرف&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;متطلبات النظام&lt;/div&gt;&lt;div&gt;PHP 7.0 أو أكبر&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;الإصدار Laravel&lt;/div&gt;&lt;div&gt;Laravel 5.5.43&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;تاريخ النسخة&lt;/div&gt;&lt;div&gt;الإصدار 1.0 - إطلاق النسخة الأولية&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;المصادر والاعتمادات&lt;/div&gt;&lt;div&gt;لارافل&lt;/div&gt;&lt;div&gt;Bootstrap 3&lt;/div&gt;&lt;div&gt;جوجل الخطوط&lt;/div&gt;&lt;div&gt;باي بال&lt;/div&gt;&lt;div&gt;شريط&lt;/div&gt;&lt;div&gt;ادفع هنا&lt;/div&gt;&lt;div&gt;Razorpay&lt;/div&gt;&lt;div&gt;Paytm&lt;/div&gt;', 49, 0, 0, 0, 'No', 'IE11,Firefox,Safari,Opera,Chrome,Edge', 'html,css,javascript,jquery,php,mysql', 'http://fluxkart.com/payzakart', 'Yes', 'Yes', '', '28_cat,30_cat,27_cat,24_cat', '', '0000-00-00', '2019-01-24', 0, '154643465578.jpg', '154643465524.jpg', '154643465512.Lighthouse.zip', 'payzakart,avigher payzakart,laravel payzakart,multivendor product marketplace', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '7VJ30586BW505860U', 0, 1, 'deleted', '5c2cb693dfdcd', 'ar', 29, 1),
(43, '5c2cb693dfdcd', 8, 'PayzaKart Multivendor Product Marketplace', 'payzakart-multivendor-product-marketplace', '&lt;div&gt;PayzaKart es un mercado de productos totalmente sensible. Es adecuado para todos los productos del mercado. PayzaKart es un script multivendor de laravel, Construido con Laravel y Bootstrap (HTML5 y CSS3). PayzaKart tiene toda la funcionalidad que necesita, como mi tienda, mis compras, mi saldo, mi panel de control, mi perfil, mis pedidos ... etc. Est&aacute; lleno de muchas caracter&iacute;sticas.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Caracteristicas&lt;/div&gt;&lt;div&gt;Completamente sensible&lt;/div&gt;&lt;div&gt;Paginas dinamicas&lt;/div&gt;&lt;div&gt;Cambios din&aacute;micos de color primario, secundario y de bot&oacute;n.&lt;/div&gt;&lt;div&gt;Multi-Idioma A&ntilde;adir / Editar / Eliminar Integrado&lt;/div&gt;&lt;div&gt;3 idiomas incluyen (&aacute;rabe, portugu&eacute;s, espa&ntilde;ol)&lt;/div&gt;&lt;div&gt;Soporte RTL&lt;/div&gt;&lt;div&gt;Editor de texto Ckeditor agregado&lt;/div&gt;&lt;div&gt;Inicio de sesi&oacute;n social integrado como facebook, google plus&lt;/div&gt;&lt;div&gt;Dise&ntilde;o limpio y moderno&lt;/div&gt;&lt;div&gt;Construido con Laravel Framework, PHP / MySQL y HTML5 / CSS3&lt;/div&gt;&lt;div&gt;Construir en Bootstrap 3&lt;/div&gt;&lt;div&gt;PayPal, Stripe, Contra reembolso, PayHere, Razorpay, Paytm Payment Gateway Integrated&lt;/div&gt;&lt;div&gt;Pagar al saldo de la cartera&lt;/div&gt;&lt;div&gt;Registro de confirmaci&oacute;n por correo electr&oacute;nico&lt;/div&gt;&lt;div&gt;Soporte de m&uacute;ltiples proveedores&lt;/div&gt;&lt;div&gt;Fuente Awesome Icon Integration&lt;/div&gt;&lt;div&gt;Mp3 personalizado, tama&ntilde;o de imagen y cambios de tipo&lt;/div&gt;&lt;div&gt;Integraci&oacute;n de Google Map&lt;/div&gt;&lt;div&gt;Panel de administraci&oacute;n de gran alcance&lt;/div&gt;&lt;div&gt;Ingreso y registro&lt;/div&gt;&lt;div&gt;Los tipos de productos son f&iacute;sicos, digitales y externos integrados.&lt;/div&gt;&lt;div&gt;Sistema de pago de devoluci&oacute;n de disputas&lt;/div&gt;&lt;div&gt;Comparar producto&lt;/div&gt;&lt;div&gt;Buscar Producto&lt;/div&gt;&lt;div&gt;Homebanner &amp; Box contenido din&aacute;micamente&lt;/div&gt;&lt;div&gt;Se te olvid&oacute; tu contrase&ntilde;a&lt;/div&gt;&lt;div&gt;Blog y comentarios del comprador&lt;/div&gt;&lt;div&gt;Opci&oacute;n de impresi&oacute;n integrada en mis p&aacute;ginas de compras y pedidos.&lt;/div&gt;&lt;div&gt;Iconos de redes sociales&lt;/div&gt;&lt;div&gt;Gestionar mi pedido, Mis compras, Mi saldo, Mi tienda, Mis atributos&lt;/div&gt;&lt;div&gt;Valorar y revisar una compra de productos&lt;/div&gt;&lt;div&gt;Importar / Exportar producto csv, xls, xlsx&lt;/div&gt;&lt;div&gt;Sistema de comisiones de administraci&oacute;n&lt;/div&gt;&lt;div&gt;Sistema de env&iacute;o en cada vendedor.&lt;/div&gt;&lt;div&gt;SEO optimizado&lt;/div&gt;&lt;div&gt;Comentarios&lt;/div&gt;&lt;div&gt;Paginaci&oacute;n del Ajax&lt;/div&gt;&lt;div&gt;Banners din&aacute;micos y presentaci&oacute;n de diapositivas&lt;/div&gt;&lt;div&gt;Formulario de contacto&lt;/div&gt;&lt;div&gt;Google Adsense integrado&lt;/div&gt;&lt;div&gt;Notificaci&oacute;nes de Correo Electr&oacute;nico&lt;/div&gt;&lt;div&gt;B&uacute;squeda de filtros por categor&iacute;a, precio, tipo de atributos y valores.&lt;/div&gt;&lt;div&gt;Formulario de contacto del vendedor&lt;/div&gt;&lt;div&gt;Clasificaci&oacute;n de vendedor y comentarios integrados&lt;/div&gt;&lt;div&gt;Lista de deseos&lt;/div&gt;&lt;div&gt;Gesti&oacute;n de widgets&lt;/div&gt;&lt;div&gt;Administraci&oacute;n aprobada / no aprobada pago, producto, retiro, usuarios, atributos ... ect&lt;/div&gt;&lt;div&gt;Google recaptcha integrado&lt;/div&gt;&lt;div&gt;Etiquetas en blog, productos.&lt;/div&gt;&lt;div&gt;Tarifa de procesamiento, gastos de env&iacute;o y comisi&oacute;n integrados.&lt;/div&gt;&lt;div&gt;Carrusel jquery integrado&lt;/div&gt;&lt;div&gt;Volver al principio Scroller integrado&lt;/div&gt;&lt;div&gt;y m&aacute;s&hellip;.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Demo en linea&lt;/div&gt;&lt;div&gt;Frente:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Vendedor:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart/login&lt;/div&gt;&lt;div&gt;Correo electr&oacute;nico: robert@sample.com Contrase&ntilde;a: 123456&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Cliente:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart/login&lt;/div&gt;&lt;div&gt;Correo electr&oacute;nico: Mortin Contrase&ntilde;a: 123456&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Administraci&oacute;n:&lt;/div&gt;&lt;div&gt;http://fluxkart.com/payzakart/login&lt;/div&gt;&lt;div&gt;Correo electr&oacute;nico: admin Contrase&ntilde;a: admin&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Requisitos del sistema&lt;/div&gt;&lt;div&gt;PHP 7.0 o mayor&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Versi&oacute;n de Laravel&lt;/div&gt;&lt;div&gt;Laravel 5.5.43&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Historial de versiones&lt;/div&gt;&lt;div&gt;Versi&oacute;n 1.0 - versi&oacute;n inicial lanzada&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Fuentes y Cr&eacute;ditos&lt;/div&gt;&lt;div&gt;Laravel&lt;/div&gt;&lt;div&gt;Bootstrap 3&lt;/div&gt;&lt;div&gt;Fuentes de Google&lt;/div&gt;&lt;div&gt;Paypal&lt;/div&gt;&lt;div&gt;Raya&lt;/div&gt;&lt;div&gt;Pague aqu&iacute;&lt;/div&gt;&lt;div&gt;Razorpay&lt;/div&gt;&lt;div&gt;Pago&lt;/div&gt;', 49, 0, 0, 0, 'No', 'IE11,Firefox,Safari,Opera,Chrome,Edge', 'html,css,javascript,jquery,php,mysql', 'http://fluxkart.com/payzakart', 'Yes', 'Yes', '', '28_cat,30_cat,27_cat,24_cat', '', '0000-00-00', '2019-01-24', 0, '154643465578.jpg', '154643465524.jpg', '154643465512.Lighthouse.zip', 'payzakart,avigher payzakart,laravel payzakart,multivendor product marketplace', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '7VJ30586BW505860U', 0, 0, 'deleted', '5c2cb693dfdcd', 'es', 29, 1),
(44, '5b8a935549efd', 8, 'الصفحة المقصودة Html', 'html-landing-page', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 100, 120, 150, 175, 'No', 'Firefox,Safari,Opera', 'HTML,CSS', 'http://fluxkart.com/digitkart', 'Yes', 'Yes', '', '28_cat,30_cat', '', '0000-00-00', '2019-01-24', 0, '153649360578.jpg', '1535808602.jpg', '1535808602.appy-free-template.zip', 'CSS,HTML', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '0S5427889C1789748', 0, 0, 'deleted', '5b8a935549efd', 'ar', 15, 1),
(45, '5b8a935549efd', 8, 'Html página de destino', 'html-landing-page', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 100, 120, 150, 175, 'No', 'Firefox,Safari,Opera', 'HTML,CSS', 'http://fluxkart.com/digitkart', 'Yes', 'Yes', '', '28_cat,30_cat', '', '0000-00-00', '2019-01-24', 0, '153649360578.jpg', '1535808602.jpg', '1535808602.appy-free-template.zip', 'CSS,HTML', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '0S5427889C1789748', 0, 0, 'deleted', '5b8a935549efd', 'es', 15, 1),
(46, '5b8a643395f7f', 8, 'التعليم CSS Templete', 'education-css-templete', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 130, 260, 300, 450, 'Yes', 'IE9,IE10,IE11,Firefox,Safari,Opera,Edge', 'html,css,javascript,jquery,ajax', 'http://fluxkart.com/digitkart', 'No', 'No', '', '28_cat,30_cat,27_cat', '', '0000-00-00', '2019-01-24', 0, '153649362378.jpg', '1535796886.jpg', '1535796886.philosophy-free-lifestyle-blog-website-template.zip', 'html,css,javascript', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '25K471048N0328447', 0, 0, 'deleted', '5b8a643395f7f', 'ar', 14, 1),
(47, '5b8a643395f7f', 8, 'Educación CSS Templete', 'education-css-templete', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 130, 260, 300, 450, 'Yes', 'IE9,IE10,IE11,Firefox,Safari,Opera,Edge', 'html,css,javascript,jquery,ajax', 'http://fluxkart.com/digitkart', 'No', 'No', '', '28_cat,30_cat,27_cat', '', '0000-00-00', '2019-01-24', 0, '153649362378.jpg', '1535796886.jpg', '1535796886.philosophy-free-lifestyle-blog-website-template.zip', 'html,css,javascript', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '25K471048N0328447', 0, 0, 'deleted', '5b8a643395f7f', 'es', 14, 1),
(48, '5b6ba8d24cc55', 3, 'Woocommerce PHP النصي', 'woocommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 50, 80, 120, 150, 'Yes', 'IE7,IE8,IE9,Safari,Opera,Chrome', 'html,css', 'http://fluxkart.com/digitkart', 'Yes', 'No', '', '26_cat,50_subcat', '', '0000-00-00', '2019-01-24', 0, '153649132978.jpg', '1533782571.jpg', '1533782571.simplePagination.js-master.zip', 'wordpress,woocommerce,html', 1, '2019-01-14', '2020-01-14', 365, 10, 'stripe', 'paid', 'tok_1DsUhqA4i5sXvQrkQ1P6c6n7', 0, 0, 'deleted', '5b6ba8d24cc55', 'ar', 13, 1),
(49, '5b6ba8d24cc55', 3, 'Woocommerce php script', 'woocommerce-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 50, 80, 120, 150, 'Yes', 'IE7,IE8,IE9,Safari,Opera,Chrome', 'html,css', 'http://fluxkart.com/digitkart', 'Yes', 'No', '', '26_cat,50_subcat', '', '0000-00-00', '2019-01-24', 0, '153649132978.jpg', '1533782571.jpg', '1533782571.simplePagination.js-master.zip', 'wordpress,woocommerce,html', 1, '2019-01-14', '2020-01-14', 365, 10, 'stripe', 'paid', 'tok_1DsUhqA4i5sXvQrkQ1P6c6n7', 0, 0, 'deleted', '5b6ba8d24cc55', 'es', 13, 1),
(50, '5b5d2b5a07c0d', 3, 'البرنامج النصي للاكتتاب', 'subscription-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 20, 40, 80, 120, 'Yes', 'IE6,IE7,IE8,Firefox,Safari,Opera,Chrome,Edge', 'php,html,css', 'https://avigher.com/support', 'Yes', 'Yes', '', '50_subcat', '', '0000-00-00', '2019-01-24', 0, '153649138278.jpg', '1532832757.jpg', '1532832757.Woocommerce-Subscriptions.zip', 'wordpress,html,woocommerce', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '8VN308783E9555742', 0, 0, 'deleted', '5b5d2b5a07c0d', 'ar', 3, 1),
(51, '5b5d2b5a07c0d', 3, 'Script de suscripción', 'subscription-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 20, 40, 80, 120, 'Yes', 'IE6,IE7,IE8,Firefox,Safari,Opera,Chrome,Edge', 'php,html,css', 'https://avigher.com/support', 'Yes', 'Yes', '', '50_subcat', '', '0000-00-00', '2019-01-24', 0, '153649138278.jpg', '1532832757.jpg', '1532832757.Woocommerce-Subscriptions.zip', 'wordpress,html,woocommerce', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '8VN308783E9555742', 0, 0, 'deleted', '5b5d2b5a07c0d', 'es', 3, 1),
(52, '5b5911bc1f3b9', 3, 'برنامج Php Form', 'php-form-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 12, 16, 18, 25, 'Yes', 'IE8,Safari,Opera,Chrome,Edge', 'html,js,css,psd', 'http://www.test.com', 'Yes', 'Yes', '10', '45_subcat,26_cat,49_subcat,47_subcat', '', '0000-00-00', '2019-01-24', 0, '153649140578.jpg', '1532832302.jpg', '154263568712.Lighthouse.zip', 'html,css,responsive', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '77E77110PW5845053', 0, 0, 'deleted', '5b5911bc1f3b9', 'ar', 1, 1),
(53, '5b5911bc1f3b9', 3, 'Php Form script', 'php-form-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 12, 16, 18, 25, 'Yes', 'IE8,Safari,Opera,Chrome,Edge', 'html,js,css,psd', 'http://www.test.com', 'Yes', 'Yes', '10', '45_subcat,26_cat,49_subcat,47_subcat', '', '0000-00-00', '2019-01-24', 0, '153649140578.jpg', '1532832302.jpg', '154263568712.Lighthouse.zip', 'html,css,responsive', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '77E77110PW5845053', 0, 0, 'deleted', '5b5911bc1f3b9', 'es', 1, 1),
(54, '5b610fdcae85b', 7, 'قالب منتجات HTML5', 'stuff-html-template', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis n', 25, 50, 70, 100, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Chrome', 'html5,css,php', '#', 'Yes', 'Yes', '5', '28_cat,30_cat,51_subcat,27_cat,24_cat,64_subcat', '', '0000-00-00', '2019-01-14', 0, '153649249878.jpg', '1533087842.jpg', '1533087842.1511485852.zip', 'html,css,php', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '20R55130N9783341G', 0, 0, 'deleted', '5b610fdcae85b', 'ar', 12, 1),
(55, '5b610fdcae85b', 7, 'Plantilla HTML5 Stuff', 'stuff-html-template', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis n', 25, 50, 70, 100, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Chrome', 'html5,css,php', '#', 'Yes', 'Yes', '5', '28_cat,30_cat,51_subcat,27_cat,24_cat,64_subcat', '', '0000-00-00', '2019-01-14', 0, '153649249878.jpg', '1533087842.jpg', '1533087842.1511485852.zip', 'html,css,php', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '20R55130N9783341G', 0, 0, 'deleted', '5b610fdcae85b', 'es', 12, 1),
(56, '5b60f98b3fa86', 7, 'CSS الموضوع', 'css-theme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis&nbsp;', 50, 80, 120, 200, 'Yes', 'IE7,IE8,IE9,IE10,IE11,Opera,Chrome,Edge', 'html,css,php,javascript,ajax,jquery,psd', '#', 'No', 'No', '20', '28_cat,44_subcat,26_cat,30_cat,51_subcat,24_cat,60_subcat', '', '0000-00-00', '2019-01-14', 0, '153649253978.jpg', '1533082147.jpg', '1533082147.1511485852.zip', 'ecommerce template,ecommerce php script,shopping cart script', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '7SL05503X3730061C', 0, 1, 'deleted', '5b60f98b3fa86', 'ar', 11, 1),
(57, '5b60f98b3fa86', 7, 'Tema CSS', 'css-theme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis&nbsp;', 50, 80, 120, 200, 'Yes', 'IE7,IE8,IE9,IE10,IE11,Opera,Chrome,Edge', 'html,css,php,javascript,ajax,jquery,psd', '#', 'No', 'No', '20', '28_cat,44_subcat,26_cat,30_cat,51_subcat,24_cat,60_subcat', '', '0000-00-00', '2019-01-14', 0, '153649253978.jpg', '1533082147.jpg', '1533082147.1511485852.zip', 'ecommerce template,ecommerce php script,shopping cart script', 1, '2019-01-14', '2020-01-14', 365, 10, 'paypal', 'paid', '7SL05503X3730061C', 0, 0, 'deleted', '5b60f98b3fa86', 'es', 11, 1),
(58, '5b5fc0b88007e', 7, 'قالب اللياقة البدنية html5', 'fitness-html-template', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 25, 50, 75, 100, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Opera,Chrome', 'html,css', '#', 'Yes', 'No', '', '28_cat,45_subcat,46_subcat,30_cat,53_subcat,51_subcat', '', '0000-00-00', '2019-01-14', 0, '153649256778.jpg', '1533002007.jpg', '1533002007.1511485852.zip', 'html,css,js,ajax', 1, '2019-01-14', '2020-01-14', 365, 10, 'razorpay', 'paid', 'pay_BjwLBjp9XmubFy', 0, 0, 'deleted', '5b5fc0b88007e', 'ar', 10, 1),
(59, '5b5fc0b88007e', 7, 'Fitness html5 template', 'fitness-html-template', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 25, 50, 75, 100, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Opera,Chrome', 'html,css', '#', 'Yes', 'No', '', '28_cat,45_subcat,46_subcat,30_cat,53_subcat,51_subcat', '', '0000-00-00', '2019-01-14', 0, '153649256778.jpg', '1533002007.jpg', '1533002007.1511485852.zip', 'html,css,js,ajax', 1, '2019-01-14', '2020-01-14', 365, 10, 'razorpay', 'paid', 'pay_BjwLBjp9XmubFy', 0, 0, 'deleted', '5b5fc0b88007e', 'es', 10, 1),
(60, '5b5fb556f0907', 7, 'التبرع الخيرية PHP سيناريو', 'charity-donation-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 25, 35, 45, 70, 'No', 'IE7,IE8,Firefox,Safari,Opera,Edge', 'html,css,php,javascript', '#', 'Yes', 'No', '5', '28_cat,51_subcat,27_cat,24_cat', '', '0000-00-00', '2019-01-14', 0, '153649269478.jpg', '1532999130.jpg', '1532999130.1511485852.zip', 'charity,donation,php script', 1, '2019-01-14', '2020-01-14', 365, 10, 'razorpay', 'paid', 'pay_BjwJ9b4Gio7xs0', 0, 0, 'deleted', '5b5fb556f0907', 'ar', 9, 1),
(61, '5b5fb556f0907', 7, 'Donación de caridad PHP Script', 'charity-donation-php-script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 25, 35, 45, 70, 'No', 'IE7,IE8,Firefox,Safari,Opera,Edge', 'html,css,php,javascript', '#', 'Yes', 'No', '5', '28_cat,51_subcat,27_cat,24_cat', '', '0000-00-00', '2019-01-14', 0, '153649269478.jpg', '1532999130.jpg', '1532999130.1511485852.zip', 'charity,donation,php script', 1, '2019-01-14', '2020-01-14', 365, 10, 'razorpay', 'paid', 'pay_BjwJ9b4Gio7xs0', 0, 0, 'deleted', '5b5fb556f0907', 'es', 9, 1),
(62, '5b5fb4a04a25e', 7, 'Woocommerce تنزيل البرنامج المساعد الرقمي', 'woocommerce-digital-download-plugin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 20, 40, 60, 80, 'Yes', 'IE7,IE8,IE9,IE11,Firefox,Safari,Chrome', 'HTML,CSS,PSD', '#', 'No', 'Yes', '20', '28_cat,30_cat,51_subcat', '', '0000-00-00', '2019-01-14', 0, '153649304778.jpg', '1532998913.jpg', '1532998913.1511485852.zip', 'css,html', 1, '2019-01-14', '2020-01-14', 365, 10, 'stripe', 'paid', 'tok_1DsUneA4i5sXvQrkcmiAku9L', 0, 0, 'deleted', '5b5fb4a04a25e', 'ar', 8, 1),
(63, '5b5fb4a04a25e', 7, 'Plugin de descarga digital Woocommerce', 'woocommerce-digital-download-plugin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 20, 40, 60, 80, 'Yes', 'IE7,IE8,IE9,IE11,Firefox,Safari,Chrome', 'HTML,CSS,PSD', '#', 'No', 'Yes', '20', '28_cat,30_cat,51_subcat', '', '0000-00-00', '2019-01-14', 0, '153649304778.jpg', '1532998913.jpg', '1532998913.1511485852.zip', 'css,html', 1, '2019-01-14', '2020-01-14', 365, 10, 'stripe', 'paid', 'tok_1DsUneA4i5sXvQrkcmiAku9L', 0, 0, 'deleted', '5b5fb4a04a25e', 'es', 8, 1),
(64, '5b5fb2df121ea', 7, 'موضوع استجابة المتزلج', 'slider-responsive-theme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 36, 45, 55, 80, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Opera,Chrome', 'HTML,CSS', 'http://fluxkart.com/fluxkart', 'Yes', 'Yes', '', '28_cat,44_subcat,51_subcat', '', '0000-00-00', '2019-02-05', 0, '153649326478.jpg', '1532998533.jpg', '1532998533.1511485852.zip', 'html,css,template', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 1, 0, 'deleted', '5b5fb2df121ea', 'ar', 7, 1),
(65, '5b5fb2df121ea', 7, 'Tema de respuesta deslizante', 'slider-responsive-theme', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 36, 45, 55, 80, 'Yes', 'IE7,IE8,IE9,Firefox,Safari,Opera,Chrome', 'HTML,CSS', 'http://fluxkart.com/fluxkart', 'Yes', 'Yes', '', '28_cat,44_subcat,51_subcat', '', '0000-00-00', '2019-02-05', 0, '153649326478.jpg', '1532998533.jpg', '1532998533.1511485852.zip', 'html,css,template', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5b5fb2df121ea', 'es', 7, 1),
(66, '5c3ec0d051e73', 23, 'sample post', 'sample-post', 'sample post', 33, 34, 55, 56, 'No', 'Opera,Chrome,Edge', 'html', '#', 'No', 'No', '', '45_subcat,46_subcat,30_cat', '', '2019-01-16', '2019-01-16', 0, '154761662578.jpeg', '154761662524.jpeg', '154761662512.Lighthouse.zip', 'tee', 1, '2019-01-16', '2020-01-16', 365, 10, 'paypal', 'paid', '74L20056YU0280943', 0, 0, 'deleted', '5c3ec0d051e73', 'en', 0, 1);
INSERT INTO `products` (`item_id`, `item_token`, `user_id`, `item_title`, `item_slug`, `item_desc`, `regular_price_six_month`, `regular_price_one_year`, `extended_price_six_month`, `extended_price_one_year`, `high_resolution`, `compatible_browser`, `file_included`, `demo_url`, `support_item`, `future_update`, `unlimited_download`, `category`, `framework_category`, `first_update`, `last_update`, `sales`, `item_thumbnail`, `preview_image`, `main_file`, `item_tags`, `item_featured`, `featured_startdate`, `featured_enddate`, `featured_days`, `featured_price`, `featured_payment_type`, `featured_payment_status`, `featured_payment_key`, `downloaded`, `liked`, `delete_status`, `token`, `lang_code`, `parent`, `item_status`) VALUES
(67, '5c3ec0d051e73', 23, 'عينة عينة', 'sample-post', 'عينة عينة', 33, 34, 55, 56, 'No', 'Opera,Chrome,Edge', 'html', '#', 'No', 'No', '', '45_subcat,46_subcat,30_cat', '', '2019-01-16', '2019-01-16', 0, '154761662578.jpeg', '154761662524.jpeg', '154761662512.Lighthouse.zip', 'tee', 1, '2019-01-16', '2020-01-16', 365, 10, 'paypal', 'paid', '74L20056YU0280943', 0, 0, 'deleted', '5c3ec0d051e73', 'ar', 66, 1),
(68, '5c3ec0d051e73', 23, 'muestra de muestra', 'sample-post', 'muestra de muestra', 33, 34, 55, 56, 'No', 'Opera,Chrome,Edge', 'html', '#', 'No', 'No', '', '45_subcat,46_subcat,30_cat', '', '2019-01-16', '2019-01-16', 0, '154761662578.jpeg', '154761662524.jpeg', '154761662512.Lighthouse.zip', 'tee', 1, '2019-01-16', '2020-01-16', 365, 10, 'paypal', 'paid', '74L20056YU0280943', 0, 0, 'deleted', '5c3ec0d051e73', 'es', 66, 1),
(69, '5c3f03e8a0232', 23, 'example post', 'example-post', 'example post&amp;nbsp;example post&amp;nbsp;example post&amp;nbsp;example post&amp;nbsp;example post&amp;nbsp;example post', 56, 78, 67, 99, 'No', 'IE9,IE10', 'html', '#', 'No', 'No', '', '47_subcat,50_subcat,30_cat', '', '2019-01-16', '2019-01-16', 0, '154763375778.jpg', '154763375724.jpg', '154763375712.Lighthouse.zip', 'html', 1, '2019-01-16', '2020-01-16', 365, 10, '', '', '', 0, 0, 'deleted', '5c3f03e8a0232', 'en', 0, 1),
(70, '5c3f03e8a0232', 23, 'مثال على ذلك', 'example-post', '', 56, 78, 67, 99, 'No', 'IE9,IE10', 'html', '#', 'No', 'No', '', '47_subcat,50_subcat,30_cat', '', '2019-01-16', '2019-01-16', 0, '154763375778.jpg', '154763375724.jpg', '154763375712.Lighthouse.zip', 'html', 1, '2019-01-16', '2020-01-16', 365, 10, '', '', '', 0, 0, 'deleted', '5c3f03e8a0232', 'ar', 69, 1),
(71, '5c3f03e8a0232', 23, 'post de ejemplo', 'example-post', '', 56, 78, 67, 99, 'No', 'IE9,IE10', 'html', '#', 'No', 'No', '', '47_subcat,50_subcat,30_cat', '', '2019-01-16', '2019-01-16', 0, '154763375778.jpg', '154763375724.jpg', '154763375712.Lighthouse.zip', 'html', 1, '2019-01-16', '2020-01-16', 365, 10, '', '', '', 0, 0, 'deleted', '5c3f03e8a0232', 'es', 69, 1),
(72, '5c441bf0bdf74', 20, '', 'mi-ejemplo-funciona', '', 45, 56, 78, 122, 'No', 'IE9,IE10', 'html', 'https://avigher.com/support', 'No', 'No', '', '65_subcat,67_subcat,69_subcat', '', '2019-01-20', '2019-01-20', 0, '154796756978.jpg', '154796756924.jpg', '154796756912.Chrysanthemum.zip', '', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c441bf0bdf74', 'en', 0, 1),
(73, '5c441bf0bdf74', 20, 'mi ejemplo funciona', 'mi-ejemplo-funciona', 'mi ejemplo funciona', 45, 56, 78, 122, 'No', 'IE9,IE10', 'html', 'https://avigher.com/support', 'No', 'No', '', '65_subcat,67_subcat,69_subcat', '', '2019-01-20', '2019-01-20', 0, '154796756978.jpg', '154796756924.jpg', '154796756912.Chrysanthemum.zip', '', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c441bf0bdf74', 'es', 72, 1),
(74, '5c46fba36e690', 20, 'example product', 'example-product', 'example product', 45, 333, 2323, 323432, 'No', 'IE8,IE10', 'html', 'https://avigher.com/support', 'No', 'No', '', '48_subcat,52_subcat,51_subcat,27_cat', '', '2019-01-22', '2019-01-24', 0, '154815603078.jpg', '154815603024.jpg', '154815602912.Lighthouse.zip', 'test', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 5, 0, 'deleted', '5c46fba36e690', 'en', 0, 1),
(75, '5c46fba36e690', 20, '', 'example-product', '', 45, 333, 2323, 323432, 'No', 'IE8,IE10', 'html', 'https://avigher.com/support', 'No', 'No', '', '48_subcat,52_subcat,51_subcat,27_cat', '', '2019-01-22', '2019-01-24', 0, '154815603078.jpg', '154815603024.jpg', '154815602912.Lighthouse.zip', 'test', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c46fba36e690', 'ar', 74, 1),
(76, '5c46fba36e690', 20, '', 'example-product', '', 45, 333, 2323, 323432, 'No', 'IE8,IE10', 'html', 'https://avigher.com/support', 'No', 'No', '', '48_subcat,52_subcat,51_subcat,27_cat', '', '2019-01-22', '2019-01-24', 0, '154815603078.jpg', '154815603024.jpg', '154815602912.Lighthouse.zip', 'test', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 0, 0, 'deleted', '5c46fba36e690', 'es', 74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_meta`
--

CREATE TABLE `products_meta` (
  `item_meta_id` int(11) NOT NULL,
  `item_token` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `item_meta_key` varchar(200) NOT NULL,
  `item_meta_value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_meta`
--

INSERT INTO `products_meta` (`item_meta_id`, `item_token`, `user_id`, `item_meta_key`, `item_meta_value`) VALUES
(1, '5bdeaa375bb25', 7, 'item_video_preview', '1541324456172.video_test_512kb.mp4'),
(2, '5b60f98b3fa86', 7, 'item_video_preview', '1541324549172.SampleVideo_720x480_1mb.mp4'),
(3, '5b5fb556f0907', 7, 'item_video_preview', '1541324774172.small.mp4'),
(4, '5b8a643395f7f', 8, 'item_video_preview', '1541328755172.SampleVideo_720x480_1mb.mp4'),
(27, '5c2cb693dfdcd', 8, 'item_type', 'yes'),
(28, '5b8a935549efd', 8, 'item_type', 'yes'),
(29, '5b8a643395f7f', 8, 'item_type', 'yes'),
(30, '5b6ba8d24cc55', 3, 'item_type', 'yes'),
(31, '5b5d2b5a07c0d', 3, 'item_type', 'no'),
(32, '5b5911bc1f3b9', 3, 'item_type', 'yes'),
(33, '5c46fba36e690', 20, 'item_type', 'yes'),
(34, '5b5fb2df121ea', 7, 'item_type', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `product_checkout`
--

CREATE TABLE `product_checkout` (
  `cid` int(11) NOT NULL,
  `purchase_token` varchar(500) NOT NULL,
  `token` varchar(500) NOT NULL,
  `ord_id` varchar(200) NOT NULL,
  `item_prices` varchar(200) NOT NULL,
  `item_user_id` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `total` int(200) NOT NULL,
  `vendor_amount` float NOT NULL,
  `admin_amount` float NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_token` varchar(200) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_approval` int(50) NOT NULL,
  `bill_firstname` varchar(200) NOT NULL,
  `bill_lastname` varchar(200) NOT NULL,
  `bill_companyname` varchar(200) NOT NULL,
  `bill_email` varchar(200) NOT NULL,
  `bill_phone` varchar(200) NOT NULL,
  `bill_country` varchar(200) NOT NULL,
  `bill_address` mediumtext NOT NULL,
  `bill_city` varchar(200) NOT NULL,
  `bill_state` varchar(200) NOT NULL,
  `bill_postcode` varchar(200) NOT NULL,
  `enable_ship` int(50) NOT NULL,
  `ship_firstname` varchar(200) NOT NULL,
  `ship_lastname` varchar(200) NOT NULL,
  `ship_companyname` varchar(200) NOT NULL,
  `ship_email` varchar(200) NOT NULL,
  `ship_phone` varchar(200) NOT NULL,
  `ship_country` varchar(200) NOT NULL,
  `ship_address` mediumtext NOT NULL,
  `ship_city` varchar(200) NOT NULL,
  `ship_state` varchar(200) NOT NULL,
  `ship_postcode` varchar(200) NOT NULL,
  `other_notes` mediumtext NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_checkout`
--

INSERT INTO `product_checkout` (`cid`, `purchase_token`, `token`, `ord_id`, `item_prices`, `item_user_id`, `user_id`, `total`, `vendor_amount`, `admin_amount`, `payment_type`, `payment_token`, `payment_date`, `payment_approval`, `bill_firstname`, `bill_lastname`, `bill_companyname`, `bill_email`, `bill_phone`, `bill_country`, `bill_address`, `bill_city`, `bill_state`, `bill_postcode`, `enable_ship`, `ship_firstname`, `ship_lastname`, `ship_companyname`, `ship_email`, `ship_phone`, `ship_country`, `ship_address`, `ship_city`, `ship_state`, `ship_postcode`, `other_notes`, `payment_status`) VALUES
(5, '4116265', 'vpTj3ZvlsaC7FcmYGOsEMCD3KEAdEr5uoeH4BwfZ', '12,13', '150,260', '8,8', 7, 410, 400, 10, 'paypal', '02333066XB363250J', '2018-09-01', 0, 'fdsa', 'peter', 'fdsa', 'fdsa@fdsa.com', '65454546', 'Algeria', 'fdsa', 'fdsa', 'fdsa', '32fdsa', 0, '', '', '', '', '', '', '', '', '', '', 'test', 'completed'),
(6, '8023245', 'vpTj3ZvlsaC7FcmYGOsEMCD3KEAdEr5uoeH4BwfZ', '14,15', '18,80', '3,3', 7, 98, 88, 10, 'stripe', 'tok_1D5iwKA4i5sXvQrkIBC3Bz6P', '2018-09-01', 0, 'fdsa', 'peter', 'tester', 'fdsa@fdsa.com', '65454546', 'Algeria', 'fdsa', 'fdsa', 'fdsa', '32fdsa', 1, 'fdsa', 'peter', 'dfsafdsafdsafdas', 'fds@ddd.com', '65454546', 'Algeria', 'fdsa', 'fdsa', 'fdsa', '32fdsa', 'test', 'completed'),
(7, '4160713', 'vgRIKesZcddwDMmwYBUhqC1PcbfkvqjODrvY3HMC', '16', '16', '3', 9, 16, 6, 10, 'stripe', 'tok_1D5uVlA4i5sXvQrkMGDfGnCM', '2018-09-02', 0, 'chek', 'mark', 'new company', 'check@gmail.com', '32432432', 'Estonia', '3, sample address', 'vwb', 'Tew', '64646', 0, '', '', '', '', '', '', '', '', '', '', 'test', 'completed'),
(8, '1852302', 'wbjmxHMkyAfhAH1Rq1Y8pJP3hG3HywTAWOc13HOw', '19', '25', '7', 8, 25, 15, 10, 'paypal', '3JL025222S943383E', '2018-10-13', 0, 'sample', 'we', 'che', 'che@gmail.com', '9383838', 'France', 'test', 'madu', 'new', '8323824', 0, '', '', '', '', '', '', '', '', '', '', 'test', 'completed'),
(9, '9489642', '62o9FdAYCpVtNjVqns1yqrxTMgvi3dSKIytRJUnc', '20', '40', '7', 3, 40, 30, 10, 'stripe', 'tok_1DKnlAA4i5sXvQrk620nVDEB', '2018-10-13', 0, 'sdn', 'wle', 'welco', 'welco@gmail.com', '9383838', 'Congo', 'test', 'madi', 'ntam', '838383', 0, '', '', '', '', '', '', '', '', '', '', 'test', 'completed'),
(10, '7883565', 'mRXnxy1zXnRYNpQCokr2VW5JVStpt70JleU8I1KK', '21', '70', '7', 8, 70, 60, 10, 'paypal', '0Y039111LJ316284H', '2018-10-15', 0, 'sar', 'ne', '45,new street', 'sar@gmail.com', '3983823', 'India', 'test', 'tee', 'tam', '33242', 0, '', '', '', '', '', '', '', '', '', '', 'test', 'completed'),
(11, '2956906', 'mRXnxy1zXnRYNpQCokr2VW5JVStpt70JleU8I1KK', '23', '150', '3', 8, 150, 140, 10, 'stripe', 'tok_1DLQPGA4i5sXvQrksnHlbeS3', '2018-10-15', 0, 'bee', 'beev', 'new', 'newb@gmail.com', '9383383', 'India', 'testnn', 'wel', 'tn', '484848', 0, '', '', '', '', '', '', '', '', '', '', 'teeesss', 'completed'),
(12, '5170767', 'ijnWmtrZ5MQQhsoBB1NVQ4Hiu6eHnSKY4kZNZYt1', '24', '130', '8', 3, 130, 120, 10, 'paypal', '6C119672RY901773F', '2018-10-17', 0, 'new', 'ew', 'dfsa', 'fdsa@dfsa.com', '32432', 'Azerbaijan', 'dfsa', 'test', 'fdsafds', '324', 0, '', '', '', '', '', '', '', '', '', '', 'test', 'completed'),
(13, '6387697', 'UsBvWdFIcPo4nCUKCYFA2qHFnjwT1nbiKsVA52LU', '26', '50.4', '3', 7, 50, 40.4, 10, 'paypal', '', '2018-11-03', 0, 'test', 'new', 'well', '', '', 'India', '3,test', 'mdu', 'tn', '62002', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(14, '4908365', 'GpsZtxvGD07OcQj6xfkZrLXbbgwxgYwHb5pwDbNV', '27', '2', '7', 20, 2, 2, 0, 'wallet', '', '2018-12-02', 0, 'sample', 'new', 'wel', 'good@gmail.com', '6575675', 'Austria', 'new', 'tas', 'wew', '332423', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(15, '8841038', 'GpsZtxvGD07OcQj6xfkZrLXbbgwxgYwHb5pwDbNV', '28', '12', '3', 20, 12, 2, 10, 'wallet', '', '2018-12-02', 0, 'sads', 'new', 'sdfa', 'good@gmail.com', '6575675', 'Bahamas', 'wesd', 'dfsafds', 'tee', '324324', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(16, '7383711', 'GpsZtxvGD07OcQj6xfkZrLXbbgwxgYwHb5pwDbNV', '29', '40', '7', 20, 40, 30, 10, 'wallet', '', '2018-12-02', 0, 'ste', 'dsa', 'fdsa', 'good@gmail.com', '6575675', 'Azerbaijan', 'fdsa', 'fdsa', 'fdsa', '32423', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(17, '1361422', 'GpsZtxvGD07OcQj6xfkZrLXbbgwxgYwHb5pwDbNV', '30', '25', '7', 20, 25, 15, 10, 'wallet', '', '2018-12-02', 0, 'new', 'wew', 'cew', 'good@gmail.com', '6575675', 'India', 'test', 'mad', 'tee', '435435', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(18, '1551077', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '32', '49', '8', 20, 49, 39, 10, 'paytm', '', '2019-01-03', 0, 'fdsa', 'fdsa', 'dfsa', 'good@gmail.com', '6575675', 'Bahamas', 'dfsa', 'fdsa', 'fdsa', 'fdsa', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(19, '7769184', 'SFSrT5GaAT13RfubynK6DkxayIeq3GuFSCMFAtXM', '32', '49', '8', 20, 49, 39, 10, 'paytm', '', '2019-01-03', 0, 'dfsa', 'dfsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahamas', 'fdsa', 'fdsa', 'dfsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'pending'),
(20, '4041901', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '33', '25', '7', 20, 25, 15, 10, 'razorpay', '', '2019-01-03', 0, 'dfsa', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahamas', 'dfsa', 'fdsa', 'dfsa', '32423', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(21, '8690761', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '34', '50', '7', 20, 50, 40, 10, 'paypal', '9L2210509F8499248', '2019-01-03', 0, 'dfsa', 'dfsa', 'fdsa', 'good@gmail.com', '6575675', 'Azerbaijan', 'fdas', 'fdsa', 'dfsa', '32423', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(22, '4083133', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '35', '130', '8', 20, 130, 120, 10, 'paypal', '1BM25478MS496903P', '2019-01-03', 0, 'fdsa', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahamas', 'fdsa', 'fdsa', 'fdsa', '3242', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(23, '1485183', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '36', '50.4', '3', 20, 50, 40.4, 10, 'paypal', '7R1623153Y606660B', '2019-01-03', 0, 'dfsa', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahamas', 'fdsa', 'fdsa', 'fdsa', '324', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(24, '6647104', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '37', '36', '7', 20, 36, 26, 10, 'stripe', 'tok_1DoUBGA4i5sXvQrkJgbD8A3e', '2019-01-03', 0, 'dfsa', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahrain', 'fdsa', 'fdsa', 'fdsa', '3243', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(25, '9984152', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '38', '25', '7', 20, 25, 15, 10, 'razorpay', '', '2019-01-03', 0, 'fdsa', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Australia', 'fdsa', 'fdsa', 'fdsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(28, '6603115', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '41', '40', '3', 20, 40, 30, 10, 'wallet', '', '2019-01-03', 0, 'dfsa', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahrain', 'dfsa', 'fdsa', 'fdsa', '342', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(29, '1397173', '9UZaRfjVo3IElh7J6dkim16it8ZRjYwd7otIaP67', '42', '20', '3', 20, 20, 10, 10, 'wallet', '', '2019-01-03', 0, 'dfsafds', 'fdsa', 'fdsa', 'good@gmail.com', '6575675', 'Azerbaijan', 'fdsa', 'fdsa', 'fdsa', 'df', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(30, '8912645', 'tWjqO8kMHTM3lGqwItygJRLh4tRl8VuAPJoeXAft', '44', '49', '8', 7, 49, 39, 10, 'paytm', '', '2019-01-14', 0, 'test', 'dfsa', 'fdsa', 'demo@gmail.com', '6464655', 'Azerbaijan', 'dfsa', 'fdsa', 'fdsa', '32423', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(31, '8875969', 'khCD4tNriEJP14sfyqAT3vVl3KIWKNazTu8FSMpj', '45,46', '49,36', '8,7', 23, 85, 75, 10, 'razorpay', '', '2019-01-16', 0, 'smaple', 'new', 'wew', 'test@test.com', '9877767676', 'Bahamas', 'dsfa', 'fdsa', 'fdsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(32, '1641654', 'khCD4tNriEJP14sfyqAT3vVl3KIWKNazTu8FSMpj', '49', '49', '8', 23, 49, 39, 10, 'razorpay', '', '2019-01-16', 0, 'dfsa', 'fdsa', 'fdsa', 'test@test.com', '9877767676', 'Bahrain', 'dfsa', 'fdsa', 'dfsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(33, '8849710', 'khCD4tNriEJP14sfyqAT3vVl3KIWKNazTu8FSMpj', '53', '49', '8', 23, 49, 39, 10, 'paytm', '', '2019-01-16', 0, 'smaple', 'dfsa', 'dfsa', 'test@test.com', '9877767676', 'Australia', 'dfsa', 'dsa', 'dfsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(34, '5118330', 'khCD4tNriEJP14sfyqAT3vVl3KIWKNazTu8FSMpj', '54', '45', '7', 23, 45, 35, 10, 'stripe', 'tok_1Dt85pA4i5sXvQrkVvKQhJaZ', '2019-01-16', 0, 'smaple', 'fdsa', 'fdsa', 'test@test.com', '9877767676', 'Azerbaijan', 'dfsa', 'dfsa', 'dsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(35, '7942482', 'kWGiYZKRoRoiRvN5b5eIfTMMDHLFsNCkiEid8163', '43,55', '25,33', '7,23', 20, 58, 48, 10, 'wallet', '', '2019-01-16', 0, 'smaple', 'dfsa', 'fdsa', 'good@gmail.com', '6575675', 'Bahamas', 'fdsa', 'fdsa', 'dfsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(36, '6991339', 'neMgFmQ0qs9DRDwu5JwvPQyEAxKCvsvaozfjMYiV', '56,57', '50,49', '7,8', 23, 99, 89, 10, 'paypal', '27K32236WL209391R', '2019-01-16', 0, 'fds', 'dfsa', 'sda', 'test@test.com', '9877767676', 'Anguilla', 'fdsa', 'fdsa', 'dfsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(37, '4254963', 'dczhG3oa89ZSZKkI4Bru5UDMRMjkKb2tXtOiXbZl', '58', '130', '8', 23, 130, 120, 10, '2checkout', '', '2019-01-17', 0, 'smaple', 'bavan', 'wew', 'test@test.com', '9877767676', 'India', '34,sample street', 'madurai', 'tamilnadu', '625011', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(38, '3957867', 'dczhG3oa89ZSZKkI4Bru5UDMRMjkKb2tXtOiXbZl', '59', '120', '8', 23, 120, 110, 10, '2checkout', '', '2019-01-17', 0, 'smaple', 'bavan', 'new', 'test@test.com', '9877767676', 'United Kingdom', '34,sample street', 'london', 'lon', '5454545', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(39, '1684790', 'dczhG3oa89ZSZKkI4Bru5UDMRMjkKb2tXtOiXbZl', '60', '25', '7', 23, 25, 15, 10, '2checkout', '', '2019-01-17', 0, 'smaple', 'bavan', 'new', 'test@test.com', '9877767676', 'India', '23,new street', 'madurai', 'tamilnadu', '5454545', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(40, '1884831', 'hwHEEsvXSw1uGIHogAZ86SF2hBFEHTzCsSttqbz2', '61', '45', '20', 23, 45, 35, 10, 'paypal', '', '2019-01-22', 0, 'example', 'fdsa', 'dfsa', 'test@test.com', '9877767676', 'Australia', 'dfsa', 'fdsa', 'fdsa', '32432', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(41, '3553957', 'do2mOVeAPLpY8xl7mJOTlRXncxzLhsnbB7Cd26mg', '62', '45', '20', 8, 45, 35, 10, 'paypal', '', '2019-01-22', 0, 'example', 'dfsa', 'dfsasa', 'example@sample.com', '3242432', 'American Samoa', 'fdsa', 'fdsa', 'fdsa', '3242', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed'),
(42, '2372910', 'do2mOVeAPLpY8xl7mJOTlRXncxzLhsnbB7Cd26mg', '63', '35', '7', 8, 35, 25, 10, 'paypal', '', '2019-01-22', 0, 'example', 'dsaf', 'fdsa', 'example@sample.com', '3242432', 'Australia', 'fdsa', 'fdsa', 'fdsa', '324324', 0, '', '', '', '', '', '', '', '', '', '', '', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `comm_id` int(11) NOT NULL,
  `item_id` int(200) NOT NULL,
  `item_token` varchar(200) NOT NULL,
  `comm_user_id` int(200) NOT NULL,
  `item_user_id` int(200) NOT NULL,
  `comm_text` mediumtext NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_group_id` varchar(200) NOT NULL,
  `comm_parent` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_comment`
--

INSERT INTO `product_comment` (`comm_id`, `item_id`, `item_token`, `comm_user_id`, `item_user_id`, `comm_text`, `comm_date`, `comm_group_id`, `comm_parent`) VALUES
(3, 13, '5b6ba8d24cc55', 7, 3, 'hi can we customize this plugin?', '2018-10-07 09:00:45', '5bb9cb3d52d87', 0),
(4, 13, '5b6ba8d24cc55', 3, 3, 'yes it\'s possible but it\'s your self :)', '2018-10-07 09:06:39', '5bb9cc9f2e09e', 0),
(5, 13, '5b6ba8d24cc55', 7, 3, 'good', '2018-10-07 09:25:01', '5bb9cb3d52d87', 0),
(6, 13, '5b6ba8d24cc55', 8, 3, 'responsive support?', '2018-10-07 09:30:16', '5bb9d22835600', 0),
(7, 13, '5b6ba8d24cc55', 7, 3, 'i need your installation support', '2018-10-07 09:32:18', '5bb9cb3d52d87', 0),
(8, 13, '5b6ba8d24cc55', 3, 3, ':) thankyou', '2018-10-07 16:21:15', '5bb9cc9f2e09e', 5),
(9, 13, '5b6ba8d24cc55', 3, 3, 'yes supported. are you bought theme?', '2018-10-07 16:41:37', '5bb9cc9f2e09e', 6),
(10, 13, '5b6ba8d24cc55', 3, 3, 'test', '2018-10-08 02:55:09', '5bb9cc9f2e09e', 0),
(11, 13, '5b6ba8d24cc55', 7, 3, 'can you reduce cost of this theme?', '2018-10-08 02:55:59', '5bb9cb3d52d87', 0),
(12, 13, '5b6ba8d24cc55', 7, 3, 'can you reduce cost 35$ to 40$ ?', '2018-10-08 02:57:24', '5bb9cb3d52d87', 0),
(13, 14, '5b8a643395f7f', 3, 8, 'i need future update. it\'s can possible?', '2018-10-09 01:58:47', '5bbc0b573d090', 0),
(14, 14, '5b8a643395f7f', 8, 8, 'no not possible', '2018-10-09 02:01:23', '5bbc0bf31e848', 13),
(15, 15, '5b8a935549efd', 7, 8, 'customization friendly?', '2018-10-16 08:11:25', '5bc59d2da63ef', 0),
(16, 15, '5b8a935549efd', 8, 8, 'yes', '2018-10-16 08:17:04', '5bc59e8040875', 0),
(17, 15, '5b8a935549efd', 8, 8, 'yes customization friendly are you bought this theme?', '2018-10-16 08:17:38', '5bc59e8040875', 15),
(18, 59, '5b5fc0b88007e', 7, 7, 'hi', '2019-01-14 13:39:15', '5c3c9103d8ce7', 0),
(19, 59, '5b5fc0b88007e', 20, 7, 'good work', '2019-01-14 13:40:44', '5c3c915c8f180', 0),
(20, 15, '5b8a935549efd', 8, 8, 'hi', '2019-02-04 10:03:41', '5bc59e8040875', 0),
(21, 15, '5b8a935549efd', 7, 8, 'ok', '2019-02-04 10:04:27', '5bc59d2da63ef', 0),
(22, 15, '5b8a935549efd', 7, 8, 'can you reduce price?', '2019-02-04 10:05:42', '5bc59d2da63ef', 0),
(23, 15, '5b8a935549efd', 7, 8, 'ok', '2019-02-04 10:06:37', '5bc59d2da63ef', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `item_img_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `item_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`item_img_id`, `image`, `item_token`) VALUES
(3, '1533781311Desert.jpg', '5b5911bc1f3b9'),
(4, '1533781311Lighthouse.jpg', '5b5911bc1f3b9'),
(5, '1533782571woocommerce-2.jpg', '5b6ba8d24cc55'),
(6, '1534286408Lighthouse.jpg', '5b6ba8d24cc55'),
(7, '1534286408Tulips.jpg', '5b6ba8d24cc55'),
(8, '1535796887philosophy-free-lifestyle-blog-website-template.jpg', '5b8a643395f7f'),
(9, '1535808602appy-free-template.jpg', '5b8a935549efd'),
(10, '1536488595Koala.jpg', '5b94f46c41525'),
(11, '1536488595Lighthouse.jpg', '5b94f46c41525'),
(12, '1536488958_12Koala.jpg', '5b94f4944ae9f'),
(13, '1536488958_12Lighthouse.jpg', '5b94f4944ae9f'),
(14, '1536490318_12Jellyfish.jpg', '5b94fb3394e15'),
(15, '1536490318_12Penguins.jpg', '5b94fb3394e15'),
(16, '1536491382651532832757.jpg', '5b5d2b5a07c0d');

-- --------------------------------------------------------

--
-- Table structure for table `product_liked`
--

CREATE TABLE `product_liked` (
  `like_id` int(11) NOT NULL,
  `item_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_liked`
--

INSERT INTO `product_liked` (`like_id`, `item_id`, `user_id`) VALUES
(1, 13, 8),
(2, 10, 8),
(3, 11, 8),
(4, 56, 20),
(5, 42, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `ord_id` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `item_id` int(200) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `item_user_id` int(200) NOT NULL,
  `item_token` varchar(200) NOT NULL,
  `purchase_token` varchar(200) NOT NULL,
  `payment_token` varchar(500) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `licence_type` varchar(200) NOT NULL,
  `license_start_date` date NOT NULL,
  `license_end_date` date NOT NULL,
  `downloaded_count` int(100) NOT NULL,
  `price` float NOT NULL,
  `vendor_amount` float NOT NULL,
  `admin_amount` float NOT NULL,
  `total` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `delete_status` varchar(100) NOT NULL,
  `approval_status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`ord_id`, `user_id`, `item_id`, `item_name`, `item_user_id`, `item_token`, `purchase_token`, `payment_token`, `payment_type`, `licence_type`, `license_start_date`, `license_end_date`, `downloaded_count`, `price`, `vendor_amount`, `admin_amount`, `total`, `status`, `delete_status`, `approval_status`) VALUES
(12, 7, 15, 'CSS Theme', 8, '5b8a935549efd', '4116265', '02333066XB363250J', 'paypal', 'extended_price_six_month', '2018-09-01', '2019-03-01', 0, 150, 140, 10, 150, 'completed', 'deleted', 'payment released to vendor'),
(13, 7, 14, 'Responsive html template', 8, '5b8a643395f7f', '4116265', '02333066XB363250J', 'paypal', 'regular_price_one_year', '2018-09-01', '2019-09-01', 0, 260, 250, 10, 260, 'completed', 'deleted', ''),
(14, 7, 1, 'Html Landing page', 3, '5b5911bc1f3b9', '8023245', 'tok_1D5iwKA4i5sXvQrkIBC3Bz6P', 'stripe', 'extended_price_six_month', '2018-09-01', '2019-03-01', 0, 18, 8, 10, 18, 'completed', 'deleted', ''),
(15, 7, 13, 'Woocommerce digital download plugin', 3, '5b6ba8d24cc55', '8023245', 'tok_1D5iwKA4i5sXvQrkIBC3Bz6P', 'stripe', 'regular_price_one_year', '2018-09-01', '2018-09-30', 0, 80, 70, 10, 80, 'completed', 'deleted', ''),
(16, 9, 1, 'Html Landing page', 3, '5b5911bc1f3b9', '4160713', 'tok_1D5uVlA4i5sXvQrkMGDfGnCM', 'stripe', 'regular_price_one_year', '2018-09-02', '2019-09-02', 0, 16, 6, 10, 16, 'completed', 'deleted', 'payment released to vendor'),
(19, 8, 10, 'Fitness html5 template', 7, '5b5fc0b88007e', '1852302', '3JL025222S943383E', 'paypal', 'regular_price_six_month', '2018-10-13', '2019-04-13', 0, 25, 15, 10, 25, 'completed', 'deleted', 'payment released to vendor'),
(20, 3, 8, 'Stuff HTML5 template', 7, '5b5fb4a04a25e', '9489642', 'tok_1DKnlAA4i5sXvQrk620nVDEB', 'stripe', 'regular_price_one_year', '2018-10-13', '2019-10-13', 0, 40, 30, 10, 40, 'completed', 'deleted', ''),
(21, 8, 12, 'Slider responsive theme', 7, '5b610fdcae85b', '7883565', '0Y039111LJ316284H', 'paypal', 'extended_price_six_month', '2018-10-15', '2019-04-15', 5, 70, 60, 10, 70, 'completed', 'deleted', 'payment released to vendor'),
(23, 8, 13, 'Woocommerce digital download plugin', 3, '5b6ba8d24cc55', '2956906', 'tok_1DLQPGA4i5sXvQrksnHlbeS3', 'stripe', 'extended_price_one_year', '2018-10-15', '2019-10-15', 0, 150, 140, 10, 150, 'completed', 'deleted', 'payment refunded to buyer'),
(24, 3, 14, 'Responsive html template', 8, '5b8a643395f7f', '5170767', '6C119672RY901773F', 'paypal', 'regular_price_six_month', '2018-10-17', '2019-04-17', 0, 130, 120, 10, 130, 'completed', 'deleted', ''),
(26, 7, 13, 'Woocommerce digital download plugin', 3, '5b6ba8d24cc55', '6387697', '', 'paypal', 'regular_price_six_month', '2018-11-03', '2019-05-03', 0, 50.4, 40.4, 10, 50.4, 'completed', 'deleted', ''),
(27, 20, 28, 'SAMPLE ITEM', 7, '5c0267f98c710', '4908365', '', 'paypal', 'regular_price_six_month', '2018-12-02', '2019-06-02', 0, 2, 2, 0, 2, 'completed', 'deleted', ''),
(28, 20, 1, 'Php Form script', 3, '5b5911bc1f3b9', '8841038', '', 'paypal', 'regular_price_six_month', '2018-12-02', '2019-06-02', 0, 12, 2, 10, 12, 'completed', 'deleted', ''),
(29, 20, 8, 'Woocommerce digital download plugin', 7, '5b5fb4a04a25e', '7383711', '', 'paypal', 'regular_price_one_year', '2018-12-02', '2019-12-02', 0, 40, 30, 10, 40, 'completed', 'deleted', ''),
(30, 20, 12, 'Stuff HTML5 template', 7, '5b610fdcae85b', '1361422', '', 'wallet', 'regular_price_six_month', '2018-12-01', '2019-06-02', 1, 25, 15, 10, 25, 'completed', 'deleted', 'payment released to vendor'),
(32, 20, 29, 'PayzaKart Multivendor Product Marketplace', 8, '5c2cb693dfdcd', '1551077', '20190103111212800110168209000130260', 'paytm', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 49, 39, 10, 49, 'completed', 'deleted', 'payment released to vendor'),
(33, 20, 10, 'Fitness html5 template', 7, '5b5fc0b88007e', '4041901', 'pay_BfU7dCoT0PZqDm', 'razorpay', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 25, 15, 10, 25, 'completed', 'deleted', 'payment refunded to buyer'),
(34, 20, 11, 'CSS Theme', 7, '5b60f98b3fa86', '8690761', '9L2210509F8499248', 'paypal', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 50, 40, 10, 50, 'completed', 'deleted', 'payment refunded to buyer'),
(35, 20, 14, 'Education CSS Templete', 8, '5b8a643395f7f', '4083133', '1BM25478MS496903P', 'paypal', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 130, 120, 10, 130, 'completed', 'deleted', 'payment refunded to buyer'),
(36, 20, 13, 'Woocommerce php script', 3, '5b6ba8d24cc55', '1485183', '7R1623153Y606660B', 'paypal', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 50.4, 40.4, 10, 50.4, 'completed', 'deleted', 'payment released to vendor'),
(37, 20, 7, 'Slider responsive theme', 7, '5b5fb2df121ea', '6647104', 'tok_1DoUBGA4i5sXvQrkJgbD8A3e', 'stripe', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 36, 26, 10, 36, 'completed', 'deleted', 'payment refunded to buyer'),
(38, 20, 9, 'Charity Donation PHP Script', 7, '5b5fb556f0907', '9984152', 'pay_BfY8ljMDhsfRyM', 'razorpay', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 25, 15, 10, 25, 'completed', 'deleted', 'payment released to vendor'),
(41, 20, 3, 'Subscription script', 3, '5b5d2b5a07c0d', '6603115', '', 'wallet', 'regular_price_one_year', '2019-01-03', '2020-01-03', 0, 40, 30, 10, 40, 'completed', 'deleted', 'payment refunded to buyer'),
(42, 20, 3, 'Subscription script', 3, '5b5d2b5a07c0d', '1397173', '', 'wallet', 'regular_price_six_month', '2019-01-03', '2019-07-03', 0, 20, 10, 10, 20, 'completed', 'deleted', 'payment released to vendor'),
(43, 20, 10, 'Fitness html5 template', 7, '5b5fc0b88007e', '7942482', '', 'wallet', 'regular_price_six_month', '2019-01-16', '2019-07-16', 0, 25, 15, 10, 25, 'completed', 'deleted', 'payment released to vendor'),
(44, 7, 29, 'PayzaKart Multivendor Product Marketplace', 8, '5c2cb693dfdcd', '8912645', '20190114111212800110168334300157890', 'paytm', 'regular_price_six_month', '2019-01-14', '2019-07-14', 0, 49, 39, 10, 49, 'completed', 'deleted', 'payment released to vendor'),
(53, 23, 29, 'PayzaKart Multivendor Product Marketplace', 8, '5c2cb693dfdcd', '8849710', '20190116111212800110168459600169119', 'paytm', 'regular_price_six_month', '2019-01-16', '2019-07-16', 0, 49, 39, 10, 49, 'completed', 'deleted', 'payment released to vendor'),
(54, 23, 7, 'Slider responsive theme', 7, '5b5fb2df121ea', '5118330', 'tok_1Dt85pA4i5sXvQrkVvKQhJaZ', 'stripe', 'regular_price_one_year', '2019-01-16', '2020-01-16', 0, 45, 35, 10, 45, 'completed', 'deleted', 'payment refunded to buyer'),
(55, 20, 66, 'sample post', 23, '5c3ec0d051e73', '7942482', '', 'wallet', 'regular_price_six_month', '2019-01-16', '2019-07-16', 0, 33, 23, 10, 33, 'completed', 'deleted', 'payment released to vendor'),
(56, 23, 11, 'CSS Theme', 7, '5b60f98b3fa86', '6991339', '27K32236WL209391R', 'paypal', 'regular_price_six_month', '2019-01-16', '2019-07-16', 0, 50, 40, 10, 50, 'completed', 'deleted', 'payment released to vendor'),
(57, 23, 29, 'PayzaKart Multivendor Product Marketplace', 8, '5c2cb693dfdcd', '6991339', '27K32236WL209391R', 'paypal', 'regular_price_six_month', '2019-01-16', '2019-07-16', 0, 49, 39, 10, 49, 'completed', 'deleted', 'payment released to vendor'),
(58, 23, 14, 'Education CSS Templete', 8, '5b8a643395f7f', '4254963', '9093747920604', '2checkout', 'regular_price_six_month', '2019-01-17', '2019-07-17', 0, 130, 120, 10, 130, 'completed', 'deleted', 'payment released to vendor'),
(59, 23, 15, 'Html Landing page', 8, '5b8a935549efd', '3957867', '9093747920766', '2checkout', 'regular_price_one_year', '2019-01-17', '2020-01-17', 0, 120, 110, 10, 120, 'completed', 'deleted', 'payment released to vendor'),
(60, 23, 12, 'Stuff HTML5 template', 7, '5b610fdcae85b', '1684790', '9093747920823', '2checkout', 'regular_price_six_month', '2019-01-17', '2019-07-17', 0, 25, 15, 10, 25, 'completed', 'deleted', 'payment released to vendor'),
(61, 23, 74, 'example product', 20, '5c46fba36e690', '1884831', '', 'paypal', 'regular_price_six_month', '2019-01-22', '2019-07-22', 0, 45, 35, 10, 45, 'completed', 'deleted', 'payment released to vendor'),
(62, 8, 74, 'example product', 20, '5c46fba36e690', '3553957', '', 'paypal', 'regular_price_six_month', '2019-01-22', '2019-07-22', 0, 45, 35, 10, 45, 'completed', 'deleted', 'payment released to vendor'),
(63, 8, 9, 'Charity Donation PHP Script', 7, '5b5fb556f0907', '2372910', '', 'paypal', 'regular_price_one_year', '2019-01-22', '2020-01-22', 3, 35, 25, 10, 35, 'completed', 'deleted', 'payment released to vendor');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `rate_id` int(11) NOT NULL,
  `item_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `rating` int(200) NOT NULL,
  `review` mediumtext NOT NULL,
  `review_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_refund`
--

CREATE TABLE `product_refund` (
  `dispute_id` int(11) NOT NULL,
  `purchase_token` int(200) NOT NULL,
  `request_date` date NOT NULL,
  `order_id` int(200) NOT NULL,
  `item_id` int(200) NOT NULL,
  `payment_date` date NOT NULL,
  `buyer_id` int(200) NOT NULL,
  `vendor_id` int(200) NOT NULL,
  `payment` float NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` mediumtext NOT NULL,
  `delete_status` varchar(100) NOT NULL,
  `dispute_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_refund`
--

INSERT INTO `product_refund` (`dispute_id`, `purchase_token`, `request_date`, `order_id`, `item_id`, `payment_date`, `buyer_id`, `vendor_id`, `payment`, `payment_type`, `subject`, `message`, `delete_status`, `dispute_status`) VALUES
(15, 7883565, '2018-10-15', 21, 12, '2018-10-15', 8, 7, 70, 'paypal', 'I need refund my money', 'Hello i need refund my money please cancel my order', 'deleted', 'payment released to vendor'),
(16, 2956906, '2018-10-15', 23, 13, '2018-10-15', 8, 3, 150, 'stripe', 'I need refund my money', 'i need money :(', 'deleted', 'payment refunded to buyer'),
(17, 8690761, '2019-01-03', 34, 11, '2019-01-03', 20, 7, 50, 'paypal', 'i need my money', 'please refund my money', 'deleted', 'payment refunded to buyer'),
(18, 4041901, '2019-01-03', 33, 10, '2019-01-03', 20, 7, 25, 'razorpay', 'i need my money', 'i need my money', 'deleted', 'payment refunded to buyer'),
(19, 1551077, '2019-01-03', 32, 29, '2019-01-03', 20, 8, 49, 'paytm', 'i need my money', 'i need my money', 'deleted', 'payment released to vendor'),
(20, 4083133, '2019-01-03', 35, 14, '2019-01-03', 20, 8, 130, 'paypal', 'i need my money', 'i need my money', 'deleted', 'payment refunded to buyer'),
(21, 1485183, '2019-01-03', 36, 13, '2019-01-03', 20, 3, 50.4, 'paypal', 'i need my money', 'i need my money', 'deleted', 'payment released to vendor'),
(22, 6647104, '2019-01-03', 37, 7, '2019-01-03', 20, 7, 36, 'stripe', 'i need my money', 'i need my money', 'deleted', 'payment refunded to buyer'),
(23, 9984152, '2019-01-03', 38, 9, '2019-01-03', 20, 7, 25, 'razorpay', 'i need my money', 'i need my money', 'deleted', 'payment released to vendor'),
(24, 8113788, '2019-01-03', 39, 3, '2019-01-03', 20, 3, 20, 'paytm', 'i need my money', 'fdsa', 'deleted', 'payment refunded to buyer'),
(25, 6603115, '2019-01-03', 41, 3, '2019-01-03', 20, 3, 40, 'wallet', 'i need my money', 'fdsa', 'deleted', 'payment refunded to buyer'),
(26, 5118330, '2019-01-16', 54, 7, '2019-01-16', 23, 7, 45, 'stripe', 'i need my money', 'i will refund request', 'deleted', 'payment refunded to buyer');

-- --------------------------------------------------------

--
-- Table structure for table `product_report`
--

CREATE TABLE `product_report` (
  `rid` int(11) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_user_id` int(100) NOT NULL,
  `report_user_id` int(100) NOT NULL,
  `report_category` varchar(200) NOT NULL,
  `reason_for_report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_withdraw`
--

CREATE TABLE `product_withdraw` (
  `wid` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `withdraw_amount` varchar(200) NOT NULL,
  `withdraw_payment_type` varchar(200) NOT NULL,
  `paypal_id` varchar(200) NOT NULL,
  `stripe_id` varchar(200) NOT NULL,
  `bank_account_no` varchar(200) NOT NULL,
  `bank_info` varchar(200) NOT NULL,
  `bank_ifsc` varchar(200) NOT NULL,
  `paytm_no` varchar(200) NOT NULL,
  `withdraw_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_address` text NOT NULL,
  `site_phone` varchar(200) NOT NULL,
  `site_email` varchar(200) NOT NULL,
  `site_layout` varchar(50) NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_gplus` varchar(255) NOT NULL,
  `site_pinterest` varchar(255) NOT NULL,
  `site_instagram` varchar(255) NOT NULL,
  `site_currency` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_banner` varchar(255) NOT NULL,
  `site_banner_heading` text NOT NULL,
  `site_banner_subheading` text NOT NULL,
  `header_type` varchar(50) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `site_post_per` int(50) NOT NULL,
  `site_comment_per` int(200) NOT NULL,
  `site_latest_item` int(50) NOT NULL,
  `site_latest_item_count` int(50) NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `site_map_api` varchar(800) NOT NULL,
  `site_url` varchar(100) NOT NULL,
  `image_size` int(255) NOT NULL,
  `video_size` int(255) NOT NULL,
  `image_type` varchar(200) NOT NULL,
  `mp3_size` int(200) NOT NULL,
  `zip_size` int(200) NOT NULL,
  `site_loading` int(50) NOT NULL,
  `site_loading_url` varchar(200) NOT NULL,
  `site_primary_color` varchar(200) NOT NULL,
  `site_secondary_color` varchar(200) NOT NULL,
  `site_button_color` varchar(200) NOT NULL,
  `site_link_color` varchar(50) NOT NULL,
  `with_submit_product` int(50) NOT NULL,
  `payment_option` varchar(255) NOT NULL,
  `withdraw_option` varchar(255) NOT NULL,
  `stripe_mode` varchar(255) NOT NULL,
  `test_publish_key` varchar(255) NOT NULL,
  `test_secret_key` varchar(255) NOT NULL,
  `live_publish_key` varchar(255) NOT NULL,
  `live_secret_key` varchar(255) NOT NULL,
  `commission_mode` varchar(255) NOT NULL,
  `commission_amt` float NOT NULL,
  `withdraw_amt` float NOT NULL,
  `processing_fee` float NOT NULL,
  `featured_price` float NOT NULL,
  `featured_days` int(50) NOT NULL,
  `min_price_range` int(200) NOT NULL,
  `max_price_range` int(200) NOT NULL,
  `promo_icon_1` varchar(200) NOT NULL,
  `promo_title_1` varchar(200) NOT NULL,
  `promo_desc_1` varchar(500) NOT NULL,
  `promo_icon_2` varchar(200) NOT NULL,
  `promo_title_2` varchar(200) NOT NULL,
  `promo_desc_2` varchar(500) NOT NULL,
  `promo_icon_3` varchar(200) NOT NULL,
  `promo_title_3` varchar(200) NOT NULL,
  `promo_desc_3` varchar(500) NOT NULL,
  `promo_icon_4` varchar(200) NOT NULL,
  `promo_title_4` varchar(200) NOT NULL,
  `promo_desc_4` varchar(500) NOT NULL,
  `site_footer_newsletter` text NOT NULL,
  `site_blog_visible` varchar(50) NOT NULL,
  `site_blog_per` int(50) NOT NULL,
  `refund_time_limit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_desc`, `site_keyword`, `site_address`, `site_phone`, `site_email`, `site_layout`, `site_facebook`, `site_twitter`, `site_gplus`, `site_pinterest`, `site_instagram`, `site_currency`, `site_logo`, `site_favicon`, `site_banner`, `site_banner_heading`, `site_banner_subheading`, `header_type`, `site_copyright`, `site_post_per`, `site_comment_per`, `site_latest_item`, `site_latest_item_count`, `paypal_id`, `paypal_url`, `site_map_api`, `site_url`, `image_size`, `video_size`, `image_type`, `mp3_size`, `zip_size`, `site_loading`, `site_loading_url`, `site_primary_color`, `site_secondary_color`, `site_button_color`, `site_link_color`, `with_submit_product`, `payment_option`, `withdraw_option`, `stripe_mode`, `test_publish_key`, `test_secret_key`, `live_publish_key`, `live_secret_key`, `commission_mode`, `commission_amt`, `withdraw_amt`, `processing_fee`, `featured_price`, `featured_days`, `min_price_range`, `max_price_range`, `promo_icon_1`, `promo_title_1`, `promo_desc_1`, `promo_icon_2`, `promo_title_2`, `promo_desc_2`, `promo_icon_3`, `promo_title_3`, `promo_desc_3`, `promo_icon_4`, `promo_title_4`, `promo_desc_4`, `site_footer_newsletter`, `site_blog_visible`, `site_blog_per`, `refund_time_limit`) VALUES
(1, 'DigitKart', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'lorem,ipsum,lorem,ipsum', '34690 Calcutta Drive, Fremont, CA, USA', '9876543210', 'test@test.com', '4', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.google.com', 'http://www.pinterest.com', 'http://www.instagram.com', 'USD', '1539771207.png', '1539755419.png', '1537929288.jpg', '98554+ ITEMS FOR SALE', 'Best Premium PSD, HTML, Wordpress Themes, PHP Scripts & Others Graphics', 'static', '© 2019. All Rights Reserved. Designed by Avigher', 20, 3, 7, 18, 'demochecks@gmail.com', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'AIzaSyDDsvwtCM8LTvi1Zm-XydV-iutWZzAJVDI', 'http://localhost/laraportfolio', 1024, 1024, 'jpg,jpeg,png,gif', 2048, 1024, 1, '1539771830.gif', '#051F39', '#0E2A47', '#21C063', '#0E2A47', 0, 'paypal,stripe,wallet,razorpay,paytm,2checkout', 'paypal,stripe,localbank,paytm', 'test', 'pk_test_bWx1fEQgVZozaQyPZpAjwDMQ', 'sk_test_JKf2bTvOtK7fPFrHoMphlvAV', 'dfsaaaaaaaaaa', 'fdssssssssssssssssssss', 'fixed', 10, 5, 0, 10, 365, 10, 300, 'fa-desktop', 'High Quality Items', 'Item made by professionals with 15 years of work experience.', 'fa-clock-o', '24/7 Customer Services', 'Our Customer Services Managers will always help you.', 'fa-thumbs-o-up', '100% Satisfaction', 'In case you are not satisfied with the purchased item, we will change it.', 'fa-money', 'Money Back guarantee', 'In case you change your mind you will get a refund in 30 days.', 'Want more script,themes & templates? Subscribe to our mailing list to receive an update when new items arrive!', 'yes', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings_meta`
--

CREATE TABLE `settings_meta` (
  `sett_meta_id` int(11) NOT NULL,
  `sett_meta_key` varchar(200) NOT NULL,
  `sett_meta_value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_meta`
--

INSERT INTO `settings_meta` (`sett_meta_id`, `sett_meta_key`, `sett_meta_value`) VALUES
(1, 'site_feature_item_count', '12'),
(2, 'site_back_to_top', 'on'),
(3, 'site_google_analytics', '&lt;!-- Google Analytics --&gt;\r\n&lt;script&gt;\r\n(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\nm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n})(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\nga(\'create\', \'UA-XXXXX-Y\', \'auto\');\r\nga(\'send\', \'pageview\');\r\n&lt;/script&gt;\r\n&lt;!-- End Google Analytics --&gt;'),
(4, 'site_customer_feedback', 'on'),
(5, 'referral_amount', '5'),
(6, 'razorpay_key_id', 'rzp_test_RJwKXKVekgqvmx'),
(7, 'razorpay_key_secret', 'jgd7HPfb3mHZmXAeeKrzLhDw'),
(8, 'paytm_mode', 'TEST'),
(9, 'paytm_merchant_key', 'WiNuLMimr2tht79r'),
(10, 'paytm_merchant_id', 'Avighe56397143395454'),
(11, 'paytm_merchant_website', 'WEBSTAGING'),
(15, 'site_live_chat', '&lt;script id=&quot;ze-snippet&quot; src=&quot;https://static.zdassets.com/ekr/snippet.js?key=38f4afd6-fe4d-40c8-8502-caf16a627cb9&quot;&gt; &lt;/script&gt;'),
(20, 'payment_approval', 'no'),
(21, 'site_seo_slug', 'yes'),
(22, 'sender_name', 'saravanan'),
(23, 'sender_email', 'avigher@hotmail.com'),
(30, 'two_checkout_mode', 'true'),
(31, 'two_checkout_account', '901401777'),
(32, 'two_checkout_publishable', '11C26691-0E20-4743-A6FE-514D66BCE377'),
(33, 'two_checkout_private', 'AB605655-ABFC-4210-BF53-B4A038E08B3A'),
(35, 'site_translation', 'on'),
(36, 'site_feature_view', 'carousel'),
(37, 'site_preview_iframe', 'on'),
(40, 'minimum_sells', '2'),
(41, 'author_level_one', '1'),
(42, 'author_level_two', '100'),
(43, 'author_level_three', '1000'),
(44, 'author_level_four', '10000'),
(45, 'author_level_five', '40000'),
(46, 'author_level_six', '75000'),
(47, 'collector_level_one', '1'),
(48, 'collector_level_two', '10'),
(49, 'collector_level_three', '50'),
(50, 'collector_level_four', '100'),
(51, 'collector_level_five', '200'),
(52, 'collector_level_six', '500'),
(53, 'referred_level_one', '1'),
(54, 'referred_level_two', '5'),
(55, 'referred_level_three', '10'),
(56, 'referred_level_four', '20'),
(57, 'referred_level_five', '50'),
(58, 'referred_level_six', '100');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subid` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `post_slug` varchar(500) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `subimage` varchar(255) NOT NULL,
  `subcat_type` varchar(50) NOT NULL,
  `delete_status` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `lang_code` varchar(50) NOT NULL,
  `parent` int(100) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subid`, `subcat_name`, `post_slug`, `cat_id`, `subimage`, `subcat_type`, `delete_status`, `token`, `lang_code`, `parent`, `status`) VALUES
(44, 'Buttons', 'buttons', '28', '', 'default', 'deleted', '', 'en', 0, 0),
(45, 'Forms', 'forms', '28', '', 'default', 'deleted', '', 'en', 0, 0),
(46, 'Pricing Tables', 'pricing-tables', '28', '', 'default', 'deleted', '', 'en', 0, 0),
(47, 'osCommerce', 'oscommerce', '26', '', 'default', 'deleted', '', 'en', 0, 0),
(48, 'Zen Cart', 'zen-cart', '26', '', 'default', 'deleted', '', 'en', 0, 0),
(49, 'Open Cart', 'open-cart', '26', '', 'default', 'deleted', '', 'en', 0, 0),
(50, 'WooCommerce', 'woocommerce', '26', '', 'default', 'deleted', '', 'en', 0, 0),
(51, 'Templates', 'templates', '30', '', 'default', 'deleted', '', 'en', 0, 0),
(52, 'Games', 'games', '30', '', 'default', 'deleted', '', 'en', 0, 0),
(53, 'Media', 'media', '30', '', 'default', 'deleted', '', 'en', 0, 0),
(54, 'News Tickers', 'news-tickers', '27', '', 'default', 'deleted', '', 'en', 0, 0),
(55, 'Sliders', 'sliders', '27', '', 'default', 'deleted', '', 'en', 0, 0),
(56, 'Social Networks', 'social-networks', '27', '', 'default', 'deleted', '', 'en', 0, 0),
(57, 'Calendars', 'calendars', '27', '', 'default', 'deleted', '', 'en', 0, 0),
(58, 'Android', 'android', '29', '', 'default', 'deleted', '', 'en', 0, 0),
(59, 'iOS', 'ios', '29', '', 'default', 'deleted', '', 'en', 0, 0),
(60, 'Shopping Carts', 'shopping-carts', '24', '', 'default', 'deleted', '', 'en', 0, 0),
(61, 'Forms', 'forms', '24', '', 'default', 'deleted', '', 'en', 0, 0),
(62, 'Navigation', 'navigation', '24', '', 'default', 'deleted', '', 'en', 0, 0),
(63, 'Polls', 'polls', '24', '', 'default', 'deleted', '', 'en', 0, 0),
(64, 'Search', 'search', '24', '', 'default', 'deleted', '', 'en', 0, 0),
(65, 'OpenCart', 'opencart', '31', '', 'default', 'deleted', '', 'en', 0, 0),
(66, 'Joomla', 'joomla', '31', '', 'default', 'deleted', '', 'en', 0, 0),
(67, 'Prestashop', 'prestashop', '31', '', 'default', 'deleted', '', 'en', 0, 0),
(68, 'Ubercart', 'ubercart', '31', '', 'default', 'deleted', '', 'en', 0, 0),
(69, 'VirtueMart', 'virtuemart', '31', '', 'default', 'deleted', '', 'en', 0, 0),
(70, 'osCommerce', 'oscommerce', '31', '', 'default', 'deleted', '', 'en', 0, 0),
(71, 'Auctions', 'auctions', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(72, 'Galleries', 'galleries', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(73, 'Membership', 'membership', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(74, 'Newsletters', 'newsletters', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(75, 'SEO', 'seo', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(76, 'Blog', 'blog', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(77, 'Portfolio', 'portfolio', '25', '', 'default', 'deleted', '', 'en', 0, 0),
(86, 'Version 5.4', 'version', '41', '', 'framework', 'deleted', '', 'en', 0, 0),
(87, 'Version 5.5', 'version', '41', '', 'framework', 'deleted', '', 'en', 0, 0),
(88, 'Version 5.6', 'version', '41', '', 'framework', 'deleted', '', 'en', 0, 0),
(89, 'محفظة', 'portfolio', '25', '', 'default', 'deleted', '5c389909d3728', 'ar', 77, 0),
(90, 'portafolio', 'portfolio', '25', '', 'default', 'deleted', '5c389909d3728', 'es', 77, 0),
(91, 'مدونة', 'blog', '25', '', 'default', 'deleted', '5c3899200d83d', 'ar', 76, 0),
(92, 'Blog', 'blog', '25', '', 'default', 'deleted', '5c3899200d83d', 'es', 76, 0),
(93, 'SEO', 'seo', '25', '', 'default', 'deleted', '5c3899334bcba', 'ar', 75, 0),
(94, 'SEO', 'seo', '25', '', 'default', 'deleted', '5c3899334bcba', 'es', 75, 0),
(95, 'النشرات الإخبارية', 'newsletters', '25', '', 'default', 'deleted', '5c389947672d1', 'ar', 74, 0),
(96, 'Boletines de noticias', 'newsletters', '25', '', 'default', 'deleted', '5c389947672d1', 'es', 74, 0),
(97, 'عضوية', 'membership', '25', '', 'default', 'deleted', '5c38995ec7f03', 'ar', 73, 0),
(98, 'Afiliación', 'membership', '25', '', 'default', 'deleted', '5c38995ec7f03', 'es', 73, 0),
(99, 'المعارض', 'galleries', '25', '', 'default', 'deleted', '5c389972e739a', 'ar', 72, 0),
(100, 'Galerias', 'galleries', '25', '', 'default', 'deleted', '5c389972e739a', 'es', 72, 0),
(101, 'مزادات', 'auctions', '25', '', 'default', 'deleted', '5c3899889f433', 'ar', 71, 0),
(102, 'Subastas', 'auctions', '25', '', 'default', 'deleted', '5c3899889f433', 'es', 71, 0),
(103, 'بورصة مصر', 'oscommerce', '31', '', 'default', 'deleted', '5c38999d9ed2c', 'ar', 70, 0),
(104, 'osCommerce', 'oscommerce', '31', '', 'default', 'deleted', '5c38999d9ed2c', 'es', 70, 0),
(105, 'VirtueMart عذرا', 'virtuemart', '31', '', 'default', 'deleted', '5c3899b136d94', 'ar', 69, 0),
(106, 'VirtueMart', 'virtuemart', '31', '', 'default', 'deleted', '5c3899b136d94', 'es', 69, 0),
(107, 'Ubercart', 'ubercart', '31', '', 'default', 'deleted', '5c3899c56b9f0', 'ar', 68, 0),
(108, 'Ubercart', 'ubercart', '31', '', 'default', 'deleted', '5c3899c56b9f0', 'es', 68, 0),
(109, 'بريستاشوب', 'prestashop', '31', '', 'default', 'deleted', '5c3899dc42ae2', 'ar', 67, 0),
(110, 'Prestashop', 'prestashop', '31', '', 'default', 'deleted', '5c3899dc42ae2', 'es', 67, 0),
(111, 'جملة', 'joomla', '31', '', 'default', 'deleted', '5c3899f201cc5', 'ar', 66, 0),
(112, 'Joomla', 'joomla', '31', '', 'default', 'deleted', '5c3899f201cc5', 'es', 66, 0),
(113, 'OpenCart', 'opencart', '31', '', 'default', 'deleted', '5c389a0868680', 'ar', 65, 0),
(114, 'OpenCart', 'opencart', '31', '', 'default', 'deleted', '5c389a0868680', 'es', 65, 0),
(115, 'بحث', 'search', '24', '', 'default', 'deleted', '5c389a1e9564d', 'ar', 64, 0),
(116, 'Buscar', 'search', '24', '', 'default', 'deleted', '5c389a1e9564d', 'es', 64, 0),
(117, 'استطلاعات الرأي', 'polls', '24', '', 'default', 'deleted', '5c389a357f7f3', 'ar', 63, 0),
(118, 'Centro', 'polls', '24', '', 'default', 'deleted', '5c389a357f7f3', 'es', 63, 0),
(119, 'التنقل', 'navigation', '24', '', 'default', 'deleted', '5c389a501acb4', 'ar', 62, 0),
(120, 'Navegación', 'navigation', '24', '', 'default', 'deleted', '5c389a501acb4', 'es', 62, 0),
(121, 'إستمارات', 'forms', '24', '', 'default', 'deleted', '5c389a65ddadb', 'ar', 61, 0),
(122, 'Formas', 'forms', '24', '', 'default', 'deleted', '5c389a65ddadb', 'es', 61, 0),
(123, 'عربات تسوق', 'shopping-carts', '24', '', 'default', 'deleted', '5c389a7e76818', 'ar', 60, 0),
(124, 'Carritos de compra', 'shopping-carts', '24', '', 'default', 'deleted', '5c389a7e76818', 'es', 60, 0),
(125, 'دائرة الرقابة الداخلية', 'ios', '29', '', 'default', 'deleted', '5c389a9403928', 'ar', 59, 0),
(126, 'iOS', 'ios', '29', '', 'default', 'deleted', '5c389a9403928', 'es', 59, 0),
(127, 'ذكري المظهر', 'android', '29', '', 'default', 'deleted', '5c389aa8788eb', 'ar', 58, 0),
(128, 'Androide', 'android', '29', '', 'default', 'deleted', '5c389aa8788eb', 'es', 58, 0),
(129, 'التقويمات', 'calendars', '27', '', 'default', 'deleted', '5c389abfbd3df', 'ar', 57, 0),
(130, 'Calendarios', 'calendars', '27', '', 'default', 'deleted', '5c389abfbd3df', 'es', 57, 0),
(131, 'شبكات اجتماعية', 'social-networks', '27', '', 'default', 'deleted', '5c389adb90386', 'ar', 56, 0),
(132, 'Redes sociales', 'social-networks', '27', '', 'default', 'deleted', '5c389adb90386', 'es', 56, 0),
(133, 'المتزلجون', 'sliders', '27', '', 'default', 'deleted', '5c389af3b5e93', 'ar', 55, 0),
(134, 'Deslizadores', 'sliders', '27', '', 'default', 'deleted', '5c389af3b5e93', 'es', 55, 0),
(135, 'شريط الأخبار', 'news-tickers', '27', '', 'default', 'deleted', '5c389b0cf34c7', 'ar', 54, 0),
(136, 'Tickers de noticias', 'news-tickers', '27', '', 'default', 'deleted', '5c389b0cf34c7', 'es', 54, 0),
(137, 'وسائل الإعلام', 'media', '30', '', 'default', 'deleted', '5c389b236b61b', 'ar', 53, 0),
(138, 'Medios de comunicación', 'media', '30', '', 'default', 'deleted', '5c389b236b61b', 'es', 53, 0),
(139, 'ألعاب', 'games', '30', '', 'default', 'deleted', '5c389b3b3cd6d', 'ar', 52, 0),
(140, 'Juegos', 'games', '30', '', 'default', 'deleted', '5c389b3b3cd6d', 'es', 52, 0),
(141, 'قوالب', 'templates', '30', '', 'default', 'deleted', '5c389b536a57c', 'ar', 51, 0),
(142, 'Plantillas', 'templates', '30', '', 'default', 'deleted', '5c389b536a57c', 'es', 51, 0),
(143, 'WooCommerce', 'woocommerce', '26', '', 'default', 'deleted', '5c389b68cd07d', 'ar', 50, 0),
(144, 'WooCommerce', 'woocommerce', '26', '', 'default', 'deleted', '5c389b68cd07d', 'es', 50, 0),
(145, 'فتح السلة', 'open-cart', '26', '', 'default', 'deleted', '5c389b7d979c1', 'ar', 49, 0),
(146, 'Carro abierto', 'open-cart', '26', '', 'default', 'deleted', '5c389b7d979c1', 'es', 49, 0),
(147, 'زن كارت', 'zen-cart', '26', '', 'default', 'deleted', '5c389b95679a3', 'ar', 48, 0),
(148, 'Carro zen', 'zen-cart', '26', '', 'default', 'deleted', '5c389b95679a3', 'es', 48, 0),
(149, 'بورصة مصر', 'oscommerce', '26', '', 'default', 'deleted', '5c389bad5e2bd', 'ar', 47, 0),
(150, 'osCommerce', 'oscommerce', '26', '', 'default', 'deleted', '5c389bad5e2bd', 'es', 47, 0),
(151, 'جداول التسعير', 'pricing-tables', '28', '', 'default', 'deleted', '5c389bc3a3548', 'ar', 46, 0),
(152, 'Tablas de Precios', 'pricing-tables', '28', '', 'default', 'deleted', '5c389bc3a3548', 'es', 46, 0),
(153, 'إستمارات', 'forms', '28', '', 'default', 'deleted', '5c389bd8d6685', 'ar', 45, 0),
(154, 'Formas', 'forms', '28', '', 'default', 'deleted', '5c389bd8d6685', 'es', 45, 0),
(155, 'وصفت', 'buttons', '28', '', 'default', 'deleted', '5c389bfaeecf3', 'ar', 44, 0),
(156, 'Botones', 'buttons', '28', '', 'default', 'deleted', '5c389bfaeecf3', 'es', 44, 0),
(157, '', 'version', '41', '', 'framework', 'deleted', '5c5adcbac4487', 'ar', 88, 0),
(158, '', 'version', '41', '', 'framework', 'deleted', '5c5adcbac4487', 'es', 88, 0),
(159, '', 'version', '41', '', 'framework', 'deleted', '5c5adcc614a8c', 'ar', 87, 0),
(160, '', 'version', '41', '', 'framework', 'deleted', '5c5adcc614a8c', 'es', 87, 0),
(161, '', 'version', '41', '', 'framework', 'deleted', '5c5adcd51887f', 'ar', 86, 0),
(162, '', 'version', '41', '', 'framework', 'deleted', '5c5adcd51887f', 'es', 86, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `user_slug` varchar(255) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `provider` varchar(191) NOT NULL,
  `provider_id` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `country` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(191) NOT NULL,
  `photo` varchar(191) NOT NULL,
  `profile_banner` varchar(500) NOT NULL,
  `about` text NOT NULL,
  `wallet` float NOT NULL,
  `confirmation` int(50) NOT NULL,
  `confirm_key` varchar(500) NOT NULL,
  `admin` int(11) NOT NULL,
  `referred_by` varchar(50) NOT NULL,
  `referral_amount` varchar(50) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `delete_status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_slug`, `email`, `password`, `provider`, `provider_id`, `gender`, `country`, `address`, `phone`, `photo`, `profile_banner`, `about`, `wallet`, `confirmation`, `confirm_key`, `admin`, `referred_by`, `referral_amount`, `remember_token`, `delete_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$N0gRNGGDLxwqUJqZLhYpiO70S5i1xKbmDhTE4LnhgjJb/DOrStSU6', '', '', 'male', 'United States', '2, sample', '9876543210', '', '', 'hello', 642.6, 1, '', 1, '', '', 'rPfHjw7t1es38Ohdcz7CbIGdcjuinjWaKJMfQGxP7ihSoq8bLsIGO6DjTm50', '', '2017-05-25 01:30:45', '2017-05-25 01:30:45'),
(3, 'sample', 'sample', 'sample@sample.com', '$2y$10$n8Ck0Gj37F0QpiZx5tDzSuAgfXVsQpQHcZImqFA4lBuYp4soFFFWC', '', '', 'male', 'India', '2, wel', '1235645555', '1513790163.jpg', '', 'test', 56.4, 1, '', 0, '', '', '3DvcLCZJpwQ3YVDtwull6cQid58hnkeZoVrWzNOv6NXTwTuLz7d2LNSfLv5L', 'deleted', NULL, NULL),
(7, 'demo', 'demo', 'demo@gmail.com', '$2y$10$pT4ZxL0sNarhoX/0yjsMV.3cRB7x3XeQaSSWZUf6dpv.A9GFKgTdC', '', '', 'male', '73', 'test address', '6464655', '', '', 'Hello', 286, 1, '', 0, '', '15', 'iOlsqplVhgxhKBdVyV310yKvtv4lO4PW4K1MZsTg5ADpuJUMf9zPc5Sr2abB', 'deleted', '2013-01-02 08:31:34', NULL),
(8, 'example', 'example', 'example@sample.com', '$2y$10$4bvRYCgzIlTUvGB.cIjVgORtkAhje646lQU.CgK0Vz9I2sckSVBQe', '', '', 'male', '193', '45,weldone street', '3242432', '1539684641210.jpg', '153968464165.jpeg', 'lorem ipsum lorem ipsum', 711, 1, '', 0, '', '', '8ksZ6KolUowK4oxNeJHRBJGDAzz70Lv0Yu6tsrU9Pu8RwHGyYa03WVk0iT2l', 'deleted', '2015-01-02 08:31:34', NULL),
(9, 'check', 'check', 'check@gmail.com', '$2y$10$O13XZNrhFIpyRvrQNW.Jvu9rYANhXzQj8SAtC8DmG.xm2nJhR17.y', '', '', '', '', '', '23', '', '', '', 0, 1, '5bf2870d5a8ab', 0, '', '', NULL, 'deleted', NULL, NULL),
(19, 'weldone', 'weldone', 'weldone@gmail.com', '$2y$10$XaCrVItuc8wAT6XwdNxlgOCK9V5cNozyoXBq9DY3qivdGsdEUj46.', '', '', 'male', '', '', '6565756', '', '', '', 0, 0, '5c038d1e317c3', 0, '7', '', NULL, 'deleted', NULL, NULL),
(20, 'good1234', 'good', 'good@gmail.com', '$2y$10$o1awm.8eCZPo6nQ5KpwPseJYiEZBcV00SADMLvs/CgAixIUPeV/4y', '', '', 'female', 'te', 'sds', '6575675', '', '', 'sdf', 253, 1, '5c038d4db9a5b', 0, '7', '', 'MDNJsOXJrW0tt96ZbA0djBwKUtg9Awce7KPfwtcRR6rA7BnlZTJ1thCCvgaW', 'deleted', NULL, NULL),
(22, 'again', 'again', 'again@gmail.com', '$2y$10$KkYn1Rjm5XUUVxzOvY2IleUsdpnUU8HE6rTFD.ywR.uB8HQrJlJde', '', '', 'male', '83', '2,new street', '4353453', '', '', 'sample desc', 0, 1, '5c2cc43e83765', 0, '', '', 'UxcRmAbJ6XHVgdM6drWjOXKxgiVgWfIozSVqsU8FaEFWc8Qjyr1BvmTBucyc', 'deleted', '2011-01-02 08:31:34', NULL),
(23, 'test', 'test', 'test@test.com', '$2y$10$d6YIM7WSNLA9Ya5MLNtGJOYJjcW/tZzBHiWXIH8ZUahLWJthZ1QIS', '', '', 'male', '11', '4,new street', '9877767676', '', '', 'test desc', 18, 1, '5c3ebf7e2bbbe', 0, '', '', 'yMNXVdxsTigZxsL2W0rutH6bcVfDHWmMK2i7shXZEaHDpnhjZ5llKPbbKz1n', 'deleted', '2017-01-15 23:52:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

CREATE TABLE `users_meta` (
  `user_meta_id` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `user_meta_key` varchar(200) NOT NULL,
  `user_meta_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_meta`
--

INSERT INTO `users_meta` (`user_meta_id`, `user_id`, `user_meta_key`, `user_meta_value`) VALUES
(2, 7, 'profile_details_status', 'on'),
(3, 12, 'profile_details_status', 'off'),
(4, 7, 'buyers_update_approval', 'no'),
(5, 3, 'profile_details_status', 'off'),
(6, 3, 'buyers_update_approval', 'yes'),
(7, 20, 'profile_details_status', 'off'),
(8, 20, 'buyers_update_approval', 'no'),
(9, 7, 'profile_badges_status', 'on'),
(10, 22, 'profile_details_status', 'on'),
(11, 22, 'profile_badges_status', 'on'),
(12, 22, 'buyers_update_approval', 'no'),
(13, 8, 'profile_details_status', 'on'),
(14, 8, 'profile_badges_status', 'on'),
(15, 8, 'buyers_update_approval', 'yes'),
(16, 23, 'profile_details_status', 'on'),
(17, 23, 'profile_badges_status', 'on'),
(18, 23, 'buyers_update_approval', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avig_language`
--
ALTER TABLE `avig_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avig_translate`
--
ALTER TABLE `avig_translate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products_meta`
--
ALTER TABLE `products_meta`
  ADD PRIMARY KEY (`item_meta_id`);

--
-- Indexes for table `product_checkout`
--
ALTER TABLE `product_checkout`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`item_img_id`);

--
-- Indexes for table `product_liked`
--
ALTER TABLE `product_liked`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `product_refund`
--
ALTER TABLE `product_refund`
  ADD PRIMARY KEY (`dispute_id`);

--
-- Indexes for table `product_report`
--
ALTER TABLE `product_report`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `product_withdraw`
--
ALTER TABLE `product_withdraw`
  ADD PRIMARY KEY (`wid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_meta`
--
ALTER TABLE `settings_meta`
  ADD PRIMARY KEY (`sett_meta_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`user_meta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avig_language`
--
ALTER TABLE `avig_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `avig_translate`
--
ALTER TABLE `avig_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1179;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `products_meta`
--
ALTER TABLE `products_meta`
  MODIFY `item_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_checkout`
--
ALTER TABLE `product_checkout`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `item_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_liked`
--
ALTER TABLE `product_liked`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_refund`
--
ALTER TABLE `product_refund`
  MODIFY `dispute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_report`
--
ALTER TABLE `product_report`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_withdraw`
--
ALTER TABLE `product_withdraw`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_meta`
--
ALTER TABLE `settings_meta`
  MODIFY `sett_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `user_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
